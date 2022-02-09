<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

class markethon_Testimonial extends Widget_Base {

	public function get_name() {
		return __( 'testimonial', 'markethon' );
	}
	
	public function get_title() {
		return __( 'markethon Testimonial', 'markethon' );
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
		return 'eicon-testimonial-carousel';
	}

	

	protected function _register_controls() {
		$this->start_controls_section(
			'section',
			[
				'label' => __( 'Testimonial', 'markethon' ),
			]
		);

        $this->add_control(
			'testimonial_style',
			[
				'label'      => __( 'Testimonial Style', 'markethon' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => '1',
				'options'    => [
					
					'1'          => __( 'Slider 1', 'markethon' ),
					'2'          => __( 'Slider 2', 'markethon' ),
				]
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
            'general_padding',
            [
                'label' => esc_html__( 'Padding', 'markethon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .testimonials-style .iq-testimonial-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .testimonials-style .testimonial-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'general_margin',
            [
                'label' => esc_html__( 'Margin', 'markethon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .testimonials-style .owl-carousel.owl-drag .owl-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .testimonials-style .owl-carousel.owl-drag .owl-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
	    $this->end_controls_section();

	    /*----------------------Member Name-------------------*/
		$this->start_controls_section(
			'member_style',
			[
				'label' => __( 'Member Name', 'markethon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'member_typography',
				'selector' => '{{WRAPPER}} .testimonials-style .iq-name',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		); 

        $this->add_control(
			'member_color', 
			[ 
				'label' => __( 'Color', 'markethon' ), 
				'type' => Controls_Manager::COLOR, 				
				'selectors' => [
					'{{WRAPPER}} .testimonials-style .iq-name' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();


        /*----------------------Description-------------------*/
		$this->start_controls_section(
			'description_style',
			[
				'label' => __( 'Content', 'markethon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .testimonials-style .description',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		); 
		$this->add_control(
			'description_color', 
			[ 
				'label' => __( 'Color', 'markethon' ), 
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .testimonials-style .description' => 'color: {{VALUE}}',                    
				],
			]
		);	
		$this->end_controls_section();


		/*----------------------Company Name-------------------*/
		$this->start_controls_section(
			'company_style',
			[
				'label' => __( 'Company', 'markethon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'company_typography',
				'selector' => '{{WRAPPER}} .testimonials-style .description',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		); 

		$this->add_control(
			'company_color', 
			[ 
				'label' => __( 'Color', 'markethon' ), 
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .testimonials-style .company' => 'color: {{VALUE}}',
				],
			]
		);	
		$this->end_controls_section();


        /*----------------------Designation-------------------*/
		$this->start_controls_section(
			'designation_style',
			[
				'label' => __( 'designation', 'markethon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'designation_typography',
				'selector' => '{{WRAPPER}} .testimonials-style .description',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		); 

		$this->add_control(
			'designation_color', 
			[ 
				'label' => __( 'Color', 'markethon' ), 
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .testimonials-style .designation' => 'color: {{VALUE}}',
				],
			]
		);	
		$this->end_controls_section();

		
	}
	
	protected function render() {
		$settings = $this->get_settings();
		require  MARKETHON_TH_ROOT . '/inc/elementor/render/markethon_testimonial.php';
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

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\markethon_Testimonial() );