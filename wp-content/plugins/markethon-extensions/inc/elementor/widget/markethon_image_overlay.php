<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

class markethon_Image_Overlay extends Widget_Base {

	public function get_name() {
		return __( 'image_overlay', 'markethon' );
	}
	
	public function get_title() {
		return __( 'markethon Image Overlay', 'markethon' );
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
		return 'eicon-image-rollover';
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section',
			[
				'label' => __( 'Image Overlay', 'markethon' ),
			]
		);

		$this->add_control(
			'overlay_style',
			[
				'label'      => __( 'Overlay Style', 'markethon' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => '1',
				'options'    => [					
					'1'          => __( 'Style 1', 'markethon' ),
					'2'          => __( 'Style 2', 'markethon' ),
					
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
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail',
				'default' => 'full',
				'separator' => 'none',
			]
		);

		$this->add_control(
			'image_1',
			[
				'label' => __( 'Choose Image', 'markethon' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'overlay_style' => '2',
				],
			]
		);		

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail_1',
				'default' => 'full',
				'separator' => 'none',
				'condition' => [
					'overlay_style' => '2',
				],				
			]					
		);

		$this->add_control(
			'position_x',
			[
				'label' => __( 'Image Position Horizontal', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'top',
				'options' => [
					'left' => [
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'eicon-h-align-left',
					],
					
					'right' => [
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'prefix_class' => 'elementor-position-',
				'toggle' => false,
				
			]
		);

		$this->add_control(
			'position_y',
			[
				'label' => __( 'Image Position Vertical', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'top',
				'options' => [
					
					'top' => [
						'title' => __( 'Top', 'elementor' ),
						'icon' => 'eicon-v-align-top',
					],
					'bottom' => [
						'title' => __( 'Bottom', 'elementor' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'prefix_class' => 'elementor-position-',
				'toggle' => false,
			]
		);

        $this->end_controls_section();

	}
	
	protected function render() {
		$settings = $this->get_settings();
        require  MARKETHON_TH_ROOT . '/inc/elementor/render/markethon_image_overlay.php';
	}	  

}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\markethon_Image_Overlay() );