<?php
namespace Inc\Widgets\ABCBlog;

use Inc\Widgets\ABCMAWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

class Main extends ABCMAWidget
{
    // define protected variables...
    protected $name = 'ABC-MA-Elementor-ABCBlog';
    protected $title = 'ABC Blog Posts';
    protected $icon = 'eicon-posts-group';
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
            'abc_ma_elementor_blog_setting',
            [
                'label' => __('Blog Setting', 'ABCMAFE'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        
        //blog date on/off switch
        $this->add_control(
            'abc_ma_elementor_blog_date_switch',
            [
                'label' => __('Date', 'ABCMAFE'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'ABCMAFE'),
                'label_off' => __('Hide', 'ABCMAFE'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        //blog comment on/off switch
        $this->add_control(
            'abc_ma_elementor_blog_comment_switch',
            [
                'label' => __('Comments', 'ABCMAFE'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'ABCMAFE'),
                'label_off' => __('Hide', 'ABCMAFE'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        // blog read more button on/off switch
        $this->add_control(
            'abc_ma_elementor_blog_read_more_switch',
            [
                'label' => __('Read More', 'ABCMAFE'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'ABCMAFE'),
                'label_off' => __('Hide', 'ABCMAFE'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section(); //end blog setting control

        // blog content style section
        $this->start_controls_section(
            'abc_ma_elementor_blog_content_style_section',
            [
                'label' => __('Blog Style', 'ABCMAFE'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        //blog info typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_ma_elementor_blog_info_typography',
                'label' => __('Typography', 'ABCMAFE'),
                'selector' => '{{WRAPPER}} .abc-ma-ele-single-blog-info a',
            ]
        );
        // blog info color
        $this->add_control(
            'abc_ma_elementor_blog_info_color',
            [
                'label' => __('Info Color', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-single-blog-info a' => 'color: {{VALUE}};',
                ],
            ]
        );
        // blog info icon color
        $this->add_control(
            'abc_ma_elementor_blog_info_icon_color',
            [
                'label' => __('Icon Color', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-single-blog-info i' => 'color: {{VALUE}};',
                ],
            ]
        );
        // blog info icon size
        $this->add_responsive_control(
            'abc_ma_elementor_blog_info_icon_size',
            [
                'label' => __('Icon Size', 'ABCMAFE'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-single-blog-info i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // blog title typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_ma_elementor_blog_title_typography',
                'label' => __('Title Typography', 'ABCMAFE'),
                'selector' => '{{WRAPPER}} .abc-ma-ele-single-blog-title h2 a',
            ]
        );
        // blog title color
        $this->add_control(
            'abc_ma_elementor_blog_title_color',
            [
                'label' => __('Title Color', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-single-blog-title h2 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        // blog read more button typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_ma_elementor_blog_read_more_typography',
                'label' => __('Button Typography', 'ABCMAFE'),
                'selector' => '{{WRAPPER}} .abc-ma-ele-single-blog-button a',
            ]
        );
        // blog read more button color
        $this->add_control(
            'abc_ma_elementor_blog_read_more_color',
            [
                'label' => __('Button Color', 'ABCMAFE'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ma-ele-single-blog-button a' => 'color: {{VALUE}};',
                ],
            ]
        );
       


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