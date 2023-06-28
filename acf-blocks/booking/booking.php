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

// Create id attribute allowing for custom "anchor" value.
$id = 'booking-' . $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-booking';
if (!empty($block['className'])) {
  $classes .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $classes .= ' align' . $block['align'];
}
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($classes); ?>">
  <?php if (have_rows('buchen_option')) : ?>
    <?php while (have_rows('buchen_option')) : the_row(); ?>
      <?php if (have_rows('offer')) : ?>
        <?php while (have_rows('offer')) : the_row(); ?>
          <?php $grafik = get_sub_field('grafik'); ?>
          <?php if ($grafik) : ?>
            <img src="<?php echo esc_url($grafik['url']); ?>" alt="<?php echo esc_attr($grafik['alt']); ?>" />
          <?php endif; ?>
          <?php if (have_rows('text')) : ?>
            <?php while (have_rows('text')) : the_row(); ?>
              <?php the_sub_field('title'); ?>
              <?php the_sub_field('paragraph'); ?>
              <?php the_sub_field('price'); ?>
            <?php endwhile; ?>
          <?php endif; ?>
        <?php endwhile; ?>
      <?php endif; ?>
    <?php endwhile; ?>
  <?php else : ?>
    <?php // No rows found 
    ?>
  <?php endif; ?>
</div>