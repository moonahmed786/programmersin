<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

class Markethon_History extends Widget_Base {

	public function get_name() {
		return __( 'markethon_history', 'markethon' );
	}
	
	public function get_title() {
		
		return __( 'Markethon History', 'markethon' );
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
		return 'eicon-site-search';
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section',
			[
				'label' => __( 'History', 'markethon' ),
			]
		);

        $repeater = new Repeater();

        $repeater->add_control(
			'history_title',
			[
				'label' => __( 'Title', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Tab Title', 'elementor' ),
				'label_block' => true,
			]
        );

        $repeater->add_control(
			'history_date',
			[
				'label' => __( 'Date', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'format like this dd/mm/yyyy', 'elementor' ),
				'label_block' => true,
			]
        );

        $repeater->add_control(
			'history_content_title',
			[
				'label' => __( 'Content Title', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Content Title Here', 'elementor' ),
				'label_block' => true,
			]
        );

        $repeater->add_control(
			'history_content',
			[
				'label' => __( 'Content', 'markethon' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Write Content Here', 'elementor' ),
				'label_block' => true,
			]
        );

                
        $this->add_control(
			'history_tabs',
			[
				'label' => __( 'Lists Items', 'markethon' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'history_title' => __( 'List Items', 'markethon' ),
                        
					]					
				],
				'title_field' => '{{{ history_title }}}',
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
		require  MARKETHON_TH_ROOT . '/inc/elementor/render/markethon_history.php';
		
    }	    
		
}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Markethon_History() );