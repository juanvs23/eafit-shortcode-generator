<?php
/*
 * Plugin Name:       Eafit shortcodes generator
 * Description:       Creador de shortcodes para codigo HTML, embedibos y formulario scripts.
 * Version:           1.0.1
 * Author:            Juan Carlos Avila <Conocimiento Corporativo>
 * Author URI:        https://author.example.com/
 * Text Domain:       eafit_shortcode_generator
 * Domain Path:       /languages
 */
// Packages
// EAFIT_SHORTCODES_GENERATOR

// constants
define( 'EAFIT_SHORTCODES_GENERATOR_VERSION', '1.0.1' );
define( 'EAFIT_SHORTCODES_GENERATOR_DIR', plugin_dir_path( __FILE__ ) );
define( 'EAFIT_SHORTCODES_GENERATOR_URL', plugin_dir_url( __FILE__ ) );

// Activate plugin
function eafit_shortcodes_generator_activate(){
    eafit_shortcodes_generator_post_types();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'eafit_shortcodes_generator_activate' );
/**
 * includes
 */
// functions
require_once EAFIT_SHORTCODES_GENERATOR_DIR . 'functions.php';

// active
require_once EAFIT_SHORTCODES_GENERATOR_DIR . 'inc/post-type/shortcode-generator.php';
