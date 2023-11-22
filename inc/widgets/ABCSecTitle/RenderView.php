<?php
/**
 * ABC Section Title Widget Render View
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$settings = $this->get_settings_for_display();
$abc_sec_divider_visible = $settings['abc_ma_elementor_sec_title_div'] === 'yes';

?>

<div class="abc-ma-elementor-title-align">
   
     <<?php echo esc_html($settings['abc_ma_elementor_sec_title_tag']); ?> class="abc-ma-elementor-sec-title">
    <span class="abc-ma-elementor-sec-title-one"><?php echo esc_html($settings['abc_ma_elementor_sec_title_one']); ?></span> <span class="abc-ma-elementor-sec-title-two"><?php echo esc_html($settings['abc_ma_elementor_sec_title_two']); ?></span>
    </<?php echo esc_html($settings['abc_ma_elementor_sec_title_tag']); ?>>

    <?php if ( $abc_sec_divider_visible ) : ?>
    <div class="abc-ma-elementor-sec-title-divider"></div>
<?php endif; ?>


</div><!-- section title area -->
