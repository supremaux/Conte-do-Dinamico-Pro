<?php
// Verifica se o arquivo foi chamado pelo WordPress
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

// Remove a opção que armazena os depoimentos
delete_option('cdp_depoimentos');
