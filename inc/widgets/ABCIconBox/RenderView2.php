<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
use Elementor\Icons_Manager;

$settings = $this->get_settings_for_display();
?>

<!--Single Icon Box-->
<div class="abc-ma-single-icon-box-two-area">
    <div class="abc-ma-single-icon-box-two">
        <div class="abc-ma-single-icon-box-two-icon">
            <!--Icon-->
            <div class="abc-ma-ele-icon-box2-icon">
                <?php Icons_Manager::render_icon($settings['abc_ma_elementor_icon_box_icon'], ['aria-hidden' => 'true']); ?>
            </div><!--/ Icon-->
        </div>
        <div class="abc-ma-elementor-icon-box-content">
            <h4 class="abc-ma-elementor-icon-box-title">
                <?php echo esc_html($settings['abc_ma_elementor_icon_box_title']); ?>
            </h4>
            <p class="abc-ma-elementor-icon-box-desc">
                <?php echo esc_html($settings['abc_ma_elementor_icon_box_desc']); ?>
            </p>
        </div>
    </div>
</div><!--/ Single Icon Box-->