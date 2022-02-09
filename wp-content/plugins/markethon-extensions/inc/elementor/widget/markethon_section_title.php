<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

class markethon_Title extends Widget_Base {

	public function get_name() {
		return __( 'section_title', 'markethon' );
	}
	
	public function get_title() {
		return __( 'markethon Title', 'markethon' );
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
		return 'eicon-site-title';
	}

	protected function _register_controls() {
		
		$this->start_controls_section(
			'section',
			[
				'label' => __( 'Section Title Post', 'markethon' ),
			]
		);
        
        $this->add_control(
			'section_title',
			[
				'label' => __( 'Section Title', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label' => __( 'Section Sub Title', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
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
			'title_style',
			[
				'label'      => __( 'Title Style', 'markethon' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => '2',
				'options'    => [
					
					'1'          => __( 'Default', 'markethon' ),
					'2'          => __( 'White', 'markethon' ),
					
				],
			]
		);

		$this->add_control(
			'title_transform_style',
			[
				'label'      => __( 'Text transform', 'markethon' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => '1',
				'options'    => [
					
					'1'          => __( 'Default', 'markethon' ),
					'2'          => __( 'uppercase', 'markethon' ),
					
				],
			]
		);
		
		$this->add_control(
			'counter_content',
			[
				'label' => __( 'Counter Content', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Counter Figure Number', 'markethon' ),
			]
		);
		$this->add_control(
			'counter_symbol',
			[
				'label' => __( 'Counter Symbol', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Counter Symbol', 'markethon' ),
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

        // Title Style
        $this->start_controls_section(
			'section_style_stitle',
			[
				'label' => __( 'Title', 'markethon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'stitle_title_typography',
				'label' => __( 'Title Typography', 'markethon' ),				
				'selector' => '{{WRAPPER}} .iq-stitle-element .title',
			]
		);

		$this->add_control(
			'stitle_title_color',
			[
				'label' => __( 'Title Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .iq-stitle-element .title' => 'color: {{VALUE}} !important;',
		 		],		
			]
		);

		$this->end_controls_section();

		// Sub Title Style
        $this->start_controls_section(
			'section_style_sstitle',
			[
				'label' => __( 'Sub Title', 'markethon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sstitle_title_typography',
				'label' => __( 'Sub Title Typography', 'markethon' ),				
				'selector' => '{{WRAPPER}} .iq-stitle-element .sub_title',
			]
		);

		$this->add_control(
			'sstitle_title_color',
			[
				'label' => __( 'Sub Title Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .iq-stitle-element .sub_title' => 'color: {{VALUE}} !important;',
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
				'name' => 'stitle_content_typography',
				'label' => __( 'Content Typography', 'markethon' ),				
				'selector' => '{{WRAPPER}} .iq-stitle-element .title_desc',
			]
		);

		$this->add_control(
			'stitle_content_color',
			[
				'label' => __( 'Content Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .iq-stitle-element .title_desc' => 'color: {{VALUE}} !important;',
		 		],		
			]
		);

		$this->end_controls_section();

	}
	
	protected function render() {
		$settings = $this->get_settings();
        require  MARKETHON_TH_ROOT . '/inc/elementor/render/markethon_section_title.php';
    }	    
		
}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\markethon_Title() );
?>