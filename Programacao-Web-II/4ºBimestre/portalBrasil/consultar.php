<?php

// O navegador chama este arquivo, e o PHP faz a consulta na BrasilAPI.
// A lista abaixo também impede que o usuário escolha uma URL externa qualquer.
header('Content-Type: application/json; charset=utf-8');

$servico = $_GET['servico'] ?? '';
$valor = $_GET['valor'] ?? '';

if (!is_string($servico) || !is_string($valor)) {
    responderErro('Parâmetros inválidos.', 400);
}

$valor = trim($valor);

if ($valor === '') {
    responderErro('Informe um valor para a consulta.', 400);
}

$consultas = [
    'cep' => [
        'validar' => '/^\d{8}$/',
        'url' => 'https://brasilapi.com.br/api/cep/v2/',
        'erro' => 'CEP inválido. Digite 8 números.'
    ],
    'ddd' => [
        'validar' => '/^\d{2}$/',
        'url' => 'https://brasilapi.com.br/api/ddd/v1/',
        'erro' => 'DDD inválido. Digite 2 números.'
    ],
    'cnpj' => [
        'validar' => '/^\d{14}$/',
        'url' => 'https://brasilapi.com.br/api/cnpj/v1/',
        'erro' => 'CNPJ inválido. Digite 14 números.'
    ],
    'bancos' => [
        'validar' => '/^\d{1,4}$/',
        'url' => 'https://brasilapi.com.br/api/banks/v1/',
        'erro' => 'Código de banco inválido.'
    ],
    'feriados' => [
        'validar' => '/^(19|20|21)\d{2}$/',
        'url' => 'https://brasilapi.com.br/api/feriados/v1/',
        'erro' => 'Ano inválido. Use um ano entre 1900 e 2199.'
    ],
    'fipe' => [
        'validar' => '/^(carros|motos|caminhoes)$/',
        'url' => 'https://brasilapi.com.br/api/fipe/marcas/v1/',
        'erro' => 'Tipo inválido. Use carros, motos ou caminhoes.'
    ],
    'ibge' => [
        'validar' => '/^[A-Za-z]{2}$/',
        'url' => 'https://brasilapi.com.br/api/ibge/municipios/v1/',
        'erro' => 'Estado inválido. Digite uma sigla com 2 letras.'
    ]
];

if (!isset($consultas[$servico])) {
    responderErro('Serviço de consulta inválido.', 400);
}

if ($servico === 'cnpj') {
    $valor = preg_replace('/\D/', '', $valor);
}

if (!preg_match($consultas[$servico]['validar'], $valor)) {
    responderErro($consultas[$servico]['erro'], 400);
}

$valor = strtolower($valor);
$url = $consultas[$servico]['url'] . rawurlencode($valor);
$resposta = consultarApi($url);

if ($resposta['status'] < 200 || $resposta['status'] >= 300) {
    responderErro('Nenhum resultado foi encontrado.', $resposta['status'] === 404 ? 404 : 502);
}

// O PHP interpreta o JSON recebido para conferir se ele é válido.
$dados = json_decode($resposta['corpo'], true);

if ($dados === null && json_last_error() !== JSON_ERROR_NONE) {
    responderErro('A API retornou dados inválidos.', 502);
}

echo json_encode($dados, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

function consultarApi(string $url): array
{
    if (function_exists('curl_init')) {
        $curl = curl_init($url);
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_TIMEOUT => 15,
            CURLOPT_USERAGENT => 'PortalBrasil/1.0',
            CURLOPT_HTTPHEADER => ['Accept: application/json']
        ]);

        $corpo = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $erro = curl_error($curl);
        curl_close($curl);

        if ($corpo === false) {
            responderErro('Não foi possível conectar à API: ' . $erro, 502);
        }

        return ['status' => $status, 'corpo' => $corpo];
    }

    // Alternativa para servidores sem a extensão cURL habilitada.
    $contexto = stream_context_create([
        'http' => [
            'method' => 'GET',
            'timeout' => 15,
            'ignore_errors' => true,
            'header' => "Accept: application/json\r\nUser-Agent: PortalBrasil/1.0\r\n"
        ]
    ]);

    $corpo = @file_get_contents($url, false, $contexto);
    $status = 502;

    if (isset($http_response_header[0]) && preg_match('/\s(\d{3})\s/', $http_response_header[0], $resultado)) {
        $status = (int) $resultado[1];
    }

    if ($corpo === false) {
        responderErro('Não foi possível conectar à API.', 502);
    }

    return ['status' => $status, 'corpo' => $corpo];
}

function responderErro(string $mensagem, int $status): void
{
    http_response_code($status);
    echo json_encode(['erro' => $mensagem], JSON_UNESCAPED_UNICODE);
    exit;
}
