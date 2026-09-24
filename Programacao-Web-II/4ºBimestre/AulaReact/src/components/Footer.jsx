import Icon from './Icon'

export default function Footer() {
  return (
    <footer className="footer">
      <div className="footer-inner">
        <div className="footer-brand">
          <span className="brand-mark">
            <Icon name="logo" size={22} />
          </span>
          <span className="footer-name">Entende Aí</span>
        </div>
        <p className="footer-phrase">
          &ldquo;O aluno não se adapta à prova &mdash; a prova se adapta ao aluno.&rdquo;
        </p>
        <p className="footer-note">
          Plataforma educacional de demonstração. Feita com acessibilidade em primeiro lugar:
          fonte grande, alto contraste e nada de efeitos piscantes.
        </p>
      </div>
    </footer>
  )
}