<?php

function markethon_recent_post_widgets() {
	register_widget( 'iq_subscribe' );
}
add_action( 'widgets_init', 'markethon_recent_post_widgets' );

/*-------------------------------------------
		iqonic Contact Information widget
--------------------------------------------*/
class iq_subscribe extends WP_Widget {

	function __construct() {
		parent::__construct(

			// Base ID of your widget
			'iq_subscribe',

			// Widget name will appear in UI
			esc_html('markethon Recent Post', 'markethon'),

			// Widget description
			array( 'description' => esc_html( 'markethon most recent Posts. ', 'markethon' ), )
		);
	}

	// Creating widget front-end

	public function widget( $args, $instance ) {

        if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html( 'Recent Post', 'markethon' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
		$show_name = isset( $instance['show_name'] ) ? $instance['show_name'] : false;

		/* here add extra display item  */

		$iq_contact = isset($instance[ 'iq-contact' ]) ? $instance['iq-contact'] : ''; ?>

		<div class="iq-widget-menu widget"> <?php 
		    if ( $title ) {
				echo ($args['before_title'] . $title . $args['after_title']);
			} ?>
            <div class="list-inline iq-widget-menu">
				<ul class="iq-post"> <?php
					$args = array( 'post_type' => 'post', 'posts_per_page' => $number, );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); ?>
		                <li> <?php
							if($iq_contact){
								foreach($iq_contact as $iq_contacts){ ?>
									<div class="post-img"> <?php
										if($iq_contacts == "image"){ ?>
											<?php the_post_thumbnail ('thumbnail'); ?> <?php
										} ?>
										<div class="post-blog">
											<div class="blog-box">
												<a class="new-link" href="<?php echo esc_url(get_permalink($loop->ID)); ?>">
													<h6 class="title"><?php the_title(); ?></h6>
												</a>
												<ul class="list-inline"> <?php
													if ( $show_date ) : ?>
													        <li class="list-inline-item  mr-3">
													        	<a href="<?php echo esc_url(get_permalink($loop->ID)); ?>"> <?php
																	$archive_year  = get_the_time('Y', get_the_ID());
																	$archive_month = get_the_time('F', get_the_ID()); 
																	$archive_day   = get_the_time('d', get_the_ID());
																	//$date=date_create($iq_contacts->post_date); ?>
                                                                           
													        		<?php 
													        		echo esc_html($archive_month.' '.$archive_year);
													        		//echo $archive_year;
													        		//echo get_the_date();  ?>
													        	</a>
													        </li> <?php 
													endif; ?> <?php
													if ( $show_name ) : ?>
													    <li class="list-inline-item  mr-3">
													    	<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
													    		<i class="fa fa-user mr-2" aria-hidden="true"></i><?php the_author();  ?>
													    	</a>
													    </li> <?php 
													endif; ?>
												</ul>
												
											</div>
					                    </div>
				                    </div> <?php
			                    }
                            } ?>
		                </li> <?php
		            endwhile; 
                            wp_reset_postdata(); ?>
				</ul>
			</div>
		</div> <?php

	}

	// Widget Backend
	public function form( $instance ) {

		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		$show_name = isset( $instance['show_name'] ) ? (bool) $instance['show_name'] : false;

		if ( isset( $instance[ 'iq-contact' ] ) ) {
			$iq_contact = $instance[ 'iq-contact' ];
			foreach($iq_contact as $iq_contacts){

				if($iq_contacts == "image"){ $ch_image = "checked"; }
			}
		} ?>

		<p>
			<label for="<?php echo esc_html($this->get_field_id( 'title','markethon' )); ?>"><?php esc_html_e( 'Title:','markethon' ); ?></label>
		    <input class="widefat" id="<?php echo esc_html($this->get_field_id( 'title','markethon' )); ?>" name="<?php echo esc_html($this->get_field_name( 'title','markethon')); ?>" type="text" value="<?php echo esc_html($title,'markethon'); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_html($this->get_field_id( 'number','markethon' )); ?>"><?php esc_html_e( 'Number of posts to show:','markethon' ); ?></label>
		    <input class="tiny-text" id="<?php echo esc_html($this->get_field_id( 'number','markethon' )); ?>" name="<?php echo esc_html($this->get_field_name( 'number','markethon' )); ?>" type="number" step="1" min="1" value="<?php echo esc_html($number,'markethon'); ?>" size="3" />
		</p>

		<p>
			<input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo esc_html($this->get_field_id( 'show_date','markethon' )); ?>" name="<?php echo esc_html($this->get_field_name( 'show_date','markethon' )); ?>" />
		    <label for="<?php echo esc_html($this->get_field_id( 'show_date','markethon' )); ?>"><?php esc_html_e( 'Display post Date?','markethon' ); ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox"<?php checked( $show_name ); ?> id="<?php echo esc_html($this->get_field_id( 'show_name','markethon' )); ?>" name="<?php echo esc_html($this->get_field_name( 'show_name','markethon' )); ?>" />
		    <label for="<?php echo esc_html($this->get_field_id( 'show_name','markethon' )); ?>"><?php esc_html_e( 'Display post Author Name?','markethon' ); ?></label>
		</p>

        <p>
 		    <input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'iq-contact','markethon')); ?>" name="<?php echo esc_html($this->get_field_name( 'iq-contact[]','markethon' )); ?>" value="image" <?php if(isset($ch_image)) echo esc_html($ch_image,'markethon'); ?>>
            <label for="<?php echo esc_html($this->get_field_id( 'title','markethon' )); ?>"><?php echo esc_html('Image', 'markethon'); ?></label></br />
        </p> <?php

	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$instance['show_name'] = isset( $new_instance['show_name'] ) ? (bool) $new_instance['show_name'] : false;
		$instance['iq-contact'] = $new_instance['iq-contact'];
        return $instance;
	}
}
/*---------------------------------------
		Class wpb_widget ends here
----------------------------------------*/
