<?php
// -> START Contact
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Contact', 'markethon' ),
        'id'    => 'Contact', 
        'icon'  => 'eicon-map-pin',
        'desc'  => esc_html__( '', 'markethon' ),
		'fields'           => array(

            array(
                'id'       => 'address',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Address', 'markethon' ),
                'subtitle' => esc_html__( 'Subtitle', 'markethon' ),
                'desc'     => esc_html__( 'Field Description', 'markethon' ),
                'default'  => esc_html__('1234 North Avenue Luke Lane, South Bend, IN 360001','markethon' ),
            ),
            
			array(
                'id'       => 'phone',
                'type'     => 'text',
                'title'    => esc_html__( 'Phone', 'markethon' ),
                'subtitle' => esc_html__( 'Subtitle', 'markethon' ),
                'desc'     => esc_html__( 'Field Description', 'markethon' ),
                'preg' => array(
                    'pattern' => '/[^0-9_ -+()]/s', 
                    'replacement' => ''
                ),
                'default'  => esc_html__('+0123456789','markethon' ),
            ),
			
			array(
                'id'       => 'email',
                'type'     => 'text',
                'title'    => esc_html__( 'Email', 'markethon' ),
                'desc'     => esc_html__( 'Field Description', 'markethon' ),
                'validate' => 'email',
                'msg'      => esc_html__('custom error message','markethon' ),
                'default'  => esc_html__('support@iqnonicthemes.com','markethon' ),
            ),
						
        )
        
    ) );
?>