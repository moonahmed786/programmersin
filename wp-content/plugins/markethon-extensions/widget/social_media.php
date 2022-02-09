<?php

function markethon_social_media_widgets() {
	register_widget( 'iq_socail_media' );
}
add_action( 'widgets_init', 'markethon_social_media_widgets' );

/*-------------------------------------------
		markethon Contact Information widget 
--------------------------------------------*/
class iq_socail_media extends WP_Widget {
 
	function __construct() {
		parent::__construct(
 
			// Base ID of your widget
			'iq_socail_media', 
			
			// Widget name will appear in UI
			esc_html('markethon Social Media', 'markethon'), 
 
			// Widget description
			array( 'description' => esc_html( 'markethon social media. ', 'markethon' ), ) 
		);
	}
 
	// Creating widget front-end
	
	public function widget( $args, $instance ) {
        if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html( 'Social Media', 'markethon' );
		
		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		
		
		//$args['after_widget'];

		/* here add extra display item  */ 
		
	
		$iq_contact = isset($instance[ 'iq-contact' ]) ? $instance['iq-contact'] : '';
				
	
		$markethon_option = get_option('markethon_options'); 
		if(isset($markethon_option['social-media-iq'])){ 
			$top_social = $markethon_option['social-media-iq']; 
		?>
		<span class="text-white d-inline"><?php esc_html("Follow Us :"); ?></span>
		<ul class="info-share d-inline">
		<?php 
			$i = 1;
			foreach($top_social as $key=>$value){		
				if( $i < 9 ){
					if($value){
			echo '<li><a href="'.$value.'"><i class="fa fa-'.$key.'"></i></a></li>';
					}
				$i++;
			}
		} 
		?>
		</ul>
		
		<?php	
		}				

	}
         
	// Widget Backend 
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
				
		?>
		
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
/*---------------------------------------
		Class wpb_widget ends here
----------------------------------------*/	