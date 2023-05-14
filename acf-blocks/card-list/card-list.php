<?php

/**
 * Card-List Block Template.
 *
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
$box_design         = get_field('block::boxdesign') == "box-design" ? "box-design" : "";

$graphic_type       = get_field('block::card-list:image-type') == "image" ? "" : "graphic-icon";
$order              = get_field('block::card-list:order');
$$custom_anchor     = get_field('block::cssid');


if (!empty($custom_anchor)) {
  $anchor = 'id="' . esc_attr($custom_anchor) . '" ';
}

$module_classes = "module card-list {$order} {$graphic_type} {$bg_color} {$box_design} {$device}";
$container_classes = "container {$distance_over} {$distance_under} ";

?>

<div class="<?php echo $module_classes; ?>">
  <div class="<?php echo $container_classes; ?>">
    <?php if (have_rows('block::card-list:card')) : ?>
      <?php while (have_rows('block::card-list:card')) : the_row(); ?>
        <?php if (get_row_layout() == '') : ?>
          <div class="card flex">
            <div class="card--inner flex flex-col">
              <div class="card__image flex">
                <?php $card_image = get_sub_field('card_image'); ?>
                <?php if ($card_image) : ?>
                  <img src="<?php echo esc_url($card_image['url']); ?>" alt="<?php echo esc_attr($card_image['alt']); ?>" />
                <?php endif; ?>
              </div>
              <div class="card__text-content flexible flex flex-col">
                <h3 class="heading heading3 text-center"><?php the_sub_field('card_title'); ?></h3>
                <div class="text flexible">
                  <?php the_sub_field('card_text'); ?>
                </div>
                <div class="buttons flex flex-col">
                  <?php $card_button1 = get_sub_field('card_button1'); ?>
                  <?php if ($card_button1) : ?>
                    <a class="btn btn--fill" href="<?php echo esc_url($card_button1['url']); ?>" target="<?php echo esc_attr($card_button1['target']); ?>"><?php echo esc_html($card_button1['title']); ?></a>
                  <?php endif; ?>
                  <?php $card_button2 = get_sub_field('card_button2'); ?>
                  <?php if ($card_button2) : ?>
                    <a class="btn btn--empty" href="<?php echo esc_url($card_button2['url']); ?>" target="<?php echo esc_attr($card_button2['target']); ?>"><?php echo esc_html($card_button2['title']); ?></a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>
      <?php endwhile; ?>
    <?php else : ?>
      <?php // No layouts found 
      ?>
    <?php endif; ?>
  </div>
</div>