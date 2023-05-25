<?php

/**
 * h-line Block Template.
 *
 */


// Support custom "anchor" values.
$anchor = '';
// From wp default
if (!empty($block['anchor'])) {
  $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}
// From ACF Block
$custom_anchor      = get_field('block::cssid');
if (!empty($custom_anchor)) {
  $anchor = 'id="' . esc_attr($custom_anchor) . '" ';
}


// // Load values and assign defaults.
$device             = get_field('block::device') == "all" ? '' : 'display--' . get_field('block::device');
$distance_over      = 'p-top--' . get_field('block::distance:over');
$distance_under     = 'p-bottom--' . get_field('block::distance:under');

$bg_color           = get_field('block::background:color') != "none" ? 'bg-' . get_field('block::background:color') : "";
$bg_gradient        = get_field('block::background:gradient');


$module_classes = "module h-line {$device} ";
$container_classes = "container {$distance_over} {$distance_under} ";


?>

<div class="<?php echo $module_classes; ?>">
  <div class="<?php echo $container_classes; ?> grid12">
    <div class="line <?php echo $bg_color; ?>">

    </div>
  </div>
</div>