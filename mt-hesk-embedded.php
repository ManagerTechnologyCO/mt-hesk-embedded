<?php 
/**
 * @package MT Hesk
 * @version 0.0.1
 */
/**
 * Plugin Name:       MT Hesk Embedded
 * Plugin URI:        https://github.com/ManagerTechnologyCO/plugins-wordpress/mt-hesk-embedded
 * Description:       Integre su plataforma Hesk usando marcos incrustados. Usalos con codigos cortos.
 * Version:           0.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Manager Technology Colombia - FelipheGomez
 * Author URI:        https://managertechnology.com.co/
 * License:           GPL v2
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       mt-hesk-embedded
 */

function mt_hesk_embedded_enable() {
	$list_options = ['mt_hesk_embedded_site_url', 'mt_hesk_embedded_welcome_message'];
	$list_options_default = ['https://url/api/index.php/v1', 1];
	foreach($list_options as $index=>$option){ if(get_option($option) == false){ add_option($option, $list_options_default[$index]); } }
}

function mt_hesk_embedded_disenable() {
	flush_rewrite_rules();
}

add_shortcode('mt_hesk_shortcode_home', 'mt_hesk_shortcode_home');
function mt_hesk_shortcode_home( $atts = [], $content = null) {
	$mt_hesk_embedded_site_url = get_option('mt_hesk_embedded_site_url');
    return "<iframe src=\"{$mt_hesk_embedded_site_url}\" width=\"100%\" style=\"width:calc(100vw);height:calc(80vh);\" frameborder=\"0\"></iframe>";
}

add_shortcode('mt_hesk_shortcode_add', 'mt_hesk_shortcode_add');
function mt_hesk_shortcode_add( $atts = [], $content = null) {
	$mt_hesk_embedded_site_url = get_option('mt_hesk_embedded_site_url');
    return "<iframe src=\"{$mt_hesk_embedded_site_url}/index.php?a=add\" width=\"100%\" style=\"width:calc(100vw);height:calc(80vh);\" frameborder=\"0\"></iframe>";
}

add_shortcode('mt_hesk_shortcode_console', 'mt_hesk_shortcode_console');
function mt_hesk_shortcode_console( $atts = [], $content = null) {
	$mt_hesk_embedded_site_url = get_option('mt_hesk_embedded_site_url');
    return "<iframe src=\"{$mt_hesk_embedded_site_url}/admin\" width=\"100%\" style=\"width:calc(100vw);height:calc(80vh);\" frameborder=\"0\"></iframe>";
}

add_shortcode('mt_hesk_shortcode_search', 'mt_hesk_shortcode_search');
function mt_hesk_shortcode_search( $atts = [], $content = null) {
	$mt_hesk_embedded_site_url = get_option('mt_hesk_embedded_site_url');
    return "<iframe src=\"{$mt_hesk_embedded_site_url}/ticket.php\" width=\"100%\" style=\"width:calc(100vw);height:calc(80vh);\" frameborder=\"0\"></iframe>";
}

add_action('admin_menu', "mt_hesk_menu_admin");
function mt_hesk_menu_admin(){
	add_menu_page(
		'Soporte Hesk Embedded',
		'MT Hesk Embedded',
		'manage_options',
		'mt_hs_embedded',
		'mt_hesk_page_home',
		plugin_dir_url(__FILE__).'admin/img/icon.png',
	);
	add_submenu_page(
		'mt_hs_embedded',
		'Ajustes',
		'Ajustes',
		'manage_options',
		'mt_hs_embedded_settings',
		'mt_hesk_page_settings',
	);
}

function mt_hesk_page_home(){
	return include(plugin_dir_path(__FILE__).'admin/home.php');
}

function mt_hesk_page_settings(){
	return include(plugin_dir_path(__FILE__).'admin/settings.php');
}

if(!class_exists('HeskMT')){
	class HeskMT {
		public $wpdb;
		public $urlSite = "NONE";
	}
}

if(class_exists('HeskMT')){
	register_activation_hook(__FILE__, "mt_hesk_embedded_enable");
	register_deactivation_hook(__FILE__, "mt_hesk_embedded_disenable");
	
	$heskMT = new HeskMT();
	if(isset($heskMT)){
		
	}
}
