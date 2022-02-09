<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

class markethon_Team extends Widget_Base {

	public function get_name() {
		return __( 'team', 'markethon' );
	}
	
	public function get_title() {
		return __( 'markethon Team', 'markethon' );
	}

	public function get_categories() {
		return [ 'markethon' ];
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve heading widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-person';
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_Team',
			[
				'label' => __( 'Team', 'markethon' ),
			]
		);

		$this->add_control(
			'team_style',
			[
				'label'      => __( 'Team Style', 'markethon' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => '1',
				'options'    => [					
					'1'          => __( 'Style 1', 'markethon' ),
					'2'          => __( 'Style 2', 'markethon' ),					
				],
			]
		);

		$this->add_control(
			'team_display',
			[
				'label'      => __( 'Team Layout', 'markethon' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => '1',
				'condition' => [
					'team_style' => '1',
				],
				'options'    => [					
					'slider'          => __( 'Slider', 'markethon' ),
					'grid'          => __( 'Grid', 'markethon' ),					
				],
			]
		);
        $this->end_controls_section();


        /*------------ Slider Layout ----------*/
        $this->start_controls_section(
            'iq_slider_layout',
            [
                'label' => esc_html__( 'Slider Layout', 'markethon' ),
                'condition' => [
					'team_style' => '1',
					'team_display' => 'slider',
				],
            ]
        );

        $this->add_control(
			'desk_number',
			[
				'label' => __( 'Desktop view', 'markethon' ),
				'type' => Controls_Manager::NUMBER,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'team_style' => '1',
					'team_display' => 'slider',
				],
				'label_block' => true,
				'min'       => 1,
                'max'       => 30,
                'default'   => 3,
			]
		);

		$this->add_control(
			'lap_number',
			[
				'label' => __( 'Laptop view', 'markethon' ),
				'type' => Controls_Manager::NUMBER,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'team_style' => '1',
					'team_display' => 'slider',
				],
				'label_block' => true,
				'min'       => 1,
                'max'       => 30,
                'default'   => 3,
			]
		);

		$this->add_control(
			'tab_number',
			[
				'label' => __( 'Tablet view', 'markethon' ),
				'type' => Controls_Manager::NUMBER,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'team_style' => '1',
					'team_display' => 'slider',
				],
				'label_block' => true,
				'min'       => 1,
                'max'       => 30,
                'default'   => 2,
			]
		);

		$this->add_control(
			'mob_number',
			[
				'label' => __( 'Mobile view', 'markethon' ),
				'type' => Controls_Manager::NUMBER,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'team_style' => '1',
					'team_display' => 'slider',
				],
				'label_block' => true,
				'min'       => 1,
                'max'       => 30,
                'default'   => 1,
			]
		);	

		$this->add_control(
			'autoplay',
			[
				'label'      => __( 'Autoplay', 'markethon' ),
				'type'       => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'markethon' ),
                'label_off' => esc_html__( 'Hide', 'markethon' ),
				'return_value' => 'true',
                'default' => 'true',
				'condition' => [
					'team_style' => '1',
					'team_display' => 'slider',
				]
			]
		);

		$this->add_control(
			'loop',
			[
				'label'      => __( 'Loop', 'markethon' ),
				'type'       => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'markethon' ),
                'label_off' => esc_html__( 'Hide', 'markethon' ),
				'return_value' => 'true',
                'default' => 'true',
				'condition' => [
					'team_style' => '1',
					'team_display' => 'slider',
				]
			]
		);

		$this->add_control(
			'dots',
			[
				'label'      => __( 'Dots', 'markethon' ),
				'type'       => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'markethon' ),
                'label_off' => esc_html__( 'Hide', 'markethon' ),
				'return_value' => 'true',
                'default' => 'true',
				'condition' => [
					'team_style' => '1',
					'team_display' => 'slider',
				]
			]
		);

		$this->add_control(
			'nav-arrow',
			[
				'label'      => __( 'Arrow', 'markethon' ),
				'type'       => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'markethon' ),
                'label_off' => esc_html__( 'Hide', 'markethon' ),
				'return_value' => 'true',
                'default' => 'true',
				'condition' => [
					'team_style' => '1',
					'team_display' => 'slider',
				]
			]
		);

        $this->end_controls_section();


        /*------------ Query ----------*/
        $this->start_controls_section(
            'team_query',
            [
                'label' => esc_html__( 'Post Query', 'markethon' ),
            ]
        );

        $this->add_control(
			'per_page_post',
			[
				'label' => __( 'Post Per Page', 'markethon' ),
				'type' => Controls_Manager::NUMBER,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
				'min'       => 1,
                'max'       => 100,
                'default'   => 10,
			]
		);

		$this->add_control(
			'order',
			[
				'label'   => __( 'Order By', 'markethon' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'ASC',
				'options' => [
						'DESC' => esc_html__('Descending', 'markethon'), 
						'ASC' => esc_html__('Ascending', 'markethon') 
				],

			]
		);
        $this->end_controls_section();

        /*--------------------------------------------------
            Tab Style
        --------------------------------------------------*/

        /*----------------------Team Hover-------------------*/
		$this->start_controls_section(
			'team_boxhover_style',
			[
				'label' => __( 'Box Hover', 'markethon' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'team_style' => '1',
				]
			]
		);

		$this->start_controls_tabs(
           'team_boxhover_tabs'
        );

        $this->start_controls_tab(
           'team_boxhover_normal',
           [
               'label' => esc_html__( 'Normal', 'markethon' ),
           ]
        );

        $this->add_control(
			'team_boxhover_color', 
			[ 
				'label' => __( 'Color', 'markethon' ), 
				'type' => Controls_Manager::COLOR,				
				'selectors' => [
					'{{WRAPPER}} .iq-team-style .team-box .team-plus' => 'background-color: {{VALUE}}',
				],
			]
		);

        $this->end_controls_tab();

        $this->start_controls_tab(
           'team_boxhover_hover',
           [
               'label' => esc_html__( 'Hover', 'markethon' ),
           ]
        );

        $this->add_control(
           'team_boxhover_hover_color',
           [
               'label'      => esc_html__( 'Hover Color', 'markethon' ),
               'type'       => Controls_Manager::COLOR,
               'selectors'  => [
                   '{{WRAPPER}} .iq-team-style .team-box .team-hover' => 'background-color: {{VALUE}}',
                   '{{WRAPPER}} .iq-team-style .team-box:hover .team-plus' => 'background-color: {{VALUE}}',
                   '{{WRAPPER}} .iq-team-style .team-box .team-hover::before' => 'border-top:10px solid {{VALUE}}',                   
               ],
           ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

		$this->end_controls_section();

		/*----------------------Border-------------------*/

	    $this->start_controls_section(
			'border_style',
			[
				'label' => __( 'Box Border', 'markethon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

	    $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border_group',
                'label' => esc_html__( 'Border', 'markethon' ),
                'selector' => '{{WRAPPER}} .iq-team-style .team-box',
            ]
        );

        $this->add_control(
           'border_hover_color',
           [
               'label'      => esc_html__( 'Hover Color', 'markethon' ),
               'type'       => Controls_Manager::COLOR,
               'selectors'  => [
                   '{{WRAPPER}} .iq-blog-style .iq-blog-box:hover' => 'border-color: {{VALUE}}',
               ],
           ]
        );

        $this->add_responsive_control(
            'border_radious',
            [
                'label' => esc_html__( 'Border Radius', 'markethon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .iq-blog-style .iq-blog-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

	    $this->end_controls_section();

        /*----------------------Team Member Name-------------------*/
		$this->start_controls_section(
			'teammember_style',
			[
				'label' => __( 'Team Member Name', 'markethon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'teammember_typography',
				'selector' => '{{WRAPPER}} .iq-team-style .member-name',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		); 

		$this->start_controls_tabs(
           'teammember_title_tabs'
        );

        $this->start_controls_tab(
           'teammember_title_normal',
           [
               'label' => esc_html__( 'Normal', 'markethon' ),
           ]
        );

        $this->add_control(
			'teammember_color', 
			[ 
				'label' => __( 'Color', 'markethon' ), 
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .iq-team-style .member-name' => 'color: {{VALUE}}',
				],
			]
		);

        $this->end_controls_tab();

        $this->start_controls_tab(
           'teammember_title_hover',
           [
               'label' => esc_html__( 'Hover', 'markethon' ),
           ]
        );

        $this->add_control(
           'teammember_title_hover_color',
           [
               'label'      => esc_html__( 'Hover Color', 'markethon' ),
               'type'       => Controls_Manager::COLOR,
               'selectors'  => [
                   '{{WRAPPER}} .iq-team-style .member-name:hover' => 'color: {{VALUE}}',
               ],
           ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control(
           'teammember_name_alignment',
           [
               'label'   => esc_html__( 'Alignment', 'markethon' ),
               'type'    => Controls_Manager::CHOOSE,
               'options' => [
                   'left'    => [
                       'title' => esc_html__( 'Left', 'markethon' ),
                       'icon'  => 'fa fa-align-left',
                   ],
                   'center'  => [
                       'title' => esc_html__( 'Center', 'markethon' ),
                       'icon'  => 'fa fa-align-center',
                   ],
                   'right'   => [
                       'title' => esc_html__( 'Right', 'markethon' ),
                       'icon'  => 'fa fa-align-right',
                   ],
                   'justify' => [
                       'title' => esc_html__( 'justify', 'markethon' ),
                       'icon'  => 'fa fa-align-justify',
                   ],
               ],
               'default'   => 'left',
               'devices'   => [ 'desktop', 'tablet', 'mobile' ],
               'selectors' => [
                   '{{WRAPPER}} .iq-team-style .title' => 'text-align: {{VALUE}};',                   
               ],
           ]
        );

		$this->end_controls_section();


		/*----------------------Description-------------------*/
		$this->start_controls_section(
			'description_style',
			[
				'label' => __( 'Description', 'markethon' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'team_style' => '1',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .testimonials-style .content',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		); 
		$this->add_control(
			'description_color', 
			[ 
				'label' => __( 'Color', 'markethon' ), 
				'type' => Controls_Manager::COLOR, 				
				'selectors' => [
					'{{WRAPPER}} .iq-team-style .content' => 'color: {{VALUE}}',
				],
			]
		);	

		$this->add_responsive_control(
           'description_alignment',
           [
               'label'   => esc_html__( 'Alignment', 'markethon' ),
               'type'    => Controls_Manager::CHOOSE,
               'options' => [
                   'left'    => [
                       'title' => esc_html__( 'Left', 'markethon' ),
                       'icon'  => 'fa fa-align-left',
                   ],
                   'center'  => [
                       'title' => esc_html__( 'Center', 'markethon' ),
                       'icon'  => 'fa fa-align-center',
                   ],
                   'right'   => [
                       'title' => esc_html__( 'Right', 'markethon' ),
                       'icon'  => 'fa fa-align-right',
                   ],
                   'justify' => [
                       'title' => esc_html__( 'justify', 'markethon' ),
                       'icon'  => 'fa fa-align-justify',
                   ],
               ],
               'default'   => 'left',
               'devices'   => [ 'desktop', 'tablet', 'mobile' ],
               'selectors' => [
                   '{{WRAPPER}} .iq-team-style .content' => 'text-align: {{VALUE}};',                   
               ],
           ]
        );
		$this->end_controls_section();

		/*----------------------Social Media Icon-------------------*/
		$this->start_controls_section(
			'socialicon_style',
			[
				'label' => __( 'Social Media Icon', 'markethon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
           'socialicon__tabs'
        );

        $this->start_controls_tab(
           'socialicon_normal',
           [
               'label' => esc_html__( 'Normal', 'markethon' ),
           ]
        );

        $this->add_control(
			'socialicon_color', 
			[ 
				'label' => __( 'Color', 'markethon' ), 
				'type' => Controls_Manager::COLOR, 								
				'selectors' => [
					'{{WRAPPER}} .iq-team-style .team-hover li a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .iq-team-style .team-three .social-box a:hover i' => 'color: {{VALUE}}',					
				],
			]
		);

        $this->end_controls_tab();

        $this->start_controls_tab(
           'socialicon_hover',
           [
               'label' => esc_html__( 'Hover', 'markethon' ),
           ]
        );

        $this->add_control(
           'socialicon_hover_color',
           [
               'label'      => esc_html__( 'Hover Color', 'markethon' ),
               'type'       => Controls_Manager::COLOR,
               'selectors'  => [
                   '{{WRAPPER}} .iq-team-style .team-hover li a:hover' => 'color: {{VALUE}}',
                   '{{WRAPPER}} .iq-team-style .team-three .social-box a:hover i:hover' => 'color: {{VALUE}}',                   
               ],
           ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

		$this->end_controls_section();
		

		/*----------------------designation-------------------*/
		$this->start_controls_section(
			'designation_style',
			[
				'label' => __( 'Designation', 'markethon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'designation_typography',
				'selector' => '{{WRAPPER}} .iq-team-style .designation',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		); 

		$this->add_control(
			'designation_color', 
			[ 
				'label' => __( 'Color', 'markethon' ), 
				'type' => Controls_Manager::COLOR, 				
				'selectors' => [
					'{{WRAPPER}} .iq-team-style .designation' => 'color: {{VALUE}}',
				],
			]
		);	

		$this->add_responsive_control(
           'designation_alignment',
           [
               'label'   => esc_html__( 'Alignment', 'markethon' ),
               'type'    => Controls_Manager::CHOOSE,
               'options' => [
                   'left'    => [
                       'title' => esc_html__( 'Left', 'markethon' ),
                       'icon'  => 'fa fa-align-left',
                   ],
                   'center'  => [
                       'title' => esc_html__( 'Center', 'markethon' ),
                       'icon'  => 'fa fa-align-center',
                   ],
                   'right'   => [
                       'title' => esc_html__( 'Right', 'markethon' ),
                       'icon'  => 'fa fa-align-right',
                   ],
                   'justify' => [
                       'title' => esc_html__( 'justify', 'markethon' ),
                       'icon'  => 'fa fa-align-justify',
                   ],
               ],
               'default'   => 'left',
               'devices'   => [ 'desktop', 'tablet', 'mobile' ],
               'selectors' => [
                   '{{WRAPPER}} .iq-team-style .designation' => 'text-align: {{VALUE}};',                   
               ],
           ]
        );
		$this->end_controls_section();


	}
	
	protected function render() {
		$settings = $this->get_settings();
		require  MARKETHON_TH_ROOT . '/inc/elementor/render/markethon_team.php';

		if ( Plugin::$instance->editor->is_edit_mode() ) : ?>
	        <script>	
				jQuery('.owl-carousel').each(function() {
		                    
	                var jQuerycarousel = jQuery(this);
	                jQuerycarousel.owlCarousel({
	                    items: jQuerycarousel.data("items"),                        
	                    loop: jQuerycarousel.data("loop"),
	                    margin: jQuerycarousel.data("margin"),
	                    nav: jQuerycarousel.data("nav"),
	                    dots: jQuerycarousel.data("dots"),
	                    autoplay: jQuerycarousel.data("autoplay"),
	                    autoplayTimeout: jQuerycarousel.data("autoplay-timeout"),
	                    navText: ["<i class='fa fa-angle-left fa-2x'></i>", "<i class='fa fa-angle-right fa-2x'></i>"],
	                    responsiveClass: true,
	                    responsive: {
	                        // breakpoint from 0 up
	                        0: {
	                            items: jQuerycarousel.data("items-mobile-sm"),
	                            nav: false,
	                            dots: true
	                        },
	                        // breakpoint from 480 up
	                        480: {
	                            items: jQuerycarousel.data("items-mobile"),
	                            nav: false,
	                            dots: true
	                        },
	                        // breakpoint from 786 up
	                        786: {
	                            items: jQuerycarousel.data("items-tab")
	                        },
	                        // breakpoint from 1023 up
	                        1023: {
	                            items: jQuerycarousel.data("items-laptop")
	                        },
	                        1199: {
	                            items: jQuerycarousel.data("items")
	                        }
	                    }
	                });
	            });
		    </script>
		<?php endif; 
    }	    
		
}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\markethon_Team() );