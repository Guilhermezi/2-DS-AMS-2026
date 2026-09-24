import { useState } from 'react'
import Icon from '../components/Icon'

const OPTION_LIST = [
  { key: 'simple', icon: 'book', label: 'Texto simples', desc: 'Frases curtas e fáceis' },
  { key: 'visual', icon: 'picture', label: 'Ícones / Visual', desc: 'Resumo com pictogramas' },
  { key: 'audio', icon: 'speaker', label: 'Áudio', desc: 'Ouvir o conteúdo' },
  { key: 'glossary', icon: 'glossary', label: 'Glossário', desc: 'Significado das palavras' },
  { key: 'questions', icon: 'questions', label: 'Questões', desc: 'Perguntas adaptadas' },
]

export default function TeacherPanel({ sourceText, setSourceText, options, setOptions, onGenerate }) {
  const [dirty, setDirty] = useState(false)
  const hasText = sourceText.trim().length > 0
  const hasOption = Object.values(options).some(Boolean)

  const toggleOption = (key) => {
    setOptions((prev) => ({ ...prev, [key]: !prev[key] }))
  }

  const fillExample = () => {
    setSourceText('Evaporação, condensação, precipitação e infiltração são as quatro etapas do ciclo da água. A água dos rios evapora com o calor do sol, o vapor sobe, esfria e forma nuvens. Depois, as nuvens soltam a água como chuva, que penetra no solo e forma os lençóis freáticos.')
    setDirty(true)
  }

  return (
    <div className="panel">
      <p className="panel-eyebrow">
        <Icon name="clipboard" size={18} label="Painel do professor" /> Painel do professor
      </p>
      <h1 className="panel-title">Criar versões adaptadas</h1>
      <p className="panel-sub">
        Cole o texto da aula ou da prova abaixo. Depois escolha quais versões quer gerar.
      </p>

      <section className="panel-card" aria-labelledby="colar-label">
        <label className="label" htmlFor="source-text" id="colar-label">
          Conteúdo da aula ou prova
        </label>
        <div className="source-wrap">
          <textarea
            id="source-text"
            className="source-area"
            rows={9}
            value={sourceText}
            placeholder={'Cole aqui o texto da sua aula ou prova...'}
            onChange={(e) => {
              setSourceText(e.target.value)
              setDirty(true)
            }}
          />
          {!dirty ? (
            <button type="button" className="source-example" onClick={fillExample}>
              <Icon name="sparkles" size={16} /> Preencher com um exemplo
            </button>
          ) : null}
        </div>
        <p className="hint">
          Você pode apagar tudo e colar o seu próprio conteúdo.{' '}
          <output className="count" htmlFor="source-text">
            {sourceText.length} caracteres
          </output>
        </p>
      </section>

      <section className="panel-card">
        <p className="label" id="opcoes-label">
          O que gerar?
        </p>
        <div className="chips" role="group" aria-labelledby="opcoes-label">
          {OPTION_LIST.map((opt) => {
            const on = Boolean(options[opt.key])
            return (
              <button
                key={opt.key}
                type="button"
                className={`chip${on ? ' chip-on' : ''}`}
                aria-pressed={on}
                onClick={() => toggleOption(opt.key)}
              >
                <span className="chip-icon" aria-hidden="true">
                  <Icon name={opt.icon} size={24} />
                </span>
                <span className="chip-copy">
                  <span className="chip-title">{opt.label}</span>
                  <span className="chip-desc">{opt.desc}</span>
                </span>
                <span className="chip-check" aria-hidden="true">
                  <Icon name="check" size={16} />
                </span>
              </button>
            )
          })}
        </div>
      </section>

      <div className="generate-row">
        <button
          type="button"
          className="btn btn-primary btn-large"
          disabled={!hasText || !hasOption}
          onClick={onGenerate}
        >
          <Icon name="sparkles" size={22} label="Gerar" /> Gerar versões adaptadas
          <Icon name="arrow" size={20} />
        </button>
        <p className="hint">
          {!hasText
            ? 'Cole um texto antes de gerar.'
            : !hasOption
              ? 'Escolha pelo menos uma versão.'
              : 'Pronto para gerar! Você verá o resultado como o aluno vê.'}
        </p>
      </div>
    </div>
  )
}