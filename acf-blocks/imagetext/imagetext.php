<?php

/**
 * ImageText Block Template.
 *
 */

// Support default anchor.
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
$box_design         = get_field('block::boxdesign') == "fullwidth" ? "" : get_field('block::boxdesign');

$button1link        = get_field('block::buttons:btn1-link');
$button1type        = get_field('block::buttons:btn1-type');
$button2link        = get_field('block::buttons:btn2-link');
$button2type        = get_field('block::buttons:btn2-type');

$order              = get_field('block::imagetext:position');
$column             = 'ratio--' . get_field('block::imagetext:column');

$image              = get_field('block::imagetext:image');
$text_content       = get_field('block::imagetext:text');


$custom_anchor      = get_field('block::cssid');
if (!empty($custom_anchor)) {
  $anchor = 'id="' . esc_attr($custom_anchor) . '" ';
}


$module_classes = "{$device} {$bg_color} {$box_design}";
$container_classes = "container {$distance_over} {$distance_under} grid12 {$order} {$column}";


?>

<div <?php echo $anchor; ?> class="module imagetext <?php echo $module_classes;  ?>">
  <div class="container <?php echo $container_classes; ?>">
    <div class="imagetext__image center">
      <img src="<?php echo esc_url($image['url']); ?>" alt="" />
    </div>
    <div class="imagetext__textbox">
      <div class="textbox__text">
        <?php echo $text_content ?>
      </div>
      <div class="teaser__buttons">
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
    </div>
  </div>
</div>