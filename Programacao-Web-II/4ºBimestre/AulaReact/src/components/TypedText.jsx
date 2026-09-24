import { useEffect, useRef } from 'react'
import Typed from 'typed.js'

export default function TypedText({ strings = [], staticText = '' }) {
  const elRef = useRef(null)

  useEffect(() => {
    const prefersReduced = window.matchMedia(
      '(prefers-reduced-motion: reduce)',
    ).matches
    if (prefersReduced || !strings.length) return undefined

    const typed = new Typed(elRef.current, {
      strings,
      typeSpeed: 42,
      backSpeed: 26,
      backDelay: 1800,
      startDelay: 600,
      smartBackspace: true,
      loop: true,
      showCursor: false,
    })
    return () => typed.destroy()
  }, [strings])

  return (
    <span className="typed" aria-hidden="true">
      <span ref={elRef} />{staticText || ' '}
    </span>
  )
}