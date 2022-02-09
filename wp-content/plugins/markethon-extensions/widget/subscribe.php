<?php

function markethon_subscribe_widgets() {
	register_widget( 'iq_contact_info' );
}
add_action( 'widgets_init', 'markethon_subscribe_widgets' );

/*-------------------------------------------
		markethon Contact Information widget 
--------------------------------------------*/
class iq_contact_info extends WP_Widget {
 
	function __construct() {
		parent::__construct(
 
			// Base ID of your widget
			'iq_contact_info', 
			
			// Widget name will appear in UI
			esc_html('markethon Subscribe', 'markethon'), 
 
			// Widget description
			array( 'description' => esc_html( 'markethon subscribe. ', 'markethon' ), ) 
		);
	}
 
	// Creating widget front-end
	
	public function widget( $args, $instance ) {

        if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html( '', 'markethon' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}

		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
		$show_author = isset( $instance['show_author'] ) ? $instance['show_author'] : false;

		/* here add extra display item  */ 
		$iq_contact = isset($instance[ 'iq-contact' ]) ? $instance['iq-contact'] : ''; ?>

		<div class="widget"> <?php
			if ( $title ) {
				echo ($args['before_title'] . $title . $args['after_title']);
			}
			$markethon_option = get_option('markethon_options');
			if(isset($markethon_option['markethon_subscribe'])){ 
				$markethon_subscribe = $markethon_option['markethon_subscribe']; 
			}
			echo do_shortcode($markethon_subscribe); ?>
		</div> <?php
				
	}
         
	// Widget Backend 
	public function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : ''; ?>
		
		<p><label for="<?php echo esc_html($this->get_field_id( 'title','markethon' )); ?>"><?php esc_html_e( 'Title:','markethon' ); ?></label>
		<input class="widefat" id="<?php echo esc_html($this->get_field_id( 'title','markethon' )); ?>" name="<?php echo esc_html($this->get_field_name( 'title','markethon')); ?>" type="text" value="<?php echo esc_html($title,'markethon'); ?>" /></p>
		
		<?php 
							
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
        return $instance;
	}
}