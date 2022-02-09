<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

class markethon_Timeline extends Widget_Base {

	public function get_name() {
		return __( 'markethon_timeline', 'markethon' );
	}
	
	public function get_title() {
		
		return __( 'markethon Timeline', 'markethon' );
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
		return 'eicon-time-line';
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section',
			[
				'label' => __( 'Timeline', 'markethon' ),
			]
		);

        $repeater = new Repeater();

        $repeater->add_control(
			'timeline_title',
			[
				'label' => __( 'Timeline Title', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Timeline Title', 'elementor' ),
				'placeholder' => __( 'Timeline Title Here', 'elementor' ),
				'label_block' => true,
			]
        );

        $repeater->add_control(
			'timeline_sub_title',
			[
				'label' => __( 'Sub Title', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Sub Title', 'elementor' ),
				'placeholder' => __( 'Sub Title Here', 'elementor' ),
				'label_block' => true,
			]
        );

        $repeater->add_control(
			'timeline_content_title',
			[
				'label' => __( 'constant Title', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'constant Title', 'elementor' ),
				'placeholder' => __( 'constant Title Here', 'elementor' ),
				'label_block' => true,
			]
        );

        $repeater->add_control(
			'timeline_content',
			[
				'label' => __( 'constant', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Constan', 'elementor' ),
				'placeholder' => __( 'Constant Here', 'elementor' ),
				'label_block' => true,
			]
        );
                 
        $this->add_control(
			'timeline_list',
			[
				'label' => __( 'Lists Items', 'markethon' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'timeline_title' => __( 'List Items', 'markethon' ),
                        
					]
					
				],
				'title_field' => '{{{ timeline_title }}}',
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
		require  MARKETHON_TH_ROOT . '/inc/elementor/render/markethon_timeline.php';
		
    }	    
		
}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\markethon_Timeline() );