<?php 
if(!defined("WP_UNINSTALL_PLUGIN")){
	die();
}
$list_options = ['mt_hesk_embedded_site_url', 'mt_hesk_embedded_welcome_message'];
foreach($list_options as $index=>$option){ if(get_option($option) !== false){ delete_option($option); } }
