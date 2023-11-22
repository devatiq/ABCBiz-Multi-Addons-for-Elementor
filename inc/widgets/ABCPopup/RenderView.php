<?php

/*
 * Render View file for Popup section.
 */

$unique_id = $this->get_id();
$settings = $this->get_settings_for_display();
// content type
$popup_content_type = $settings['abc_ma_elementor_popup_content_type'];

$content_class = ' abc-ma-popup-content-' . $settings["abc_ma_elementor_popup_content_type"];

$popup_type_class = $content_class . ' abc-ma-popup-' . $settings["abc_ma_elementor_popup_type"];




// popup type 
$popup_type = $settings['abc_ma_elementor_popup_type'];

if('video' == $popup_type) {
    $source_url = $settings['abc_ma_elementor_popup_video']['url'];
 }elseif('gmap' == $popup_type) {
    $source_url = $settings['abc_ma_elementor_popup_gmap'];
 }else {
    $source_url = '';
 }


?>
<script>
    (function($) {
        "use strict";
        $(document).ready(function() {
            $('.abc-ma-popup-data-<?php echo esc_attr($unique_id); ?>').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: true,
                fixedContentPos: false
            });
        });
    })(jQuery);
</script>
<div class="abc-ma-popup-area">

    <?php if ('text' == $popup_content_type) : ?>

        <a class="abc-ma-popup-data-<?php echo esc_attr($unique_id); echo esc_attr($popup_type_class); ?> " href="<?php echo esc_attr($source_url); ?>"><?php echo wp_kses_post($settings['abc_ma_elementor_popup_text']); ?> </a>

    <?php elseif ('image' == $popup_content_type) : ?>

        <a class="abc-ma-popup-data-<?php echo esc_attr($unique_id); echo esc_attr($popup_type_class); ?> " href="<?php echo esc_attr($source_url); ?>">
            <img src="<?php echo esc_url($settings['abc_ma_elementor_popup_image']['url']); ?>" alt="<?php echo esc_attr($settings['abc_ma_elementor_popup_image']['alt']); ?>">
        </a>

    <?php elseif ('icon' == $popup_content_type) : ?>
            
            <a class="abc-ma-popup-data-<?php echo esc_attr($unique_id); echo esc_attr($popup_type_class); ?> " href="<?php echo esc_attr($source_url); ?>"><?php \Elementor\Icons_Manager::render_icon( $settings['abc_ma_elementor_popup_icon'], [ 'aria-hidden' => 'true' ] ); ?></a>

    <?php endif; ?>

</div>