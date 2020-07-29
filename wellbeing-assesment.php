<?php
/*
Plugin Name:  Wellbeing Assesment
Description:  A wellbeing assessment
Plugin URI:   
Author:       Luke Melong
Version:      1.0
Text Domain:  wellbeing-assesment
Domain Path:  /languages
License:      GPL v2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.txt
*/



// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
	
}

// Add Bootstrap
function load_bootstrap() {
	wp_enqueue_style('bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css');
    wp_enqueue_script( 'boot1','https://code.jquery.com/jquery-3.3.1.slim.min.js', array( 'jquery' ),'',true );
    wp_enqueue_script( 'boot2','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array( 'jquery' ),'',true );
	wp_enqueue_script( 'boot3','https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', array( 'jquery' ),'',true );
	wp_enqueue_script( 'cus-js', plugin_dir_url( __FILE__ ) . "/public/js/wellbeing-assessment.js", array( 'jquery' ),'',true );
}
add_action( 'wp_enqueue_scripts', 'load_bootstrap' );

// Add custom css
function load_custom_css( $hook ) {
	$plugin_url = plugin_dir_url( __FILE__ );

	// wp_enqueue_style( 'reset-css',  $plugin_url . "/public/css/reset.css");
	wp_enqueue_style( 'wellbeing-assessment',  $plugin_url . "/public/css/wellbeing-assessment.css");

	echo "<h1>$hook</h1>";
	if( 'admin-post.php' == $hook ){
		wp_enqueue_style( 'submit-page',  $plugin_url . "/public/css/submit-form.css");
	}
	
}
add_action( 'wp_print_styles', 'load_custom_css' );

// Callback function for shortcode
// Loads the html form
function html_form_code(){
	include_once(plugin_dir_path(__FILE__) . 'includes/html-form.php');
}
add_shortcode('wellbeing-assessment', 'html_form_code' );

// default plugin options
function myplugin_options_default() {
	
	return array(
		'custom_num_questions' => '3',
	);
	
}
function submit_form_css( $hook ){

	if( 'admin-post.php' != $hook ){
		return;
	}

	wp_enqueue_script('submit-form-js', plugin_dir_path(__FILE__) . 'public/js/graph.js');
	wp_enqueue_script('chart-js', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js');
}
add_action('admin_enqueue_scripts', 'submit_form_css');

function cus_form_submit() {
	include_once(plugin_dir_path(__FILE__) . 'includes/submit-form.php');
}
add_action( 'admin_post', 'cus_form_submit');
add_action( 'admin_post_nopriv', 'cus_form_submit');