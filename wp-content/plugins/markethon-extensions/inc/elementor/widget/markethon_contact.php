<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

class markethon_Contact extends Widget_Base {

	public function get_name() {
		return __( 'markethon_contact', 'markethon' );
	}
	
	public function get_title() {
		return __( 'markethon Contact', 'markethon' );
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
		return 'eicon-map-pin';
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'section',
			[
				'label' => __( 'markethon_Contact', 'markethon' ),
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
			'contact_style',
			[
				'label'      => __( 'Select Style', 'markethon' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => '1',
				'options'    => [					
					'1'          => __( 'Icon', 'markethon' ),
					'2'          => __( 'Image', 'markethon' ),
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
					'contact_style' => '1',
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
					'contact_style' => '2',
				],
				
			]
		);

        $this->add_control(
			'contact_type',
			[
				'label'      => __( 'Select Contact Type', 'markethon' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => '1',
				'options'    => [
					
					'1'          => __( 'Email', 'markethon' ),
					'2'          => __( 'Phone', 'markethon' ),
					'3'          => __( 'Address', 'markethon' ),
					'4'          => __( 'Social Media', 'markethon' ),
				],
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
		
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'contact_style' => '1',
				],
			]
		);

        $this->end_controls_section();
        
	}
	
	protected function render() {
		$settings = $this->get_settings();
        require  MARKETHON_TH_ROOT . '/inc/elementor/render/markethon_contact.php';
    }	    
		
}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\markethon_Contact() );