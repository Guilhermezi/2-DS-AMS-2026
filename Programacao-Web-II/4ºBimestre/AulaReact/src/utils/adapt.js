import { STOPWORDS, SCIENCE_TERMS, isNumberWord, normalizeWord } from '../data/words'

export const ICON_POOL = ['sun', 'cloud', 'rain', 'drop', 'leaf', 'book', 'heart']

const ICON_RULES = [
  [['sol', 'calor', 'quente', 'esquent', 'luz', 'evapora'], 'sun'],
  [['nuvem', 'vapor', 'ceu', 'céu', 'condens'], 'cloud'],
  [['chuva', 'precipita', 'neve', 'graniz', 'gota'], 'rain'],
  [['agua', 'água', 'rio', 'mar', 'lago', 'infiltra', 'liquido', 'oceano'], 'drop'],
  [['planta', 'folha', 'arvore', 'flor', 'raiz', 'vegetal', 'fotossintese', 'semente', 'ecossistema'], 'leaf'],
]

function sentences(text) {
  const spaced = text.replace(/\n/g, ' ').replace(/\s+/g, ' ').trim()
  const parts = spaced.split(/(?<=[.!?])\s+/)
  return parts
    .map((p) => p.trim())
    .filter(Boolean)
    .map((p) => (p[p.length - 1] && '.!?'.includes(p[p.length - 1]) ? p : `${p}.`))
}

function chunksFrom(sentencesList, groupSize = 2) {
  const out = []
  for (let i = 0; i < sentencesList.length; i += groupSize) {
    const group = sentencesList.slice(i, i + groupSize)
    const number = out.length + 1
    const text = group.join(' ')
    out.push({
      number,
      title: `Passo ${number}`,
      sentences: group,
      text,
      icon: pickIcon(text, number),
    })
  }
  return out
}

function pickIcon(text, index) {
  const lower = normalizeWord(text)
  for (const [keys, icon] of ICON_RULES) {
    if (keys.some((k) => lower.includes(k))) return icon
  }
  return ICON_POOL[index % ICON_POOL.length]
}

function tokensOf(text) {
  return text.split(/[^a-zA-ZÀ-úç\s]/).join(' ').split(/\s+/).filter(Boolean)
}

function detectTerms(sentencesList) {
  const seen = new Map()
  for (const sentence of sentencesList) {
    for (const raw of tokensOf(sentence)) {
      const norm = normalizeWord(raw)
      if (!norm || STOPWORDS.has(norm) || isNumberWord(norm)) continue
      const isScientific = SCIENCE_TERMS[norm] !== undefined
      if (isScientific || norm.length >= 8) {
        const key = raw.toLowerCase()
        if (!seen.has(key)) seen.set(key, { norm, origKey: key, count: 1 })
        else seen.get(key).count += 1
      }
    }
  }
  return [...seen.values()]
}

function genericDef(word, count) {
  const times = count && count > 1 ? ` (aparece ${count} vezes na aula)` : ''
  return `É uma palavra do conteúdo${times}. Releia a frase onde ela aparece e note como é usada.`
}

function buildGlossary(terms) {
  const glossary = {}
  for (const { norm, origKey, count } of terms) {
    glossary[origKey] = SCIENCE_TERMS[norm]
      ? SCIENCE_TERMS[norm].def
      : genericDef(origKey, count)
  }
  return glossary
}

function wrapChips(text, terms) {
  const sorted = [...terms].sort((a, b) => b.norm.length - a.norm.length)
  const regex = new RegExp(
    `(?<![\\p{L}])(${sorted.map((t) => escapeRe(t.norm)).join('|')})(?![\\p{L}])`,
    'giu',
  )
  return text.replace(regex, (match) => `[${match}]`)
}

function escapeRe(s) {
  return s.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')
}

const ACCENTS = {
  a: 'aàáâãäAÀÁÂÃÄ',
  e: 'eèéêëEÈÉÊË',
  i: 'iìíîïIÌÍÎÏ',
  o: 'oòóôõöOÒÓÔÕÖ',
  u: 'uùúûüUÙÚÛÜ',
  c: 'cçCÇ',
}

function accentInsensitive(word) {
  return word
    .split('')
    .map((ch) => (ACCENTS[ch] ? `[${ACCENTS[ch]}]` : ch))
    .join('')
}

function replaceFirstWord(sentence, normalizedWord) {
  const pattern = accentInsensitive(normalizedWord)
  const re = new RegExp(`(?<![\\p{L}])${pattern}(?![\\p{L}])`, 'i')
  return sentence.replace(re, '____')
}

function shuffle(list) {
  const arr = [...list]
  for (let i = arr.length - 1; i > 0; i -= 1) {
    const j = Math.floor(Math.random() * (i + 1))
    ;[arr[i], arr[j]] = [arr[j], arr[i]]
  }
  return arr
}

function buildQuestions(chunks, glossary) {
  const keys = Object.keys(glossary)
  const questions = []
  for (const chunk of chunks.slice(0, 4)) {
    const sentence = chunk.sentences[0]
    const norm = normalizeWord(sentence)
    let answer = null
    for (const key of keys.sort((a, b) => b.length - a.length)) {
      if (norm.includes(normalizeWord(key))) {
        answer = key
        break
      }
    }
    if (!answer) {
      const candidates = tokensOf(sentence)
        .map((w) => ({ w, n: normalizeWord(w) }))
        .filter((c) => c.n.length >= 6 && !STOPWORDS.has(c.n) && !SCIENCE_TERMS[c.n])
        .sort((a, b) => b.n.length - a.n.length)
      if (candidates.length) answer = candidates[0].w.toLowerCase()
    }
    if (!answer) continue

    const distractors = shuffle(keys.filter((k) => k !== answer)).slice(0, 2)
    if (distractors.length < 2) continue

    const blankQ = replaceFirstWord(sentence, normalizeWord(answer))
    const options = shuffle([answer, ...distractors])
    questions.push({
      q: `Complete a frase: “${blankQ}”`,
      options,
      correct: options.indexOf(answer),
      tip: `Dica: releia o passo ${chunk.number} deste texto com calma.`,
    })
  }
  return questions
}

export function adaptSource(raw) {
  const text = String(raw || '').replace(/\s+/g, ' ').trim()
  if (!text) return null

  const sentenceList = sentences(text)
  const chunks = chunksFrom(sentenceList)
  const terms = detectTerms(sentenceList)
  const glossary = buildGlossary(terms)
  const termList = terms.map((t) => ({
    norm: t.norm,
    origKey: t.origKey,
  }))

  const simple = chunks.map((c) => ({
    icon: c.icon,
    title: c.title,
    text: wrapChips(c.text, termList),
  }))
  const audioSteps = chunks.map((c) => ({ title: c.title, text: c.text }))
  const questions = buildQuestions(chunks, glossary)

  const title =
    tokensOf(sentenceList[0] || text)
      .slice(0, 4)
      .join(' ')
      .replace(/^./, (c) => c.toUpperCase()) || 'Conteúdo da aula'

  return { title, simple, glossary, audioSteps, questions }
}

export function stripChips(text) {
  return String(text || '').replace(/\[([^\]]+)\]/g, '$1')
}