<?php

namespace Inc\Widgets\ABCShape;

use Inc\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'ABCMAFE-ABCShape';
    protected $title = 'ABC Animated Shape';
    protected $icon = 'eicon-shape';
    protected $categories = [
        'abc-ma-category'
    ];

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'abc_ma_elementor_shape_settings',
            [
                'label' => __('Shape', 'ABCMAFE'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        //shape type
        $this->add_control(
            'abc_ma_elementor_shape_type',
            [
                'label' => esc_html__('Shape Type', 'ABCMAFE'),
                'type' => Controls_Manager::SELECT,
                'default' => 'circle',
                'options' => [
                    'circle' => esc_html__('Circle', 'ABCMAFE'),
                    'square' => esc_html__('Square', 'ABCMAFE'),
                ],
            ]
        );
        //animation show/hide
        $this->add_control(
            'abc_ma_elementor_shape_animation',
            [
                'label' => esc_html__('Animation', 'ABCMAFE'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ABCMAFE'),
                'label_off' => esc_html__('Hide', 'ABCMAFE'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );
        //select animation
        $this->add_control(
            'abc_ma_elementor_shape_animation_effect',
            [
                'label' => esc_html__('Animation Type', 'ABCMAFE'),
                'type' => Controls_Manager::SELECT,
                'default' => 'ABCSpin',
                'options' => [
                    'ABCxAxisMove' => esc_html__('X-Axis Move', 'ABCMAFE'),
                    'ABCyAxisMove' => esc_html__('Y-Axis Move', 'ABCMAFE'),
                    'ABCtriAngleMove' => esc_html__('Triangle Move', 'ABCMAFE'),
                    'ABCSpin' => esc_html__('Spin', 'ABCMAFE'),
                    'ABCRotationMove' => esc_html__('Rotation Move', 'ABCMAFE'),
                    'ABCTilt' => esc_html__('Tilt', 'ABCMAFE'),
                    'ABCTimeLineAnimate' => esc_html__('Timeline Animate', 'ABCMAFE'),
                    'ABCSpinMove' => esc_html__('Spin Move', 'ABCMAFE'),
                    'ABCclockSpin' => esc_html__('Clockwise Spin', 'ABCMAFE'),
                    'ABCAntiClockSpin' => esc_html__('Anti-Clockwise Spin', 'ABCMAFE'),
                    'ABCRotating' => esc_html__('Rotating', 'ABCMAFE'),
                ],
                'condition' => [
                    'abc_ma_elementor_shape_animation' => 'yes',
                ],
            ]
        );
                

        $this->end_controls_section();

        //abc shape style
        $this->start_controls_section(
            'abc_ma_elementor_shape_style',
            [
                'label' => __('Shape Style', 'ABCMAFE'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        //shape border radius
        $this->add_responsive_control(
            'abc_ma_elementor_shape_border_radius',
            [
                'label' => __('Border Radius', 'ABCMAFE'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-shape-area .abc-ma-ele-shape' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //shape size
        $this->add_responsive_control(
            'abc_ma_elementor_shape_size',
            [
                'label' => __('Size', 'ABCMAFE'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 500,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-shape-area .abc-ma-ele-shape' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        //shape normal/hover tabs
        $this->start_controls_tabs('abc_ma_elementor_shape_style_tabs');

        //shape normal tab
        $this->start_controls_tab(
            'abc_ma_elementor_shape_style_normal_tab',
            [
                'label' => __('Normal', 'ABCMAFE'),
            ]
        );

        //shape background 
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'abc_ma_elementor_shape_background',
                'label' => __('Background', 'ABCMAFE'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .abc-ma-shape-area .abc-ma-ele-shape',
            ]
        );

        //shape border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abc_ma_elementor_shape_border',
                'selector' => '{{WRAPPER}} .abc-ma-shape-area .abc-ma-ele-shape',
            ]
        );

        $this->end_controls_tab();

        //shape hover tab
        $this->start_controls_tab(
            'abc_ma_elementor_shape_style_hover_tab',
            [
                'label' => __('Hover', 'ABCMAFE'),
            ]
        );

        //shape hover background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'abc_ma_elementor_shape_hover_background',
                'label' => __('Background', 'ABCMAFE'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .abc-ma-shape-area:hover .abc-ma-ele-shape',
            ]
        );

        //shape hover border color
        $this->add_control(
            'abc_ma_elementor_shape_border_hover_color',
            [
                'label' => __('Border Color', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-shape-area:hover .abc-ma-ele-shape' => 'border-color: {{VALUE}};',
                ],
            ]
        );



        $this->end_controls_tab();

        $this->end_controls_tabs();


        //end of shape style
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
