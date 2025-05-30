=== Conteúdo Dinâmico Pro ===
Contributors: seu-usuario-wp
Tags: shortcode, conteúdo dinâmico, depoimentos, data, contagem regressiva, api externa, moeda
Requires at least: 5.5
Tested up to: 6.5
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Um plugin simples e poderoso para exibir conteúdos dinâmicos via shortcodes no WordPress.

== Descrição ==

O **Conteúdo Dinâmico Pro** permite que você use shortcodes personalizados em posts, páginas ou widgets para exibir conteúdos atualizados dinamicamente. Ideal para blogs, sites corporativos ou e-commerces que desejam enriquecer suas páginas com dados automatizados e personalizados.

Funcionalidades incluídas:

- Depoimento aleatório: `[depoimento_aleatorio]`
- Data atual com formatação personalizada: `[data_atual formato="d/m/Y"]`
- Contagem regressiva para eventos: `[contagem_regressiva data="2025-07-01"]`
- Cotação de moedas em tempo real: `[cotacao_moeda moeda="USD"]`

A administração dos depoimentos é feita de forma simples por meio do painel administrativo.

== Instalação ==

1. Envie os arquivos do plugin para o diretório `/wp-content/plugins/conteudo-dinamico-pro`, ou instale diretamente pelo painel do WordPress.
2. Ative o plugin através do menu “Plugins” no WordPress.
3. Acesse o menu **Conteúdo Dinâmico Pro** no painel para configurar seus dados.

== FAQ ==

= Posso adicionar outros tipos de conteúdo dinâmico? =  
Sim! Esse plugin foi pensado para ser extensível. Você pode adicionar novos shortcodes no arquivo `includes/shortcodes.php`.

= Preciso pagar para usar a API de cotação? =  
Não. O plugin utiliza uma API pública gratuita (https://awesomeapi.com.br). Você pode trocar por outra, se quiser.

== Changelog ==

= 1.0.0 =
* Primeira versão com suporte a 4 shortcodes: depoimento aleatório, data atual, contagem regressiva e cotação de moeda.

== Upgrade Notice ==

= 1.0.0 =
Primeira versão estável.
