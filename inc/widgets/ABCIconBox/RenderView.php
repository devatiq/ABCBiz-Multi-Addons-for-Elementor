<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
use Elementor\Icons_Manager;
$settings = $this->get_settings_for_display();

if ( ! empty( $settings['abc_ma_elementor_icon_box_button_link']['url'] ) ) {
    $this->add_link_attributes( 'abc_ma_elementor_icon_box_button_link', $settings['abc_ma_elementor_icon_box_button_link'] );
}
$btn_align = isset( $settings['abc_ma_elementor_icon_box_button_align'] ) ? $settings['abc_ma_elementor_icon_box_button_align'] : 'center';

?>

<!--Single Icon Box-->
<div class="abc-ma-elementor-icon-box-area">
    <div class="abc-ma-elementor-icon-box">
        <div class="abc-ma-elementor-icon-box-icon">
            <!--Icon BG shape-->
            <div class="abc-ma-ele-icon-box-normal">
                <?php Icons_Manager::render_icon( $settings['abc_ma_elementor_icon_box_icon_shape'], [ 'aria-hidden' => 'true' ] ); ?>
            </div><!--/ Icon BG shape-->  

            <!--Icon-->
            <div class="abc-ma-ele-icon-box-hover">
                <?php Icons_Manager::render_icon( $settings['abc_ma_elementor_icon_box_icon'], [ 'aria-hidden' => 'true' ] ); ?>
            </div>  <!--Icon-->       
        </div>
        <div class="abc-ma-elementor-icon-box-content">
            <h4 class="abc-ma-elementor-icon-box-title"><?php echo esc_html($settings['abc_ma_elementor_icon_box_title']); ?></h4>
            <p class="abc-ma-elementor-icon-box-desc"><?php echo esc_html($settings['abc_ma_elementor_icon_box_desc']); ?></p>
        </div>
        <div class="abc-ma-elementor-icon-box-button" style="text-align:<?php echo esc_attr($btn_align); ?>">
            <a <?php echo $this->get_render_attribute_string( 'abc_ma_elementor_icon_box_button_link' ); ?> class="abc-ma-elementor-button-link"><?php echo esc_html($settings['abc_ma_elementor_icon_box_button_text']); ?> <i class="eicon-arrow-right"></i></a>
        </div>
    </div>
</div><!--/ Single Icon Box-->