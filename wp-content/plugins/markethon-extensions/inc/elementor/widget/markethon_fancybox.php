<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

class markethon_FancyBox extends Widget_Base {

	public function get_name() {
		return __( 'markethon_fancybox', 'markethon' );
	}
	
	public function get_title() {
		return __( 'markethon FancyBox', 'markethon' );
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
		return 'eicon-icon-box';
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section',
			[
				'label' => __( 'FancyBox', 'markethon' ),
			]
		);

		$this->add_control(
			'fancy_style',
			[
				'label'      => __( 'FancyBox Style', 'markethon' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => '1',
				'options'    => [
					
					'1'          => __( 'Style 1', 'markethon' ),
					'2'          => __( 'Style 2', 'markethon' ),
					'3'          => __( 'Box Shadow', 'markethon' ),
                    '4'          => __( 'Box Icon Border', 'markethon' ),
 					
				],
			]
		);

		$this->add_control(
            'fancy_image_icon', [
                'label'       => esc_html__( 'Image/Icon Type', 'markethon' ),
                'type'        => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options'     => [
                    'none' => [
                        'title' => esc_html__( 'None', 'markethon' ),
                        'icon'  => 'fa fa-ban',
                    ],
                    'image' => [
                        'title' => esc_html__( 'Image', 'markethon' ),
                        'icon'  => 'fa fa-image',
                    ],
                    'icon' => [
                        'title' => esc_html__( 'Icon', 'markethon' ),
                        'icon'  => 'fa fa-paint-brush',
                    ],
                ],
                'default'       => 'icon',
            ]
        );

		$this->add_control(
			'selected_image',
			[
				'label' => __( 'Choose Image', 'markethon' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'fancy_image_icon' => 'image',
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'selected_icon',
			[
				'label' => __( 'Icon', 'markethon' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'condition' => [
					'fancy_image_icon' => 'icon',
				],
				'default' => [
					'value' => 'fas fa-star'
					
				],
			]
		);

        $this->add_control(
			'section_title',
			[
				'label' => __( 'Title', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
				'default' => __( 'Add Your Title Text Here', 'markethon' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label' => __( 'Description', 'markethon' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'markethon' ),
				'default' => __( 'Add Your Heading Text Here', 'markethon' ),
			]
		);	

		$this->add_control(
			'img_position',
			[
				'label' => __( 'Image/Icon Position', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'img-left',
				'options' => [
					'img-left' => [
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'eicon-h-align-left',
					],
					'img-right' => [
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'condition' => [
					'fancy_style' => '2',
				],
				'prefix_class' => 'elementor-position-',
				'toggle' => false,
			]
		);	
		 $this->add_control(
			'iqonic_has_box_shadow',
			[
				'label' => __( 'Box Shaow?', 'iqonic' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
				'condition' => [
					'fancy_style' => '3',
				],
				'yes' => __( 'yes', 'iqonic' ),
				'no' => __( 'no', 'iqonic' ),
			]
        );

		$this->add_control(
			'title_tag',
			[
				'label'      => __( 'FancyBox Style', 'markethon' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'h3',
				'options'    => [
					
					'h1'          => __( 'h1', 'markethon' ),
					'h2'          => __( 'h2', 'markethon' ),
					'h3'          => __( 'h3', 'markethon' ),
					'h4'          => __( 'h4', 'markethon' ),
					'h5'          => __( 'h5', 'markethon' ),
					'h6'          => __( 'h6', 'markethon' ),
					
				],
			]
		);

		$this->end_controls_section();

		/*--------------------------------------------------
            Tab Style
        --------------------------------------------------*/

        /*----------------------Icon-------------------*/

        $this->start_controls_section(
	        'general_settings',
	        [
	            'label' => esc_html__( 'Icon', 'markethon' ),
	            'condition' => [
					'fancy_style' => array('3'),
			    ],
	          'tab' => Controls_Manager::TAB_STYLE
	        ]
	    );

		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,
			]
		);

		$this->add_control(
			'icon_bg_color',
			[
				'label' => __( 'Icon Background Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'fancy_style' => array('2','3','4'),
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
                    '{{WRAPPER}} .iq-slolution-details .icon .iq-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

         $this->add_responsive_control(
			'icon_width',
			[
				'label' => __( 'Width', 'iqonic' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .iq-slolution-details .icon .iq-icon,{{WRAPPER}} .iq-slolution-details .icon .service-shap img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'icon_height',
			[
				'label' => __( 'Height', 'iqonic' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .iq-slolution-details .icon .iq-icon,{{WRAPPER}} .iq-slolution-details .icon .service-shap img' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .iq-slolution-details .icon .iq-icon i' => 'line-height: {{SIZE}}{{UNIT}};',
				],
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
                    '{{WRAPPER}} .iq-slolution-details .icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .iq-slolution-details .icon ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

		$this->add_group_control(
           Group_Control_Text_Shadow::get_type(), [
               'name'       => 'icon_shadow',
               'selector'   => '{{WRAPPER}} .iq-slolution-details .icon .iq-icon',
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
					],
					'text-justify' => [
						'title' => __( 'Justified', 'markethon' ),
						'icon' => 'eicon-text-align-justify',
					],
				]
			]
		);

        $this->end_controls_section();

        /*----------------------Title-------------------*/

        $this->start_controls_section(
	        'title_settings',
	        [
	            'label' => esc_html__( 'Title', 'markethon' ),	   
	          'tab' => Controls_Manager::TAB_STYLE
	        ]
	    );

	    $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'fancybox_title_typography',
				'label' => __( 'Title Typography', 'markethon' ),				
				'selector' => '{{WRAPPER}} .fancy-style .title',
			]
		);

		$this->add_control(
			'fancybox_title_color',
			[
				'label' => __( 'Title Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fancy-style .title' => 'color: {{VALUE}} !important;',
		 		],		
			]
		);

	    $this->add_responsive_control(
            'title_margin',
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
                    '{{WRAPPER}} .fancy-style .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

		$this->add_responsive_control(
            'title_padding',
            [
                'label' => esc_html__( 'Padding', 'markethon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .fancy-style .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


		$this->end_controls_section();

		/*----------------------Sub Title-------------------*/

        $this->start_controls_section(
	        'subtitle_settings',
	        [
	          'label' => esc_html__( 'Sub Title', 'markethon' ),	   
	          'tab' => Controls_Manager::TAB_STYLE
	        ]
	    );

	    $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'fancybox_subtitle_typography',
				'label' => __( 'Typography', 'markethon' ),				
				'selector' => '{{WRAPPER}} .fancy-style .iq-descript',
			]
		);

		$this->add_control(
			'fancybox_subtitle_color',
			[
				'label' => __( 'Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fancy-style .iq-descript' => 'color: {{VALUE}} !important;',
		 		],		
			]
		);

		$this->end_controls_section();


		 /*----------------------Box-------------------*/

        $this->start_controls_section(
	        'fancybox_settings',
	        [
	            'label' => esc_html__( 'Fancybox', 'markethon' ),	   
	          'tab' => Controls_Manager::TAB_STYLE
	        ]
	    );

	    $this->add_control(
			'fancybox_border_color',
			[
				'label' => __( 'Border Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fancy-style .service-shap' => 'border-color: {{VALUE}} !important;',
		 		],		
			]
		);

	    $this->add_responsive_control(
            'fancybox_margin',
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
                    '{{WRAPPER}} .fancy-style ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

		$this->add_responsive_control(
            'fancybox_padding',
            [
                'label' => esc_html__( 'Padding', 'markethon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .fancy-style ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


		$this->end_controls_section();

	}
	
	protected function render() {
		$settings = $this->get_settings();
        require  MARKETHON_TH_ROOT . '/inc/elementor/render/markethon_fancybox.php';
    }	    
		
}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\markethon_FancyBox() );