<?php

$device             = get_field('block::device') == "all" ? '' : 'display--' . get_field('block::device');
$distance_over      = 'p-top--' . get_field('block::distance:over');
$distance_under     = 'p-bottom--' . get_field('block::distance:under');

$bg_color           = 'bg--' . get_field('block::background:color');
$bg_gradient        = get_field('block::background:gradient');
$box_design         = get_field('block::boxdesign') == "box-design" ? "box-design" : "";

$custom_anchor      = get_field('block::cssid');

$anchor = "";
if (!empty($custom_anchor)) {
  $anchor = 'id="' . esc_attr($custom_anchor) . '" ';
}

$a_module_classes = [$device, $box_design, $bg_color, $bg_gradient];
$a_container_classes = array($distance_over, $distance_under);
