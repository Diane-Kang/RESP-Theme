<?php

/**
 * Block template file: teaser.php
 *
 * Teaser Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// Support custom "anchor" values.

// Common definition of $anchor, $module_classes, $container_classes
require (get_template_directory() . '/acf-blocks/module-classes.php');
array_unshift($module_classes, "module", "teaser");
array_unshift($container_classes, "container");

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

// Teaser block options 
$teaser_height = get_field('block::teaser:height') != "none" ? get_field('block::teaser:height') : '';
$teaser_textcolor = "fc--" . get_field('block::teaser:textcolor');
// Teaser background Image 
$image = get_field('block::teaser:image');
// Teaser text content
$text_content = get_field('block::teaser:content');

array_push($module_classes);
array_push($container_classes, $teaser_height, $teaser_textcolor);


?>

<?php $villa = get_field('villa_styles_active', 'option'); ?>


<div <?php echo $anchor; ?>
    class="<?php echo implode(" ", $module_classes); ?><?php if ($villa == "villa_true" && !(is_front_page())): echo "villa-subpage"; endif?>">
    <div class="<?php echo implode(" ", $container_classes); ?>">
        <?php if ($image): ?>
        <?php echo wp_get_attachment_image($image, '1536x1536', false, ['class' => 'teaser__bg-image']); ?>
        <?php endif ?>
        <div class="teaser__bg-gradient"></div>
        <div class="teaser__content">

            <div class="teaser__text editor-content">
                <!-- Logo conditional Villa starts -->

                <?php if ($villa == "villa_true" && is_front_page()): ?>
                <div class="logo-wrapper">
                    <?php $logo = get_field('logo', 'option'); ?>
                    <?php if ($logo): ?>
                    <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
                <!-- Logo conditional Villa Ends -->
                <?php echo $text_content ?>
            </div>
            <?php if (!empty($button1link) || !empty($button1link)): ?>
            <!-- only if button exist -->
            <div class="buttons--wrapper">
                <?php echo acf_relative_path($button1link, $button1type); ?>
                <?php echo acf_relative_path($button2link, $button2type); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>