<?php

/**
 * single_image Block Template.
 *
 */

// Common definition of $anchor, $module_classes, $container_classes
require (get_template_directory() . '/acf-blocks/module-classes.php');
array_unshift($module_classes, "module", "gallery");
$margin_classes = $container_classes;
$container_classes = [];
array_unshift($container_classes, "container");



array_push($module_classes);

?>

<div <?php echo $anchor; ?> class="<?php echo implode(" ", $module_classes); ?>">
    <div class="outter-container <?php echo implode(" ", $margin_classes); ?>">
        <div class="<?php echo implode(" ", $container_classes); ?> container">
            <?php $gallery_urls = get_field('gallery'); ?>
            <?php if ($gallery_urls): ?>
              <?php foreach ($gallery_urls as $gallery_url): ?>
                <div class="image-wrapper">
                    <img src="<?php echo esc_url($gallery_url); ?>" />
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>