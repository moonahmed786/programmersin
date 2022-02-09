<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

class markethon_Counter extends Widget_Base {

	public function get_name() {
		return __( 'markethon_counter', 'markethon' );
	}
	
	public function get_title() {
		return __( 'markethon Counter', 'markethon' );
	}

	public function get_categories() {
		return [ 'markethon' ];
	}

     /**
	 * Get widget icon.
	 *
	 * Retrieve Lists widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-counter';
	}
	
	protected function _register_controls() {

		$this->start_controls_section(
			'section',
			[
				'label' => __( 'Counter', 'markethon' ),
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
			'media_style',
			[
				'label'      => __( 'Icon / Image', 'markethon' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'icon',
				'options'    => [					
					'icon'    => __( 'Icon', 'markethon' ),
					'image'   => __( 'Image', 'markethon' ),					
				]
			]
		);

		$this->add_control(
			'selected_icon',
			[
				'label' => __( 'Icon', 'markethon' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-star'					
				],
				'condition' => [
					'media_style' => 'icon',
				],
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'markethon' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'media_style' => 'image',
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				]
			]
		);


		$this->add_control(
			'content',
			[
				'label' => __( 'Counter Content', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Counter Figure Number', 'markethon' ),
				'default' => __( '100', 'markethon' ),
			]
		);
		$this->add_control(
			'content_symbol',
			[
				'label' => __( 'Counter Symbol', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Counter Symbol', 'markethon' ),
				'default' => __( '+', 'markethon' ),
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,
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

	}
	
	protected function render() {
		$settings = $this->get_settings();
        require  MARKETHON_TH_ROOT . '/inc/elementor/render/markethon_counter.php';
    }	    
		
}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\markethon_Counter() );