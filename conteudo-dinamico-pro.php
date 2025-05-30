<?php
/**
 * Plugin Name: Conteúdo Dinâmico Pro
 * Description: Insira shortcodes personalizados para exibir conteúdos dinâmicos como depoimentos, contagem regressiva, data atual, entre outros.
 * Version: 1.0
 * Author: Daniel Carvalho - Suprema UX
 * Text Domain: conteudo-dinamico-pro
 */

if (!defined('ABSPATH')) {
    exit; // Evita acesso direto ao arquivo
}

// Definir constantes do plugin
define('CDP_PATH', plugin_dir_path(__FILE__));
define('CDP_URL', plugin_dir_url(__FILE__));

// Inclusão dos arquivos necessários
require_once CDP_PATH . 'includes/shortcodes.php';
require_once CDP_PATH . 'includes/api-integrations.php';
require_once CDP_PATH . 'admin/admin-page.php';

// Carrega Tailwind CSS apenas nas páginas do plugin
add_action('admin_enqueue_scripts', function ($hook) {
    if (strpos($hook, 'conteudo-dinamico-pro') !== false) {
        wp_enqueue_style('cdp-tailwind', 'https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css');
    }
});

// Hook de ativação
register_activation_hook(__FILE__, function () {
    // Configurações iniciais, se necessário
});

// Hook de desinstalação
register_uninstall_hook(__FILE__, 'cdp_uninstall');
function cdp_uninstall() {
    // Limpar opções, dados temporários, etc.
}
