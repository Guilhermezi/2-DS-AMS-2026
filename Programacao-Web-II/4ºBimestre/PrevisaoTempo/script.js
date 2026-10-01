/* ================================================================
   PREVISÃO DO TEMPO - script.js
   ------------------------------------------------------------
   Responsável por:
     1. Ligar o botão "Buscar" à função de consulta
     2. Validar o nome da cidade digitado
     3. Consultar a API do OpenWeatherMap
     4. Exibir o resultado na tela
     5. Tratar possíveis erros
   ================================================================ */


/* ================================================================
   SEÇÃO 1 - CONFIGURAÇÃO
   ================================================================ */

// Chave de acesso à API do OpenWeatherMap (usada na URL de consulta)
const API_KEY = '1782e23e0be55d086bcc80b8c0785516';

// Endereço base da API de previsão do tempo
const API_URL = 'https://api.openweathermap.org/data/2.5/weather';

// Seleciona o campo de texto da cidade e guarda em uma variável
const campoCidade = document.getElementById('cidade');

// Seleciona o botão "Buscar" e guarda em uma variável
const botaoBuscar = document.getElementById('buscar');

// Seleciona a div onde o resultado será exibido e guarda em uma variável
const elementoResultado = document.getElementById('resultado');


/* ================================================================
   SEÇÃO 2 - FUNÇÃO PRINCIPAL: CONSULTAR O TEMPO
   ================================================================ */

// Declara uma função assíncrona: o "async" permite usar o "await"
// (aguardar a resposta da API) sem travar o restante da página.
async function consultarClima() {

    // Lê o valor digitado no campo de texto
    const cidade = campoCidade.value;

    // Remove espaços que o usuário possa ter digitado sem querer
    const nomeCidade = cidade.trim();

    // Validação: se o campo estiver vazio (ou só com espaços), avisa e encerra a função
    if (nomeCidade === '') {
        alert('Por favor, insira o nome de uma cidade.');
        return; // "return" sai da função imediatamente, sem chegar na chamada à API
    }

    // Coloca o bloco de código que pode gerar erro dentro de "try"
    try {

        // Monta a URL da requisição com:
        //   q       -> nome da cidade
        //   appid   -> chave da API
        //   units   -> metric (retorna a temperatura em °C)
        //   lang    -> pt_br (retorna as descrições em português)
        const url = `${API_URL}?q=${encodeURIComponent(nomeCidade)}&appid=${API_KEY}&units=metric&lang=pt_br`;

        // Faz a requisição à API. O "await" pausa a execução da linha até a resposta chegar.
        const resposta = await fetch(url);

        // Converte a resposta da API (que vem em texto JSON) para um objeto utilizável
        const dados = await resposta.json();

        // Monta o HTML do resultado usando os dados recebidos da API
        elementoResultado.innerHTML = `
            <h2>Previsão do tempo para ${dados.name}</h2>
            <p>Temperatura: ${dados.main.temp} °C</p>
            <p>Descrição: ${dados.weather[0].description}</p>
            <p>Umidade: ${dados.main.humidity}%</p>
            <p>Velocidade do vento: ${dados.wind.speed} m/s</p>
        `;

    } catch (erro) {

        // Se algo der errado dentro do "try", a execução cai neste "catch"
        // Mostra o erro técnico no console do navegador, para ajudar na depuração
        console.error('Erro ao consultar a previsão do tempo:', erro);

        // Mostra um aviso amigável para o usuário
        alert('Ocorreu um erro ao consultar a previsão do tempo. Por favor, tente novamente.');

    }

}


/* ================================================================
   SEÇÃO 3 - LIGAÇÃO DOS EVENTOS
   ================================================================ */

// Executa consultarClima() quando o usuário clicar no botão "Buscar"
botaoBuscar.addEventListener('click', consultarClima);

// Permite consultar a previsão também pressionando a tecla "Enter" no campo da cidade
campoCidade.addEventListener('keydown', function (evento) {

    // Verifica se a tecla pressionada é o "Enter" (código 13)
    if (evento.key === 'Enter') {
        consultarClima(); // Chama a mesma função usada pelo botão
    }

});