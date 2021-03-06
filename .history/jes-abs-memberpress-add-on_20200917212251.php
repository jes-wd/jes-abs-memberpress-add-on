<?php
/**
 * Plugin Name: JES | ABS | Custom Memberpress Add On
 * Plugin URI: https://abs2020.com
 * Description: Activates custom ABS configurations for Memberpress
 * Version: 0.1
 * Author: Jesse Sugden
 * Author URI: https://jeswebdevelopment.com
 **/

// Include subscription events functions file
include( plugin_dir_path( __FILE__ ) . 'includes/subscription-events.php');

// Include account tab modifications
include( plugin_dir_path( __FILE__ ) . 'includes/account-tabs.php');

// Include page templater to load template files
include( plugin_dir_path( __FILE__ ) . 'includes/template-member-registration.php');

// Enqueue scripts and styles
function jes_mpress_enqueue_script() {
  wp_enqueue_script( 'jes_mpress_countries', plugin_dir_url( __FILE__ ) . 'js/countries.js' ); // Load 
  wp_enqueue_script( 'jes_mpress_scripts', plugin_dir_url( __FILE__ ) . 'js/jes-mpress-scripts.js' );
  wp_enqueue_style( 'jes_mpress_styles', plugin_dir_url( __FILE__ ) . 'css/jes-mpress-styles.css' );
}
add_action('wp_enqueue_scripts', 'jes_mpress_enqueue_script');