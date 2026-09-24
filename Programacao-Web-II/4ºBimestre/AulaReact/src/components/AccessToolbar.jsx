import { useEffect, useState } from 'react'
import Icon from './Icon'

const STORAGE_KEY = 'entendeai:acess'
const FONT_MIN = 0.85
const FONT_MAX = 1.4
const FONT_STEP = 0.1

function loadSettings() {
  try {
    const raw = localStorage.getItem(STORAGE_KEY)
    if (raw) return JSON.parse(raw)
  } catch {
    /* ignore */
  }
  return { scale: 1, contrast: false, dyslexia: false }
}

function applyToDocument({ scale, contrast, dyslexia }) {
  const root = document.documentElement
  root.style.setProperty('--font-scale', String(scale))
  root.dataset.contrast = contrast ? 'high' : 'default'
  root.dataset.dyslexia = dyslexia ? 'on' : 'off'
}

export default function AccessToolbar() {
  const [settings, setSettings] = useState(loadSettings)

  useEffect(() => {
    applyToDocument(settings)
  }, [settings])

  const update = (patch) => {
    const next = { ...settings, ...patch }
    setSettings(next)
    try {
      localStorage.setItem(STORAGE_KEY, JSON.stringify(next))
    } catch {
      /* ignore */
    }
  }

  const bump = (delta) => {
    const scale = Math.min(
      FONT_MAX,
      Math.max(FONT_MIN, Math.round((settings.scale + delta) * 100) / 100),
    )
    update({ scale })
  }

  return (
    <div className="access" role="group" aria-label="Ajustes de acessibilidade">
      <div className="access-group access-font" role="group" aria-label="Tamanho da fonte">
        <button
          type="button"
          className="access-btn"
          onClick={() => bump(-FONT_STEP)}
          aria-label="Diminuir o tamanho da fonte"
          title="Diminuir a fonte"
          disabled={settings.scale <= FONT_MIN}
        >
          A−
        </button>
        <button
          type="button"
          className="access-btn"
          onClick={() => bump(FONT_STEP)}
          aria-label="Aumentar o tamanho da fonte"
          title="Aumentar a fonte"
          disabled={settings.scale >= FONT_MAX}
        >
          A+
        </button>
      </div>
      <button
        type="button"
        className={`access-btn${settings.contrast ? ' access-on' : ''}`}
        aria-pressed={settings.contrast}
        onClick={() => update({ contrast: !settings.contrast })}
        title="Alto contraste: fundo escuro e letras claras"
      >
        <Icon name="contrast" size={18} label="Alto contraste" />
        <span className="access-label">Contraste</span>
      </button>
      <button
        type="button"
        className={`access-btn${settings.dyslexia ? ' access-on' : ''}`}
        aria-pressed={settings.dyslexia}
        onClick={() => update({ dyslexia: !settings.dyslexia })}
        title="Leitura fácil: texto mais espaçado e lento"
      >
        <Icon name="type" size={18} label="Leitura fácil" />
        <span className="access-label">Leitura fácil</span>
      </button>
    </div>
  )
}