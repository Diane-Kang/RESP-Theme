<?php

/**
 * Card-List Block Template.
 *
 */

// Common definition of $anchor, $module_classes, $container_classes
require(get_template_directory() . '/acf-blocks/module-classes.php');
array_unshift($module_classes, "module", "color-test");
array_unshift($container_classes, "container", "bd-box");


array_push($module_classes);

?>

<div <?php echo $anchor; ?> class="<?php echo implode(" ", $module_classes);  ?>">
  <div class="<?php echo implode(" ", $container_classes); ?>">
    <div class="card flex">
      <div class="card--inner flex flex-col">
        <div class="card__image flex">
        </div>
        <div class="card__text-content flexible flex flex-col">
          <h3 class="heading heading3 text-center"><?php the_field('text'); ?></h3>
          <div class="text flexible">
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. </div>
          <!-- only if button exist -->

          <div class="buttons">
            <a href="/theme_reference/module-kontakt/" class="btn btn--fill" target=""> TeamProQ-Bauträger-CRM </a>
            <a href="/post-1-title-2/" class="btn btn--empty" target=""> Post 1 Title </a>
            <a href="/blog/" class="link link--underline" target=""> Blog </a>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>