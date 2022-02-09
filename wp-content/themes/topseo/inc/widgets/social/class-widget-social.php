<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

class Topseo_Widget_Social extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'description' => esc_html__( 'Social links', 'topseo' ) );

		parent::__construct( false, esc_html__( 'Social', 'topseo' ), $widget_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		$params = array();

		foreach ( $instance as $key => $value ) {
			$params[ $key ] = $value;
		}

		$title = $before_title . $params['widget-title'] . $after_title;
		unset( $params['widget-title'] );

		$filepath = get_template_directory()."/inc/widgets/social/views/widget.php";

		$instance      = $params;
		$before_widget = str_replace( 'class="', 'class="widget_social_links ', $before_widget );

		if ( file_exists( $filepath ) ) {
			include( $filepath );
		}
	}

	function update( $new_instance, $old_instance ) {
		$instance = wp_parse_args( (array) $new_instance, $old_instance );

		return $instance;
	}

	function form( $instance ) {

		$titles = array(
			'widget-title' => esc_html__( 'Social Title:', 'topseo' ),
			'google'       => esc_html__( 'Google URL:', 'topseo' ),
			'facebook'     => esc_html__( 'Facebook URL:', 'topseo' ),
			'twitter'      => esc_html__( 'Twitter URL:', 'topseo' ),
			'dribbble'     => esc_html__( 'Dribbble URL:', 'topseo' ),
			'vimeo-square' => esc_html__( 'Vimeo-square URL:', 'topseo' ),
			'linkedin'     => esc_html__( 'Linkedin URL:', 'topseo' ),
			'instagram'    => esc_html__( 'Instagram URL:', 'topseo' )
		);

		$instance = wp_parse_args( (array) $instance, $titles );

		foreach ( $instance as $key => $value ) {
			?>
			<p>
				<label><?php echo esc_html($titles[ $key ]); ?></label>
				<input class="widefat widget_social_link widget_link_field"
				       name="<?php echo esc_attr($this->get_field_name( $key )); ?>" type="text"
				       value="<?php echo ( $instance[ $key ] === $titles[ $key ] ) ? '' : $instance[ $key ]; ?>"/>
			</p>
		<?php
		}
	}
}
