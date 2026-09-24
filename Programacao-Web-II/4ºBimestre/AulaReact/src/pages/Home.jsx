import { useMemo } from 'react'
import { Lottie } from 'lottie-react'
import { Swiper, SwiperSlide } from 'swiper/react'
import { Navigation, Pagination, A11y, Keyboard } from 'swiper/modules'
import 'swiper/css'
import 'swiper/css/pagination'
import 'swiper/css/navigation'
import Icon from '../components/Icon'
import TypedText from '../components/TypedText'
import { DROPLET_LOTTIE } from '../assets/droplet'

const STEPS = [
  {
    icon: 'clipboard',
    title: 'Cole o conteúdo',
    text: 'O professor cola o texto da aula ou da prova. Pode ser de qualquer matéria.',
  },
  {
    icon: 'sliders',
    title: 'Escolha as versões',
    text: 'Linguagem simples, resumo com ícones, áudio, glossário e questões adaptadas.',
  },
  {
    icon: 'share',
    title: 'Compartilhe com o aluno',
    text: 'O aluno recebe o material do jeito que ele entende melhor. Tudo em um clique.',
  },
]

const BENEFITS = [
  {
    icon: 'book',
    title: 'Linguagem simples',
    text: 'Frases curtas e diretas, sem rodeios. Uma informação de cada vez.',
  },
  {
    icon: 'picture',
    title: 'Resumo visual',
    text: 'Ícones e pictogramas simples ajudam a organizar as ideias.',
  },
  {
    icon: 'speaker',
    title: 'Áudio',
    text: 'O aluno pode ouvir o texto, lendo junto com calma.',
  },
  {
    icon: 'glossary',
    title: 'Glossário na hora',
    text: 'Palavras difíceis podem ser clicadas para ver o significado.',
  },
  {
    icon: 'questions',
    title: 'Questões adaptadas',
    text: 'Perguntas claras, com dicas e sem pegadinhas de linguagem.',
  },
]

const INCLUSION = [
  { icon: 'type', text: 'Fonte grande, clara e espaçada' },
  { icon: 'contrast', text: 'Alto contraste sem cansar a vista' },
  { icon: 'leaf', text: 'Cores calmas: nada de roxo ou vermelho agressivo' },
  { icon: 'clock', text: 'Sem pressa: o aluno marca o próprio ritmo' },
]

const TYPED_WORDS = ['linguagem simples', 'áudio', 'um glossário', 'questões mais claras']

export default function Home({ onStart, onSeeExample }) {
  const reducedMotion = useMemo(
    () => window.matchMedia('(prefers-reduced-motion: reduce)').matches,
    [],
  )

  return (
    <div className="home">
      <section className="hero">
        <div className="hero-media" aria-hidden="true">
          <Lottie
            animationData={DROPLET_LOTTIE}
            autoplay={!reducedMotion}
            loop={!reducedMotion}
            style={{ width: 108, height: 108 }}
          />
        </div>
        <div className="hero-inner">
          <p className="hero-eyebrow">
            <Icon name="heart" size={18} label="Inclusão" /> Criado para alunos autistas e
            disléxicos
          </p>
          <h1 className="hero-title">Entende Aí</h1>
          <p className="hero-sub">
            Cole uma aula ou uma prova e receba versões adaptadas: linguagem simples, resumo
            visual, áudio, glossário e questões mais claras.
          </p>
          <p className="typed-line" aria-hidden="true">
            <span className="typed-tag">Cada aluno recebe:</span>
            <TypedText strings={TYPED_WORDS} />
          </p>

          <blockquote className="phrase">
            <span className="phrase-quote">&ldquo;</span>
            <span className="phrase-text">
              O aluno não se adapta à prova &mdash; a prova se adapta ao aluno.
            </span>
            <span className="phrase-quote">&rdquo;</span>
          </blockquote>

          <div className="hero-actions">
            <button type="button" className="btn btn-primary" onClick={onStart}>
              <Icon name="sparkles" size={22} label="Gerar" /> Testar agora
              <Icon name="arrow" size={20} />
            </button>
            <button type="button" className="btn btn-ghost" onClick={onSeeExample}>
              Ver um exemplo pronto
            </button>
          </div>
        </div>
      </section>

      <section className="section" id="como-funciona">
        <h2 className="section-title">Como funciona</h2>
        <p className="section-sub">Três passos simples, sem complicação.</p>
        <div className="steps-carousel" aria-label="Como funciona, em três passos">
          <Swiper
            modules={[Navigation, Pagination, A11y, Keyboard]}
            spaceBetween={20}
            slidesPerView={1}
            breakpoints={{
              620: { slidesPerView: 2 },
              960: { slidesPerView: 3 },
            }}
            speed={reducedMotion ? 0 : 420}
            keyboard={{ enabled: true }}
            navigation
            pagination={{ clickable: true, dynamicBullets: false }}
            a11y={{ enabled: true, containerRole: 'region' }}
          >
            {STEPS.map((step, i) => (
              <SwiperSlide key={step.title}>
                <article className="step">
                  <div className="step-top">
                    <span className="step-num">{i + 1}</span>
                    <span className="step-icon" aria-hidden="true">
                      <Icon name={step.icon} size={28} />
                    </span>
                  </div>
                  <h3 className="step-title">{step.title}</h3>
                  <p className="step-text">{step.text}</p>
                </article>
              </SwiperSlide>
            ))}
          </Swiper>
        </div>
      </section>

      <section className="section section-soft">
        <h2 className="section-title">O que você ganha</h2>
        <p className="section-sub">
          O mesmo conteúdo, apresentado do jeito que cada aluno entende melhor.
        </p>
        <div className="benefits">
          {BENEFITS.map((b) => (
            <article className="benefit" key={b.title}>
              <span className="benefit-icon" aria-hidden="true">
                <Icon name={b.icon} size={30} />
              </span>
              <h3 className="benefit-title">{b.title}</h3>
              <p className="benefit-text">{b.text}</p>
            </article>
          ))}
        </div>
      </section>

      <section className="section inclusion">
        <h2 className="section-title">Pensado para a inclusão</h2>
        <div className="inclusion-card">
          <p className="inclusion-intro">
            Todo o design deste site segue regras simples para quem sente o mundo com mais
            intensidade:
          </p>
          <ul className="inclusion-list">
            {INCLUSION.map((item) => (
              <li className="inclusion-item" key={item.text}>
                <span className="inclusion-icon" aria-hidden="true">
                  <Icon name={item.icon} size={24} />
                </span>
                {item.text}
              </li>
            ))}
          </ul>
        </div>
      </section>
    </div>
  )
}