<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Plugin_Name
 *
 * @wordpress-plugin
 * Plugin Name:       stutterful
 * Plugin URI:        http://example.com/plugin-name-uri/
 * Description:       Orderlivery as come to Wordpess. This plugins will help your the deliveries, orders, menu, and more!
 * Version:           1.0.0
 * Author:            Orderlivery LLC
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-name
 * Domain Path:       /languages
 */
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


ob_start();


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


add_action( 'admin_menu', 'stutter_admin', 13 );


function stutterful_list()
{
	require plugin_dir_path( __FILE__ ) . '/models/wordlist.model.php';
	require plugin_dir_path( __FILE__ ) . '/controllers/wordlist.controller.php';
	Wordlist::index();
	
}


function stutter_admin()
{
	
        //$icon_url =  plugin_dir_url(dirname(__FILE__)). PLUGIN_NAME ."/public/img/ord-3-32x32.png";
        add_menu_page('Word List', 'Word list', 'manage_options', 'stutterful', 'stutterful_list', 'settings', );


}



// Shortcode as a menu.
function stutterful_tools()
{
	
}
add_shortcode( 'stutterful-tools', 'stutterful_tools' );

// Adds page as a Menu.
function stutter_add_my_custom_page() {
    // wordpress database object.
	global $wpdb;
	$tables_wordpress = $wpdb->tables;
	$charset_collate = $wpdb->get_charset_collate();

	if (!in_array($wpdb->prefix. 'words_practice', $tables_wordpress)) {
		// do something if wp_snippets exists
		 //* Create the teams table
 		$table_name = $wpdb->prefix . 'words_practice';
		$sql = "CREATE TABLE $table_name (
		word_id INTEGER NOT NULL AUTO_INCREMENT,
		word VARCHAR(255) NULL,
		letter_type VARCHAR(255) NULL,
		created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
		updated_at TIMESTAMP NULL,
		PRIMARY KEY (word_id)
		) $charset_collate;";

		$create = $wpdb->query($sql);
	}

	if (!in_array($wpdb->prefix. 'phrases_practice', $tables_wordpress)) {
		// do something if wp_snippets exists
		 //* Create the teams table
 		$table_name = $wpdb->prefix . 'phrases_practice';
		$sql = "CREATE TABLE $table_name (
		phrase_id INTEGER NOT NULL AUTO_INCREMENT,
		phrase VARCHAR(255) NULL,
		letter_type VARCHAR(255) NULL,
		created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
		updated_at TIMESTAMP NULL,
		PRIMARY KEY (phrase_id)
		) $charset_collate;";

		$create = $wpdb->query($sql);
	}

	if (!in_array($wpdb->prefix. 'riddles_practice', $tables_wordpress)) {
		// do something if wp_snippets exists
		 //* Create the teams table
 		$table_name = $wpdb->prefix . 'riddles_practice';
		$sql = "CREATE TABLE $table_name (
		riddle_id INTEGER NOT NULL AUTO_INCREMENT,
		riddle VARCHAR(255) NULL,
		letter_type VARCHAR(255) NULL,
		hardness VARCHAR(255) NULL,
		riddle_type VARCHAR(255) NULL,
		created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
		updated_at TIMESTAMP NULL,
		PRIMARY KEY (word_id)
		) $charset_collate;";

		$create = $wpdb->query($sql);
	}


	if (!post_exists( 'tools'))
	{
		// Create post object
		$ord_checkout = array(
			'post_title'    => wp_strip_all_tags( 'Tools' ),
			'post_content'  => '[stutterful-tools]',
			'post_status'   => 'publish',
			'post_author'   => 1,
			'post_type'     => 'page',
		);
	
		// Insert the post into the database
		wp_insert_post( $ord_checkout );
	}
	
}
register_activation_hook(__FILE__, 'stutter_add_my_custom_page');


function stutter_remove_pages()
{
	// wordpress database object.
	global $wpdb;
	$delete_param = $_GET['delete'];

	if ($delete_param == "yes")
	{
	


		/*if (!in_array('wp_orderlivery_options', $tables_wordpress)) {
			$sql = "DROP TABLE wp_orderlivery_options;";

			$delete_table = $wpdb->query($sql);
		}*/

	}




	if (post_exists( 'Tools'))
	{
		$checkout_page = $wpdb->get_row("SELECT ID FROM wp_posts WHERE post_title = 'Tools' LIMIT 1");
		$delete = wp_delete_post( $checkout_page->ID, true );
	}
	
	//wp_delete_post( int $postid, bool $force_delete = false )
}

register_deactivation_hook( __FILE__, 'stutter_remove_pages' );


register_uninstall_hook( __FILE__, 'stutter_uninstall' );

/*
function thus() {
	//wp_enqueue_script('wp-deactivation-message', plugins_url('public/js/message.js', dirname(__FILE__)), array());

}
*/
// takes away power by wordpress and version.
add_filter( 'admin_footer_text', '__return_empty_string', 11 ); 
add_filter( 'update_footer', '__return_empty_string', 11 );

//add_action('wp-deactivation-message','thus');

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
/*
function run_plugin_name() {

	$plugin = new Plugin_Name();
	$plugin->run();

}
*/
//run_plugin_name();
register_activation_hook(__FILE__, 'stutter_add_my_custom_page');
//register_activation_hook( __FILE__, 'activate_plugin_name' );
//register_deactivation_hook( __FILE__, 'deactivate_plugin_name' );
