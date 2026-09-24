import { useEffect, useMemo, useState } from 'react'
import Icon from '../components/Icon'
import { adapted } from '../data/sample'
import { stripChips } from '../utils/adapt'

const TABS = [
  { key: 'simple', label: 'Texto simples', icon: 'book' },
  { key: 'visual', label: 'Ícones / Visual', icon: 'picture' },
  { key: 'audio', label: 'Áudio', icon: 'speaker' },
  { key: 'glossary', label: 'Glossário', icon: 'glossary' },
  { key: 'questions', label: 'Questões', icon: 'questions' },
]

const SPEEDS = [
  { label: 'Lento', rate: 0.8 },
  { label: 'Normal', rate: 1 },
  { label: 'Acelerado', rate: 1.2 },
]

function tokenizeWords(text) {
  const re = /\S+/g
  const words = []
  let match
  while ((match = re.exec(text)) !== null) {
    words.push({ word: match[0], start: match.index, end: match.index + match[0].length })
  }
  return words
}

function SimpleText({ data, onTerm }) {
  return (
    <div className="simple-view">
      <h3 className="result-heading">{data.simpleTitle || data.title}</h3>
      {data.simple.map((step) => (
        <article className="para" key={step.title}>
          <span className="para-icon" aria-hidden="true">
            <Icon name={step.icon} size={26} />
          </span>
          <div className="para-body">
            <h4 className="para-title">{step.title}</h4>
            <p className="para-text">
              {step.text.split(/(\[[^\]]+\])/g).map((token, i) => {
                const match = token.match(/^\[([^\]]+)\]$/)
                if (!match) return token
                return (
                  <button
                    type="button"
                    key={`${match[1]}-${i}`}
                    className="kw"
                    onClick={() => onTerm(match[1].toLowerCase())}
                  >
                    {match[1]}
                  </button>
                )
              })}
            </p>
          </div>
        </article>
      ))}
    </div>
  )
}

function VisualView({ data }) {
  return (
    <div className="visual-view">
      <h3 className="result-heading">{data.simpleTitle || data.title} — em imagens</h3>
      <div className="visual-grid">
        {data.simple.map((step) => (
          <article className="visual-card" key={step.title}>
            <span className="visual-icon" aria-hidden="true">
              <Icon name={step.icon} size={44} />
            </span>
            <h4 className="visual-title">{step.title}</h4>
            <p className="visual-text">{stripChips(step.text)}</p>
          </article>
        ))}
      </div>
    </div>
  )
}

function AudioView({ steps, onOpenGlossary }) {
  const [speed, setSpeed] = useState(1)
  const [status, setStatus] = useState('idle')
  const [activeIdx, setActiveIdx] = useState(null)
  const [wordIdx, setWordIdx] = useState(null)
  const wordsList = useMemo(() => steps.map((s) => tokenizeWords(s.text)), [steps])

  const supported = typeof window !== 'undefined' && 'speechSynthesis' in window

  useEffect(() => {
    return () => {
      if (supported) window.speechSynthesis.cancel()
    }
  }, [supported])

  const speak = (startIdx) => {
    if (!supported) return
    window.speechSynthesis.cancel()

    const speakNext = (idx) => {
      const step = steps[idx]
      if (!step) {
        setStatus('idle')
        setActiveIdx(null)
        setWordIdx(null)
        return
      }
      const utterance = new SpeechSynthesisUtterance(step.text)
      utterance.lang = 'pt-BR'
      utterance.rate = speed * 0.95
      utterance.onstart = () => {
        setStatus('playing')
        setActiveIdx(idx)
        setWordIdx(-1)
      }
      utterance.onboundary = (event) => {
        if (event.charIndex == null) return
        const words = wordsList[idx] || []
        const found = words.findIndex(
          (w) => event.charIndex >= w.start && event.charIndex < w.end,
        )
        if (found >= 0) setWordIdx(found)
      }
      utterance.onend = () => speakNext(idx + 1)
      utterance.onerror = () => {
        setStatus('idle')
        setActiveIdx(null)
      }
      window.speechSynthesis.speak(utterance)
    }

    speakNext(startIdx)
  }

  const togglePlay = () => {
    if (!supported) return
    if (status === 'playing') {
      window.speechSynthesis.pause()
      setStatus('paused')
    } else if (status === 'paused' && activeIdx != null) {
      window.speechSynthesis.resume()
      setStatus('playing')
    } else {
      speak(0)
    }
  }

  const stop = () => {
    if (!supported) return
    window.speechSynthesis.cancel()
    setStatus('idle')
    setActiveIdx(null)
    setWordIdx(null)
  }

  const pickSpeed = (rate) => {
    setSpeed(rate)
    if (status === 'playing' || status === 'paused') {
      const restartFrom = activeIdx ?? 0
      speak(restartFrom)
    }
  }

  if (!supported) {
    return (
      <div className="audio-view">
        <h3 className="result-heading">Ouvir o texto</h3>
        <p className="hint">
          Seu navegador não tem leitura em voz alta. Tente abrir em outro navegador para ouvir o
          conteúdo.
        </p>
      </div>
    )
  }

  return (
    <div className="audio-view">
      <h3 className="result-heading">Ouvir o texto</h3>
      <div className="player" role="group" aria-label="Leitor de áudio">
        <button
          type="button"
          className={`player-btn ${status === 'playing' ? 'player-btn-saying' : ''}`}
          aria-label={
            status === 'playing'
              ? 'Pausar a leitura'
              : status === 'paused'
                ? 'Continuar a leitura'
                : 'Ouvir o texto inteiro'
          }
          onClick={togglePlay}
        >
          <Icon name={status === 'playing' ? 'pause' : 'play'} size={30} />
        </button>
        <div className="player-copy">
          <p className="player-title">
            {status === 'playing'
              ? 'Lendo...'
              : status === 'paused'
                ? 'Pausado'
                : 'Pronto para ouvir'}
          </p>
          <p className="player-note">
            {status === 'playing' || status === 'paused'
              ? 'Você pode ler junto com o áudio. Toque num passo para ouvi-lo.'
              : 'O conteúdo inteiro é lido em voz alta, devagar. Escolha a velocidade:'}
          </p>
        </div>
        {status !== 'idle' ? (
          <button
            type="button"
            className="player-stop"
            aria-label="Parar a leitura"
            onClick={stop}
          >
            <Icon name="stop" size={20} />
          </button>
        ) : null}
      </div>

      <div className="speed-row" role="group" aria-label="Velocidade da leitura">
        <span className="speed-label">Velocidade:</span>
        {SPEEDS.map((s) => (
          <button
            key={s.rate}
            type="button"
            className={`speed-btn${speed === s.rate ? ' speed-on' : ''}`}
            aria-pressed={speed === s.rate}
            onClick={() => pickSpeed(s.rate)}
          >
            {s.label}
          </button>
        ))}
      </div>

      <ol className="step-list">
        {steps.map((step, idx) => {
          const words = wordsList[idx] || []
          const isActive = activeIdx === idx
          return (
            <li
              className={`step-row${isActive ? ' step-row-active' : ''}`}
              key={step.title}
            >
              <button
                type="button"
                className="step-play"
                aria-label={`Ouvir o passo ${idx + 1}: ${step.title}`}
                onClick={() => speak(idx)}
              >
                <Icon name={isActive && status === 'playing' ? 'pause' : 'play'} size={18} />
              </button>
              <div className="step-copy">
                <p className="step-title-sm">
                  {idx + 1}. {step.title}
                </p>
                <p className="reading-text" aria-live="polite">
                  {words.map((w, i) => (
                    <span
                      key={`${w.start}-${i}`}
                      className={`word${isActive && i === wordIdx ? ' word-hl' : ''}`}
                    >
                      {w.word}{' '}
                    </span>
                  ))}
                </p>
              </div>
            </li>
          )
        })}
      </ol>

      <p className="hint">
        Palavras diferentes? O{' '}
        <button type="button" className="link-btn" onClick={onOpenGlossary}>
          glossário
        </button>{' '}
        continua disponível para ajudar.
      </p>
    </div>
  )
}

function GlossaryView({ glossary, onOpenTerm }) {
  const entries = Object.entries(glossary)
  return (
    <div className="glossary-view">
      <h3 className="result-heading">Glossário</h3>
      {entries.length ? (
        <>
          <p className="section-sub">Toque numa palavra do texto para ver o significado aqui.</p>
          <ul className="gloss-list">
            {entries.map(([term, def]) => (
              <li className="gloss-item" key={term}>
                <button type="button" className="gloss-term" onClick={() => onOpenTerm(term)}>
                  {term}
                </button>
                <p className="gloss-def">{def}</p>
              </li>
            ))}
          </ul>
        </>
      ) : (
        <p className="hint">
          Nenhuma palavra difícil encontrada neste texto. Que bom, hein? Para testar, cole um
          texto com palavras mais técnicas.
        </p>
      )}
    </div>
  )
}

function QuizView({ questions }) {
  const [answers, setAnswers] = useState({})

  const choose = (qIndex, optIndex) => {
    setAnswers((prev) => ({ ...prev, [qIndex]: optIndex }))
  }

  const reset = (qIndex) => {
    setAnswers((prev) => {
      const next = { ...prev }
      delete next[qIndex]
      return next
    })
  }

  if (!questions.length) {
    return (
      <div className="quiz-view">
        <h3 className="result-heading">Questões adaptadas</h3>
        <p className="hint">
          Este texto ainda é pequeno demais para gerar questões. Cole um conteúdo maior no painel
          do professor.
        </p>
      </div>
    )
  }

  return (
    <div className="quiz-view">
      <h3 className="result-heading">Questões adaptadas</h3>
      <p className="section-sub">Uma pergunta de cada vez, com dica para ajudar.</p>
      {questions.map((question, qi) => {
        const picked = answers[qi]
        const correct = picked === question.correct
        const failed = picked !== undefined && !correct
        return (
          <div className="quiz" key={question.q}>
            <div className="quiz-top">
              <span className="quiz-num">{qi + 1}</span>
              <p className="quiz-q">{question.q}</p>
            </div>
            <div className="quiz-options">
              {question.options.map((opt, oi) => {
                const isPicked = picked === oi
                const state =
                  isPicked && oi === question.correct
                    ? 'right'
                    : isPicked && !correct
                      ? 'wrong'
                      : ''
                return (
                  <button
                    type="button"
                    key={`${opt}-${oi}`}
                    className={`option ${state}`}
                    disabled={correct}
                    aria-pressed={isPicked}
                    onClick={() => choose(qi, oi)}
                  >
                    <span className="option-letter">
                      {String.fromCharCode(65 + oi)}
                    </span>
                    <span className="option-text">{opt}</span>
                    {state === 'right' ? (
                      <span className="option-mark" aria-hidden="true">
                        <Icon name="check" size={18} />
                      </span>
                    ) : null}
                  </button>
                )
              })}
            </div>
            {correct ? (
              <p className="feedback feedback-ok">
                <Icon name="check" size={18} label="Correto" /> Muito bem! Você acertou.
              </p>
            ) : failed ? (
              <p className="feedback feedback-warn">
                <Icon name="heart" size={18} label="Tente de novo" /> Quase! Tente de novo.{' '}
                <span className="quiz-tip">{question.tip}</span>
              </p>
            ) : null}
            {picked !== undefined ? (
              <button type="button" className="btn btn-ghost btn-small" onClick={() => reset(qi)}>
                Começar essa de novo
              </button>
            ) : null}
          </div>
        )
      })}
    </div>
  )
}

export default function StudentView({ options, data, onBack, onHome }) {
  const content = useMemo(() => data || adapted, [data])
  const tabs = useMemo(() => TABS.filter((t) => options[t.key]), [options])
  const [activeTab, setActiveTab] = useState(tabs[0] ? tabs[0].key : 'simple')
  const [activeTerm, setActiveTerm] = useState(null)

  const resolvedTab = tabs.some((t) => t.key === activeTab)
    ? activeTab
    : tabs.length
      ? tabs[0].key
      : 'simple'

  const openTerm = (term) => {
    setActiveTerm(term)
  }

  const activeGlossaryTerm =
    activeTerm && content.glossary[activeTerm] ? activeTerm : null

  const onTabsKey = (event) => {
    const keys = ['ArrowRight', 'ArrowLeft', 'Home', 'End']
    if (!keys.includes(event.key)) return
    event.preventDefault()
    const index = tabs.findIndex((t) => t.key === resolvedTab)
    let next
    if (event.key === 'ArrowRight') next = (index + 1) % tabs.length
    else if (event.key === 'ArrowLeft') next = (index - 1 + tabs.length) % tabs.length
    else if (event.key === 'Home') next = 0
    else next = tabs.length - 1
    const key = tabs[next].key
    setActiveTab(key)
    const button = document.getElementById(`tab-${key}`)
    if (button) button.focus()
  }

  return (
    <div className="result">
      <div className="result-head">
        <p className="panel-eyebrow">
          <Icon name="sparkles" size={18} label="Resultado" />
          {data ? 'Versões geradas!' : 'Exemplo pronto'}
        </p>
        <h1 className="panel-title">Visualização do aluno</h1>
        <p className="panel-sub">
          {data
            ? 'Este é o material do jeito que o aluno vai receber.'
            : 'Este é um exemplo do resultado que o professor recebe.'}
        </p>
      </div>

      <div className="result-card">
        <div
          className="tabs"
          role="tablist"
          aria-label="Formatos da versão adaptada"
          onKeyDown={onTabsKey}
        >
          {tabs.map((tab) => (
            <button
              key={tab.key}
              type="button"
              role="tab"
              id={`tab-${tab.key}`}
              tabIndex={resolvedTab === tab.key ? 0 : -1}
              aria-selected={resolvedTab === tab.key}
              aria-controls={`panel-${tab.key}`}
              className={`tab${resolvedTab === tab.key ? ' tab-active' : ''}`}
              onClick={() => setActiveTab(tab.key)}
            >
              <Icon name={tab.icon} size={19} aria-hidden="true" />
              <span>{tab.label}</span>
            </button>
          ))}
        </div>

        <div className="result-body" role="tabpanel" id={`panel-${resolvedTab}`} tabIndex={0}>
          {resolvedTab === 'simple' ? (
            <SimpleText data={content} onTerm={openTerm} />
          ) : resolvedTab === 'visual' ? (
            <VisualView data={content} />
          ) : resolvedTab === 'audio' ? (
            <AudioView
              steps={content.audioSteps || []}
              onOpenGlossary={() => setActiveTab('glossary')}
            />
          ) : resolvedTab === 'glossary' ? (
            <GlossaryView glossary={content.glossary} onOpenTerm={openTerm} />
          ) : (
            <QuizView questions={content.questions || []} />
          )}
        </div>
      </div>

      <div className="result-actions">
        <button type="button" className="btn btn-primary" onClick={onBack}>
          <Icon name="clipboard" size={20} label="Painel" /> Colar outro conteúdo
        </button>
        <button type="button" className="btn btn-ghost" onClick={onHome}>
          Voltar ao início
        </button>
      </div>

      {activeGlossaryTerm ? (
        <div
          className="sheet-backdrop"
          onClick={() => setActiveTerm(null)}
          aria-hidden="true"
        />
      ) : null}
      <div
        className={`sheet${activeGlossaryTerm ? ' sheet-open' : ''}`}
        role="dialog"
        aria-modal="true"
        aria-label={`Significado de ${activeGlossaryTerm || 'palavra'}`}
        aria-hidden={activeGlossaryTerm ? undefined : 'true'}
      >
        {activeGlossaryTerm ? (
          <div className="sheet-card">
            <div className="sheet-head">
              <span className="sheet-icon" aria-hidden="true">
                <Icon name="glossary" size={22} />
              </span>
              <h3 className="sheet-term">{activeGlossaryTerm}</h3>
              <button
                type="button"
                className="sheet-close"
                aria-label="Fechar significado"
                onClick={() => setActiveTerm(null)}
              >
                <Icon name="close" size={20} />
              </button>
            </div>
            <p className="sheet-meaning">{content.glossary[activeGlossaryTerm]}</p>
          </div>
        ) : null}
      </div>
    </div>
  )
}