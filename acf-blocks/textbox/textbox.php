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

$bg_color           = get_field('block::background:color') != "none" ? 'bg-' . get_field('block::background:color') : "";
$bg_gradient        = get_field('block::background:gradient');
$box_design         = get_field('block::boxdesign') == "box-design" ? "box-design" : "";



$button1link        = get_field('block::buttons:btn1-link');
$button1type        = get_field('block::buttons:btn1-type');
$button2link        = get_field('block::buttons:btn2-link');
$button2type        = get_field('block::buttons:btn2-type');

$text_content       = get_field('block::textbox:content');
$custom_anchor      = get_field('block::cssid');



if (!empty($custom_anchor)) {
  $anchor = 'id="' . esc_attr($custom_anchor) . '" ';
}

$module_classes = "module textbox {$bg_color} {$box_design} {$device} ";
$container_classes = "container {$distance_over} {$distance_under} ";


?>
<div <?php echo $anchor; ?> class="<?php echo $module_classes;  ?>">
  <div class="<?php echo $container_classes; ?> flex flex-col">
    <div class="textbox__text-container grid12">
      <div class="textbox__text flex flex-col">
        <?php echo $text_content; ?>
      </div>
    </div>
    <?php if (!empty($button1link) || !empty($button1link)) : ?>
      <!-- only if button exist -->
      <div class="buttons--wrapper">
        <?php if ($button1link != "") : ?>
          <a href="<?php echo esc_url(parse_url($button1link["url"], PHP_URL_PATH)); ?>" class="btn btn--<?php echo $button1type ?>" target="<?php echo $button1link["target"] ?>"> <?php echo $button1link["title"] ?> </a>
        <?php endif; ?>
        <?php if ($button2link != "") : ?>
          <?php if ($button2type != "link") : ?>
            <a href="<?php echo esc_url(parse_url($button2link["url"], PHP_URL_PATH)); ?>" class="btn btn--<?php echo $button2type ?>" target="<?php echo $button2link["target"] ?>"> <?php echo $button2link["title"] ?> </a>
          <?php endif; ?>
          <?php if ($button2type == "link") : ?>
            <a href="<?php echo esc_url(parse_url($button2link["url"], PHP_URL_PATH)); ?>" class="link link--underline" target="<?php echo $button2link["target"] ?>"> <?php echo $button2link["title"] ?> </a>
          <?php endif; ?>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
</div>
</div>