<?php
if (!defined('ABSPATH')) {
    exit;
}

// Adiciona o item de menu no painel do WordPress
add_action('admin_menu', 'cdp_adicionar_menu_admin');

function cdp_adicionar_menu_admin() {
    add_menu_page(
        'Conteúdo Dinâmico Pro',        // Título da página
        'Conteúdo Dinâmico Pro',        // Nome no menu
        'manage_options',               // Permissão
        'conteudo-dinamico-pro',        // Slug
        'cdp_exibir_pagina_config',     // Função de callback
        'dashicons-randomize',          // Ícone
        80                              // Posição no menu
    );
}

// Exibe a página administrativa do plugin
function cdp_exibir_pagina_config() {
    ?>
    <div class="wrap">
        <h1 class="text-3xl font-bold mb-6">Configurações do Conteúdo Dinâmico Pro</h1>

        <div class="bg-white p-6 rounded shadow-md max-w-2xl">
            <form method="post" action="options.php">
                <?php
                settings_fields('cdp_opcoes');
                do_settings_sections('conteudo-dinamico-pro');
                submit_button('Salvar Configurações');
                ?>
            </form>
        </div>
    </div>
    <?php
}

// Registra as configurações e campos
add_action('admin_init', 'cdp_registrar_configuracoes');

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

function cdp_campo_depoimentos() {
    $valor = get_option('cdp_depoimentos', '');
    echo '<textarea name="cdp_depoimentos" rows="6" class="w-full p-2 border rounded">' . esc_textarea($valor) . '</textarea>';
}
