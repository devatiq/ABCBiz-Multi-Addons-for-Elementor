<?php

namespace Inc\Widgets\ABCPricingTable;

use Inc\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;


class Main extends BaseWidget
{

    // define protected variables...
    protected $name = 'abc-ma-elementor-ABCPricingTable';
    protected $title = 'ABC Pricing Table';
    protected $icon = 'eicon-price-table';
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
            'abc_ma_elementor_pricingTable_header_section',
            [
                'label' => __('Pricing Header', 'ABCMAFE'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        // Pricing pacakge name
        $this->add_control(
            'abc_ma_elementor_pricingTable_name',
            [
                'label' => __('Package Name', 'ABCMAFE'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Basic Plan', 'ABCMAFE'),
                'label_block' => true,
            ]
        );
        // Pricing package Price
        $this->add_control(
            'abc_ma_elementor_pricingTable_price',
            [
                'label' => __('Price', 'ABCMAFE'),
                'type' => Controls_Manager::TEXT,
                'default' => __('$499', 'ABCMAFE'),
            ]
        );
        // Pricing package Price period
        $this->add_control(
            'abc_ma_elementor_pricingTable_price_period',
            [
                'label' => __('Period', 'ABCMAFE'),
                'type' => Controls_Manager::TEXT,
                'default' => __('/Monthly', 'ABCMAFE'),
            ]
        );
        // Pricing package Recommended
        $this->add_control(
            'abc_ma_elementor_pricingTable_recommended',
            [
                'label' => __('Recommended', 'ABCMAFE'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'ABCMAFE'),
                'label_off' => __('No', 'ABCMAFE'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        // pacakge recommended position left or top
        $this->add_control(
            'abc_ma_elementor_pricingTable_recommended_position',
            [
                'label' => __('Recommended Position', 'ABCMAFE'),
                'type' => Controls_Manager::SELECT,
                'default' => 'top',
                'options' => [
                    'left' => __('Left', 'ABCMAFE'),
                    'top' => __('Top', 'ABCMAFE'),
                ],
                'condition' => [
                    'abc_ma_elementor_pricingTable_recommended' => 'yes',
                ],
            ]
        );
        // pacakge recommended text
        $this->add_control(
            'abc_ma_elementor_pricingTable_recommended_text',
            [
                'label' => __('Recommended Text', 'ABCMAFE'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Recommended', 'ABCMAFE'),
                'condition' => [
                    'abc_ma_elementor_pricingTable_recommended' => 'yes',
                ],
            ]
        );

        // show/hide header border shape
        $this->add_control(
            'abc_ma_elementor_pricingTable_header_border_shape',
            [
                'label' => __('Border Shape', 'ABCMAFE'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'ABCMAFE'),
                'label_off' => __('Hide', 'ABCMAFE'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );


        // end of Pricing header section
        $this->end_controls_section();

        // start of Pricing body section
        $this->start_controls_section(
            'abc_ma_elementor_pricingTable_body_section',
            [
                'label' => __('Package Features', 'ABCMAFE'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Pricing body features list
        $repeater = new \Elementor\Repeater();

        // feature text
        $repeater->add_control(
            'abc_ma_elementor_pricingTable_feature_text',
            [
                'label' => esc_html__('Text', 'ABCMAFE'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('5GB Disk Space', 'ABCMAFE'),
                'label_block' => true,
            ],
        );
        // feature icon
        $repeater->add_control(
            'abc_ma_elementor_pricingTable_feature_icon',
            [
                'label' => esc_html__('Icon', 'ABCMAFE'),
                'type' => Controls_Manager::ICONS,
            ],
        );
        // icon color
        $repeater->add_control(
            'abc_ma_elementor_pricingTable_feature_icon_color',
            [
                'label' => esc_html__('Icon Color', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-table-body ul {{CURRENT_ITEM}} i' => 'color: {{VALUE}}',
                ],
            ],
        );
        // Feature list
        $this->add_control(
            'abc_pricingTable_features_list',
            [
                'label' => esc_html__('Features List', 'ABCMAFE'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'abc_ma_elementor_pricingTable_feature_text' => esc_html__('Title #1', 'ABCMAFE'),
                    ],
                    [
                        'abc_ma_elementor_pricingTable_feature_text' => esc_html__('Title #2', 'ABCMAFE'),
                    ],
                ],
                'title_field' => '{{{ abc_ma_elementor_pricingTable_feature_text }}}',
            ]
        );

        // end of Pricing body section
        $this->end_controls_section();

        // start of Pricing footer section
        $this->start_controls_section(
            'abc_ma_elementor_pricingTable_footer_section',
            [
                'label' => __('Button', 'ABCMAFE'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        // Pricing footer button text
        $this->add_control(
            'abc_ma_elementor_pricingTable_button_text',
            [
                'label' => __('Button Text', 'ABCMAFE'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Purchase Now', 'ABCMAFE'),
                'label_block' => true,
            ]
        );
        // Pricing footer button link
        $this->add_control(
            'abc_ma_elementor_pricingTable_button_link',
            [
                'label' => __('Button Link', 'ABCMAFE'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'ABCMAFE'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        // pricing button icon
        $this->add_control(
            'abc_ma_elementor_pricingTable_button_icon',
            [
                'label' => __('Button Icon', 'ABCMAFE'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-arrow-right',
                    'library' => 'fa-arrow-right',
                ],
            ]
        );

        // pricing button icon space
        $this->add_responsive_control(
            'abc_ma_elementor_pricingTable_button_icon_space',
            [
                'label' => __('Icon Space', 'ABCMAFE'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-table-footer a i' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // end of Pricing footer section
        $this->end_controls_section();


        // start of Pricing table box full area style section
        $this->start_controls_section(
            'abc_ma_elementor_pricingTable_box_style_section',
            [
                'label' => __('Box', 'ABCMAFE'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // box background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'abc_ma_elementor_pricingTable_box_bg',
                'types' => ['classic', 'gradient'],
                'label' => __('Background', 'ABCMAFE'),
                'selector' => '{{WRAPPER}} .abc-ma-ele-pricing-table-area',
            ]
        );
        // pricing table box border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abc_ma_elementor_pricingTable_box_border',
                'selector' => '{{WRAPPER}} .abc-ma-ele-pricing-table-area',
            ]
        );

        // pricing table box border radius
        $this->add_responsive_control(
            'abc_ma_elementor_pricingTable_box_border_radius',
            [
                'label' => __('Border Radius', 'ABCMAFE'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-table-area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        // end of Pricing table box full area style section


        // start of Pricing table header style section
        $this->start_controls_section(
            'abc_ma_elementor_pricingTable_header_style_section',
            [
                'label' => __('Header', 'ABCMAFE'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // pacakge price typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_ma_elementor_pricingTable_price_typography',
                'label' => __('Price Typography', 'ABCMAFE'),
                'selector' => '{{WRAPPER}} .abc-ma-ele-pricing-pack-preiod h3',
            ]
        );
        // pacakge price period typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_ma_elementor_pricingTable_price_period_typography',
                'label' => __('Period Typography', 'ABCMAFE'),
                'selector' => '{{WRAPPER}} .abc-ma-ele-pricing-pack-preiod h3 sub',
            ]
        );
        // pacakge recommended typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_ma_elementor_pricingTable_recommended_typography',
                'label' => __('Recommended Typography', 'ABCMAFE'),
                'selector' => '{{WRAPPER}} .abc-ma-ele-pricing-recommended span',
                'condition' => [
                    'abc_ma_elementor_pricingTable_recommended' => 'yes',
                ],
            ]
        );


        // header normal and hover
        $this->start_controls_tabs(
            'abc_ma_elementor_pricingTable_header_style_tabs'
        );
        // header normal tab
        $this->start_controls_tab(
            'abc_ma_ele_pricingTable_header_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'ABCMAFE'),
            ]
        );
        // header normal background color
        $this->add_control(
            'abc_ma_elementor_pricingTable_header_normal_bg_color',
            [
                'label' => __('Background Color', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'default' => '#448E08',
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-header-bg svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        //header normal stroke color
        $this->add_control(
            'abc_ma_elementor_pricingTable_header_normal_stroke_color',
            [
                'label' => __('Shape Color', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'default' => '#FD5009',
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-header-strock svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );

        // pacakge price color
        $this->add_control(
            'abc_ma_elementor_pricingTable_price_color',
            [
                'label' => __('Price Color', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-pack-preiod h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        // pacakge price period color
        $this->add_control(
            'abc_ma_elementor_pricingTable_price_period_color',
            [
                'label' => __('Period Color', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-pack-preiod h3 sub' => 'color: {{VALUE}};',
                ],
            ]
        );
        // pacakge recommended color
        $this->add_control(
            'abc_ma_elementor_pricingTable_recommended_color',
            [
                'label' => __('Recommended Color', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-recommended span' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'abc_ma_elementor_pricingTable_recommended' => 'yes',
                ],
            ]
        );
        // pacakge recommended background color
        $this->add_control(
            'abc_ma_elementor_pricingTable_recommended_bg_color',
            [
                'label' => __('Recommended Background Color', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-recommended span' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'abc_ma_elementor_pricingTable_recommended' => 'yes',
                ],
            ]
        );



        $this->end_controls_tab(); // end of header normal tab

        // header hover tab
        $this->start_controls_tab(
            'abc_ma_ele_pricingTable_header_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'ABCMAFE'),
            ]
        );
        // header hover background color
        $this->add_control(
            'abc_ma_elementor_pricingTable_header_hover_bg_color',
            [
                'label' => __('Background Color', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-table-area:hover .abc-ma-ele-pricing-header-bg svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        //header hover stroke color
        $this->add_control(
            'abc_ma_elementor_pricingTable_header_hover_stroke_color',
            [
                'label' => __('Stroke Color', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-table-area:hover .abc-ma-ele-pricing-header-strock svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        // pacakge price hover color
        $this->add_control(
            'abc_ma_elementor_pricingTable_price_hover_color',
            [
                'label' => __('Price Color', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-table-area:hover .abc-ma-ele-pricing-pack-preiod h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        // pacakge price period hover color
        $this->add_control(
            'abc_ma_elementor_pricingTable_price_period_hover_color',
            [
                'label' => __('Period Color', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-table-area:hover .abc-ma-ele-pricing-pack-preiod h3 sub' => 'color: {{VALUE}};',
                ],
            ]
        );
        // pacakge recommended hover color
        $this->add_control(
            'abc_ma_elementor_pricingTable_recommended_hover_color',
            [
                'label' => __('Recommended Color', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-table-area:hover .abc-ma-ele-pricing-recommended span' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'abc_ma_elementor_pricingTable_recommended' => 'yes',
                ],
            ]
        );
        // pacakge recommended hover background color
        $this->add_control(
            'abc_ma_elementor_pricingTable_recommended_hover_bg_color',
            [
                'label' => __('Recommended Background Color', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-table-area:hover .abc-ma-ele-pricing-recommended span' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'abc_ma_elementor_pricingTable_recommended' => 'yes',
                ],
            ]
        );
        // end of header hover tab

        $this->end_controls_tab(); // end of header hover tab

        $this->end_controls_tabs(); // end of tabs for header

        //header spacing heading
        $this->add_control(
            'abc_ma_elementor_pricingTable_header_spacing_heading',
            [
                'label' => __('Spacing', 'ABCMAFE'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // pacakge price period top spacing
        $this->add_responsive_control(
            'abc_ma_elementor_pricingTable_price_period_top_spacing',
            [
                'label' => __('Pricing Period Top', 'ABCMAFE'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'default' => [
                    'size' => 110,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-pack-preiod' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // pacakge header stock shap top spacing
        $this->add_responsive_control(
            'abc_ma_elementor_pricingTable_header_stock_shap_top_spacing',
            [
                'label' => __('Stock Shape Top', 'ABCMAFE'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'default' => [
                    'size' => -124,
                ],
                'range' => [
                    'px' => [
                        'min' => -400,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-header-strock' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        //end of the header section
        $this->end_controls_section();

        // start of pricing table name style section
        $this->start_controls_section(
            'abc_ma_elementor_pricingTable_name_style_section',
            [
                'label' => __('Name', 'ABCMAFE'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // pacakge name width
        $this->add_responsive_control(
            'abc_ma_elementor_pricingTable_name_width',
            [
                'label' => __('Width', 'ABCMAFE'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-pack-name' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // pacakge name height
        $this->add_responsive_control(
            'abc_ma_elementor_pricingTable_name_height',
            [
                'label' => __('Height', 'ABCMAFE'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-pack-name' => 'height: {{SIZE}}{{UNIT}};min-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // pacakge name typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_ma_elementor_pricingTable_name_typography',
                'label' => __('Typography', 'ABCMAFE'),
                'selector' => '{{WRAPPER}} .abc-ma-ele-pricing-pack-name h3',
            ]
        );

        // pacakge name normal/hover tabs
        $this->start_controls_tabs(
            'abc_ma_elementor_pricingTable_name_style_tabs'
        );
        // pacakge name normal tab
        $this->start_controls_tab(
            'abc_ma_ele_pricingTable_name_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'ABCMAFE'),
            ]
        );

        // pacakge name color
        $this->add_control(
            'abc_ma_elementor_pricingTable_name_color',
            [
                'label' => __('Color', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-pack-name h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        // pacakge name background color
        $this->add_control(
            'abc_ma_elementor_pricingTable_name_bg_color',
            [
                'label' => __('Background Color', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-pack-name' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab(); // end of pacakge name normal tab

        // pacakge name hover tab
        $this->start_controls_tab(
            'abc_ma_ele_pricingTable_name_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'ABCMAFE'),
            ]
        );

        // pacakge name hover color
        $this->add_control(
            'abc_ma_elementor_pricingTable_name_hover_color',
            [
                'label' => __('Color', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-table-area:hover .abc-ma-ele-pricing-pack-name h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        // pacakge name hover background color
        $this->add_control(
            'abc_ma_elementor_pricingTable_name_hover_bg_color',
            [
                'label' => __('Background', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-table-area:hover .abc-ma-ele-pricing-pack-name' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab(); // end of pacakge name hover tab

        $this->end_controls_tabs(); // end of pacakge name tabs

        // end of Pricing table name style section
        $this->end_controls_section();

        // start of Pricing table body style section
        $this->start_controls_section(
            'abc_ma_elementor_pricingTable_body_style_section',
            [
                'label' => __('Features', 'ABCMAFE'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // pacakge features typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_ma_elementor_pricingTable_features_typography',
                'label' => __('Typography', 'ABCMAFE'),
                'selector' => '{{WRAPPER}} .abc-ma-ele-pricing-table-body ul li',
            ]
        );
        // pacakge features color
        $this->add_control(
            'abc_ma_elementor_pricingTable_features_color',
            [
                'label' => __('Color', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-table-body ul li' => 'color: {{VALUE}};',
                ],
            ]
        );
        // pacakge features icon color
        $this->add_control(
            'abc_ma_elementor_pricingTable_features_icon_color',
            [
                'label' => __('Icons', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-table-body ul i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abc-ma-ele-pricing-table-body ul svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        // features list spacing/gap
        $this->add_responsive_control(
            'abc_ma_elementor_pricingTable_features_list_spacing',
            [
                'label' => __('Gap', 'ABCMAFE'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'default' => [
                    'size' => 20,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-table-body ul' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // feature icon size
        $this->add_responsive_control(
            'abc_ma_elementor_pricingTable_feature_icon_size',
            [
                'label' => __('Icon Size', 'ABCMAFE'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],   
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-table-body ul i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .abc-ma-ele-pricing-table-body ul svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // feature icon spacing
        $this->add_responsive_control(
            'abc_ma_elementor_pricingTable_feature_icon_spacing',
            [
                'label' => __('Icon Spacing', 'ABCMAFE'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],   
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-table-body ul i' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .abc-ma-ele-pricing-table-body ul svg' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // end of Pricing table body style section
        $this->end_controls_section();

        // start of Pricing table footer style section
        $this->start_controls_section(
            'abc_ma_elementor_pricingTable_footer_style_section',
            [
                'label' => __('Button', 'ABCMAFE'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // pacakge button typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_ma_elementor_pricingTable_button_typography',
                'label' => __('Typography', 'ABCMAFE'),
                'selector' => '{{WRAPPER}} .abc-ma-ele-pricing-table-footer a',
            ]
        );
        // package button padding
        $this->add_responsive_control(
            'abc_ma_elementor_pricingTable_button_padding',
            [
                'label' => __('Padding', 'ABCMAFE'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-table-footer a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );
        // pacakge button border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abc_ma_elementor_pricingTable_button_border',
                'selector' => '{{WRAPPER}} .abc-ma-ele-pricing-table-footer a',
            ]
        );
        // pacakge button border radius
        $this->add_responsive_control(
            'abc_ma_elementor_pricingTable_button_border_radius',
            [
                'label' => __('Border Radius', 'ABCMAFE'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-table-footer a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );
        // pacakge button tab normal and hover
        $this->start_controls_tabs(
            'abc_ma_elementor_pricingTable_button_style_tabs'
        );
        // pacakge button normal tab
        $this->start_controls_tab(
            'abc_ma_ele_pricingTable_button_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'ABCMAFE'),
            ]
        );
        // pacakge button normal color
        $this->add_control(
            'abc_ma_elementor_pricingTable_button_normal_color',
            [
                'label' => __('Color', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-table-footer a' => 'color: {{VALUE}};',
                ],
            ]
        );
        // pacakge button normal background color
        $this->add_control(
            'abc_ma_elementor_pricingTable_button_normal_bg_color',
            [
                'label' => __('Background Color', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-table-footer a' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        // end of pacakge button normal tab
        $this->end_controls_tab();
        // pacakge button hover tab
        $this->start_controls_tab(
            'abc_ma_ele_pricingTable_button_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'ABCMAFE'),
            ]
        );
        // pacakge button hover color
        $this->add_control(
            'abc_ma_elementor_pricingTable_button_hover_color',
            [
                'label' => __('Color', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-table-area:hover .abc-ma-ele-pricing-table-footer a' => 'color: {{VALUE}};',
                ],
            ]
        );
        // pacakge button hover background color
        $this->add_control(
            'abc_ma_elementor_pricingTable_button_hover_bg_color',
            [
                'label' => __('Background Color', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-table-area:hover .abc-ma-ele-pricing-table-footer a' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        // pacakge button hover border color
        $this->add_control(
            'abc_ma_elementor_pricingTable_button_hover_border_color',
            [
                'label' => __('Border Color', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-pricing-table-area:hover .abc-ma-ele-pricing-table-footer a' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        // end of pacakge button hover tab
        $this->end_controls_tab();
        // end of pacakge button tabs
        $this->end_controls_tabs();
        // end of pacakge button style section
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
