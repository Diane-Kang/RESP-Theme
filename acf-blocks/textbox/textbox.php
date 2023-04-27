<?php

/**
 * Testimonial Block Template.
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

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'testimonial-block';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $class_name .= ' align' . $block['align'];
}

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
  $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'module textbox';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $class_name .= ' align' . $block['align'];
}

// // Load values and assign defaults.
$device             = 'display--' . get_field('block::device');
$distance_over      = 'p-top--' . get_field('block::distance:over');
$distance_under     = 'p-bottom--' . get_field('block::distance:under');

$bg_color           = get_field('block::background:color') ? 'bg-' . get_field('block::background:color') : "";
$bg_gradient        = get_field('block::background:gradient');
$box_design         = get_field('block::boxdesign') ? "box--" . get_field('block::boxdesign') : "";

$text               = get_field('block::textbox:content');
$custom_anchor      = get_field('block::cssid');

$buttonlink1         = get_field('block::textbox:link1');
$buttonlink2         = get_field('block::textbox:link2');

$box_design         = get_field('block::boxdesign') == "none" ? "" : "module-" .get_field('block::boxdesign');

if (!empty($custom_anchor)) {
  $anchor = 'id="' . esc_attr($custom_anchor) . '" ';
}

$class_name .= " {$box_design} {$device} {$distance_over} {$distance_under} {$bg_color}";

?>

<div <?php echo $anchor; ?> class="<?php echo esc_attr($class_name); ?>">
  <div class="textbox__content">
    <?php echo $text; ?>
  </div>
  <div class="textbox__buttons text-center">
    <?php if ($buttonlink1 != "") : ?>
      <a href="<?php echo esc_url(parse_url($buttonlink1["url"], PHP_URL_PATH)); ?>" class="btn btn--fill" target="<?php echo $buttonlink1["target"] ?>"> <?php echo $buttonlink1["title"] ?> </a>
    <?php endif; ?>
    <?php if ($buttonlink2 != "") : ?>
      <a href="<?php echo esc_url(parse_url($buttonlink2["url"], PHP_URL_PATH)); ?>" class="btn btn--empty" target="<?php echo $buttonlink2["target"] ?>"> <?php echo $buttonlink2["title"] ?> </a>
    <?php endif; ?>
  </div>
</div>