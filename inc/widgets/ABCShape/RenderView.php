<?php

/**
 * Render View file for Animated Shape section.
 */

$settings = $this->get_settings_for_display();
$id = $this->get_id(); //unique id for this widget

$shape_type = $settings['abc_ma_elementor_shape_type'];

if('yes' == $settings['abc_ma_elementor_shape_animation']) {
    $animation = $settings['abc_ma_elementor_shape_animation_effect'];
}else {
    $animation = 'none';
}

?>
<div class="abc-ma-shape-area">
    <div class="abc-ma-ele-shape abc-ma-shape-<?php echo esc_attr($shape_type); ?> <?php echo esc_attr($animation); ?>">

    </div>
</div>