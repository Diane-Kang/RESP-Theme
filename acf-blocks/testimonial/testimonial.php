<?php

/**
 * Testimonial Block Template.
 *
 */

// Get values from ACF Fields 

// Common definition of $anchor, $module_classes, $container_classes
require(get_template_directory() . '/acf-blocks/module-classes.php');
array_unshift($module_classes, "module", "testimonial");
array_unshift($container_classes, "container");

$order              = get_field('block::testimonial:position');
$size               = get_field('block::testimonial:size');
$image              = get_field('block::testimonial:image');
// if (empty($image)) {
//   $image['url'] =  "/wp-content/themes/RESP-Theme/asset/img/zitat.jpeg";
//   $image['alt'] = "placeholder";
// }

$name               = get_field('block::testimonial:name');
$jobposition        = get_field('block::testimonial:jobposition');
$company            = get_field('block::testimonial:company');
$quote              = get_field('block::testimonial:quote');


array_push($container_classes, $order, $size, "bd-box");

?>

<div <?php echo $anchor; ?> class="<?php echo implode(" ", $module_classes);  ?>">
  <div class="<?php echo implode(" ", $container_classes); ?>">
    <div class="image">
      <?php if ($image) : ?>
        <?php echo wp_get_attachment_image($image, 'cardimage-200'); ?>
      <?php endif ?>
    </div>
    <div class="content">
      <div class="quote"><?php echo $quote; ?></div>
      <div class="name"><?php echo $name; ?></div>
      <div class="role"><?php echo $jobposition; ?> bei <?php echo $company; ?></div>
    </div>

  </div>
</div>