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

// Get values from ACF Fields 

// Common definition of $anchor, $module_classes, $container_classes
require(get_template_directory() . '/acf-blocks/module-classes.php');
array_unshift($module_classes, "module", "textbox");
array_unshift($container_classes, "container", "bd-box");

// Buttons 
$button1 = get_field('button1');
if ($button1) {
  $button1link = $button1['block::buttons:btn1-link'];
  $button1type = $button1['block::buttons:btn1-type'];
}
$button2 = get_field('button2');
if ($button2) {
  $button2link = $button2['block::buttons:btn2-link'];
  $button2type = $button2['block::buttons:btn2-type'];
}
// Content
$text_content = get_field('block::textbox:content');




?>
<div <?php echo $anchor; ?> class="<?php echo implode(" ", $module_classes); ?>">
    <div class="<?php echo implode(" ", $container_classes); ?>">
        <div class="textbox__text-container">
            <div class="textbox__text editor-content">
                <?php echo $text_content; ?>
            </div>
        </div>
        <!-- only if button exist -->
        <?php if (!empty($button1link) || !empty($button2link)): ?>
          <div class="buttons--wrapper">
              <?php echo acf_relative_path($button1link, $button1type); ?>
              <?php echo acf_relative_path($button2link, $button2type); ?>
          </div>
        <?php endif; ?>
    </div>
</div>