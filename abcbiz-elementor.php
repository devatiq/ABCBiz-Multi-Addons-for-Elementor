<?php 
/*
Plugin Name: ABCBiz Multi Addons for Elementor
Plugin URI: https://abcplugin.com/abcbiz-multi-addons-for-elementor/
Description: ABCBiz Multi Addons comprises a premium assortment of high-quality addons designed for the Elementor page builder. Our collection is constantly expanding, with ongoing enhancements to ensure an exceptional user experience.
Version: 1.0
Author: Atiqur Rahman
Author URI: https://supreox.com
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: ABCMAFE
Domain Path: /languages
Elementor tested up to: 3.17.1
Elementor Pro tested up to: 3.17.1
*/


// If this file is called firectly, abort!!!
defined('ABSPATH') or die('This is not the place you deserve!');


/**
 * Enqueue scripts and styles.
 */
function abc_ma_elementor_enqueue() {   

	//Popup Style
	wp_register_style( 'magnific-popup',  ABCMAElEMENTOR_ASSETS . "/css/magnific-popup.css");

	// Default Style
    wp_enqueue_style( 'abc-ma-elementor-style',  ABCMAElEMENTOR_ASSETS . "/css/abcstyle.css");

   //Responsive Style
    wp_enqueue_style( 'abc-ma-elementor-responsive-style',  ABCMAElEMENTOR_ASSETS . "/css/responsive.css");

	//Popup Script
	wp_register_script( 'magnific-popup', ABCMAElEMENTOR_ASSETS . "/js/magnific-popup.min.js", array( 'jquery'), false, true );

}
add_action( 'wp_enqueue_scripts', 'abc_ma_elementor_enqueue' );


function  abcmafe_plugin_general_init() {

    if (!class_exists('ABCBIZMAElementorPack', false)) {
        //load Main plugin class
        require_once 'main.php';		
        /**
         * initiate the plugin class
         */
	    \ABCMAElEMENTOR\ABCBIZMAElementorPack::instance();

    }	

}
add_action( 'plugins_loaded', 'abcmafe_plugin_general_init' );

// add custom our own category for this plugin 
function abc_ma_add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'abc-ma-category',
		[
			'title' => esc_html__( 'ABCBiz Multi Addons', 'ABCMAFE' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'abc_ma_add_elementor_widget_categories' ); 