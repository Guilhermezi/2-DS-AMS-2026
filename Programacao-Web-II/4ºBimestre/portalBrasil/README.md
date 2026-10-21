# Portal Brasil

Aplicação web desenvolvida para consultar dados públicos do Brasil. O usuário informa um valor no formulário, o PHP realiza uma requisição HTTP para a [BrasilAPI](https://brasilapi.com.br/), interpreta a resposta JSON e os dados são apresentados dinamicamente na página.

# Vídeo:


https://github.com/user-attachments/assets/4425ca5d-04f3-4b46-826c-8f16ff63b287


## Consultas disponíveis

- CEP e endereço;
- cidades de um DDD;
- dados de CNPJ;
- informações de bancos;
- feriados nacionais por ano;
- marcas de veículos da FIPE;
- municípios de um estado segundo o IBGE.

## Tecnologias utilizadas

- HTML5;
- CSS3;
- JavaScript;
- PHP;
- JSON;
- API pública BrasilAPI.

## Como funciona

1. O usuário preenche um formulário e seleciona **Consultar**.
2. O JavaScript envia a pesquisa para `consultar.php`.
3. O PHP valida o valor e faz uma requisição GET para a BrasilAPI.
4. O PHP interpreta o JSON recebido e devolve os dados ao navegador.
5. O JavaScript apresenta o resultado na página.

## Como executar

É necessário ter o PHP instalado. No terminal, dentro da pasta do projeto, execute:

```bash
php -S localhost:8000
```

Depois, acesse [http://localhost:8000](http://localhost:8000) no navegador.

> O projeto não deve ser aberto diretamente pelo arquivo `index.html`, pois o navegador sozinho não executa PHP. O GitHub armazena o código, mas o GitHub Pages também não executa PHP; para publicar uma versão funcional é necessário usar uma hospedagem compatível com PHP.

## Exemplos para teste

- CEP: `01001000`;
- DDD: `11`;
- Banco: `1`;
- Feriados: `2026`;
- FIPE: `carros`;
- IBGE: `SP`.

## Autor

Guilherme Izidio Nogueira
