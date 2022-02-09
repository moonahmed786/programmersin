<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

class Markethon_Video extends Widget_Base {

	public function get_name() {
		return __( 'markethon_video', 'markethon' );
	}
	
	public function get_title() {
		return __( 'Markethon Video', 'markethon' );
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
		return 'eicon-video-camera';
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section',
			[
				'label' => __( 'Video', 'markethon' ),
			]
		);

		$this->add_control(
			'video_bg_image',
			[
				'label' => __( 'Choose Video Background Image', 'markethon' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'video_link',
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

		$this->add_control(
			'video_people1_image',
			[
				'label' => __( 'Choose People1 Image', 'markethon' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'video_people2_image',
			[
				'label' => __( 'Choose People2 Image', 'markethon' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);


        $this->end_controls_section();

        // Play Style
        $this->start_controls_section(
			'section_style_play_button',
			[
				'label' => __( 'Play Button', 'markethon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'play_icon',
			[
				'label' => __( 'Play Icon', 'markethon' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-star'
					
				],
			]
		);

		$this->add_control(
			'play_icon_color',
			[
				'label' => __( 'Play Icon Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,				
			]
		);

		$this->add_control(
			'play_icon_bg_color',
			[
				'label' => __( 'Play Icon Background Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,
			]
		);

		$this->end_controls_section();

	}
	
	protected function render() {
		$settings = $this->get_settings();
        require  MARKETHON_TH_ROOT . '/inc/elementor/render/markethon_video.php';
    }	    
		
}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Markethon_Video() );