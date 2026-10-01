# Previsão do Tempo

Aplicação web que consulta a **previsão do tempo em tempo real** de qualquer cidade, desenvolvida com **HTML**, **CSS** e **JavaScript** puro para a disciplina de **Programação Web II**.

A cidade é pesquisada na API gratuita do [OpenWeatherMap](https://openweathermap.org/current) e o resultado é exibido na tela com temperatura, descrição do clima, umidade e velocidade do vento.

## Funcionalidades

- **Busca por cidade**: o usuário digita o nome da cidade e clica em *Buscar*
- **Busca pelo Enter**: também é possível consultar pressionando a tecla `Enter` no campo
- **Validação de campo vazio**: aviso amigável caso nenhuma cidade seja informada
- **Resultado com 4 informações**: temperatura (°C), descrição do clima, umidade e velocidade do vento
- **Tratamento de erros**: falhas de conexão ou cidade inexistente geram um aviso ao usuário e um log no console
- **Interface responsiva**: o layout se adapta a celulares, tablets e desktops

## Tecnologias Utilizadas

- **HTML5** — estrutura da página e do formulário
- **CSS3** — interface responsiva com *gradiente*, *backdrop-filter* (efeito de vidro) e **CSS Variables** para organização das cores
- **JavaScript (ES6+)** — `fetch`, `async/await`, `addEventListener` e tratamento de erros com `try/catch`
- **OpenWeatherMap API** — dados climáticos em tempo real

## Requisitos para executar

- Navegador web atualizado (Chrome, Edge, Firefox ou Safari)
- Conexão com a internet
- **Não precisa** instalar nada nem usar servidor: basta abrir o `index.html` no navegador

## Como executar

1. Abrir a pasta do projeto.
2. Dar **duplo clique** no arquivo `index.html` (ou usar o *Live Server* do VS Code).
3. Digitar o nome de uma cidade (ex.: `São Paulo`) e clicar em **Buscar**.

> A API só funciona com conexão com a internet, pois os dados são buscados direto do OpenWeatherMap.

## Estrutura do Projeto

```
PrevisaoTempo/
├── index.html    → estrutura da página (cabeçalho, formulário e área de resultado)
├── style.css     → estilos da interface (degradê, cartão de vidro e responsividade)
├── script.js     → lógica da aplicação (consulta à API e exibição do resultado)
└── README.md     → documentação do projeto
```

## Como o código funciona

O fluxo da aplicação acontece em **3 etapas**, executadas em `script.js`:

1. **Validação** — o valor do campo `#cidade` é lido e, se estiver vazio, a função é encerrada com um `alert`.
2. **Consulta** — a URL da API é montada com os parâmetros e o `fetch` faz a requisição. O `await` pausa a execução até a resposta chegar.
3. **Exibição** — a resposta é convertida de JSON para objeto com `resposta.json()` e injetada no HTML da div `#resultado`.

## Parâmetros da API

A URL da requisição é montada em `script.js` com quatro parâmetros:

| Parâmetro | Função | Valor usado |
|---|---|---|
| `q` | Nome da cidade pesquisada | digitado pelo usuário |
| `appid` | Chave de acesso à API | `API_KEY` (no topo do script) |
| `units` | Unidade da temperatura | `metric` (retorna em °C) |
| `lang` | Idioma das descrições | `pt_br` (português do Brasil) |

### Campos usados da resposta

| Dado exibido | Caminho no JSON |
|---|---|
| Nome da cidade | `dados.name` |
| Temperatura | `dados.main.temp` |
| Descrição do clima | `dados.weather[0].description` |
| Umidade | `dados.main.humidity` |
| Velocidade do vento | `dados.wind.speed` |

## Organização do código

- **Comentários por seção** em todos os arquivos, explicando o que cada bloco faz
- **Nomes de variáveis descritivos** (ex.: `nomeCidade`, `elementoResultado`) no lugar de `dados1`, `x`, `temp`
- **Constantes no topo do script** (`API_KEY`, `API_URL`) para facilitar a manutenção
- **Separação de responsabilidades**: o `index.html` tem só a estrutura, o `script.js` tem só a lógica
- **CSS Variables** (`:root`) centralizando as cores e tamanhos usados no projeto
- **`encodeURIComponent`** no nome da cidade, garantindo que nomes com acento ou espaço sejam enviados corretamente à API

## Possíveis melhorias

- Exibir um ícone correspondente ao clima (sol, nuvem, chuva)
- Mostrar o aviso "cidade não encontrada" quando a API retornar erro `404`
- Exibir temperatura mínima e máxima
- Adicionar histórico de cidades buscadas com `localStorage`

---
Projeto desenvolvido por **Guilherme Izidio Nogueira** para a disciplina de Programação Web II — 2ºDS.