<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Shortcode: [depoimento_aleatorio]
 * Exibe um depoimento aleatório salvo no admin
 */
add_shortcode('depoimento_aleatorio', 'cdp_shortcode_depoimento_aleatorio');

function cdp_shortcode_depoimento_aleatorio() {
    $depoimentos = get_option('cdp_depoimentos', '');
    $lista = array_filter(array_map('trim', explode("\n", $depoimentos)));

    if (empty($lista)) {
        return '<p class="text-red-500">Nenhum depoimento disponível.</p>';
    }

    $aleatorio = $lista[array_rand($lista)];
    return '<blockquote class="italic border-l-4 border-blue-500 pl-4 text-gray-700">' . esc_html($aleatorio) . '</blockquote>';
}

/**
 * Shortcode: [data_atual formato="d/m/Y"]
 * Exibe a data atual com o formato desejado
 */
add_shortcode('data_atual', 'cdp_shortcode_data_atual');

function cdp_shortcode_data_atual($atts) {
    $atts = shortcode_atts([
        'formato' => 'd/m/Y'
    ], $atts);

    return '<span class="font-medium text-blue-600">' . date_i18n($atts['formato']) . '</span>';
}

/**
 * Shortcode: [contagem_regressiva data="2025-07-01"]
 * Exibe uma contagem regressiva até a data especificada
 */
add_shortcode('contagem_regressiva', 'cdp_shortcode_contagem_regressiva');

function cdp_shortcode_contagem_regressiva($atts) {
    $atts = shortcode_atts([
        'data' => ''
    ], $atts);

    $data_evento = strtotime($atts['data']);
    if (!$data_evento) {
        return '<p class="text-red-500">Data inválida.</p>';
    }

    $hoje = current_time('timestamp');
    $diferenca = $data_evento - $hoje;

    if ($diferenca <= 0) {
        return '<p class="text-green-600">O evento já ocorreu.</p>';
    }

    $dias = floor($diferenca / DAY_IN_SECONDS);
    $texto = $dias === 1 ? '1 dia restante' : "{$dias} dias restantes";

    return '<span class="font-semibold text-green-700">' . $texto . '</span>';
}
