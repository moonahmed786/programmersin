<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

class markethon_Tabs extends Widget_Base {

	public function get_name() {
		return __( 'markethon_tabs', 'markethon' );
	}
	
	public function get_title() {
		
		return __( 'markethon Tabs', 'markethon' );
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
		return 'eicon-bullet-list';
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section',
			[
				'label' => __( 'Tabs', 'markethon' ),
			]
		);

        $repeater = new Repeater();

        $repeater->add_control(
			'tab_title',
			[
				'label' => __( 'Title', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Tab Title', 'elementor' ),
				'placeholder' => __( 'Tab Title', 'elementor' ),
				'label_block' => true,
			]
        );

        $repeater->add_control(
			'media_style',
			[
				'label'      => __( 'Icon / Image', 'markethon' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'icon',
				'options'    => [					
					'icon'          => __( 'Icon', 'markethon' ),
					'image'          => __( 'Image', 'markethon' ),					
				]
			]
		);

		$repeater->add_control(
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

		$repeater->add_control(
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

		$repeater->add_control(
			'tab_content_title',
			[
				'label' => __( 'Tab Content Title', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'tab_content_description',
			[
				'label' => __( 'Tab Description', 'markethon' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'markethon' ),
				'default' => __( 'Add Your Description Text Here', 'markethon' ),
			]
		);

		$repeater->add_control(
			'tab_content_image',
			[
				'label' => __( 'Choose Image', 'markethon' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				]
			]
		);

		$repeater->add_control(
			'tab_content',
			[
				'label' => __( 'Content', 'iqonic' ),
				'default' => __( 'Tab Content', 'iqonic' ),
				'placeholder' => __( 'Tab Content', 'iqonic' ),
				'type' => Controls_Manager::WYSIWYG,
				'show_label' => false,
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
			'tabs',
			[
				'label' => __( 'Lists Items', 'markethon' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'tab_title' => __( 'List Items', 'markethon' ),                        
					]					
				],
				'title_field' => '{{{ tab_title }}}',
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
		require  MARKETHON_TH_ROOT . '/inc/elementor/render/markethon_tabs.php';		
    }	    
		
}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\markethon_Tabs() );