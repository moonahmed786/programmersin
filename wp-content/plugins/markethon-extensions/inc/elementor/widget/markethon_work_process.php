<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

/**
 * Elementor Blog widget.
 *
 * Elementor widget that displays an eye-catching headlines.
 *
 * @since 1.0.0
 */

class markethon_work_process extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve heading widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */

	public function get_name() {
		return __( 'markethon_work_process', 'markethon' );
	}

	/**
	 * Get widget Title.
	 *
	 * Retrieve heading widget Title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget Title.
	 */
	
	public function get_title() {
		return __( 'Work Process', 'markethon' );
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the heading widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since 2.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */


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
		return 'eicon-sort-amount-desc';
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section',
			[
				'label' => __( 'Work Process', 'markethon' ),
			]
		);

		$repeater = new Repeater();

        $repeater->add_control(
			'pro_title',
			[
				'label' => __( 'Title', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
				'default' => __( 'Title', 'markethon' ),
			]
		);

		$repeater->add_control(
			'pro_content',
			[
				'label' => __( 'Content', 'markethon' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'step_number',
			[
				'label' => __( 'Step Number', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
				'default' => __( '0', 'markethon' ),
			]
		);

		$repeater->add_control(
			'work_image',
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

		$repeater->add_control(
			'work_btn_title',
			[
				'label' => __( 'Button Text', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
				'default' => __( 'Read More', 'markethon' ),
			]
		);

		$repeater->add_control(
			'work_link',
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

		$repeater->add_control(
			'work_right_test',
			[
				'label' => __( 'Right Side Text', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
			]
		); 	

		$repeater->add_control(
			'hide_before_effect',
			[
				'label' => __( 'Before Effect', 'elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'prefix_class' => 'elementor-',
				'label_on' => 'Hide',
				'label_off' => 'Show',
				'return_value' => 'yes',
				'default' => 'no',
			]
		);	

		$this->add_control(
			'list',
			[
				'label' => __( 'Lists Items', 'markethon' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'pro_title' => __( 'List Items', 'markethon' ),
                        
					]
					
				],
				'title_field' => '{{{ pro_title }}}',
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
        require  MARKETHON_TH_ROOT . '/inc/elementor/render/markethon_work_process.php';
    }	    
		
}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\markethon_work_process() );