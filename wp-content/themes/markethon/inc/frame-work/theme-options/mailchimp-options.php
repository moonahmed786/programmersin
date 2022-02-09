<?php
/*
 * Header Options
 */
$opt_name;
Redux::setSection( $opt_name, array(
    'title'      => esc_html__( 'MailChimp Subscribe', 'markethon' ),
    'id'         => 'markethon-subscribe',
    'icon'       => 'el el-envelope',
    'fields'     => array(

        array(
            'id'        => 'markethon_subscribe',
            'type'      => 'text',
            'title'     => esc_html__( 'Subscribe Shortcode','markethon'),
            'subtitle'  => wp_kses( __( '<br />Put you Mailchimp for WP Shortcode here','markethon' ), array( 'br' => array() ) ),
        ),
     
    )) 
);
?>