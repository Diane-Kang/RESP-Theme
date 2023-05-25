<?php

/**
 * Testimonial Block Template.
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

$bg_color           = get_field('block::background:color') ? 'bg-' . get_field('block::background:color') : "";
$bg_gradient        = get_field('block::background:gradient');
$box_design         = get_field('block::boxdesign') == "fullwidth" ? "" : get_field('block::boxdesign');

$order              = get_field('block::testimonial:position');
$size               = get_field('block::testimonial:size');
$image              = get_field('block::testimonial:image');
if (empty($image)) {
  $image['url'] =  "/wp-content/themes/RESP-Theme/asset/img/zitat.jpeg";
  $image['alt'] = "placeholder";
}

$name               = get_field('block::testimonial:name');
$jobposition        = get_field('block::testimonial:jobposition');
$company            = get_field('block::testimonial:company');
$quote              = get_field('block::testimonial:quote');



$module_classes = "module testimonial {$device} {$bg_color} {$box_design} ";
$container_classes = "container {$distance_over} {$distance_under} {$order} {$size}";


?>

<div <?php echo $anchor; ?> class="<?php echo $module_classes;  ?>">
  <div class="<?php echo $container_classes; ?> grid12">
    <div class="image center">
      <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
    </div>
    <div class="textbox flex flex-col">
      <div class="quote"><?php echo $quote; ?></div>
      <div class="name text-bold"><?php echo $name; ?></div>
      <div class="role"><?php echo $jobposition; ?> bei Firma <?php echo $company; ?></div>
    </div>
  </div>
</div>