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

// // Load values and assign defaults.



$button1 = get_field('button1');
if ($button1) {
  $button1link        = $button1['block::buttons:btn1-link'];
  $button1type        = $button1['block::buttons:btn1-type'];
}
$button2 = get_field('button2');
if ($button2) {
  $button2link        = $button2['block::buttons:btn2-link'];
  $button2type        = $button2['block::buttons:btn2-type'];
}

$text_content       = get_field('block::textbox:content');


require(get_template_directory() . '/acf-blocks/module-classes.php');

$module_classes = "module textbox" . $module_classes;
$container_classes = "container" . $container_classes;


?>
<div <?php echo $anchor; ?> class="<?php echo $module_classes;  ?>">
  <div class="<?php echo $container_classes; ?> flex flex-col">
    <div class="textbox__text-container grid12">
      <div class="textbox__text flex flex-col">
        <?php echo $text_content; ?>
      </div>
    </div>
    <?php if (!empty($button1) || !empty($button2)) : ?>
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