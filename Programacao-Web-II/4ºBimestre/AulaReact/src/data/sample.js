export const defaultOptions = {
  simple: true,
  visual: true,
  audio: true,
  glossary: true,
  questions: true,
}

export const sampleSource = `PROVA BIMESTRAL DE CIÊNCIAS

O CICLO DA ÁGUA

A evaporação é o processo pelo qual a água dos rios, lagos e oceanos se transforma em vapor e sobe para a atmosfera. A condensação acontece quando o vapor de água esfria nas camadas altas do céu e se transforma em gotículas que formam as nuvens. A precipitação ocorre quando essas gotículas ficam pesadas e caem na forma de chuva, neve ou granizo. A infiltração é quando a água penetra no solo, abastecendo os lençóis freáticos e os aquíferos.`

export const adapted = {
  simpleTitle: 'O ciclo da água',
  simple: [
    {
      icon: 'sun',
      title: 'A água sobe',
      text: 'O sol esquenta a água do rio, do mar e do lago. A água quentinha vira [vapor] e sobe para o céu. Isso se chama [evaporação].',
    },
    {
      icon: 'cloud',
      title: 'As nuvens nascem',
      text: 'Lá no alto, o ar é mais frio. O [vapor] esfria e vira gotinhas bem pequenas. As gotinhas juntas formam as [nuvens]. Isso se chama [condensação].',
    },
    {
      icon: 'rain',
      title: 'A água cai',
      text: 'As gotinhas ficam pesadas e caem do céu como [chuva], neve ou granizo. Isso se chama [precipitação].',
    },
    {
      icon: 'drop',
      title: 'A água entra na terra',
      text: 'A água da [chuva] entra na terra e fica guardada lá embaixo. Isso se chama [infiltração].',
    },
  ],
  audioSteps: [
    {
      title: 'A água sobe',
      text: 'O sol esquenta a água do rio, do mar e do lago. A água quentinha vira vapor e sobe para o céu. Isso se chama evaporação.',
    },
    {
      title: 'As nuvens nascem',
      text: 'Lá no alto, o ar é mais frio. O vapor esfria e vira gotinhas bem pequenas. As gotinhas juntas formam as nuvens. Isso se chama condensação.',
    },
    {
      title: 'A água cai',
      text: 'As gotinhas ficam pesadas e caem do céu como chuva, neve ou granizo. Isso se chama precipitação.',
    },
    {
      title: 'A água entra na terra',
      text: 'A água da chuva entra na terra e fica guardada lá embaixo. Isso se chama infiltração.',
    },
  ],
  glossary: {
    vapor: 'Água em forma de fumaça fininha, que a gente quase não vê.',
    evaporação: 'Quando o sol esquenta a água, ela vira vapor e sobe para o céu.',
    nuvens: 'Gotinhas de água juntinhas lá no alto do céu.',
    condensação: 'Quando o vapor esfria e vira gotinhas, formando as nuvens.',
    chuva: 'Água que cai do céu em gotas.',
    precipitação: 'Quando as gotinhas ficam pesadas e caem como chuva, neve ou granizo.',
    infiltração: 'Quando a água da chuva entra no solo e fica guardada embaixo da terra.',
  },
  questions: [
    {
      q: 'Quando o sol esquenta a água do rio e do lago, o que ela vira?',
      options: ['Vapor, e sobe para o céu.', 'Gelo, e fica no lugar.', 'Pedra, e afunda.'],
      correct: 0,
      tip: 'Dica: lembre de como a água quentinha vira uma fumaça fininha.',
    },
    {
      q: 'Quando o vapor fica frio lá no alto, ele forma o quê?',
      options: ['As estrelas.', 'As nuvens.', 'As montanhas.'],
      correct: 1,
      tip: 'Dica: são gotinhas juntinhas no céu.',
    },
    {
      q: 'A água que cai do céu e entra no solo se chama...',
      options: ['Infiltração.', 'Evaporação.', 'Condensação.'],
      correct: 0,
      tip: 'Dica: "infiltração" começa com a ideia de entrar por dentro, na terra.',
    },
  ],
}

export const audioScript =
  'O ciclo da água. Passo um: a água sobe. O sol esquenta a água do rio, do mar e do lago. A água quentinha vira vapor e sobe para o céu. Isso se chama evaporação. Passo dois: as nuvens nascem. Lá no alto, o ar é mais frio. O vapor esfria e vira gotinhas bem pequenas. As gotinhas juntas formam as nuvens. Isso se chama condensação. Passo três: a água cai. As gotinhas ficam pesadas e caem do céu como chuva, neve ou granizo. Isso se chama precipitação. Passo quatro: a água entra na terra. A água da chuva entra no solo e fica guardada lá embaixo. Isso se chama infiltração.'