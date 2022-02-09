<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

/**
 * Elementor Blog widget.
 *
 * Elementor widget that displays an eye-catching headlines.
 *
 * @since 1.0.0
 */

class markethon_Blog extends Widget_Base {
	
	/**
	 * Get widget name.
	 *
	 * Retrieve heading widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */

	public function get_name() {
		return __( 'markethon_blog', 'markethon' );
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve heading widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	
	public function get_title() {
		return __( 'markethon Blog', 'markethon' );
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the heading widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since 2.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */

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
		return 'eicon-slider-push';
	}

	/**
	 * Register heading widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */

	protected function _register_controls() {
		$this->start_controls_section(
			'section_blog',
			[
				'label' => __( 'Blog Post', 'markethon' ),
				
			]
		);

        $this->add_control(
			'blog_style',
			[
				'label'      => __( 'Blog Style', 'markethon' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => '1',
				'options'    => [
					
					'1'          => __( 'Blog Slider', 'markethon' ),
					'2'          => __( 'Blog 1 Columns', 'markethon' ),
					'3'          => __( 'Blog 2 Columns', 'markethon' ),
					'4'          => __( 'Blog 3 Columns', 'markethon' ),
				],
			]
		);
        $this->end_controls_section();

        /*------------ Slider Layout ----------*/
        $this->start_controls_section(
            'iq_slider_layout',
            [
                'label' => esc_html__( 'Slider Layout', 'markethon' ),                
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

        /*----------------------General-------------------*/

        $this->start_controls_section(
	        'general_settings',
	        [
	          'label' => esc_html__( 'General', 'markethon' ),
	          'tab' => Controls_Manager::TAB_STYLE
	        ]
	    );

	    $this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'markethon' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'text-left' => [
						'title' => __( 'Left', 'markethon' ),
						'icon' => 'eicon-text-align-left',
					],
					'text-center' => [
						'title' => __( 'Center', 'markethon' ),
						'icon' => 'eicon-text-align-center',
					],
					'text-right' => [
						'title' => __( 'Right', 'markethon' ),
						'icon' => 'eicon-text-align-right',
					]
					
				]
			]
		);

		$this->add_responsive_control(
            'general_margin',
            [
                'label' => esc_html__( 'Margin', 'markethon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'default'    => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                    'unit' => 'px',
                    'isLinked' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .iq-blog-style .iq-blog-detail' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

		$this->add_responsive_control(
            'general_padding',
            [
                'label' => esc_html__( 'Padding', 'markethon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .iq-blog-style .iq-blog-detail' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
			'general_img',
			[
				'label'      => __( 'Post Image', 'markethon' ),
				'type'       => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'markethon' ),
                'label_off' => esc_html__( 'Hide', 'markethon' ),
				'return_value' => 'true',
                'default' => 'true',				
			]
		);
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
                'selector' => '{{WRAPPER}} .iq-blog-style .iq-blog-box',
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

	    /*----------------------Background-------------------*/

	    $this->start_controls_section(
			'boxbg_style',
			[
				'label' => __( 'Background', 'markethon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
           'boxbg_tabs'
        );

        $this->start_controls_tab(
           'boxbg_normal',
           [
               'label' => esc_html__( 'Normal', 'markethon' ),
           ]
        );

        $this->add_control(
			'boxbg_color', 
			[ 
				'label' => __( 'Color', 'markethon' ), 
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .iq-blog-style .iq-blog-box' => 'background: {{VALUE}}',
				],
			]
		);

        $this->end_controls_tab();

        $this->start_controls_tab(
           'boxbg_hover',
           [
               'label' => esc_html__( 'Hover', 'markethon' ),
           ]
        );

        $this->add_control(
           'boxbg_hover_color',
           [
               'label'      => esc_html__( 'Hover Color', 'markethon' ),
               'type'       => Controls_Manager::COLOR,
               'selectors'  => [
                   '{{WRAPPER}} .iq-blog-style .iq-blog-box:hover' => 'background: {{VALUE}}',
               ],
           ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs(); 

		$this->end_controls_section();

	    /*----------------------Title-------------------*/
		$this->start_controls_section(
			'blog_title_style',
			[
				'label' => __( 'Title', 'markethon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .iq-blog-style .blog-title a h5',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->start_controls_tabs(
           'blog_title_tabs'
        );

        $this->start_controls_tab(
           'blog_title_normal',
           [
               'label' => esc_html__( 'Normal', 'markethon' ),
           ]
        );

        $this->add_control(
			'blog_title_color', 
			[ 
				'label' => __( 'Color', 'markethon' ), 
				'type' => Controls_Manager::COLOR, 						
				'selectors' => [
					'{{WRAPPER}} .iq-blog-style .blog-title a h5' => 'color: {{VALUE}}',
				],
			]
		);

        $this->end_controls_tab();

        $this->start_controls_tab(
           'blog_title_hover',
           [
               'label' => esc_html__( 'Hover', 'markethon' ),
           ]
        );

        $this->add_control(
           'blog_title_hover_color',
           [
               'label'      => esc_html__( 'Hover Color', 'markethon' ),
               'type'       => Controls_Manager::COLOR,
               'selectors'  => [
                   '{{WRAPPER}} .iq-blog-style .blog-title a h5:hover' => 'color: {{VALUE}}',
               ],
           ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs(); 

		$this->end_controls_section();

		/*----------------------Read More-------------------*/
		$this->start_controls_section(
			'readmore_title_style',
			[
				'label' => __( 'Readmore', 'markethon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'readmore_switch',
			[
				'label'      => __( 'Readmore Option', 'markethon' ),
				'type'       => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'markethon' ),
                'label_off' => esc_html__( 'Hide', 'markethon' ),
				'return_value' => 'true',
                'default' => 'true',				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'readmore_typography',
				'selector' => '{{WRAPPER}} .iq-blog-style .blog-button a',
				'condition' => [
					'readmore_switch' => 'true',
				],
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->start_controls_tabs(
           'readmore_title_tabs'     
        );

        $this->start_controls_tab(
           'readmore_title_normal',
           [
               'label' => esc_html__( 'Normal', 'markethon' ),
               'condition' => [
					'readmore_switch' => 'true',
				],
           ]
        );

        $this->add_control(
			'readmore_title_color', 
			[ 
				'label' => __( 'Color', 'markethon' ), 
				'type' => Controls_Manager::COLOR, 
				
				'condition' => [
					'readmore_switch' => 'true',
				],
				'selectors' => [
					'{{WRAPPER}} .iq-blog-style .blog-button a' => 'color: {{VALUE}}',
				],
			]
		);

        $this->end_controls_tab();

        $this->start_controls_tab(
           'readmore_title_hover',
           [
               'label' => esc_html__( 'Hover', 'markethon' ),
               'condition' => [
					'readmore_switch' => 'true',
				],
           ]
        );

        $this->add_control(
           'readmore_title_hover_color',
           [
               'label'      => esc_html__( 'Hover Color', 'markethon' ),
               'type'       => Controls_Manager::COLOR,
               'condition' => [
					'readmore_switch' => 'true',
				],
               'selectors'  => [
                   '{{WRAPPER}} .iq-blog-style .blog-button a:hover' => 'color: {{VALUE}}',
               ],
           ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs(); 

		$this->end_controls_section();

		/*----------------------Meta Box-------------------*/
		$this->start_controls_section(
			'metabox_style',
			[
				'label' => __( 'Meta Box', 'markethon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'metabox_switch',
			[
				'label'      => __( 'Metabox Option', 'markethon' ),
				'type'       => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'markethon' ),
                'label_off' => esc_html__( 'Hide', 'markethon' ),
				'return_value' => 'true',
                'default' => 'true',				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'metabox_typography',
				'selector' => '{{WRAPPER}} .iq-blog-style .iq-blog-meta',
				'condition' => [
					'metabox_switch' => 'true',
				],
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_responsive_control(
			'metabox_align',
			[
				'label' => __( 'Alignment', 'markethon' ),
				'type' => Controls_Manager::CHOOSE,
				'condition' => [
					'metabox_switch' => 'true',
				],
				'options' => [
					'text-left' => [
						'title' => __( 'Left', 'markethon' ),
						'icon' => 'eicon-text-align-left',
					],
					'text-center' => [
						'title' => __( 'Center', 'markethon' ),
						'icon' => 'eicon-text-align-center',
					],
					'text-right' => [
						'title' => __( 'Right', 'markethon' ),
						'icon' => 'eicon-text-align-right',
					]
					
				]
			]
		);

		$this->start_controls_tabs(
           'metabox_tabs'
        );

        $this->start_controls_tab(
           'metabox_normal',
           [
               'label' => esc_html__( 'Normal', 'markethon' ),
               'condition' => [
					'metabox_switch' => 'true',
				],
           ]
        );

        $this->add_control(
			'metabox_color', 
			[ 
				'label' => __( 'Color', 'markethon' ), 
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'metabox_switch' => 'true',
				], 
				'selectors' => [
					'{{WRAPPER}} .iq-blog-style .iq-blog-box .iq-blog-meta ul.list-inline li a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .iq-blog-style .iq-blog-box .iq-blog-meta ul.list-inline li i' => 'color: {{VALUE}}',
				],
			]
		);

        $this->end_controls_tab();

        $this->start_controls_tab(
           'metabox_hover',
           [
               'label' => esc_html__( 'Hover', 'markethon' ),
               'condition' => [
					'metabox_switch' => 'true',
				],
           ]
        );

        $this->add_control(
           'metabox_hover_color',
           [
               'label'      => esc_html__( 'Hover Color', 'markethon' ),
               'type'       => Controls_Manager::COLOR,
               'condition' => [
					'metabox_switch' => 'true',
				],
               'selectors'  => [
                   '{{WRAPPER}} .iq-blog-style .iq-blog-box .iq-blog-meta ul.list-inline li a:hover' => 'color: {{VALUE}}',
                   '{{WRAPPER}} .iq-blog-style .iq-blog-box .iq-blog-meta ul.list-inline li i:hover' => 'color: {{VALUE}}',
               ],
           ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs(); 

		$this->end_controls_section();

	}
	/**
	 * Render Blog widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	
	protected function render() {
		
		require  MARKETHON_TH_ROOT . '/inc/elementor/render/markethon_blog.php';
		
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

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\markethon_Blog() );
?>