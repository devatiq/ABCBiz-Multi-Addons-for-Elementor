<?php

namespace Inc\Widgets\ABCPopup;

use Inc\Widgets\ABCMAWidget;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;


class Main extends ABCMAWidget
{

    // define protected variables...
    protected $name = 'abc-ma-elementor-ABCPopup';
    protected $title = 'ABC Popup';
    protected $icon = 'eicon-lightbox-expand';
    protected $categories = [
        'abc-ma-category'
    ];

    public function get_script_depends()
    {
        return ['magnific-popup'];
    }

    public function get_style_depends()
    {
        return ['magnific-popup'];
    }
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
            'abc_ma_elementor_popup_section',
            [
                'label' => __('Popup', 'ABCMAFE'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        //content type
        $this->add_control(
            'abc_ma_elementor_popup_content_type',
            [
                'label' => __('Content Type', 'ABCMAFE'),
                'type' => Controls_Manager::SELECT,
                'default' => 'text',
                'options' => [
                    'text'  => __('Text', 'ABCMAFE'),
                    'icon' => __('Icon', 'ABCMAFE'),
                    'image' => __('Image', 'ABCMAFE'),
                ],
            ]
        );
        // popup text
        $this->add_control(
            'abc_ma_elementor_popup_text',
            [
                'label' => __('Popup Text', 'ABCMAFE'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Popup Text',
                'condition' => [
                    'abc_ma_elementor_popup_content_type' => 'text',
                ],
            ]
        );
        // popup icon
        $this->add_control(
            'abc_ma_elementor_popup_icon',
            [
                'label' => __('Popup Icon', 'ABCMAFE'),
                'type' => Controls_Manager::ICONS,                
                'condition' => [
                    'abc_ma_elementor_popup_content_type' => 'icon',
                ],
            ]
        );
        // popup image
        $this->add_control(
            'abc_ma_elementor_popup_image',
            [
                'label' => __('Popup Image', 'ABCMAFE'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'abc_ma_elementor_popup_content_type' => 'image',
                ],
            ]
        );


        // popup type
        $this->add_control(
            'abc_ma_elementor_popup_type',
            [
                'label' => __('Popup Type', 'ABCMAFE'),
                'type' => Controls_Manager::SELECT,
                'default' => 'video',
                'options' => [
                    'video' => __('Video', 'ABCMAFE'),
                    'gmap' => __('Google Map', 'ABCMAFE'),
                ],
            ]
        );
        // popup video
        $this->add_control(
            'abc_ma_elementor_popup_video',
            [
                'label' => __('Popup Video', 'ABCMAFE'),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => 'https://www.youtube.com/watch?v=qtNnAJOGCcw',
                ],
                'condition' => [
                    'abc_ma_elementor_popup_type' => 'video',
                ],
            ]
        );
        // popup gmap
        $this->add_control(
            'abc_ma_elementor_popup_gmap',
            [
                'label' => __('Google Map', 'ABCMAFE'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3618057.6387792374!2d-86.44980745076629!3d27.678376067544153!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4daec28b478b666b%3A0x40d7d670f849f542!2sSupreoX%20Limited%20USA!5e0!3m2!1sen!2sbd!4v1699363617377!5m2!1sen!2sbd',          
                'condition' => [
                    'abc_ma_elementor_popup_type' => 'gmap',
                ],
            ]
        );

        // end of popup
        $this->end_controls_section();

        // popup style
        $this->start_controls_section(
            'abc_ma_elementor_popup_style_section',
            [
                'label' => __('Popup Style', 'ABCMAFE'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // popup text style
        $this->add_control(
            'abc_ma_elementor_popup_text_style',
            [
                'label' => __('Text Style', 'ABCMAFE'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'abc_ma_elementor_popup_content_type' => 'text',
                ],
            ]
        );
        $this->add_control(
            'abc_ma_elementor_popup_text_color',
            [
                'label' => __('Text Color', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-popup-area .abc-ma-popup-content-text' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'abc_ma_elementor_popup_content_type' => 'text',
                ],
            ]
        );

        // popup text background
        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'abc-ma-elementor-popup-text-background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .abc-ma-popup-area .abc-ma-popup-content-text',
                'condition' => [
                    'abc_ma_elementor_popup_content_type' => 'text',
                ],
			]
		);
        // popup text typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_ma_elementor_popup_text_typography',
                'label' => __('Typography', 'ABCMAFE'),
                'selector' => '{{WRAPPER}} .abc-ma-popup-area .abc-ma-popup-content-text',
                'condition' => [
                    'abc_ma_elementor_popup_content_type' => 'text',
                ],
            ]
        );
        // popup text padding
        $this->add_responsive_control(
            'abc_ma_elementor_popup_text_padding',
            [
                'label' => __('Padding', 'ABCMAFE'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-popup-area .abc-ma-popup-content-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'abc_ma_elementor_popup_content_type' => 'text',
                ],
            ]
        );
        // popup text border radius
        $this->add_responsive_control(
            'abc_ma_elementor_popup_text_border_radius',
            [
                'label' => __('Border Radius', 'ABCMAFE'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-popup-area .abc-ma-popup-content-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'abc_ma_elementor_popup_content_type' => 'text',
                ],
            ]
        );
        // popup icon style
        $this->add_control(
            'abc_ma_elementor_popup_icon_style',
            [
                'label' => __('Icon Style', 'ABCMAFE'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'abc_ma_elementor_popup_content_type' => 'icon',
                ],
            ]
        );
        $this->add_control(
            'abc_ma_elementor_popup_icon_color',
            [
                'label' => __('Icon Color', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-popup-area .abc-ma-popup-content-icon' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'abc_ma_elementor_popup_content_type' => 'icon',
                ],
            ]
        );
        // popup icon background
        $this->add_group_control(
           Group_Control_Background::get_type(),
            [
                'name' => 'abc-ma-elementor-popup-icon-background',
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .abc-ma-popup-area .abc-ma-popup-content-icon',
                'condition' => [
                    'abc_ma_elementor_popup_content_type' => 'icon',
                ],
            ]
        );
        // popup icon border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abc_ma_elementor_popup_icon_border',
                'label' => __('Border', 'ABCMAFE'),
                'selector' => '{{WRAPPER}} .abc-ma-popup-area .abc-ma-popup-content-icon',
                'condition' => [
                    'abc_ma_elementor_popup_content_type' => 'icon',
                ],
            ]
        );
        // popup icon border radius
        $this->add_responsive_control(
            'abc_ma_elementor_popup_icon_border_radius',
            [
                'label' => __('Border Radius', 'ABCMAFE'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-popup-area .abc-ma-popup-content-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'abc_ma_elementor_popup_content_type' => 'icon',
                ],
            ]
        );
        // popup icon size
        $this->add_responsive_control(
            'abc_ma_elementor_popup_icon_size',
            [
                'label' => __('Icon Size', 'ABCMAFE'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 30,
                ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-popup-area .abc-ma-popup-content-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .abc-ma-popup-area .abc-ma-popup-content-icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'abc_ma_elementor_popup_content_type' => 'icon',
                ],
            ]
        );
        // popup icon padding
        $this->add_responsive_control(
            'abc_ma_elementor_popup_icon_padding',
            [
                'label' => __('Icon Padding', 'ABCMAFE'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-popup-area .abc-ma-popup-content-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'abc_ma_elementor_popup_content_type' => 'icon',
                ],
            ]
        );
        // popup image style
        $this->add_control(
            'abc_ma_elementor_popup_image_style',
            [
                'label' => __('Image Style', 'ABCMAFE'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'abc_ma_elementor_popup_content_type' => 'image',
                ],
            ]
        );
        // popup image border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abc_ma_elementor_popup_image_border',
                'label' => __('Border', 'ABCMAFE'),
                'selector' => '{{WRAPPER}} .abc-ma-popup-area .abc-ma-popup-content-image img',
                'condition' => [
                    'abc_ma_elementor_popup_content_type' => 'image',
                ],
            ]
        );
        // popup image border radius
        $this->add_responsive_control(
            'abc_ma_elementor_popup_image_border_radius',
            [
                'label' => __('Border Radius', 'ABCMAFE'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-popup-area .abc-ma-popup-content-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'abc_ma_elementor_popup_content_type' => 'image',
                ],
            ]
        );

        // popup style end
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
    protected function render()   {

  
        //load render view to show widget output on frontend/website.
        include 'RenderView.php';
    }
}
