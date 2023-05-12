<?php
if (! function_exists('eafit_shortcodes_generator_post_types')) {
    # code...
    function eafit_shortcodes_generator_post_types(){
        $labels = array(
            'name'                  => _x( 'Codigos cortos', 'Post Type General Name', 'eafit_shortcode_generator' ),
            'singular_name'         => _x( 'Codigo corto', 'Post Type Singular Name', 'eafit_shortcode_generator' ),
            'menu_name'             => __( 'Codigos cortos', 'eafit_shortcode_generator' ),
            'name_admin_bar'        => __( 'Codigo corto', 'eafit_shortcode_generator' ),
            'archives'              => __( 'Codigos cortos', 'eafit_shortcode_generator' ),
            'attributes'            => __( 'Atributos del Codigo corto', 'eafit_shortcode_generator' ),
            'parent_item_colon'     => __( 'Codigo corto principal:', 'eafit_shortcode_generator' ),
            'all_items'             => __( 'Todos los Codigos cortos', 'eafit_shortcode_generator' ),
            'add_new_item'          => __( 'Añadir nuevo Codigo corto', 'eafit_shortcode_generator' ),
            'add_new'               => __( 'Añadir nuevo Codigo corto', 'eafit_shortcode_generator' ),
            'new_item'              => __( 'Nuevo Codigo corto', 'eafit_shortcode_generator' ),
            'edit_item'             => __( 'Editar Codigo corto', 'eafit_shortcode_generator' ),
            'update_item'           => __( 'Actualizar Codigo corto', 'eafit_shortcode_generator' ),
            'view_item'             => __( 'Ver Codigo corto', 'eafit_shortcode_generator' ),
            'view_items'            => __( 'Ver Codigos cortos', 'eafit_shortcode_generator' ),
            'search_items'          => __( 'Buscar Codigo corto', 'eafit_shortcode_generator' ),
            'not_found'             => __( 'No encontrado', 'eafit_shortcode_generator' ),
            'not_found_in_trash'    => __( 'Non encontrado en la basura', 'eafit_shortcode_generator' ),
            'featured_image'        => __( 'Imagen destacada', 'eafit_shortcode_generator' ),
            'set_featured_image'    => __( 'Conf. imagen destacada', 'eafit_shortcode_generator' ),
            'remove_featured_image' => __( 'Remover destacada', 'eafit_shortcode_generator' ),
            'use_featured_image'    => __( 'usar como imagen destacada', 'eafit_shortcode_generator' ),
            'insert_into_item'      => __( 'Insertar en un Codigo corto', 'eafit_shortcode_generator' ),
            'uploaded_to_this_item' => __( 'Actualizar Codigo corto', 'eafit_shortcode_generator' ),
            'items_list'            => __( 'Lista de Codigos cortos', 'eafit_shortcode_generator' ),
            'items_list_navigation' => __( 'Lista de navegación', 'eafit_shortcode_generator' ),
            'filter_items_list'     => __( 'Filtro de Codigos cortos', 'eafit_shortcode_generator' ),
        );
        $args = array(
            'label'                 => __( 'Codigo corto', 'eafit_shortcode_generator' ),
            'description'           => __( 'Codigo corto shortcodes para codigo HTML, embedibos y formulario scripts.', 'eafit_shortcode_generator' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'revisions', 'custom-fields' ),
            'taxonomies'            => array(),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-shortcode',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => true,
            'publicly_queryable'    => true,
            'rewrite'               => false,
            'capability_type'       => 'post',
            'show_in_rest'          => false,
        );
        register_post_type( 'eafit_s_generator', $args );
    }
    add_action( 'init', 'eafit_shortcodes_generator_post_types', 0 );
};