<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Shortcode: [cotacao_moeda moeda="USD"]
 * Busca a cotação da moeda desejada usando uma API externa pública
 */
add_shortcode('cotacao_moeda', 'cdp_shortcode_cotacao_moeda');

function cdp_shortcode_cotacao_moeda($atts) {
    $atts = shortcode_atts([
        'moeda' => 'USD'
    ], $atts);

    $moeda = strtoupper(trim($atts['moeda']));

    // Exemplo de API gratuita: https://economia.awesomeapi.com.br/
    $url = "https://economia.awesomeapi.com.br/json/last/{$moeda}-BRL";

    $resposta = wp_remote_get($url);

    if (is_wp_error($resposta)) {
        return '<p class="text-red-500">Erro ao buscar a cotação.</p>';
    }

    $corpo = wp_remote_retrieve_body($resposta);
    $dados = json_decode($corpo, true);

    if (!isset($dados["{$moeda}BRL"])) {
        return '<p class="text-red-500">Moeda não encontrada.</p>';
    }

    $cotacao = number_format($dados["{$moeda}BRL"]['bid'], 2, ',', '.');

    return "<p class='text-blue-700 font-medium'>1 {$moeda} = R$ {$cotacao}</p>";
}
