<?php
$device             = get_field('block::device') == "all" ? '' : 'display--' . get_field('block::device');
$distance_over      = 'p-top--' . get_field('block::distance:over');
$distance_under     = 'p-bottom--' . get_field('block::distance:under');

$bg_color           = get_field('block::background:color') != "none" ? 'bg-' . get_field('block::background:color') : "";
$bg_gradient        = get_field('block::background:gradient');
$box_design         = get_field('block::boxdesign') == "box-design" ? "box-design" : "";

$custom_anchor      = get_field('block::cssid');

$anchor = "";
if (!empty($custom_anchor)) {
  $anchor = 'id="' . esc_attr($custom_anchor) . '" ';
}

$module_classes = " {$bg_color} {$box_design} {$device} ";
$container_classes = " {$distance_over} {$distance_under} ";
