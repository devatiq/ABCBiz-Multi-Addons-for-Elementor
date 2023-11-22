<?php 
namespace inc\widgets\ABCIconBox;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


use Inc\Widgets\ABCMAWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

/**
 * Elementor List Widget.
 * @since 1.0.0
 */
class Main extends ABCMAWidget {

	    // define protected variables...
		protected $name = 'abc-ma-icon-box';
		protected $title = 'ABC Icon Box';
		protected $icon = 'eicon-icon-box';
		protected $categories = [
			'abc-ma-category'
		];		
		protected $keywords = [
			'icon','abc'
		];

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
			'abc-ma-elementor-icon-box',
			[
				'label' => esc_html__( 'Content', 'ABCMAFE' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//select icon box style 
	
		$this->add_control(
			'abc_ma_elementor_icon_box_style',
			[
				'label' => esc_html__( 'Choose Style', 'ABCMAFE'),
				'type' => Controls_Manager::SELECT,
				'default' => 'style-one',
				'options' => [
					'style-one'  => esc_html__( 'Style One', 'ABCMAFE' ),
					'style-two'  => esc_html__( 'Style Two', 'ABCMAFE' ),
					'style-three'  => esc_html__( 'Style Three', 'ABCMAFE' ),
				],
			]
		);


		$this->add_control(
			'abc_ma_elementor_icon_box_icon_shape',
			[
				'label' => esc_html__( 'Icon Shape', 'ABCMAFE' ),
				'type' => Controls_Manager::ICONS,
				'condition' => [
					'abc_ma_elementor_icon_box_style' => 'style-one',
				],

				
			]
		);
		$this->add_control(
			'abc_ma_elementor_icon_box_icon',
			[
				'label' => esc_html__( 'Icon', 'ABCMAFE' ),
				'type' => Controls_Manager::ICONS,
				
			]
		);
		$this->add_control(
			'abc_ma_elementor_icon_box_title',
			[
				'label' => esc_html__( 'Title', 'ABCMAFE' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Responsive Design', 'ABCMAFE' ),
				'placeholder' => esc_html__( 'Type your title here', 'ABCMAFE' ),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);
		$this->add_control(
			'abc_ma_elementor_icon_box_desc',
			[
				'label' => esc_html__( 'Description', 'ABCMAFE' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Duis Aute Irure Dolor Reprehenderit In Voluptate Velit Esse Cillum Dolore Fugiat Nulla Pariatur', 'ABCMAFE' ),
				'placeholder' => esc_html__( 'Type your description here', 'ABCMAFE' ),
				'dynamic' => [
					'active' => true,
				],
			]			
		);

		$this->add_control(
			'abc_ma_elementor_icon_box_button_text',
			[
				'label' => esc_html__( 'Button Text', 'ABCMAFE' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More', 'ABCMAFE' ),
				'placeholder' => esc_html__( 'Type your button text here', 'ABCMAFE' ),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'abc_ma_elementor_icon_box_style' => 'style-one',
				],
			]			
		);

		$this->add_control(
			'abc_ma_elementor_icon_box_button_link',
			[
				'label' => esc_html__( 'Button Link', 'ABCMAFE' ),
				'type' => Controls_Manager::URL,
				'default' => [
					'url' => '#',
				],
				'condition' => [
					'abc_ma_elementor_icon_box_style' => 'style-one',
				],		
			]
		);

		$this->add_responsive_control(
			'abc_ma_elementor_icon_box_button_align',
			[
				'label' => esc_html__( 'Alignment', 'ABCMAFE'),
				'type' => Controls_Manager::CHOOSE,
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
				'condition' => [
					'abc_ma_elementor_icon_box_style' => 'style-one',
				],				
			]
		);


		$this->add_control(
			'abc_ma_elementor_icon_box_button_selected_icon',
			[
				'label' => esc_html__( 'Icon', 'ABCMAFE' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'skin' => 'inline',
				'label_block' => false,	
				'condition' => [
					'abc_ma_elementor_icon_box_style' => 'style-one',
				],			
			]
		);

		$this->add_control(
			'abc_ma_elementor_icon_box_button_icon_align',
			[
				'label' => esc_html__( 'Icon Position', 'ABCMAFE' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'right',
				'options' => [
					'left' => esc_html__( 'Before', 'ABCMAFE' ),
					'right' => esc_html__( 'After', 'ABCMAFE' ),
				],	
				'condition' => [
					'abc_ma_elementor_icon_box_style' => 'style-one',
				],			
			]
		);



		$this->end_controls_section(); // End the Feature option

		// box style
		$this->start_controls_section(
			'abc_ma_elementor_icon_box_area_style_section',
			[
				'label' => esc_html__( 'Box', 'ABCMAFE' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'abc_ma_elementor_icon_box_padding',
			[
				'label' => esc_html__( 'Padding', 'ABCMAFE' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .abc-ma-elementor-icon-box-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .abc-ma-single-icon-box-two-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .abc-ma-single-icon-box-three-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs(
			'abc_ma_elementor_icon_box_area_style_tabs', 
			[
				'condition'	=> [
					'abc_ma_elementor_icon_box_style' => ['style-one', 'style-three'],
				],
			]
		);

		$this->start_controls_tab(
			'abc_ma_elementor_icon_box_area_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'ABCMAFE' ),
			]
		);
		// box border (style three)
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'abc_ma_elementor_icon_box_area_border',
				'selector' => '{{WRAPPER}} .abc-ma-elementor-icon-box-area, {{WRAPPER}} .abc-ma-single-icon-box-two-area, {{WRAPPER}} .abc-ma-single-icon-box-three-area',
			]
		);
		$this->add_control(
			'abc_ma_elementor_icon_box_area_style_normal_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ABCMAFE' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],				
				'selectors' => [
					'{{WRAPPER}} .abc-ma-elementor-icon-box-area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .abc-ma-single-icon-box-two-area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .abc-ma-single-icon-box-three-area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],			
			]
	
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'acb_elementor_box_area_bg',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .abc-ma-elementor-icon-box-area, {{WRAPPER}} .abc-ma-single-icon-box-two-area, {{WRAPPER}} .abc-ma-single-icon-box-three-area',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'abc_ma_elementor_icon_box_area_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'ABCMAFE' ),
			]
		);
		// box border (style three)
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'abc_ma_elementor_icon_box_area_border_hover',
				'selector' => '{{WRAPPER}} .abc-ma-elementor-icon-box-area:hover, {{WRAPPER}} .abc-ma-single-icon-box-two-area:hover, {{WRAPPER}} .abc-ma-single-icon-box-three-area:hover',
			]
		);
		$this->add_control(
			'abc_ma_elementor_icon_box_area_style_hover_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ABCMAFE' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],	
				'default'	=> [
					'top' => '100',
					'right' => '0',
					'bottom' => '100',
					'left' => '0',
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .abc-ma-elementor-icon-box-area:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .abc-ma-single-icon-box-two-area:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .abc-ma-single-icon-box-three-area:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],			
			]
	
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'acb_elementor_box_area_bg_hover',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .abc-ma-elementor-icon-box-area:hover,{{WRAPPER}} .abc-ma-single-icon-box-two-area:hover,{{WRAPPER}} .abc-ma-single-icon-box-three-area:hover',
			]
		);	


		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();

		// icon style 
		$this->start_controls_section(
			'abc_ma_elementor_icon_box_style_section',
			[
				'label' => esc_html__( 'Icon', 'ABCMAFE' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		//icon size
		$this->add_responsive_control(
			'abc_ma_elementor_icon_box_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'ABCMAFE' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 150,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .abc-ma-single-icon-box-two-icon .abc-ma-ele-icon-box2-icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abc-ma-single-icon-box-two-icon .abc-ma-ele-icon-box-hover svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abc-ma-single-icon-box-three-area .abc-ma-ele-icon-box3-icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abc-ma-elementor-icon-box-icon .abc-ma-ele-icon-box-hover i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abc-ma-elementor-icon-box-icon .abc-ma-ele-icon-box-hover svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abc-ma-single-icon-box-two-icon .abc-ma-ele-icon-box2-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abc-ma-single-icon-box-three-area .abc-ma-ele-icon-box3-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],							
			],
		);


		$this->add_responsive_control(
			'abc_ma_elementor_icon_box_icon_indent',
			[
				'label' => esc_html__( 'Icon Spacing', 'ABCMAFE' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .abc-ma-elementor-icon-box-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abc-ma-single-icon-box-two-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abc-ma-single-icon-box-three-area' => 'gap: {{SIZE}}{{UNIT}};',
				],							
			]
		);
		// icon padding
		$this->add_control(
			'abc_ma_elementor_icon_box_icon_padding',
			[
				'label' => esc_html__( 'Icon Padding', 'ABCMAFE' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .abc-ma-single-icon-box-icons .abc-ma-ele-icon-box3-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'	=> [
					'abc_ma_elementor_icon_box_style' => 'style-three',
				],
			]
		);

		$this->start_controls_tabs(
			'abc_ma_elementor_icon_box_style_tabs'
		);

		$this->start_controls_tab(
			'abc_ma_elementor_icon_box_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'ABCMAFE' ),
			]
		);
		$this->add_control(
			'abc_ma_elementor_icon_box_icon_stroke_color',
			[
				'label' => esc_html__( 'Stroke Color', 'ABCMAFE' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abc-ma-ele-icon-box-normal svg path' => 'stroke: {{VALUE}}',
				],
				'condition'	=> [
					'abc_ma_elementor_icon_box_style' => 'style-one',
				],
			]
		);
		$this->add_control(
			'abc_ma_elementor_icon_box_icon_fill_color',
			[
				'label' => esc_html__( 'Fill Color', 'ABCMAFE' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abc-ma-ele-icon-box-hover svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .abc-ma-ele-icon-box-hover i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .abc-ma-ele-icon-box2-icon svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .abc-ma-ele-icon-box3-icon svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .abc-ma-ele-icon-box2-icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .abc-ma-ele-icon-box3-icon i' => 'color: {{VALUE}}',
				],
			]
		);
		// icon background
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'abc_ma_elementor_icon_box_icon_bg',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .abc-ma-single-icon-box-icons .abc-ma-ele-icon-box3-icon',
				'condition'	=> [
					'abc_ma_elementor_icon_box_style' => 'style-three',
				],
			]
		);
		// icon border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'abc_ma_elementor_icon_box_icon_border',
				'selector' => '{{WRAPPER}} .abc-ma-single-icon-box-icons .abc-ma-ele-icon-box3-icon',
				'condition'	=> [
					'abc_ma_elementor_icon_box_style' => 'style-three',
				],
			]
		);
		// icon border radius
		$this->add_control(
			'abc_ma_elementor_icon_box_icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ABCMAFE' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],				
				'selectors' => [
					'{{WRAPPER}} .abc-ma-single-icon-box-icons .abc-ma-ele-icon-box3-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],			
				'condition'	=> [
					'abc_ma_elementor_icon_box_style' => 'style-three',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'abc_ma_elementor_icon_box_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'ABCMAFE' ),
			]
		);

		$this->add_control(
			'abc_ma_elementor_icon_box_icon_stroke_hover_color',
			[
				'label' => esc_html__( 'Stroke Color', 'ABCMAFE' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abc-ma-elementor-icon-box-area:hover .abc-ma-ele-icon-box-normal svg path' => 'stroke: {{VALUE}}',
				],
				'condition'	=> [
					'abc_ma_elementor_icon_box_style' => 'style-one',
				],
			]
		);		
		$this->add_control(
			'abc_ma_elementor_icon_box_icon_fill_hover_color',
			[
				'label' => esc_html__( 'Fill Color', 'ABCMAFE' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abc-ma-elementor-icon-box-area:hover .abc-ma-ele-icon-box-hover svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .abc-ma-single-icon-box-two-area:hover .abc-ma-ele-icon-box2-icon svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .abc-ma-single-icon-box-three-area:hover .abc-ma-ele-icon-box3-icon svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .abc-ma-single-icon-box-two-area:hover .abc-ma-ele-icon-box2-icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .abc-ma-elementor-icon-box-area:hover .abc-ma-ele-icon-box-hover i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .abc-ma-single-icon-box-three-area:hover .abc-ma-ele-icon-box3-icon i' => 'color: {{VALUE}}',
				],
			]
		);
		// icon background
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'abc_ma_elementor_icon_box_icon_bg_hover',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .abc-ma-single-icon-box-three-area:hover .abc-ma-single-icon-box-icons .abc-ma-ele-icon-box3-icon',
				'condition'	=> [
					'abc_ma_elementor_icon_box_style' => 'style-three',
				],
			]
		);
		// icon border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'abc_ma_elementor_icon_box_icon_border_hover',
				'selector' => '{{WRAPPER}} .abc-ma-single-icon-box-three-area:hover .abc-ma-single-icon-box-icons .abc-ma-ele-icon-box3-icon',
				'condition'	=> [
					'abc_ma_elementor_icon_box_style' => 'style-three',
				],
			]
		);
		// icon border radius
		$this->add_control(
			'abc_ma_elementor_icon_box_icon_border_radius_hover',
			[
				'label' => esc_html__( 'Border Radius', 'ABCMAFE' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],				
				'selectors' => [
					'{{WRAPPER}} .abc-ma-single-icon-box-three-area:hover .abc-ma-single-icon-box-icons .abc-ma-ele-icon-box3-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],			
				'condition'	=> [
					'abc_ma_elementor_icon_box_style' => 'style-three',
				],
			]
		);
		

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section(); // end icon style

		// content style 
		$this->start_controls_section(
			'abc_ma_elementor_icon_box_content_style_section',
			[
				'label' => esc_html__( 'Content', 'ABCMAFE' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'abc_ma_elementor_icon_box_button_heading_indent',
			[
				'label' => esc_html__( 'Heading Spacing', 'ABCMAFE' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .abc-ma-elementor-icon-box-title' => 'margin-top: {{SIZE}}{{UNIT}};',
				],							
			]
		);		
		$this->add_responsive_control(
			'abc_ma_elementor_icon_box_button_content_indent',
			[
				'label' => esc_html__( 'Content Spacing', 'ABCMAFE' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .abc-ma-elementor-icon-box-desc' => 'margin-top: {{SIZE}}{{UNIT}};',
				],							
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abc_ma_elementor_icon_box_title_typography',
				'label' => esc_html__( 'Title', 'ABCMAFE' ),
				'selector' => '{{WRAPPER}} .abc-ma-elementor-icon-box-title',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abc_ma_elementor_icon_box_text_typography',
				'selector' => '{{WRAPPER}} .abc-ma-elementor-icon-box-desc',
				'label' => esc_html__( 'Content', 'ABCMAFE' ),
			]
		);


		$this->start_controls_tabs(
			'abc_ma_elementor_icon_box_content_style_tabs'
		);

		$this->start_controls_tab(
			'abc_ma_elementor_icon_box_content_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'ABCMAFE' ),
			]
		);
		$this->add_control(
			'abc_ma_elementor_icon_box_icon_title_color',
			[
				'label' => esc_html__( 'Title Color', 'ABCMAFE' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abc-ma-elementor-icon-box-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'abc_ma_elementor_icon_box_icon_text_color',
			[
				'label' => esc_html__( 'Text Color', 'ABCMAFE' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abc-ma-elementor-icon-box-desc' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'abc_ma_elementor_icon_box_content_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'ABCMAFE' ),
			]
		);
		$this->add_control(
			'abc_ma_elementor_icon_box_icon_title_hover_color',
			[
				'label' => esc_html__( 'Title Color', 'ABCMAFE' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abc-ma-elementor-icon-box-area:hover .abc-ma-elementor-icon-box-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .abc-ma-single-icon-box-two-area:hover .abc-ma-elementor-icon-box-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .abc-ma-single-icon-box-three-area:hover .abc-ma-elementor-icon-box-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'abc_ma_elementor_icon_box_icon_text_hover_color',
			[
				'label' => esc_html__( 'Text Color', 'ABCMAFE' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abc-ma-elementor-icon-box-area:hover .abc-ma-elementor-icon-box-desc' => 'color: {{VALUE}}',
					'{{WRAPPER}} .abc-ma-single-icon-box-two-area:hover .abc-ma-elementor-icon-box-desc' => 'color: {{VALUE}}',
					'{{WRAPPER}} .abc-ma-single-icon-box-three-area:hover .abc-ma-elementor-icon-box-desc' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section(); // end content style

		// button style 
		$this->start_controls_section(
			'abc_ma_elementor_icon_box_button_style_section',
			[
				'label' => esc_html__( 'Button', 'ABCMAFE' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'abc_ma_elementor_icon_box_style' => 'style-one',
				],	
			]
		);
		$this->add_control(
			'abc_ma_elementor_icon_box_button_indent',
			[
				'label' => esc_html__( 'Spacing', 'ABCMAFE' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .abc-ma-elementor-icon-box-button a' => 'margin-top: {{SIZE}}{{UNIT}};',
				],							
			]
		);		
		$this->add_control(
			'abc_ma_elementor_icon_box_button_icon_indent',
			[
				'label' => esc_html__( 'Icon Spacing', 'ABCMAFE' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .abc-ma-elementor-icon-box-button a i' => 'margin-left: {{SIZE}}{{UNIT}};',
				],							
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abc_ma_elementor_icon_box_button_typography',
				'label' => esc_html__( 'Text', 'ABCMAFE' ),
				'selector' => '{{WRAPPER}} .abc-ma-elementor-icon-box-button a',
			]
		);
		$this->add_control(
			'abc_ma_elementor_icon_box_button_padding',
			[
				'label' => esc_html__( 'Padding', 'textdomain' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .abc-ma-elementor-icon-box-button a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'abc_ma_elementor_icon_box_button_order',
				'selector' => '{{WRAPPER}} .abc-ma-elementor-icon-box-button a',
				'label' => esc_html__( 'Border', 'ABCMAFE' ),
			]
		);
		$this->add_control(
			'abc_ma_elementor_icon_box_button_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ABCMAFE' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],				
				'selectors' => [
					'{{WRAPPER}} .abc-ma-elementor-icon-box-button a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],			
			]
		);

		$this->start_controls_tabs(
			'abc_ma_elementor_icon_box_button_style_tabs'
		);

		$this->start_controls_tab(
			'abc_ma_elementor_icon_box_button_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'ABCMAFE' ),
			]
		);

		$this->add_control(
			'abc_ma_elementor_icon_box_button_color',
			[
				'label' => esc_html__( 'Color', 'ABCMAFE' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abc-ma-elementor-icon-box-button a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'abc_ma_elementor_icon_box_button_bg_color',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .abc-ma-elementor-icon-box-button a',
				'label' => esc_html__( 'Background', 'ABCMAFE' ),
			]
		);	

		$this->end_controls_tab();

		$this->start_controls_tab(
			'abc_ma_elementor_icon_box_button_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'ABCMAFE' ),
			]
		);
	
		$this->add_control(
			'abc_ma_elementor_icon_box_btn_hover_color',
			[
				'label' => esc_html__( 'Color', 'ABCMAFE' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abc-ma-elementor-icon-box-area:hover .abc-ma-elementor-icon-box-button a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'abc_ma_elementor_icon_box_btn_bg_hover',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .abc-ma-elementor-icon-box-area:hover .abc-ma-elementor-icon-box-button a',
				'label' => esc_html__( 'Background', 'ABCMAFE' ),
			]
		);	

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section(); // end content style


	}

	/**
	 * Render list widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		//load render view to show widget output on frontend/website.

		if($settings['abc_ma_elementor_icon_box_style'] == 'style-one') {
			include( ABCMAElEMENTOR_PATH . '/inc/widgets/ABCIconBox/RenderView.php' );
		}elseif($settings['abc_ma_elementor_icon_box_style'] == 'style-two') {
			include( ABCMAElEMENTOR_PATH . '/inc/widgets/ABCIconBox/RenderView2.php' );
		}elseif($settings['abc_ma_elementor_icon_box_style'] == 'style-three') {
			include( ABCMAElEMENTOR_PATH . '/inc/widgets/ABCIconBox/RenderView3.php' );
		}
		
		

	}


}