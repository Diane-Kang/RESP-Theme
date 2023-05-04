<?php

/**
 * Textbox Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */


// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
  $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// // Load values and assign defaults.
$device             = get_field('block::device') == "all" ? '' : 'display--' . get_field('block::device');
$distance_over      = 'p-top--' . get_field('block::distance:over');
$distance_under     = 'p-bottom--' . get_field('block::distance:under');

$bg_color           = get_field('block::background:color') ? 'bg-' . get_field('block::background:color') : "";
$bg_gradient        = get_field('block::background:gradient');
$box_design         = get_field('block::boxdesign');

$button1link        = get_field('block::buttons:btn1-link');
$button1type        = get_field('block::buttons:btn1-type');
$button2link        = get_field('block::buttons:btn2-link');
$button2type        = get_field('block::buttons:btn2-type');

$custom_anchor      = get_field('block::cssid');


if (!empty($custom_anchor)) {
  $anchor = 'id="' . esc_attr($custom_anchor) . '" ';
}

$module_classes = "module textbox {$device} ";
$container_classes = "container {$distance_over} {$distance_under} ";

if ($bg_color != "") {
  if ($box_design == "fullwidth") {
    $module_classes .= $bg_color;
  }
  if ($box_design == "box-design") {
    $container_classes .= $bg_color;
  }
}

?>
<div <?php echo $anchor; ?> class="module tiles <?php echo $module_classes;  ?>">
  <div class="<?php echo $container_classes; ?>">
    <div class="tiles__container">
      Es ist Kacheln Block
    </div>
  </div>
</div>