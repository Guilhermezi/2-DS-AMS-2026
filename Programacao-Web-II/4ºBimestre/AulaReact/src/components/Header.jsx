import Icon from './Icon'
import AccessToolbar from './AccessToolbar'

const NAV = [
  { key: 'home', label: 'Início' },
  { key: 'teacher', label: 'Para o professor' },
  { key: 'student', label: 'Ver resultado' },
]

export default function Header({ page, onNavigate }) {
  return (
    <header className="header">
      <div className="header-inner">
        <button
          type="button"
          className="brand"
          onClick={() => onNavigate('home')}
          aria-label="Entende Aí — página inicial"
        >
          <span className="brand-mark">
            <Icon name="logo" size={26} />
          </span>
          <span className="brand-name">Entende Aí</span>
        </button>

        <AccessToolbar />

        <nav className="nav" aria-label="Navegação principal">
          {NAV.map((item) => (
            <button
              key={item.key}
              type="button"
              className={`nav-btn${page === item.key ? ' active' : ''}`}
              aria-current={page === item.key ? 'page' : undefined}
              onClick={() => onNavigate(item.key)}
            >
              {item.label}
            </button>
          ))}
        </nav>
      </div>
    </header>
  )
}