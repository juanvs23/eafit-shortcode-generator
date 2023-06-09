<?php
/**
 * Generated by the WordPress Meta Box Generator
 * https://jeremyhixon.com/tool/wordpress-meta-box-generator/
 * 
 * Retrieving the values:
 * Contenido del shortcode = get_post_meta( get_the_ID(), 'eafit_shortcode_contenido-del-shortcode', true )
 * Estilos adicionales (css) = get_post_meta( get_the_ID(), 'eafit_shortcode_estilos-adicionales-css', true )
 * Codigos adicionales (js) = get_post_meta( get_the_ID(), 'eafit_shortcode_codigos-adicionales-js', true )
 * Tipo de embebido = get_post_meta( get_the_ID(), 'eafit_shortcode_tipo-de-embebido', true )
 */
class eafitShortcode {
	private $config = [
            "title" => "Eafit shortcodes content",
            "prefix" => "eafit_shortcode_",
            "domain" => "eafit_shortcode_generator",
            "class_name" => "eafitShortcode",
            "post-type" => ["eafit_s_generator"],
            "context" => "normal",
            "priority" => "high",
            "cpt" => "eafit_s_generator",
            "fields" => [
                            [
                                "type" => "textarea","label" => "Contenido del shortcode","rows" => "10","id" => "eafit_shortcode_contenido-del-shortcode"
                            ],
                            [
                                "type"=>"textarea","label"=>"Estilos adicionales (css)","rows"=>"10","id"=>"eafit_shortcode_estilos-adicionales-css"
                            ],
                            [
                                "type"=>"textarea","label"=>"Codigos adicionales (js)","rows"=>"10","id"=>"eafit_shortcode_codigos-adicionales-js"
                            ],
                           /* [
                                "type"=>"select","label"=>"Tipo de embebido","options"=>"\\\"\\\" : Seleccione una opcion\r\nhtml : Codigo HTML\r\nyoutube : Youtube\r\ngenially : Genially\r\nmaps : Google maps","id"=>"eafit_shortcode_tipo-de-embebido"
                            ]*/
                        ]
            ];

	public function __construct() {
		
		$this->process_cpts();
		add_action( 'add_meta_boxes', [ $this, 'add_meta_boxes' ] );
		add_action( 'save_post', [ $this, 'save_post' ] );
	}

	public function process_cpts() {
		if ( !empty( $this->config['cpt'] ) ) {
			if ( empty( $this->config['post-type'] ) ) {
				$this->config['post-type'] = [];
			}
			$parts = explode( ',', $this->config['cpt'] );
			$parts = array_map( 'trim', $parts );
			$this->config['post-type'] = array_merge( $this->config['post-type'], $parts );
		}
	}

	public function add_meta_boxes() {
		foreach ( $this->config['post-type'] as $screen ) {
			add_meta_box(
				sanitize_title( $this->config['title'] ),
				$this->config['title'],
				[ $this, 'add_meta_box_callback' ],
				$screen,
				$this->config['context'],
				$this->config['priority']
			);
		}
	}

	public function save_post( $post_id ) {
		foreach ( $this->config['fields'] as $field ) {
			switch ( $field['type'] ) {
				default:
					if ( isset( $_POST[ $field['id'] ] ) ) {
						//$sanitized = sanitize_text_field( $_POST[ $field['id'] ] );
						update_post_meta( $post_id, $field['id'],$_POST[ $field['id'] ]);
					}
			}
		}
	}

	public function add_meta_box_callback() {
		$this->fields_table();
	}

	private function fields_table() {
        global $post;
       
		?><table class="form-table" role="presentation">
			<tbody>
                <?php
                if ($post->post_name !== '') {
                ?>
                <tr>
                <th scope="row"><p class="description">Copiar y pegar el shortcode</p></th>
                <td>
                <div class="get-code-shortcode">
                <code>[eafit_shortcode_generator name="<?php echo $post->post_name; ?>"]</code>
            </div>
                </td>
                </tr>
                <?php } ?>
                <?php
				foreach ( $this->config['fields'] as $field ) {
					?><tr>
						<th scope="row"><?php $this->label( $field ); ?></th>
						<td><?php $this->field( $field ); ?></td>
					</tr><?php
				}
			?></tbody>
		</table><?php
	}

	private function label( $field ) {
		switch ( $field['type'] ) {
			default:
				printf(
					'<label class="" for="%s">%s</label>',
					$field['id'], $field['label']
				);
		}
	}

	private function field( $field ) {
		switch ( $field['type'] ) {
			case 'select':
				$this->select( $field );
				break;
			case 'textarea':
				$this->textarea( $field );
				break;
			default:
				$this->input( $field );
		}
	}

	private function input( $field ) {
		printf(
			'<input class="regular-text %s" id="%s" name="%s" %s type="%s" value="%s">',
			isset( $field['class'] ) ? $field['class'] : '',
			$field['id'], $field['id'],
			isset( $field['pattern'] ) ? "pattern='{$field['pattern']}'" : '',
			$field['type'],
			$this->value( $field )
		);
	}

	private function select( $field ) {
		printf(
			'<select id="%s" name="%s">%s</select>',
			$field['id'], $field['id'],
			$this->select_options( $field )
		);
	}

	private function select_selected( $field, $current ) {
		$value = $this->value( $field );
		if ( $value === $current ) {
			return 'selected';
		}
		return '';
	}

	private function select_options( $field ) {
		$output = [];
		$options = explode( "\r\n", $field['options'] );
		$i = 0;
		foreach ( $options as $option ) {
			$pair = explode( ':', $option );
			$pair = array_map( 'trim', $pair );
			$output[] = sprintf(
				'<option %s value="%s"> %s</option>',
				$this->select_selected( $field, $pair[0] ),
				$pair[0], $pair[1]
			);
			$i++;
		}
		return implode( '<br>', $output );
	}

	private function textarea( $field ) {
        global $post;
      /*   if (  $field['id'] == 'eafit_shortcode_contenido-del-shortcode') {
            echo '<div class="preview-content">';
            echo '<p class="description">Vista previa</p>';
             $value =$this->value( $field );
             echo $value;
            echo '</div>';
            } */
		printf(
			'<textarea class="regular-text" id="%s" name="%s" rows="%d">%s</textarea>',
			$field['id'], $field['id'],
			isset( $field['rows'] ) ? $field['rows'] : 5,
			$this->value( $field )
		);
	}

	private function value( $field ) {
		global $post;
		if ( metadata_exists( 'post', $post->ID, $field['id'] ) ) {
			$value = get_post_meta( $post->ID, $field['id'], true );
		} else if ( isset( $field['default'] ) ) {
			$value = $field['default'];
		} else {
			return '';
		}
		return str_replace( '\u0027', "'", $value );
	}

}
new eafitShortcode;