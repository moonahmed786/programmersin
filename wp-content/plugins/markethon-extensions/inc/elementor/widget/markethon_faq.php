<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

class Iq_Accordion extends Widget_Base {

	public function get_name() {
		return __( 'markethon_accordion', 'markethon' );
	}
	
	public function get_title() {
		return __( 'markethon Accordion', 'markethon' );
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
		return 'eicon-help-o';
	}

	public function get_script_depends() {
		return [ 'markethon-custom' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section' . rand(10,1000),
			[
				'label' => __( 'Accordion Style', 'markethon' ),
			]
		);

        $this->end_controls_section();
        
		$this->start_controls_section(
			'section',
			[
				'label' => __( 'Accordion', 'markethon' ),
			]
		);
        
        $repeater = new Repeater();

        $repeater->add_control(
			'tab_title',
			[
				'label' => __( 'Question', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'What is Lorem Ipsum?', 'markethon' ),
				'placeholder' => __( 'Tab Title', 'markethon' ),
				'label_block' => true,
			]
        );
        
        $repeater->add_control(
			'tab_content',
			[
				'label' => __( 'Answer', 'markethon' ),
				'default' => __( 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'markethon' ),
				'placeholder' => __( 'Tab Content', 'markethon' ),
				'type' => Controls_Manager::TEXTAREA,
				'show_label' => false,
			]
        );
        
        $this->add_control(
			'tabs',
			[
				'label' => __( 'Tabs Items', 'markethon' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'tab_title' => __( 'Tab #1', 'markethon' ),
                        'tab_content' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'markethon' ),             
					]
					
				],
				'title_field' => '{{{ tab_title }}}',
			]
        );

        $this->add_control(
			'has_icon',
			[
				'label' => __( 'Use Icon?', 'markethon' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'label_off',
				'yes' => __( 'yes', 'markethon' ),
				'no' => __( 'no', 'markethon' ),
			]
		);
		
		$this->add_control(
			'has_box_shadow',
			[
				'label' => __( 'Box Shaow?', 'markethon' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'label_off',
				'yes' => __( 'yes', 'markethon' ),
				'no' => __( 'no', 'markethon' ),
			]
        );
        
        $this->add_control(
			'active_icon',
			[
				'label' => __( 'Active Icon', 'markethon' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-star'
					
				],
				'condition' => [
					'has_icon' => 'yes',
				],
				'label_block' => false,
				'skin' => 'inline',
			]
		);

		$this->add_control(
			'inactive_icon',
			[
				'label' => __( 'Inactive Icon', 'markethon' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-star'
					
				],
				'condition' => [
					'has_icon' => 'yes',
				],
				'label_block' => false,
				'skin' => 'inline',	
			]
		);

		$this->add_responsive_control(
			'icon_position',
			[
				'label' => __( 'Icon Position', 'markethon' ),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'right',
				'options' => [
					'left' => [
						'title' => __( 'Left', 'markethon' ),
						'icon' => 'eicon-text-align-left',
					],					
					'right' => [
						'title' => __( 'Right', 'markethon' ),
						'icon' => 'eicon-text-align-right',
					],					
                ],
                'condition' => [
					'has_icon' => 'yes',
				],
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'      => __( 'Title Tag', 'markethon' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'h4',
				'options'    => [					
					'h1'          => __( 'h1', 'markethon' ),
					'h2'          => __( 'h2', 'markethon' ),
					'h3'          => __( 'h3', 'markethon' ),
					'h4'          => __( 'h4', 'markethon' ),
					'h5'          => __( 'h5', 'markethon' ),
					'h6'          => __( 'h6', 'markethon' ),										
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

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'Title', 'markethon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Text Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .iq-accordion .iq-accordion-title .accordion-title' => 'color: {{VALUE}};',
					
				],
			]
		);

		$this->add_control(
			'title_active_color',
			[
				'label' => __( 'Text Active Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .iq-accordion .iq-active .iq-accordion-title .accordion-title' => 'color: {{VALUE}};',
					
				],
			]
		);

		$this->add_control(
			'title_back_color',
			[
				'label' => __( 'Background Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .iq-accordion .iq-accordion-title' => 'background: {{VALUE}};',
					
				],
			]
		);

		$this->add_control(
			'title_back_active_color',
			[
				'label' => __( 'Active Background Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .iq-active .iq-accordion-title' => 'background: {{VALUE}};',
					
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_style',
			[
				'label' => __( 'Content', 'markethon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => __( 'Content Text Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .iq-accordion .iq-accordion-details' => 'color: {{VALUE}};',
					
				],
			]
		);

		$this->add_control(
			'content_back_color',
			[
				'label' => __( 'Background Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .iq-accordion .iq-accordion-details' => 'background: {{VALUE}};',
					
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => __( 'Icon', 'markethon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'icon_active_color',
			[
				'label' => __( 'Active Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .iq-accordion .iq-accordion-block.iq-active .iq-accordion-title i.active' => 'color: {{VALUE}};',
					
				],
			]
		);

		$this->add_control(
			'icon_inactive_color',
			[
				'label' => __( 'Inactive Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .iq-accordion .iq-accordion-block .iq-accordion-title i.inactive' => 'color: {{VALUE}};',
					
				],
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_border_style',
			[
				'label' => __( 'Border', 'markethon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'has_border',
			[
				'label' => __( 'Border?', 'markethon' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'label_off',
				'yes' => __( 'yes', 'markethon' ),
				'no' => __( 'no', 'markethon' ),
			]
        );

        $this->add_control(
			'border_style',
				[
					'label' => __( 'Border Style', 'markethon' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'none',
					'options' => [
						'solid'  => __( 'Solid', 'markethon' ),
						'dashed' => __( 'Dashed', 'markethon' ),
						'dotted' => __( 'Dotted', 'markethon' ),
						'double' => __( 'Double', 'markethon' ),
						'outset' => __( 'outset', 'markethon' ),
						'groove' => __( 'groove', 'markethon' ),
						'ridge' => __( 'ridge', 'markethon' ),
						'inset' => __( 'inset', 'markethon' ),
						'hidden' => __( 'hidden', 'markethon' ),
						'none' => __( 'none', 'markethon' ),
						
					],
					'condition' => [
					'has_border' => 'yes',
					],
					'selectors' => [
						'{{WRAPPER}} .iq-accordion .iq-accordion-block' => 'border-style: {{VALUE}};',
						
					],
				]
		);

		$this->add_control(
			'border_active_color',
			[
				'label' => __( 'Active Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .iq-accordion .iq-accordion-block.iq-active' => 'border-color: {{VALUE}};',
					
				],
				'condition' => [
					'has_border' => 'yes',
				],
			]
		);

		$this->add_control(
			'border_inactive_color',
			[
				'label' => __( 'Inactive Color', 'markethon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .iq-accordion .iq-accordion-block' => 'border-color: {{VALUE}};',
					
				],
				'condition' => [
					'has_border' => 'yes',
				],
			]
		);

		
		$this->add_control(
			'border_width',
			[
				'label' => __( 'Border Width', 'markethon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .iq-accordion .iq-accordion-block' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'has_border' => 'yes',
				],
			]
		);

		$this->end_controls_section();
		$this->end_controls_section();       

	}
	
	protected function render() {

		$settings = $this->get_settings();
        require  MARKETHON_TH_ROOT . '/inc/elementor/render/markethon_faq.php'; ?>
        	<script type="text/javascript">
        		/*------------------------
                Accordion
                --------------------------*/
                jQuery('.iq-accordion .iq-accordion-block .iq-accordion-details').hide();
                jQuery('.iq-accordion .iq-accordion-block:first').addClass('iq-active').children().slideDown('slow');
                jQuery('.iq-accordion .iq-accordion-block').on("click", function() {
                    if (jQuery(this).children('div.iq-accordion-details').is(':hidden')) {
                        jQuery('.iq-accordion .iq-accordion-block').removeClass('iq-active').children('div.iq-accordion-details').slideUp('slow');
                        jQuery(this).toggleClass('iq-active').children('div.iq-accordion-details').slideDown('slow');
                    }
                });
        	</script>
        <?php 
    }	    
		
}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Iq_Accordion() );