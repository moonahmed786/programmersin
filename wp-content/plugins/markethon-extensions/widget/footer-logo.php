<?php

function markethon_footer_logo_widgets() {
	register_widget( 'iq_footer_logo' );
}
add_action( 'widgets_init', 'markethon_footer_logo_widgets' );

/*-------------------------------------------
		markethon Contact Information widget 
--------------------------------------------*/
class iq_footer_logo extends WP_Widget {
 
	function __construct() {
		parent::__construct(
 
			// Base ID of your widget
			'iq_footer_logo', 
			
			// Widget name will appear in UI
			esc_html('markethon Footer Logo', 'markethon'), 
 
			// Widget description
			array( 'description' => esc_html( 'markethon logo. ', 'markethon' ), ) 
		);
	}
 
	// Creating widget front-end
	
	public function widget( $args, $instance ) {

        if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		global $wp_registered_sidebars;
		$markethon_option = get_option('markethon_options');

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '' ;
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base ); ?>

		<div class="footer-logo">
			<a href="<?php  echo esc_url( home_url( '/' ) ); ?>"> <?php  
				if(isset($markethon_option['logo_footer']['url'])){ 
				    $footer_logo = $markethon_option['logo_footer']['url'];  ?>
			        <img class="img-fluid" src="<?php echo esc_url($footer_logo); ?>" alt="<?php  esc_attr_e( 'markethon1', 'markethon' ); ?>"> <?php 
			    }  else { ?>
			        <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-white.png" alt="<?php  esc_attr_e( 'markethon2', 'markethon' ); ?>"> <?php 
			    } ?>
			</a>
		</div> <?php

	}
         
	// Widget Backend 
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : ''; ?>
		
		<p>
			<label for="<?php echo esc_html($this->get_field_id( 'title','markethon' )); ?>"><?php esc_html_e( 'Title:','markethon' ); ?></label>
		    <input class="widefat" id="<?php echo esc_html($this->get_field_id( 'title','markethon' )); ?>" name="<?php echo esc_html($this->get_field_name( 'title','markethon')); ?>" type="text" value="<?php echo esc_html($title,'markethon'); ?>" />
		</p> <?php 
							
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
        return $instance;
	}
} 
/*---------------------------------------
		Class wpb_widget ends here
----------------------------------------*/
