<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

class markethon_Price extends Widget_Base {

	public function get_name() {
		return __( 'markethon_price', 'markethon' );
	}
	
	public function get_title() {
		return __( 'markethon Pricing Plan', 'markethon' );
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
		return 'eicon-price-table';
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section',
			[
				'label' => __( 'Pricing Plan', 'markethon' ),
			]
		);
		
		$this->add_control(
			'pricing_style',
			[
				'label'      => __( 'Pricing Table Style', 'markethon' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => '1',
				'options'    => [
					
					'1'          => __( 'Style 1', 'markethon' ),
					'2'          => __( 'Style 2', 'markethon' ),
					
				],
			]
		);
        
        $this->add_control(
			'price',
			[
				'label' => __( 'Price', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
				'default' => __( 'Free', 'markethon' ),
				
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
				'default' => __( 'Your Title Here', 'markethon' ),
			]
		);

		$this->add_control(
			'duration',
			[
				'label' => __( 'Duration Time', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Duration Time', 'markethon' ),
				'default' => __( 'Per Month', 'markethon' ),
			]
		);

		$this->add_control(
			'pricing_image',
			[
				'label' => __( 'Choose Image', 'markethon' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'pricing_style' => '1',
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		
		$this->add_control(
			'active',
			[
				'label' => __( 'Is Active?', 'markethon' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'label_off',
				'yes' => __( 'yes', 'markethon' ),
				'no' => __( 'no', 'markethon' ),
			]
		);

        $repeater = new Repeater();

        $repeater->add_control(
			'pricing_selected_icon',
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
			'pricong_icon_color',
			[
				'label' => __( 'Icon Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,				
			]
		);

        $repeater->add_control(
			'tab_title',
			[
				'label' => __( 'Plan info List', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'List Item', 'markethon' ),
				'placeholder' => __( 'List Item', 'markethon' ),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'hide_title',
			[
				'label' => __( 'Enable/disable', 'markethon' ),
				'type' => Controls_Manager::SWITCHER ,
				'label_on' => __( 'Show', 'markethon' ),
				'label_off' => __( 'Hide', 'markethon' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
        $this->add_control(
			'tabs',
			[
				'label' => __( 'List Items', 'markethon' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'tab_title' => __( 'Tab #1', 'markethon' ),
						'hide_title' => __( 'Show', 'markethon' ),
						
                        
					]
					
				],
				'title_field' => '{{{ tab_title }}}',
			]
		);

		$this->add_control(
			'button_text',
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

		$this->add_control(
			'link',
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
        require  MARKETHON_TH_ROOT . '/inc/elementor/render/markethon_price.php';
    }	    
		
}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\markethon_Price() );