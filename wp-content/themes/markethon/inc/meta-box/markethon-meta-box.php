<?php
add_filter( 'rwmb_meta_boxes', 'markethon_meta_boxes' );
function markethon_meta_boxes( $meta_boxes ) {	

	// Team Member Details In Class
	$meta_boxes[] = array(
		'title'			=> esc_html__( 'Team Member Details','markethon' ),
		'post_types'	=> 'markethonteam',
		'fields'		=> array(
					
			array(
				'id'		=> 'markethon_team_designation',
				'name'		=> esc_html__( 'Trainer Designation :','markethon' ),				
				'type'		=> 'text'				
			),
			array(
				'type'	=>'divider',
			),
			array(
				'id'		=> 'markethon_team_facebook',
				'name'		=> esc_html__( 'Facebook Url :','markethon' ),				
				'type'		=> 'text'
			),
			array(
				'id'		=> 'markethon_team_twitter',
				'name'		=> esc_html__( 'Twitter Url :','markethon' ),				
				'type'		=> 'text'
			),
			array(
				'id'		=> 'markethon_team_google',
				'name'		=> esc_html__( 'Google Url :','markethon' ),				
				'type'		=> 'text'
			),
			array(
				'id'		=> 'markethon_team_github',
				'name'		=> esc_html__( 'Github Url :','markethon' ),				
				'type'		=> 'text'
			),
			array(
				'id'		=> 'markethon_team_insta',
				'name'		=> esc_html__( 'Instagram Url :','markethon' ),				
				'type'		=> 'text'
			),
			
		),
	);
	// Testimonial Member Details In Class
	$meta_boxes[] = array(
		'title'			=> esc_html__( 'Testimonial Member Details','markethon' ),
		'post_types'	=> 'testimonial',
		'fields'		=> array(
					
			array(
				'id'		=> 'markethon_testimonial_designation',
				'name'		=> esc_html__( 'Designation :','markethon' ),				
				'type'		=> 'text'				
			),
			array(
				'id'		=> 'markethon_testimonial_company',
				'name'		=> esc_html__( 'Company :','markethon' ),				
				'type'		=> 'text'				
			),
		),
	);

	
	// Portfolio Member Details In Class
	$meta_boxes[] = array(
		'title'			=> esc_html__( 'Portfolio Project Details','markethon' ),
		'post_types'	=> 'portfolio',
		'fields'		=> array(
					
			array(
				'id'		=> 'markethon_portfolio_client',
				'name'		=> esc_html__( 'Created by:','markethon' ),				
				'type'		=> 'text'				
			),

			array(
				'id'		=> 'markethon_portfolio_dob',
				'name'		=> esc_html__( 'Date of Birth:','markethon' ),				
				'type'		=> 'text'				
			),

			array(
				'id'		=> 'markethon_portfolio_city',
				'name'		=> esc_html__( 'City :','markethon' ),				
				'type'		=> 'text'				
			),

			array(
				'type'	=>'divider',
			),

			array(
				'id'		=> 'markethon_portfolio_facebook',
				'name'		=> esc_html__( 'Facebook Url :','markethon' ),				
				'type'		=> 'text'
			),

			array(
				'id'		=> 'markethon_portfolio_twitter',
				'name'		=> esc_html__( 'Twitter Url :','markethon' ),				
				'type'		=> 'text'
			),

			array(
				'id'		=> 'markethon_portfolio_google',
				'name'		=> esc_html__( 'Google Url :','markethon' ),				
				'type'		=> 'text'
			),

			array(
				'id'		=> 'markethon_portfolio_github',
				'name'		=> esc_html__( 'Github Url :','markethon' ),				
				'type'		=> 'text'
			),

			array(
				'id'		=> 'markethon_portfolio_insta',
				'name'		=> esc_html__( 'Instagram Url :','markethon' ),				
				'type'		=> 'text'
			),

			array(
				'type'	=>'divider',
			),

		),
	);

	$meta_boxes[] = array(
		"title"			=> esc_html__( "Portfolio Details Page Image","markethon" ),
		"post_types"	=> "portfolio",
		"context" => "side",
		"fields"		=> array(

			array(
				"id"		=> "iq_portfolio_detail_image",
				"name"		=> esc_html__( "Select Image:","markethon" ),				
				"type"		=> "image_advanced",
				"max_file_uploads" => 1,			
			),
				
		),
	);

	$meta_boxes[] = array(
		"title"			=> esc_html__( "Portfolio  Masonry Image","markethon" ),
		"post_types"	=> "portfolio",
		"context" => "side",
		"fields"		=> array(

			array(
				"id"		=> "iq_portfolio_masonry_image",
				"name"		=> esc_html__( "Select Image:","markethon" ),				
				"type"		=> "image_advanced",
				"max_file_uploads" => 1,			
			),
				
		),
	);

	return $meta_boxes;
}
?>