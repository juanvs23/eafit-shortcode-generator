<?php
// Add Shortcode
function eafit_shortcode_generator_function( $atts ) {
    /**
     * Contenido del shortcode = get_post_meta( get_the_ID(), 'eafit_shortcode_contenido-del-shortcode', true )
     * Estilos adicionales (css) = get_post_meta( get_the_ID(), 'eafit_shortcode_estilos-adicionales-css', true )
     * Codigos adicionales (js) = get_post_meta( get_the_ID(), 'eafit_shortcode_codigos-adicionales-js', true )
     */

	// Attributes
	$atts = shortcode_atts(
		array(
			'name' => '',
		),
		$atts,
		'eafit_shortcode_generator'
	);
    $post = get_posts([
        'name'           => $atts['name'],
	    'post_type'      => 'eafit_s_generator',
	    'post_status'    => 'publish',
	    'posts_per_page' => 1
    ])[0];
    $post_id = $post->ID;
    $short_content = get_post_meta( $post_id, 'eafit_shortcode_contenido-del-shortcode', true );
    $short_css = get_post_meta( $post_id, 'eafit_shortcode_estilos-adicionales-css', true );
    $short_js = get_post_meta( $post_id, 'eafit_shortcode_codigos-adicionales-js', true );
    
    if ($atts['name'] != '') {
    ob_start();?>
    
        <div id="<?php echo $post->post_name;?>" class="eafit-shortcode">
            <?php echo $short_content; ?>    
        </div>
        <?php
        if ($short_css !='') {
            ?>
            <style>
                <?php echo $short_css; ?>
            </style>
            <?php
        }
        if ($short_js !='') {
            ?>
            <script>
                <?php echo $short_js; ?>
            </script>
            <?php
        }
        ?>
        <?php
    return ob_get_clean();
    }else{
        return '<div class="eafit-shortcode"><h1>Por favor ir al shortcode post y copiar el codigo que indica</h1></div>';
    }

}
add_shortcode( 'eafit_shortcode_generator', 'eafit_shortcode_generator_function' );