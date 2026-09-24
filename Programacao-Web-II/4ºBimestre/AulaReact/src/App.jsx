import { useEffect, useState } from 'react'
import Lenis from 'lenis'
import Header from './components/Header'
import Footer from './components/Footer'
import Home from './pages/Home'
import TeacherPanel from './pages/TeacherPanel'
import StudentView from './pages/StudentView'
import { defaultOptions, sampleSource } from './data/sample'
import { adaptSource } from './utils/adapt'
import './App.css'

function App() {
  const [page, setPage] = useState('home')
  const [sourceText, setSourceText] = useState(sampleSource)
  const [options, setOptions] = useState(defaultOptions)
  const [fresh, setFresh] = useState(false)
  const [result, setResult] = useState(null)
  const [announce, setAnnounce] = useState('')

  const go = (next) => {
    setFresh(false)
    setPage(next)
  }

  const handleGenerate = () => {
    setResult(adaptSource(sourceText))
    setFresh(true)
    setAnnounce('Versões adaptadas geradas. Abrindo a visualização do aluno.')
    setPage('student')
  }

  const handleStart = () => {
    setFresh(false)
    setAnnounce('')
    setPage('teacher')
  }

  useEffect(() => {
    const prefersReduced = window.matchMedia(
      '(prefers-reduced-motion: reduce)',
    ).matches
    if (prefersReduced) return undefined
    const lenis = new Lenis({
      lerp: 0.09,
      smoothWheel: true,
    })
    let frame = 0
    const raf = (time) => {
      lenis.raf(time)
      frame = requestAnimationFrame(raf)
    }
    frame = requestAnimationFrame(raf)
    return () => {
      cancelAnimationFrame(frame)
      lenis.destroy()
    }
  }, [])

  return (
    <>
      <a className="skip-link" href="#main">
        Pular para o conteúdo
      </a>
      <Header page={page} onNavigate={go} />
      <main id="main">
        {page === 'home' ? (
          <Home
            onStart={handleStart}
            onSeeExample={() => {
              setFresh(false)
              setPage('student')
            }}
          />
        ) : page === 'teacher' ? (
          <TeacherPanel
            sourceText={sourceText}
            setSourceText={setSourceText}
            options={options}
            setOptions={setOptions}
            onGenerate={handleGenerate}
          />
        ) : (
          <StudentView
            options={options}
            data={fresh && result ? result : null}
            onBack={() => setPage('teacher')}
            onHome={() => go('home')}
          />
        )}
      </main>
      <div className="sr-live" role="status" aria-live="polite">
        {announce}
      </div>
      <Footer />
    </>
  )
}

export default App