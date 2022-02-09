<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

class markethon_service extends Widget_Base {

	public function get_name() {
		return __( 'markethon_service', 'markethon' );
	}
	
	public function get_title() {
		return __( 'Markethon Service', 'markethon' );
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
		return 'eicon-lightbox';
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section',
			[
				'label' => __( 'service', 'markethon' ),
			]
		);

		$this->add_control(
			'service_style',
			[
				'label'      => __( 'Service Style', 'markethon' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => '1',
				'options'    => [
					
					'1'          => __( 'Style 1', 'markethon' ),
					'2'          => __( 'Style 2', 'markethon' ),
					
				],
			]
		);

        $this->add_control(
			'service_title',
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
			'service_description',
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
			'service_image_icon',
			[
				'label'      => __( 'Image / Icon', 'markethon' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => '1',
				'options'    => [
					'1'          => __( 'Icon', 'markethon' ),
					'2'          => __( 'Image', 'markethon' ),
				],
			]
		);

		$this->add_control(
			'service_selected_image',
			[
				'label' => __( 'Choose Image', 'markethon' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'service_image_icon' => '2',
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'service_selected_icon',
			[
				'label' => __( 'Icon', 'markethon' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'condition' => [
					'service_image_icon' => '1',
				],
				'default' => [
					'value' => 'fas fa-star'
					
				],
			]
		);

		$this->add_control(
			'service_link_title',
			[
				'label' => __( 'Button Text', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
				'default' => __( 'Read More', 'markethon' ),
			]
		);

		$this->add_control(
			'service_right_test',
			[
				'label' => __( 'Right Side Text', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'service_style' => '1',
				],
				'label_block' => true,
			]
		); 

		$this->add_control(
			'service_link',
			[
				'label' => __( 'Link', 'markethon' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'markethon' ),
				'default' => [
					'url' => '#',
				],
			]
		);

		$this->add_responsive_control(
			'service_align',
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


        // Icon Style
        $this->start_controls_section(
			'section_style_icon',
			[
				'label' => __( 'Icon', 'markethon' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => ['service_image_icon'=>['1']],
			]
		);

		$this->add_control(
			'servocebox_style_icon_color',
			[
				'label' => __( 'Icon Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .iq-element-service .iq-icon' => 'color: {{VALUE}} !important;',
		 		],
			]
		);

		$this->add_control(
			'servocebox_style_icon_hovercolor',
			[
				'label' => __( 'Icon Hover Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .iq-element-service .iq-icon:hover' => 'color: {{VALUE}} !important;',
		 		],		
			]
		);

		$this->add_control(
			'servocebox_style_icon_bgcolor',
			[
				'label' => __( 'Icon Backgroung Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .iq-element-service .service-shap' => 'background: {{VALUE}} !important;',
		 		],
		 		'condition' => ['service_style'=>['1']],
			]
		);

		$this->end_controls_section();

		// Title Style
        $this->start_controls_section(
			'section_style_title',
			[
				'label' => __( 'Title', 'markethon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'servocebox_title_typography',
				'label' => __( 'Title Typography', 'markethon' ),				
				'selector' => '{{WRAPPER}} .iq-element-service .title',
			]
		);

		$this->add_control(
			'servocebox_title_color',
			[
				'label' => __( 'Title Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .iq-element-service .title' => 'color: {{VALUE}} !important;',
		 		],		
			]
		);

		$this->end_controls_section();

		// Content Style
        $this->start_controls_section(
			'section_style_content',
			[
				'label' => __( 'Content', 'markethon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'servocebox_content_typography',
				'label' => __( 'Content Typography', 'markethon' ),				
				'selector' => '{{WRAPPER}} .iq-element-service .iq-cont',
			]
		);

		$this->add_control(
			'servocebox_content_color',
			[
				'label' => __( 'Content Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .iq-element-service .iq-cont' => 'color: {{VALUE}} !important;',
		 		],		
			]
		);

		$this->end_controls_section();

		// Read More Style
        $this->start_controls_section(
			'section_style_readmore',
			[
				'label' => __( 'Read More', 'markethon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'servocebox_readmore_color',
			[
				'label' => __( 'Read More Text Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .iq-element-service .readmore' => 'color: {{VALUE}} !important;',
		 		],		
			]
		);

		$this->end_controls_section();

		// Text Hover Style
        $this->start_controls_section(
			'section_style_texthover',
			[
				'label' => __( 'Text Hover Color', 'markethon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'servocebox_texthover_color',
			[
				'label' => __( 'Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .iq-element-service:hover .title' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .iq-element-service:hover .iq-cont' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .iq-element-service:hover .readmore' => 'color: {{VALUE}} !important;',
		 		],		
			]
		);

		$this->end_controls_section();


	}
	
	protected function render() {
		$settings = $this->get_settings();
        require  MARKETHON_TH_ROOT . '/inc/elementor/render/markethon_servicebox.php';
    }	    
		
}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\markethon_service() );