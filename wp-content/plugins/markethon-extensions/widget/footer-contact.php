<?php

function markethon_contact_info() {
    register_widget( 'iq_contact' );
}
add_action( 'widgets_init', 'markethon_contact_info' );

/*-------------------------------------------
		markethon Contact Information widget 
--------------------------------------------*/
class iq_contact extends WP_Widget {
 
	function __construct() {
		parent::__construct(
 
			// Base ID of your widget
			'iq_contact', 
			
			// Widget name will appear in UI
			esc_html('markethon Contact', 'markethon'), 
 
			// Widget description
			array( 'description' => esc_html( 'markethon Contact. ', 'markethon' ), ) 
		);
	}
 
	// Creating widget front-end
	
	public function widget( $args, $instance ) {

		global $wp_registered_sidebars;
		$markethon_option = get_option('markethon_options');
		
        if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html( 'Contact Info', 'markethon' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$phone = isset( $instance['phone'] ) ? $instance['phone'] : false;
		$email = isset( $instance['email'] ) ? $instance['email'] : false;
		$address = isset( $instance['address'] ) ? $instance['address'] : false;
		

		/* here add extra display item  */  ?>

		<div class="widget"> <?php

			if ( $title ) {
				 ?><h4 class="footer-title contact-info"><?php echo $title ?></h4><?php
			} ?>

			<div class="row">
				<div class="col-sm-12">
					<ul class="iq-contact"> <?php
						if ( $phone ) :  ?>
							<li>							
							    <a href="tel:<?php echo str_replace(str_split('(),-" '), '',$markethon_option['phone']); ?>">
							    	<i class="fa fa-phone"></i>
							    	<span><?php echo esc_attr($markethon_option['phone']); ?></span>
							    </a>
							</li> <?php 
						endif; ?> <?php
						if ( $email ) :  ?>
							<li>							
							    <a href="mailto:<?php echo esc_html($markethon_option['email']); ?>">
							    	<i class="fa fa-envelope"></i>
							    	<span><?php echo esc_attr($markethon_option['email']); ?></span>
							    </a>
							</li> <?php 
						endif; ?> <?php
						if ( $address ) :  ?>						
							<li>
								<p>
									<i class="fa fa-map-marker"></i>
									<span><?php $address = $markethon_option['address']; echo esc_attr($address); ?></span>
								</p>
							</li> <?php 
						endif; ?>
					</ul>
				</div>
			</div>
			</div>	
	<?php	
	}
         
	// Widget Backend 
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$phone    = isset( $instance['phone'] ) ? (bool) $instance['phone'] : false;
		$email = isset( $instance['email'] ) ? (bool) $instance['email'] : false;
		$address = isset( $instance['address'] ) ? (bool) $instance['address'] : false;	
		?>
		
		<p><label for="<?php echo esc_html($this->get_field_id( 'title','markethon' )); ?>"><?php esc_html_e( 'Title:','markethon' ); ?></label>
		<input class="widefat" id="<?php echo esc_html($this->get_field_id( 'title','markethon' )); ?>" name="<?php echo esc_html($this->get_field_name( 'title','markethon')); ?>" type="text" value="<?php echo esc_html($title,'markethon'); ?>" /></p>
		
		<p><input class="checkbox" type="checkbox"<?php checked( $phone ); ?> id="<?php echo esc_html($this->get_field_id( 'phone','markethon' )); ?>" name="<?php echo esc_html($this->get_field_name( 'phone','markethon' )); ?>" />
		<label for="<?php echo esc_html($this->get_field_id( 'phone','markethon' )); ?>"><?php esc_html_e( 'Display Phone Number?','markethon' ); ?></label></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $email ); ?> id="<?php echo esc_html($this->get_field_id( 'email','markethon' )); ?>" name="<?php echo esc_html($this->get_field_name( 'email','markethon' )); ?>" />
		<label for="<?php echo esc_html($this->get_field_id( 'email','markethon' )); ?>"><?php esc_html_e( 'Display Email?','markethon' ); ?></label></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $address ); ?> id="<?php echo esc_html($this->get_field_id( 'address','markethon' )); ?>" name="<?php echo esc_html($this->get_field_name( 'address','markethon' )); ?>" />
		<label for="<?php echo esc_html($this->get_field_id( 'address','markethon' )); ?>"><?php esc_html_e( 'Display Address?','markethon' ); ?></label></p>
		
		<?php 					
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['phone'] = isset( $new_instance['phone'] ) ? (bool) $new_instance['phone'] : false;
		$instance['email'] = isset( $new_instance['email'] ) ? (bool) $new_instance['email'] : false;
		$instance['address'] = isset( $new_instance['address'] ) ? (bool) $new_instance['address'] : false;
		$instance['iq-contact'] = $new_instance['iq-contact'];
        return $instance;
	}
} 
/*---------------------------------------
		Class wpb_widget ends here
----------------------------------------*/