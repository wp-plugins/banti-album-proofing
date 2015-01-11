<?php
/*
Plugin Name: Banti Album Proofing
Plugin URI: http://www.bantialbumproofing.com
Description: Used by professionals who appreciate good design and ease of use, Banti is an online album proofing solution for wedding and portrait photographers that makes album proofing faster than ever before. This plugin allows you to use and manage your client's albums without ever leaving Wordpress.
Author: Banti Album Proofing
Author URI: http://www.bantialbumproofing.com
Version: 1.2.1
*/
/*****************************************
COPYRIGHT
*****************************************/
/*
Copyright 2013  Banti Album Proofing  (email : info@bantialbumproofing.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/*****************************************
Constants
*****************************************/

if( !defined( 'BANTI_BASE_FILE' ) )		define( 'BANTI_BASE_FILE', __FILE__ );
if( !defined( 'BANTI_BASE_DIR' ) ) 		define( 'BANTI_BASE_DIR', dirname( BANTI_BASE_FILE ) );
if( !defined( 'BANTI_PLUGIN_URL' ) ) 	define( 'BANTI_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
if( !defined( 'BANTI_PLUGIN_VERSION' ) ) define( 'BANTI_PLUGIN_VERSION', '1.0.0' );

/*****************************************
global variables
*****************************************/
// this is the table prefix
// plugin prefix
global $wpdb;
$banti_table_prefix=$wpdb->prefix.'banti_';

define('BANTI_TABLE_PREFIX', $banti_table_prefix);

/* SET UP BANTI MANGAGEMENT TABLE */
register_activation_hook(__FILE__,'banti_install');
register_deactivation_hook(__FILE__ , 'banti_uninstall' );

function banti_install()
{
    global $wpdb;
    $table = BANTI_TABLE_PREFIX."settings_tbl";
	$sql = "CREATE TABLE " . $wpdb->escape( $table ) . " (
		`id` mediumint(9) NOT NULL AUTO_INCREMENT,
		`username` tinytext NOT NULL,
		`password` tinytext NOT NULL,
		UNIQUE KEY id (id)
		) CHARACTER SET utf8 COLLATE utf8_general_ci;;";
    //$wpdb->query($structure);
	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		dbDelta( $sql );
}
function banti_uninstall()
{
    global $wpdb;
    $table = BANTI_TABLE_PREFIX."settings_tbl";
    $sql = "DROP TABLE IF EXISTS " . $wpdb->escape( $table ) . "";
	$wpdb->query($sql);
}

//VREATE ADMIN MENU ITEM
add_action('admin_menu','banti_admin_menu');

function banti_admin_menu() { 
	add_menu_page(
		"Banti",
		"Banti",
		8,
		__FILE__,
		"banti_show_admin",
		BANTI_PLUGIN_URL."/images/icon-18.png"
	); 
	add_submenu_page(__FILE__,'Settings','Settings','8','settings','banti_show_settings');
	add_submenu_page(__FILE__,'Help','Help','8','help','banti_show_help');
}
function banti_show_admin(){
	global $wpdb;
	$row = $wpdb->get_row("SELECT * FROM ".BANTI_TABLE_PREFIX."settings_tbl WHERE username!='' ORDER BY id DESC");
	if($row->username == "" && $row->password==""){
		include 'banti-admin-settings.php';
	}else{
		
		echo '<div id="banti-albums" style="overflow:hidden; position:relative; left:-1.3%; -webkit-overflow-scrolling: touch; overflow-y: scroll; width:100.5%; height:100%;min-height:1800px; "><iframe src="https://www.bantialbumproofing.com/_ajax.php?album-name-loggin='.$row->username.'&action=login&wl=wp"  width="100%" style="width:100%; max-width:100%; height:100%; margin:0;padding:0;border:none;" scrolling="no" frameborder="0">&nbsp;</iframe><script src="https://www.bantialbumproofing.com/scripts/iframe.js"></script></div>';
	}
}
function banti_show_settings(){
	include 'banti-admin-settings.php';
}
function banti_show_help(){
	include 'banti-album-help.php';
}

//CREATE SHORT CODE
function banti_album_proofing(){
	global $wpdb;
	$row = $wpdb->get_row("SELECT * FROM ".BANTI_TABLE_PREFIX."settings_tbl WHERE username!='' ORDER BY id DESC");
	return '<div id="banti-albums" style="overflow:hidden; position:relative; -webkit-overflow-scrolling: touch; overflow-y: scroll; width:100%; height:100%;"><iframe src="https://www.bantialbumproofing.com/'.$row->username.'?brand=off"  style="width:100%; max-width:100%; height:100%;  margin:0;padding:0;border:none;" scrolling="no" frameborder="0">&nbsp;</iframe><script src="https://www.bantialbumproofing/scripts/iframe.js"></script></div>';
}
add_shortcode( 'banti-album-proofing', 'banti_album_proofing' );

//ADD SHORTCODE BUTTON TO THE EDITOR
function banti_register_button( $buttons ) {
   array_push($buttons, "separator", "bantialbumproofing");
   return $buttons;
}
function banti_add_plugin( $plugin_array ) {
   $plugin_array['bantialbumproofing'] = plugins_url( '/banti-album-proofing/js/banti-button.js');//BANTI_PLUGIN_URL . '/js/banti-button.js';
   return $plugin_array;
}
function banti_album_proofing_button() {
	global $wpdb;
	$row = $wpdb->get_row("SELECT * FROM ".BANTI_TABLE_PREFIX."settings_tbl WHERE username!='' ORDER BY id DESC");
	if($row->username !=""){
	   if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
		  return;
	   }
	
	   if (get_user_option('rich_editing') == 'true') {
		  add_filter( 'mce_external_plugins', 'banti_add_plugin' );
		  add_filter( 'mce_buttons', 'banti_register_button' );
	   }
	   
	}

}

add_action('init', 'banti_album_proofing_button');
?>