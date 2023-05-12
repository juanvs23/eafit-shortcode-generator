<?php
if( !file_exists('eafit_shortcode_generator_localize') ){
    function eafit_shortcode_generator_localize(){
        return array(
            'admin_ajax' => admin_url('admin-ajax.php'),
            
            
        );
    };
}
if ( !file_exists('eafit_shortcode_generator_admin_assets') ) {
    function eafit_shortcode_generator_admin_assets() {
        wp_enqueue_style('eafit_shortcode_admin',EAFIT_SHORTCODES_GENERATOR_URL .'assets/admin/css/index.css',[],EAFIT_SHORTCODES_GENERATOR_VERSION,'all');
        wp_enqueue_script('eafit_shortcode_admin',EAFIT_SHORTCODES_GENERATOR_URL .'assets/admin/js/index.js',[],EAFIT_SHORTCODES_GENERATOR_VERSION,true);
        wp_localize_script('eafit_shortcode_admin','eafit_shortcode_admin_ajax',eafit_shortcode_generator_localize());       
    }
    add_action('admin_enqueue_scripts', 'eafit_shortcode_generator_admin_assets',10000 );
}
require_once EAFIT_SHORTCODES_GENERATOR_DIR . 'inc/metabox/shortcode-generator.php';
require_once EAFIT_SHORTCODES_GENERATOR_DIR . 'inc/shortcode/shortcode-generator.php';