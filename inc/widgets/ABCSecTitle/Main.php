<?php 
namespace inc\widgets\ABCSecTitle;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Inc\Widgets\ABCMAWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;

/**
 * Elementor List Widget.
 * @since 1.0.0
 */
class Main extends ABCMAWidget {

	    // define protected variables...
		protected $name = 'abc-ma-sec-title';
		protected $title = 'ABC Section Title';
		protected $icon = 'eicon-post-title';
		protected $categories = [
			'abc-ma-category'
		];		
		protected $keywords = [
			'section','abc'
		];

		public function get_style_depends()
    {
        return ['abc-ma-section-title-style'];
    }

	/**
	 * Register list widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		//Template
		$this->start_controls_section(
			'abc-ma-elementor-sec-title-section',
			[
				'label' => esc_html__( 'Title Content', 'ABCMAFE' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//Heading tag

        $this->add_control(
            'abc_ma_elementor_sec_title_tag',
            [
                'label' => esc_html__('Heading Tag', 'ABCMAFE'),
                'type' => Controls_Manager::SELECT,
                'default' => 'h3',
                'options' => [
                    'h1' => esc_html__('H1', 'ABCMAFE'),
                    'h2' => esc_html__('H2', 'ABCMAFE'),
                    'h3' => esc_html__('H3', 'ABCMAFE'),
                    'h4' => esc_html__('H4', 'ABCMAFE'),
                    'h5' => esc_html__('H5', 'ABCMAFE'),
                    'H6' => esc_html__('H6', 'ABCMAFE'),
                ],
            
            ]
        );

		//Title part one
		$this->add_control(
			'abc_ma_elementor_sec_title_one',
			[
				'label' => esc_html__( 'Title Part 1', 'ABCMAFE' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Responsive', 'ABCMAFE' ),
				'placeholder' => esc_html__( 'Type your section Title Firt Part', 'ABCMAFE' ),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);
        
		//Title part two
		$this->add_control(
			'abc_ma_elementor_sec_title_two',
			[
				'label' => esc_html__( 'Title Part 2', 'ABCMAFE' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Design', 'ABCMAFE' ),
				'placeholder' => esc_html__( 'Type your section Title Second Part', 'ABCMAFE' ),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);
        
		//Divider show/hide
        $this->add_control(
            'abc_ma_elementor_sec_title_div',
            [
                'label' => esc_html__('Bottom Divider', 'ABCMAFE'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ABCMAFE'),
                'label_off' => esc_html__('Hide', 'ABCMAFE'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

         
		//Divider Width
		$this->add_responsive_control(
            'abc_ma_elementor_sec_title_div_size',
            [
                'label' => esc_html__('Divider Width', 'ABCMAFE'),
                'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
                'range' => [
					'px' => [
						'min' => 20,
						'max' => 500,
						'step' => 10,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 120,
				],
				'selectors' => [
					'{{WRAPPER}} .abc-ma-elementor-sec-title-divider' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'abc_ma_elementor_sec_title_div' => 'yes',
				],
            
            ]
        );

		//Divider height
		$this->add_responsive_control(
            'abc_ma_elementor_sec_title_div_height',
            [
                'label' => esc_html__('Divider Height', 'ABCMAFE'),
                'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
                'range' => [
					'px' => [
						'min' => 1,
						'max' => 20,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 3,
				],
				'selectors' => [
					'{{WRAPPER}} .abc-ma-elementor-sec-title-divider' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'abc_ma_elementor_sec_title_div' => 'yes',
				],
            
            ]
        );

		//Divider Gap
		$this->add_responsive_control(
            'abc_ma_elementor_sec_title_div_gap',
            [
                'label' => esc_html__('Divider Gap', 'ABCMAFE'),
                'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
                'range' => [
					'px' => [
						'min' => -50,
						'max' => 50,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => -5,
				],
				'selectors' => [
					'{{WRAPPER}} .abc-ma-elementor-sec-title-divider' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'abc_ma_elementor_sec_title_div' => 'yes',
				],
            
            ]
        );

		//Title Alignment

		$this->add_responsive_control(
			'abc_ma_elementor_sec_title_align',
			[
				'label' => esc_html__( 'Alignment', 'ABCMAFE'),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'ABCMAFE' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'ABCMAFE' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'ABCMAFE' ),
						'icon' => 'eicon-text-align-right',
					],
				],				
				'selectors' => [
					'{{WRAPPER}} .abc-ma-elementor-title-align' => 'text-align: {{VALUE}}',
				],
			]
		);
		

		$this->end_controls_section();

        //abc section title style
		
        $this->start_controls_section(
            'abc_ma_elementor_sec_title_style',
            [
                'label' => esc_html__('Title Style', 'ABCMAFE'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'abc_ma_elementor_sec_title_one_color',
			[
				'label' => esc_html__( 'Title Part 1 Color', 'ABCMAFE' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .abc-ma-elementor-sec-title-one' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abc_ma_elementor_sec_title_one_typography',
				'label' => esc_html__( 'Title Part 1 Typography', 'ABCMAFE' ),
				'selector' => '{{WRAPPER}} .abc-ma-elementor-sec-title-one',
			]
		);

		$this->add_control(
			'abc_ma_elementor_sec_title_two_color',
			[
				'label' => esc_html__( 'Title Part 2 Color', 'ABCMAFE' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#458f0c',
				'selectors' => [
					'{{WRAPPER}} .abc-ma-elementor-sec-title-two' => 'color: {{VALUE}}',
				],
			]
		);
        
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abc_ma_elementor_sec_title_two_typography',
				'label' => esc_html__( 'Title Part 2 Typography', 'ABCMAFE' ),
				'selector' => '{{WRAPPER}} .abc-ma-elementor-sec-title-two',
			]
		);

        //end of title style
        $this->end_controls_section();


		$this->start_controls_section(
            'abc_ma_elementor_sec_title_div_bg_styly',
            [
                'label' => esc_html__('Divider Background', 'ABCMAFE'),
                'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'abc_ma_elementor_sec_title_div' => 'yes',
				],
            ]
        );

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'abc_ma_elementor_sec_div_bg_color',
				'label' => esc_html__( 'Divider Color', 'ABCMAFE' ),
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .abc-ma-elementor-sec-title-divider',
			]
		);

		//end of divider bg style
        $this->end_controls_section();

    }

    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render()
    {
        //load render view to show widget output on frontend/website.
        include 'RenderView.php';
    }
}
