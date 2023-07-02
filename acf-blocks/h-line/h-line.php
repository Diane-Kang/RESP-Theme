<?php

/**
 * h-line Block Template.
 *
 */


// Get values from ACF Fields 

// Common definition of $anchor, $module_classes, $container_classes
require(get_template_directory() . '/acf-blocks/module-classes.php');
array_unshift($module_classes, "module", "h-line");
array_unshift($container_classes, "container");

$line_color = get_field('line-color');

?>

<div <?php echo $anchor; ?> class="<?php echo implode(" ", $module_classes);  ?>">
  <div class="<?php echo implode(" ", $container_classes); ?>">
    <div class="line <?php echo $line_color; ?>">

    </div>
  </div>
</div>