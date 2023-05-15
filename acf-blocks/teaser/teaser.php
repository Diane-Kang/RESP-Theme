<?php

/**
 * Teaser Banner Block Template.
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

$teaser_height      = get_field('block::teaser:height') != "none" ?  get_field('block::teaser:height') : '';
$teaser_textcolor   = get_field('block::teaser:textcolor');
$teaser_gradient    = get_field('block::teaser:gradient') == "yes" ? "" : "display:none;";
$image              = get_field('block::teaser:image');
$text_content       = get_field('block::teaser:content');

$custom_anchor      = get_field('block::cssid');


if (!empty($custom_anchor)) {
  $anchor = 'id="' . esc_attr($custom_anchor) . '" ';
}

$module_classes = "";
$container_classes = "";
$module_classes = "module teaser {$device} {$teaser_textcolor}";
$container_classes = "container {$teaser_height} {$distance_over} {$distance_under}";

if ($bg_color != "") {
  if ($box_design == "fullwidth") {
    $module_classes .= $bg_color;
  }
  if ($box_design == "box-design") {
    $container_classes .= $bg_color;
  }
}


?>
<div <?php echo $anchor; ?> class="<?php echo $module_classes;  ?>">
  <div class="center <?php echo $container_classes; ?>">
    <div class="teaser__bg-image" style="
              background-image: url('<?php echo esc_url($image['url']); ?>');
            "></div>
    <div class="teaser__bg-gradient" style=" 
              <?php echo $teaser_gradient ?>
              background-image: linear-gradient(
                  180deg,
                  rgba(0, 0, 0, 0.3) 0%,
                  rgba(0, 0, 0, 0) 100%
                )
            "></div>
    <div class="teaser__content flex flex-col">
      <div class="teaser__text text-center flex flex-col">
        <?php echo $text_content ?>
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