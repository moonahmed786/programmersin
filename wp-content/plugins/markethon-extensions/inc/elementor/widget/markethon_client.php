<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

/**
 * Elementor Client widget.
 *
 * Elementor widget that displays an eye-catching headlines.
 *
 * @since 1.0.0
 */

class markethon_Client extends Widget_Base {
	
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
		return __( 'Client', 'markethon' );
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve heading widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	
	public function get_title() {
		return __( 'markethon Client', 'markethon' );
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
		return 'eicon-posts-carousel';
	}

	/**
	 * Register heading widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */

	protected function _register_controls() {

		$this->start_controls_section(
			'section_client',
			[
				'label' => __( 'Client Post', 'markethon' ),
				
			]
		);

        $this->add_control(
			'client_style',
			[
				'label'      => __( 'Client Style', 'markethon' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => '1',
				'options'    => [
					
					'1'          => __( 'Client Slider', 'markethon' ),
					'2'          => __( 'Client 1 Columns', 'markethon' ),
					'3'          => __( 'Client 2 Columns', 'markethon' ),
					'4'          => __( 'Client 3 Columns', 'markethon' ),
					'5'          => __( 'Client Slider Box Shadow', 'markethon' ),
				],
			]
		);
        
        $this->add_control(
			'desk_number',
			[
				'label' => __( 'Desktop view', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'client_style' => array('1','5'),
				],
				'label_block' => true,
				'default'    => '3',
			]
		);

		$this->add_control(
			'lap_number',
			[
				'label' => __( 'Laptop view', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'client_style' => array('1','5'),
				],
				'label_block' => true,
				'default'    => '3',
			]
		);

		$this->add_control(
			'tab_number',
			[
				'label' => __( 'Tablet view', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'client_style' => array('1','5'),
				],
				'label_block' => true,
				'default'    => '2',
			]
		);

		$this->add_control(
			'mob_number',
			[
				'label' => __( 'Mobile view', 'markethon' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'client_style' => array('1','5'),
				],
				'label_block' => true,
				'default'    => '1',
			]
		);	

		$this->add_control(
			'autoplay',
			[
				'label'      => __( 'Autoplay', 'markethon' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'true',
				'options'    => [
					'true'       => __( 'True', 'markethon' ),
					'false'      => __( 'False', 'markethon' ),
					
				],
				'condition' => [
					'client_style' => array('1','5'),
				]
			]
		);

		$this->add_control(
			'loop',
			[
				'label'      => __( 'Loop', 'markethon' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'true',
				'options'    => [
					'true'       => __( 'True', 'markethon' ),
					'false'      => __( 'False', 'markethon' ),
					
				],
				'condition' => [
					'client_style' => array('1','5'),
				]
			]
		);

		$this->add_control(
			'dots',
			[
				'label'      => __( 'Dots', 'markethon' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'true',
				'options'    => [
					'true'       => __( 'True', 'markethon' ),
					'false'      => __( 'False', 'markethon' ),
					
				],
				'condition' => [
					'client_style' => array('1','5'),
				]
			]
		);

		$this->add_control(
			'nav-arrow',
			[
				'label'      => __( 'Arrow', 'markethon' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'true',
				'options'    => [
					'true'       => __( 'True', 'markethon' ),
					'false'      => __( 'False', 'markethon' ),
					
				],
				'condition' => [
					'client_style' => array('1','5'),
				]
			]
		);

		$this->add_responsive_control(
			'margin',
			[
				'label' => __( 'Margin', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				
				'condition' => [
					'client_style' => array('1','5'),
				]
				
			]
		);

		$this->add_control(
			'order',
			[
				'label'   => __( 'Order By', 'markethon' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'ASC',
				'options' => [
						'DESC' => esc_html__('Descending', 'markethon'), 
						'ASC' => esc_html__('Ascending', 'markethon') 
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
	/**
	 * Render Client widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	
	protected function render() {
		
		require  MARKETHON_TH_ROOT . '/inc/elementor/render/markethon_client.php';
		
		if ( Plugin::$instance->editor->is_edit_mode() ) : ?>

			<script>	
				jQuery('.owl-carousel').each(function() {       
                    var jQuerycarousel = jQuery(this);
                    jQuerycarousel.owlCarousel({
                        items: jQuerycarousel.data("items"),                        
                        loop: jQuerycarousel.data("loop"),
                        margin: jQuerycarousel.data("margin"),
                        nav: jQuerycarousel.data("nav"),
                        dots: jQuerycarousel.data("dots"),
                        autoplay: jQuerycarousel.data("autoplay"),
                        autoplayTimeout: jQuerycarousel.data("autoplay-timeout"),
                        navText: ["<i class='fa fa-angle-left fa-2x'></i>", "<i class='fa fa-angle-right fa-2x'></i>"],
                        responsiveClass: true,
                        responsive: {
                            // breakpoint from 0 up
                            0: {
                                items: jQuerycarousel.data("items-mobile-sm"),
                                nav: false,
                                dots: true
                            },
                            // breakpoint from 480 up
                            480: {
                                items: jQuerycarousel.data("items-mobile"),
                                nav: false,
                                dots: true
                            },
                            // breakpoint from 786 up
                            786: {
                                items: jQuerycarousel.data("items-tab")
                            },
                            // breakpoint from 1023 up
                            1023: {
                                items: jQuerycarousel.data("items-laptop")
                            },
                            1199: {
                                items: jQuerycarousel.data("items")
                            }
                        }
                    });
		        });
			</script>
		
		<?php endif; 
    }	    
		
}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\markethon_Client() );

?>