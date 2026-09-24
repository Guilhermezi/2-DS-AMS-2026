const PATHS = {
  logo: (
    <>
      <path d="M21 11.5a8.4 8.4 0 0 1-9 8.4 8.6 8.6 0 0 1-5-1.6L3 19l.7-3.9A8.4 8.4 0 1 1 21 11.5z" />
      <path d="M8.5 11.5h0M12 11.5h0M15.5 11.5h0" />
    </>
  ),
  book: (
    <>
      <path d="M4 5a2 2 0 0 1 2-2h14v16H6a2 2 0 0 0-2 2V5z" />
      <path d="M4 19a2 2 0 0 1 2-2h14" />
    </>
  ),
  picture: (
    <>
      <rect x="3" y="5" width="18" height="14" rx="2" />
      <circle cx="8.5" cy="10" r="1.5" />
      <path d="M21 15l-5-5-6 6" />
      <path d="M14 15l-2.5-2.5L8 16" />
    </>
  ),
  speaker: (
    <path d="M5 9v6h4l5 4V5L9 9H5zm11 0a4 4 0 0 1 0 6m2.5-9.5a7.5 7.5 0 0 1 0 13" />
  ),
  glossary: (
    <>
      <path d="M9 18h6M10 21h4" />
      <path d="M12 3a6 6 0 0 1 4 10.5c-.7.7-1 1.2-1 2.5h-6c0-1.3-.3-1.8-1-2.5A6 6 0 0 1 12 3z" />
    </>
  ),
  questions: (
    <>
      <circle cx="12" cy="12" r="9" />
      <path d="M8.5 12l2.5 2.5 4.5-4.5" />
    </>
  ),
  clipboard: (
    <>
      <path d="M8 4H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-2" />
      <rect x="9" y="2" width="6" height="4" rx="1" />
    </>
  ),
  sliders: (
    <>
      <path d="M4 9h10M18 9h2M4 15h3M11 15h9" />
      <circle cx="16" cy="9" r="1.6" />
      <circle cx="7" cy="15" r="1.6" />
    </>
  ),
  share: (
    <>
      <circle cx="5" cy="12" r="2" />
      <circle cx="19" cy="7" r="2" />
      <circle cx="19" cy="17" r="2" />
      <path d="M6.6 10.7l9.8-4.6M6.6 13.3l9.8 4.6" />
    </>
  ),
  sun: (
    <>
      <circle cx="12" cy="12" r="4" />
      <path d="M12 2.5v3M12 18.5v3M2.5 12h3M18.5 12h3M5.3 5.3l2.1 2.1M16.6 16.6l2.1 2.1M18.7 5.3l-2.1 2.1M7.4 16.6l-2.1 2.1" />
    </>
  ),
  cloud: <path d="M7 17.5h10a3.5 3.5 0 0 0 0-7 5 5 0 0 0-9.2-2.3A4 4 0 0 0 7 17.5z" />,
  rain: (
    <>
      <path d="M7 13.5h10a3.5 3.5 0 0 0 0-7 5 5 0 0 0-9.2-2.3A4 4 0 0 0 7 13.5z" />
      <path d="M9 17v3M15 17v3M6.5 20.5v2M17.5 20.5v2" />
    </>
  ),
  drop: <path d="M12 3s5 5.6 5 9.6a5 5 0 0 1-10 0C7 8.6 12 3 12 3z" />,
  play: <path d="M8 5v14l11-7z" />,
  pause: (
    <>
      <path d="M9 4v16M15 4v16" />
    </>
  ),
  stop: <rect x="7" y="7" width="10" height="10" rx="1.5" />,
  close: (
    <>
      <path d="M6 6l12 12M18 6L6 18" />
    </>
  ),
  arrow: <path d="M4 12h15M13 6l6 6-6 6" />,
  check: <path d="M5 13l4 4L19 7" />,
  sparkles: (
    <>
      <path d="M12 3l1.9 4.9 4.9 1.9-4.9 1.9L12 16.6l-1.9-4.9L5.2 9.8l4.9-1.9L12 3z" />
      <path d="M19 15l.8 2 2 .8-2 .8-.8 2-.8-2-2-.8 2-.8.8-2z" />
    </>
  ),
  heart: (
    <path d="M12 20s-7-4.5-9-9.3A5 5 0 0 1 12 7.6 5 5 0 0 1 21 10.7C19 15.5 12 20 12 20z" />
  ),
  leaf: (
    <>
      <path d="M5 20c-1-8 4-15 15-16-1 11-8 16-15 16z" />
      <path d="M5 20C8 12 12 8 17 5" />
    </>
  ),
  clock: (
    <>
      <circle cx="12" cy="12" r="8.5" />
      <path d="M12 7v5l3.2 2" />
    </>
  ),
  type: <path d="M6 19l6-14 6 14M8.4 14h7.2" />,
  contrast: (
    <>
      <circle cx="12" cy="12" r="9" />
      <path d="M12 3a9 9 0 0 1 0 18V3z" />
    </>
  ),
}

export default function Icon({ name, size = 26, label = null, ...rest }) {
  return (
    <svg
      width={size}
      height={size}
      viewBox="0 0 24 24"
      fill="none"
      stroke="currentColor"
      strokeWidth="1.8"
      strokeLinecap="round"
      strokeLinejoin="round"
      aria-hidden={label ? undefined : 'true'}
      role={label ? 'img' : undefined}
      focusable="false"
      {...rest}
    >
      {label ? <title>{label}</title> : null}
      {PATHS[name] || null}
    </svg>
  )
}