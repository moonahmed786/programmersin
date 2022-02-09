<?php
/*
 * Social Network Options
 */
$opt_name;
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Social Media', 'markethon' ),
    'id'               => 'social_link',
    'icon'             => 'eicon-social-icons',  
    'fields'           => array(

        array(
            'id' => 'info_' . rand(10, 1000) ,
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),
            'title' => esc_html__('Social Media Options', 'markethon') ,
        ) ,

        array(
            'id' => 'section-general'. rand(10, 1000) ,
            'type' => 'section',
            'indent' => true
        ) ,

        array(
            'id'        => 'markethon_display_social_media',
            'type'      => 'button_set',
            'title'     => esc_html__( 'Display Social Media on Footer','markethon'),
            'options'   => array(
                            'yes' => esc_html__('Yes','markethon'),
                            'no' => esc_html__('No','markethon')
                        ),
            'default'   => esc_html__('no','markethon')
        ),

        array(
            'id'       => 'social-media-iq',
            'type'     => 'sortable',
            'title'    => esc_html__('Social Media Option', 'markethon'),
            'subtitle' => esc_html__('Enter social media url.', 'markethon'),
            'mode'     => 'text',
			'label'    => true,
            'options'  => array(
				'facebook-f'     => '',
				'twitter'        => '',
				'google-plus'  => '',
                'github'      	 => '',
				'instagram'      => '',
                'linkedin'       => '',
                'tumblr'         => '',
                'pinterest'      => '',
                'dribbble'       => '',
                'reddit'         => '',
                'flickr'         => '',
                'skype'          => '',
                'youtube-play'   => '',
                'vimeo'          => '',
                'soundcloud'     => '',
                'wechat'         => '',
                'renren'         => '',
                'weibo'          => '',
                'xing'           => '',
                'qq'             => '',
                'rss'            => '',
                'vk'             => '',
                'behance'        => '',
                'snapchat'       => '',
            ),           
           
        ),
    ),
) );
?>