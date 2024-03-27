<?php
/**
 * Block template file: drei-leistungen.php
 *
 * Drei Leistungen Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'drei-leistungen-' . $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-drei-leistungen';
if (!empty($block['className'])) {
  $classes .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $classes .= ' align' . $block['align'];
}
?>

<style type="text/css">
<?php echo '#'. $id;

?> {
    /* Add styles that use ACF values here */
}
</style>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($classes); ?>">
    <?php if (have_rows('drei_leistungen')): ?>
    <?php while (have_rows('drei_leistungen')):
        the_row(); ?>
    <div class="leistung bg--<?php the_sub_field('background_color'); ?>">
        <a href="#<?php the_sub_field( 'anchor-link' ); ?>">
            <h2><?php the_sub_field('eine_leistung'); ?></h2>
        </a>
    </div>
    <?php endwhile; ?>
    <?php else: ?>
    <?php // No rows found    ?>
    <?php endif; ?>
</div>