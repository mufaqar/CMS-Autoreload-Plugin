<?php 
/*
Plugin Name: Command Center
Plugin URI: https://app.cmdcntr.io/
Description: Command Center Configraion Plugin | Take your Wordpress business to the next level with Command Center
Version: 1.0.0
Author: Mufaqar Islam
Author URI: http://mufaqar.com
Text Domain: command-center
*/

namespace membersone_integration;


// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if

// Let's Initialize Everything
if ( file_exists( plugin_dir_path( __FILE__ ) . 'core-init.php' ) ) {
		require_once( plugin_dir_path( __FILE__ ) . 'core-init.php' );
		
}







/**
 * Adds data on admin menu page.
 *
 * @return void
 */
function membersone_integration_config() {
	add_menu_page(
		__( 'Command Center', 'command-center' ),
		__( 'Command Center', 'command-center' ),
		'manage_options',
		'command-center-dashboard',
		__NAMESPACE__ . '\\membersone_integration_init',
		plugin_dir_url( __FILE__ ) . 'assets/icon.png'
	);

	add_submenu_page(
		'command-center-dashboard',
		__( 'Reload Configration', 'command-center' ),
		__( 'Reload Configration', 'command-center' ),
		'manage_options',
		'command-center-reload',
		__NAMESPACE__ . '\\command_center_reload',
		'poll_page',
	
	);

}


add_action( 'admin_menu', __NAMESPACE__ . '\\membersone_integration_config' );





add_action('woocommerce_before_account_orders', __NAMESPACE__ . '\\woocommerce_account_orders',50);
function woocommerce_account_orders( ) {	
 require_once MOI_CORE_INC . 'moi-orders.php';      
}

require_once MOI_CORE_INC . 'moi-api.php';    



/**
 * Processes and validates form data.
 *
 * @return void
 */
function membersone_integration_init() {
	if ( ! current_user_can( 'manage_options' ) ) {
		die( esc_attr( __( 'You don\'t have the required permissions to edit this Plugin' ) ) );
	}

	$response['is_submited'] = false;
	$response['status'] = '';

	if ( isset( $_POST['moi_enable'] ) ) {
		if ( ! check_admin_referer( 'membersone-integration-nonce', 'moi_nonce_field' ) ) {
			die( esc_attr( __( 'Validation Error!' ) ) );
		}
		$response['is_submited'] = true;
		$response['status'] = 'success';
		$response['message'] = 'Configurations saved successfully :)';
		moi_update_options_data(moi_sanitize_configuration_data($_POST));
	}

	$options = moi_get_options_data();
	// Load the configurations
	if ( file_exists( MOI_CORE_VIEWS . 'configurations.php' ) ) {
		require_once MOI_CORE_VIEWS . 'configurations.php';
	}

	
	
}


function command_center_reload() {
	if ( ! current_user_can( 'manage_options' ) ) {
		die( esc_attr( __( 'You don\'t have the required permissions to edit this Plugin' ) ) );
	}

	$response['is_submited'] = false;
	$response['status'] = '';

	if ( isset( $_POST['moi_enable'] ) ) {
		if ( ! check_admin_referer( 'membersone-integration-nonce', 'moi_nonce_field' ) ) {
			die( esc_attr( __( 'Validation Error!' ) ) );
		}
		$response['is_submited'] = true;
		$response['status'] = 'success';
		$response['message'] = 'Configurations saved successfully :)';
		moi_update_options_data(moi_sanitize_configuration_data($_POST));
	}

	$options = moi_get_options_data();
	// Load the configurations
	if ( file_exists( MOI_CORE_VIEWS . 'reload.php' ) ) {
		require_once MOI_CORE_VIEWS . 'reload.php';
	}

	
	
}


/**
 * Sanitizes the configurations data.
 *
 * @param array $post_data Form post data.
 *
 * @return array
 */
function moi_sanitize_configuration_data( array $post_data ) {
	$configurations = array();
	$configurations['moi_enable']  = is_numeric( $post_data['moi_enable'] ) ? $post_data['moi_enable'] : 0;
	
	$configurations['moi_req_url1'] =  $post_data['moi_req_url1'] ;
	$configurations['moi_req_url2'] =  $post_data['moi_req_url2'] ;
	$configurations['moi_req_url3'] =  $post_data['moi_req_url3'] ;
	$configurations['moi_req_url4'] =  $post_data['moi_req_url4'] ;
	$configurations['moi_req_url5'] =  $post_data['moi_req_url5'] ;

	$configurations['moi_req_time1'] =  $post_data['moi_req_time1'] ;
	$configurations['moi_req_time2'] =  $post_data['moi_req_time2'] ;
	$configurations['moi_req_time3'] =  $post_data['moi_req_time3'] ;
	$configurations['moi_req_time4'] =  $post_data['moi_req_time4'] ;
	$configurations['moi_req_time5'] =  $post_data['moi_req_time5'] ;



	





	

	return $configurations;
}
/**
 * Update the plugins options data.
 *
 * @param array  $configurations Sanitized configuration data.
 *
 * @return void
 */
function moi_update_options_data( $configurations) {
	foreach ($configurations as $key=>$value) {
		update_option( $key, $value );
	}
	
}



/**
 * Gets the configurations.
 *
 * @param string $lang_code The language code.
 *
 * @return array
 */
function moi_get_options_data() {
	return array(
		'moi_enable' => get_option('moi_enable'),	
		'moi_vendor_api' => get_option('moi_vendor_api'),	
		'moi_vendor_time' => get_option('moi_vendor_time'),

		'moi_req_url1' => get_option('moi_req_url1'),	
		'moi_req_url2' => get_option('moi_req_url2'),
		'moi_req_url3' => get_option('moi_req_url3'),	
		'moi_req_url4' => get_option('moi_req_url4'),
		'moi_req_url5' => get_option('moi_req_url5'),	
		
		'moi_req_time1' => get_option('moi_req_time1'),	
		'moi_req_time2' => get_option('moi_req_time2'),
		'moi_req_time3' => get_option('moi_req_time3'),	
		'moi_req_time4' => get_option('moi_req_time4'),
		'moi_req_time5' => get_option('moi_req_time5'),	
	);
}






add_action('wp_head', __NAMESPACE__ . '\\cvf_ps_enqueue_datepicker');
function cvf_ps_enqueue_datepicker() {
    wp_enqueue_script('jquery-ui-datepicker');
    wp_enqueue_style('jquery-style', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
   
}
$option=moi_get_options_data();
if($option['moi_menu_icon']==1)
{
	function new_nav_menu_items($items) {
		$url='';
		$url=home_url(); 
	
		
		return $items;
	}
	add_filter( 'wp_nav_menu_items',  __NAMESPACE__ . '\\new_nav_menu_items' );
}





