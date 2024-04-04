<?php

/**
 * Block template file: booking.php
 *
 * Booking Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */


// Get values from ACF Fields 

// Common definition of $anchor, $module_classes, $container_classes
require (get_template_directory() . '/acf-blocks/module-classes.php');
array_unshift($module_classes, "module", "rooms");
array_unshift($container_classes, "container");



?>
<div <?php echo $anchor; ?> class="<?php echo implode(" ", $module_classes); ?>">
    <div class="<?php echo implode(" ", $container_classes); ?>">
        <h2 class="section_title"> <?php the_field('section_title'); ?></h2>
        <div class="wrapper-cards">
            <?php if (have_rows('room')): ?>   <?php while (have_rows('room')):
                    the_row(); ?>     <?php if (have_rows('card')): ?>       <?php while (have_rows('card')):
                                      the_row(); ?>
                    <?php $kind = get_sub_field('cowork_or_meeting'); ?>

                    <div class="card  <?php echo $kind; ?>">

                        <div class="image-wrapper">
                            <?php $bild = get_sub_field('bild'); ?>
                            <?php if ($bild): ?>
                              <img src="<?php echo esc_url($bild['url']); ?>" alt="<?php echo esc_attr($bild['alt']); ?>" />
                            <?php endif; ?>
                        </div>
                        <div class="name"><?php the_sub_field('name'); ?></div>
                        <div class="book_froom">
                            <?php $from = get_sub_field('book_froom'); ?>
                            <?php if ($from): ?>
                              <?php the_sub_field('book_froom'); ?>
                            <?php else: ?>
                              <span class="gone">Bereits vermietet</span>
                            <?php endif ?>


                        </div>
                        <div class="wrapper">
                            <div class="quadratmeter"><?php the_sub_field('quadratmeter'); ?> Quadratmeter</div><span>•</span>
                            <div class="personen"><?php the_sub_field('personen'); ?> Personen</div>
                        </div>
                        <div class="price">

                            <?php if ($kind == "cowork"): ?>
                              <div class="price_cowork">Arbeitsplatz: <?php the_sub_field('price_cowork'); ?> Euro / Monat</div>
                              <div class="price_office">Büro: <?php the_sub_field('price_office'); ?> Euro / Monat</div>
                            <?php elseif ($kind == "meeting"): ?>
                              <div class="price_hour"><?php the_sub_field('price_hour'); ?> Euro / Stunde</div>
                            <?php else: ?>
                              Something wrong
                            <?php endif ?>
                        </div>

                        <div class="buttons--wrapper">

                            <a href="#" class="btn btn--fill 
                    
                <?php if ($from): ?>
                  active                            
                <?php else: ?>
                  gone
                  <?php endif ?>">

                                <?php the_sub_field('name'); ?> anfragen</a>
                        </div>

                    </div>
                  <?php endwhile; ?>
                <?php endif; ?>

              <?php endwhile; ?>
            <?php else: ?>
              <?php // No rows found                               ?>
            <?php endif; ?>
        </div>
    </div>
</div>