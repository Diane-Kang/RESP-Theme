<?php

/**
 * Contaxt Block Template.
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
array_unshift($module_classes, "module", "contact");
array_unshift($container_classes, "container");


// Content
$profilbild       = get_field('profilbild');
$name             = get_field('name');
$rolle            = get_field('rolle');
$gender           = get_field('gender');
$email            = get_field('email');
$telefon          = get_field('telefon');
$linkedin         = get_field('linkedin');


?>
<div <?php echo $anchor; ?> class="<?php echo implode(" ", $module_classes);  ?>">
  <div class="<?php echo implode(" ", $container_classes); ?> center">
    <div class="container--inner bd-box">
      <div class="profilbild_wrapper">
        <img class="profilbild" src="<?php echo esc_url($profilbild['url']); ?>" alt="<?php echo $name; ?>" />
      </div>
      <div class="details">
        <h4 class="name">
          <?php echo $name; ?>
        </h4>
        <p class="rolle">
          <?php echo $rolle; ?>
        </p>
        <a class="email" href="mailto:<?php echo $email;  ?>">
          <?php echo $email; ?>
        </a>
        <div class="telefon">
          <?php echo ($telefon); ?>
        </div>
        <a class="social" href="<?php echo $linkedin; ?>">
          <i class="fa-brands fa-linkedin"></i>
        </a>
      </div>
    </div>
  </div>
</div>