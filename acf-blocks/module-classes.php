<?php
//This file defines $module_classes, $container_classes and $anchor, 
// which are used for most of module
// $anchor is String 
// $module_classes is Array 
// $container_classes is Array

// initalize the variable with empty string
$device = $distance_over = $distance_under = $bg_color = $bg_gradient = $box_design = "";
// "if statement" makes the variable stays empty string when the variable is not definiert in the block. 
if (get_field('block::device')) {
  $device             = get_field('block::device') == "all" ? '' : 'display--' . get_field('block::device');
}
$distance_over      = 'p-top--' . get_field('block::distance:over');
$distance_under     = 'p-bottom--' . get_field('block::distance:under');

if (get_field('block::background:color')) {
  $bg_color           = 'bg--' . get_field('block::background:color');
}
if (get_field('block::background:gradient')) {
  $bg_gradient        = get_field('block::background:gradient') == "none" ? "" : "bg-g--" . get_field('block::background:gradient');
}
$box_design         = get_field('block::boxdesign') == "box-design" ? "box-design" : "";

$custom_anchor      = get_field('block::cssid');
$anchor = "";
if (!empty($custom_anchor)) {
  $anchor = 'id="' . esc_attr($custom_anchor) . '" ';
}

// If the Block uses original Gutenberg custom class Name field
// $block_class = "";
// if (!empty($block['className'])) {
//   $anchor = 'id="' . esc_attr($block['className']) . '" ';
//   $block_anchor = 'id="' . esc_attr($block['className']) . '" ';
// }


$module_classes = [$device, $box_design, $bg_color, $bg_gradient];
$container_classes = [$distance_over, $distance_under];
