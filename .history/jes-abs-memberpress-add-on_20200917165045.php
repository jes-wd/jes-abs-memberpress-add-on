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
include( plugin_dir_path( __FILE__ ) . 'subscription-events.php');

// Include account tab modifications
include( plugin_dir_path( __FILE__ ) . 'account-tabs.php');

// Enqueue scripts and styles
function jes_mpress_enqueue_script() {
  wp_enqueue_script( 'jes_mpress_countries', plugin_dir_url( __FILE__ ) . 'countries.js' ); // Load 
  wp_enqueue_script( 'jes_mpress_scripts', plugin_dir_url( __FILE__ ) . 'jes-mpress-scripts.js' );
  wp_enqueue_style( 'jes_mpress_styles', plugin_dir_url( __FILE__ ) . 'jes-mpress-styles.css' );
}
add_action('wp_enqueue_scripts', 'jes_mpress_enqueue_script');

 /*
 * Initializes the plugin by setting filters and administration functions.
 */
private function __construct() {
  $this->templates = array();

  // Add a filter to the attributes metabox to inject template into the cache.
  add_filter('page_attributes_dropdown_pages_args',
      array( $this, 'register_project_templates' ) 
  );

  // Add a filter to the save post to inject out template into the page cache
  add_filter('wp_insert_post_data', 
      array( $this, 'register_project_templates' ) 
  );

  // Add a filter to the template include to determine if the page has our 
  // template assigned and return it's path
  add_filter('template_include', 
      array( $this, 'view_project_template') 
  );

  // Add your templates to this array.
  $this->templates = array(
          'goodtobebad-template.php'     => 'It\'s Good to Be Bad',
  );
}

