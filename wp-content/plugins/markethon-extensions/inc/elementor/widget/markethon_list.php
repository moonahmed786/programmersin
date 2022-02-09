<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

class markethon_Lists extends Widget_Base {

	public function get_name() {
		return __( 'markethon_lists', 'markethon' );
	}
	
	public function get_title() {
		
		return __( 'markethon Lists', 'markethon' );
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
				'label' => __( 'Lists', 'markethon' ),
			]
		);

        $this->add_control(
			'list_style',
			[
				'label'      => __( 'List Style', 'markethon' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'one',
				'options'    => [					
					'one'         => __( '1 column', 'markethon' ),
					'two'         => __( '2 column', 'markethon' ),
                    'three'       => __( '3 column', 'markethon' ),
                    'four'        => __( '4 column', 'markethon' ),					
				],
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
			'selected_icon',
			[
				'label' => __( 'Icon', 'markethon' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-star'					
				],
			]
		);
        
        $repeater->add_control(
			'title_color',
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
		require  MARKETHON_TH_ROOT . '/inc/elementor/render/markethon_list.php';		
    }	    
		
}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\markethon_Lists() );