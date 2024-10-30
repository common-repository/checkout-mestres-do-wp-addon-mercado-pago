<?php
/**
Plugin Name: Checkout Mestres do WP Addon Mercado Pago
Plugin URI: http://www.mestresdowp.com.br/
Description: Personaliza os campos do Mercado Pago no Checkout Mestres do WP..
Version: 2.0.1
Author: Mestres do WP
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Text Domain: checkout-mwp-addon-mp
 */
 /*
	Copyright 2021  Mestres do WP  (email : contato@mestresdowp.com.br)
*/
define( 'CWMP_MP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'CWMP_MP_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

function addon_mp_extensions_check_checkout () {
	if ( ! is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
	  	echo "<div class='error'><p>É necessário utilizar o plugin <strong>WooCommerce</strong>.</p></div>";
	}
	if ( ! is_plugin_active( 'checkout-mestres-wp/checkout-woocommerce-mestres-wp.php' ) ) {
	  	echo "<div class='error'><p>É necessário utilizar o plugin <strong>Checkout Mestres WP</strong>, <a href='https://wordpress.org/plugins/checkout-mestres-wp/'>clique aqui para baixar</a>. </p></div>";
	}
	if ( ! is_plugin_active( 'woocommerce-mercadopago/woocommerce-mercadopago.php' ) ) {
	  	echo "<div class='error'><p>É necessário utilizar o plugin <strong>Mercado Pago payments for WooCommerce</strong>, <a href='https://wordpress.org/plugins/woocommerce-mercadopago/' target='blank'>clique aqui para baixar</a>. </p></div>";
	}
}
add_action('admin_notices', 'addon_mp_extensions_check_checkout');

add_filter( 'woocommerce_locate_template', 'cwmp_woo_template_mp_basic_checkout', 110, 3 );
function cwmp_woo_template_mp_basic_checkout( $template, $template_name, $template_path ) {
if('checkout/basic-checkout.php' == $template_name ){         
$template = CWMP_MP_PLUGIN_PATH . 'templates/checkout/basic-checkout.php';   
}
return $template;
}

add_filter( 'woocommerce_locate_template', 'cwmp_woo_template_mp_custom_checkout', 110, 3 );
function cwmp_woo_template_mp_custom_checkout( $template, $template_name, $template_path ) {
if('checkout/custom-checkout.php' == $template_name ){         
$template = CWMP_MP_PLUGIN_PATH . 'templates/checkout/custom-checkout.php';   
}
return $template;
}

add_filter( 'woocommerce_locate_template', 'cwmp_woo_template_mp_pix_checkout', 110, 3 );
function cwmp_woo_template_mp_pix_checkout( $template, $template_name, $template_path ) {
if('checkout/pix-checkout.php' == $template_name ){         
$template = CWMP_MP_PLUGIN_PATH . 'templates/checkout/pix-checkout.php';   
}
return $template;
}

add_filter( 'woocommerce_locate_template', 'cwmp_woo_template_mp_ticket_checkout', 110, 3 );
function cwmp_woo_template_mp_ticket_checkout( $template, $template_name, $template_path ) {
if('checkout/ticket-checkout.php' == $template_name ){         
$template = CWMP_MP_PLUGIN_PATH . 'templates/checkout/ticket-checkout.php';   
}
return $template;
}

function add_js_cwpm_addon_mp() {
	if(is_checkout()){
	wp_enqueue_style('cwpm_addon_css_card', CWMP_MP_PLUGIN_URL . '/assets/css/card.css', array(), '0.1.0', 'all');
	wp_enqueue_style('cwpm_addon_mp_css_style', CWMP_MP_PLUGIN_URL . '/assets/css/style.css', array(), '0.1.0', 'all');
    wp_enqueue_script('cwpm_addon_card', CWMP_MP_PLUGIN_URL . 'assets/js/card.js', array('jquery'), null, true);
	wp_enqueue_script('cwpm_addon_mp_js_functions', CWMP_MP_PLUGIN_URL . 'assets/js/functions.js', array('jquery'), null, true);
	}
}
add_action('wp_enqueue_scripts', 'add_js_cwpm_addon_mp');