<?php

/**
 * single_image Block Template.
 *
 */

// Common definition of $anchor, $module_classes, $container_classes
require (get_template_directory() . '/acf-blocks/module-classes.php');
array_unshift($module_classes, "module", "single_image");
$margin_classes = $container_classes;
$container_classes = [];
array_unshift($container_classes, "container");



array_push($module_classes);

?>

<div <?php echo $anchor; ?> class="<?php echo implode(" ", $module_classes); ?>">
    <?php if (get_field('single_image')): ?>
      <img src="<?php the_field('single_image'); ?>" />
    <?php endif ?>
</div>