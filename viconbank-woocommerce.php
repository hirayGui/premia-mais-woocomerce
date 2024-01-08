<?php

/**
 * Plugin Name: Premia Mais Pagamentos
 * Plugin URI:  https://github.com/hiraygui/viconbank-woocommerce
 * Author: Gizo Digital
 * Author URI: 
 * Description: Plugin de pagamento do Premia Mais
 * Version: 2.0.0
 * License:     GPL-2.0+
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: viconbank-woocommerce
 * 
 * Class WC_ViconBank_Gateway file.
 *
 * @package WooCommerce\viconbank-woocommerce
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

//condição verifica se plugin woocommerce está ativo
if (!in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) return;

//função permite ativação de plugin
add_action('plugins_loaded', 'viconbank_init', 11);
add_filter('woocommerce_payment_gateways', 'add_to_woo_viconbank_payment_gateway');


function viconbank_init()
{
	if (class_exists('WC_Payment_Gateway')) {
		require_once plugin_dir_path( __FILE__ ) . '/includes/class-viconbank-gateway.php';
		require_once plugin_dir_path( __FILE__ ) . '/includes/viconbank-order-status.php';
	}
}

function add_to_woo_viconbank_payment_gateway($gateways){
   $gateways[] = 'WC_ViconBank_Gateway';
   return $gateways;
}