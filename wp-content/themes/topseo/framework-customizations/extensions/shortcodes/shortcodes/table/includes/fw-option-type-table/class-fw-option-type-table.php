<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

class FW_Option_Type_Table extends FW_Option_Type
{
	protected function _init() {}

	public function get_type() {
		return 'table';
	}

	/**
	 * @internal
	 * {@inheritdoc}
	 */
	protected function _enqueue_static( $id, $option, $data ) {
		$table_shortcode = fw()->extensions->get( 'shortcodes' )->get_shortcode( 'table' );

		$static_uri = $table_shortcode->get_declared_uri() . '/includes/fw-option-type-table/static/';

		wp_enqueue_style( 'fw-font-awesome' );

		wp_enqueue_style(
			'fw-option-' . $this->get_type() . '-default',
			$static_uri . 'css/default-styles.css',
			array(),
			fw()->theme->manifest->get_version()
		);
		wp_enqueue_style(
			'fw-option-' . $this->get_type() . '-extended',
			$static_uri . 'css/extended-styles.css',
			array(),
			fw()->theme->manifest->get_version()
		);
		wp_enqueue_script(
			'fw-option-' . $this->get_type(),
			$static_uri . 'js/scripts.js',
			array( 'jquery', 'fw-events', 'jquery-ui-sortable' ),
			fw()->theme->manifest->get_version(),
			true
		);

		$localization_array = array(
			'msgEdit' => esc_html__( 'Edit', 'topseo' ),
			'maxCols' => apply_filters( 'fw_ext_shortcodes_table_max_columns', 6 )
		);


		wp_localize_script( 'fw-option-' . $this->get_type(), 'localizeTableBuilder', $localization_array );
		fw()->backend->option_type( 'popup' )->enqueue_static();
		fw()->backend->option_type( 'textarea-cell' )->enqueue_static();
	}


	/**
	 * @internal
	 */
	protected function _render( $id, $option, $data ) {
		$table_shortcode = fw()->extensions->get( 'shortcodes' )->get_shortcode( 'table' );

		if ( ! $table_shortcode ) {
			trigger_error(
				esc_html__( 'table-builder option type must be inside the table shortcode', 'topseo' ),
				E_USER_ERROR
			);
		}

		if ( ! isset( $data['value'] ) || empty( $data['value'] ) ) {
			$data['value'] = $option['value'];
		}

		$this->replace_with_defaults( $option );
		$view_path = $table_shortcode->get_declared_path() . '/includes/fw-option-type-table/views/view.php';

		return fw_render_view( $view_path, array(
			'id'     => $option['attr']['id'],
			'option' => $option,
			'data'   => $data,
		) );
	}

	protected function replace_with_defaults( &$option ) {
		$defaults                                           = $this->_get_defaults();
		$option['header_options']                           = $defaults['header_options'];
		$option['row_options']                              = $defaults['row_options'];
		$option['columns_options']                          = $defaults['columns_options'];
		$option['content_options']                          = $defaults['content_options'];
		$option['row_options']['name']['attr']['class']     = isset( $option['row_options']['name']['attr']['class'] ) ? $option['row_options']['name']['attr']['class'] . ' fw-table-builder-row-style' : 'fw-table-builder-row-style';
		$option['columns_options']['name']['attr']['class'] = isset( $option['columns_options']['name']['attr']['class'] ) ? $option['columns_options']['name']['attr']['class'] . ' fw-table-builder-col-style' : 'fw-table-builder-col-style';
	}

	/**
	 * @internal
	 */
	protected function _get_value_from_input( $option, $input_value ) {

		if ( ! is_array( $input_value ) ) {
			return $option['value'];
		}


		if ( ! isset( $input_value['content'] ) || empty( $input_value['content'] ) ) {
			$input_value['content'] = $option['value']['content'];
		}

		if ( ! isset( $input_value['rows'] ) || empty( $input_value['rows'] ) ) {
			$input_value['rows'] = $option['value']['rows'];
		}

		if ( ! isset( $input_value['cols'] ) || empty( $input_value['cols'] ) ) {
			$input_value['cols'] = $option['value']['cols'];
		}

		if ( isset( $input_value['content']['_template_key_row_'] ) ) {
			unset( $input_value['content']['_template_key_row_'] );
		}

		if ( isset( $input_value['rows']['_template_key_row_'] ) ) {
			unset( $input_value['rows']['_template_key_row_'] );
		}

		$value = array();
		if ( is_array( $input_value ) ) {
			if ( isset( $input_value['rows'] ) ) {
				$i = 0;
				foreach ($input_value['rows'] as $input_val) {
					$value['rows'][$i] = $input_val;
					$i++;
				}
			}

			if ( isset( $input_value['cols'] ) && is_array($input_value['cols']) ) {
				$value['cols'] =  $input_value['cols'] ;
			}

			if ( isset( $input_value['header_options'] ) and is_array( $input_value['header_options'] ) ) {
				$value['header_options'] = $input_value['header_options'];
			}


			if ( isset( $input_value['content'] ) && is_array( $input_value['content'] ) ) {
				$row_count = 0;
				foreach ( $input_value['content'] as $row => $input_value_rows_data ) {
					$cols = array();

					foreach ( $input_value_rows_data as $column => $input_value_cols_data ) {
						$row_name = $input_value['rows'][ $row ]['name'];

						foreach ( $option['content_options'][ $row_name ] as $id => $options ) {
							if ( $value['cols'][$column]['name'] == 'desc-col' ) {
								$cols[ $column ][ 'textarea' ] = fw()->backend->option_type( 'textarea-cell' )->get_value_from_input( $options, $input_value_cols_data[ 'default-row' ][ 'textarea-' . $row . '-' . $column ] );
								continue;
							}
							$cols[ $column ][ $id ] = fw()->backend->option_type( $options['type'] )->get_value_from_input( $options, $input_value_cols_data[ $row_name ][ $id . '-' . $row . '-' . $column ] );
						}

					}
					$value['content'][ $row_count++ ] = $cols;
				}
			}


		}

		return $value;
	}

	/**
	 * @internal
	 */
	protected function _get_defaults() {
		return apply_filters( 'fw_option_type_table_defaults', array(
			'header_options'  => array(
				'table_purpose' => array(
					'type'    => 'select',
					'label'   => esc_html__( 'Table Styling', 'topseo' ),
					'desc'    => esc_html__( 'Choose the table styling options', 'topseo' ),
					'choices' => array(
						'pricing' => esc_html__( 'Use the table as a pricing table', 'topseo' ),
						'tabular' => esc_html__( 'Use the table to display tabular data', 'topseo' ),
					),
					'value'   => 'pricing',
					'attr'    => array(
						'data-allowed-rows' => json_encode( array(
								'pricing' => 'default-row heading-row pricing-row button-row switch-row image-row',
								'tabular' => 'default-row heading-row'
							)
						),
						'data-allowed-cols' => json_encode( array(
							'pricing' => 'default-col highlight-col desc-col',
							'tabular' => 'default-col desc-col'
						) ),
					)
				)
			),
			'row_options'     => array(
				'name' => array(
					'type'    => 'select',
					'label'   => false,
					'desc'    => false,
					'choices' => array(
						'default-row' => esc_html__( 'Default row', 'topseo' ),
						'heading-row' => esc_html__( 'Heading row', 'topseo' ),
						'pricing-row' => esc_html__( 'Pricing row', 'topseo' ),
						'button-row'  => esc_html__( 'Button row', 'topseo' ),
						'switch-row'  => esc_html__( 'Row switch', 'topseo' ),
						'image-row'  => esc_html__( 'Row image', 'topseo' )
					),
				)
			),
			'columns_options' => array(
				'name' => array(
					'type'    => 'select',
					'label'   => false,
					'desc'    => false,
					'choices' => array(
						'default-col'   => esc_html__( 'Default column', 'topseo' ),
						'desc-col'      => esc_html__( 'Description column', 'topseo' ),
						'highlight-col' => esc_html__( 'Highlight column', 'topseo' ),
						'center-col'    => esc_html__( 'Center text column', 'topseo' )
					),
				)
			),
			'content_options' => array(
				'default-row' => array(
					'textarea' => array(
						'type'  => 'textarea-cell',
						'label' => false,
						'desc'  => false,
						'value' => '',
					)
				),
				'heading-row' => array(
					'textarea' => array(
						'type'  => 'textarea-cell',
						'label' => false,
						'desc'  => false,
						'value' => '',
					)
				),
				'pricing-row' => array(
					'amount'      => array(
						'type'         => 'text',
						'label'        => false,
						'desc'         => false,
						'value'        => '',
						'wrapper_attr' => array(
							'class' => 'fw-col-sm-6'
						)
					),
					'description' => array(
						'type'         => 'text',
						'label'        => false,
						'desc'         => false,
						'value'        => '',
						'attr'         => array(
							'placeholder' => esc_html__( 'per month', 'topseo' )
						),
						'wrapper_attr' => array(
							'class' => 'fw-col-sm-6'
						)
					),
				),
				'button-row'  => array(
					'button' => ( $button = fw()->extensions->get( 'shortcodes' )->get_shortcode( 'button' ) )
						? array(
							'type'          => 'popup',
							'popup-title'   => esc_html__( 'Button', 'topseo' ),
							'button'        => esc_html__( 'Add', 'topseo' ),
							'popup-options' => $button->get_options()
						)
						: array()
				),
				'switch-row'  => array(
					'switch' => array(
						'label'        => false,
						'type'         => 'switch',
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'topseo' )
						),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'topseo' )
						),
						'value'        => 'no',
						'desc'         => false,
					)
				),
				'image-row'  => array(
					'image' => array(
						'label'        => false,
						'type'         => 'upload',
						'desc'         => false,
					),
					'text' => array(
						'label'        => false,
						'type'         => 'text',
						'desc'         => false,
					),
				)

			),
			'value'           => array(
				'header_options' => array(
					'table_purpose' => 'pricing',
				),
				'cols'           => array(
					array( 'name' => 'default-col' ),
					array( 'name' => 'default-col' ),
					array( 'name' => 'default-col' )
				),
				'rows'           => array(
					array( 'name' => 'default-row' ),
					array( 'name' => 'default-row' ),
					array( 'name' => 'default-row' )
				),
				'content'        => $this->_fw_generate_default_values()
			)
		) );
	}

	private function _fw_generate_default_values( $cols = 3, $rows = 3 ) {
		$result = array();
		for ( $i = 0; $i < $rows; $i ++ ) {
			for ( $j = 0; $j < $cols; $j ++ ) {
				$result[ $i ][ $j ] = array(
					'textarea' => '',
					'amount' => '',
					'description' => '',
					'switch' => 'no',
					'button' => '',
					'image' => '',
				);
			}
		}

		return $result;
	}


	/**
	 * @internal
	 */
	public function _get_backend_width_type() {
		return 'full';
	}

}

FW_Option_Type::register( 'FW_Option_Type_Table' );