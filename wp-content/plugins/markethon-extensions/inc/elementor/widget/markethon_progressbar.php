<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

class markethon_Progressbar extends Widget_Base {

	public function get_name() {
		return __( 'markethon_progressbar', 'markethon' );
	}
	
	public function get_title() {
		return __( 'markethon Progressbar', 'markethon' );
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
		return 'eicon-skill-bar';
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section',
			[
				'label' => __( 'Progressbar', 'markethon' ),
			]
		);       
        
        $repeater = new Repeater();
        $repeater->add_control(
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

		$repeater->add_control(
			'tab_score',
			[
				'label' => __( 'Score out of 100', 'markethon' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .box' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$repeater->add_control(
			'progressbar_color',
			[
				'label' => __( 'Progressbar Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,
			]
		);

		$this->add_control(
			'progressbar_style',
			[
				'label'      => __( 'FancyBox Style', 'markethon' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => '1',
				'options'    => [
					
					'1'          => __( 'Circle', 'markethon' ),
					'2'          => __( 'Horizontal Line', 'markethon' ),
					
				],
			]
		);

		$this->add_control(
			'progress_bar',
			[
				'label' => __( 'Add Progress Bar', 'markethon' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'section_title' => __( 'List Items', 'markethon' ),
						'tab_score'=>__( '50', 'markethon' ),
                        
					]
					
				],
				'title_field' => '{{{ section_title }}}',
				'figure_field' => '{{{ tab_score }}}',
			]
        );

        $this->end_controls_section();

	}
	
	protected function render() {
		$settings = $this->get_settings();
        require  MARKETHON_TH_ROOT . '/inc/elementor/render/markethon_progressbar.php';
    }	    
		
}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\markethon_Progressbar() );
?>