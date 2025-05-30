<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Registra as configurações e os campos no admin
 */
function cdp_registrar_configuracoes() {
    register_setting('cdp_opcoes', 'cdp_depoimentos');

    add_settings_section(
        'cdp_secao_depoimentos',
        'Depoimentos Aleatórios',
        null,
        'conteudo-dinamico-pro'
    );

    add_settings_field(
        'cdp_depoimentos',
        'Lista de Depoimentos (um por linha)',
        'cdp_campo_depoimentos',
        'conteudo-dinamico-pro',
        'cdp_secao_depoimentos'
    );
}

/**
 * Exibe o campo de textarea para inserir os depoimentos
 */
function cdp_campo_depoimentos() {
    $valor = get_option('cdp_depoimentos', '');
    echo '<textarea name="cdp_depoimentos" rows="6" class="w-full p-2 border rounded">' . esc_textarea($valor) . '</textarea>';
}

// Hook que registra as configurações no carregamento do admin
add_action('admin_init', 'cdp_registrar_configuracoes');
