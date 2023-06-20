<?php

/**
 * The template for redirecting page
 * Template Name: Blog Template
 *
 */
?>
<?php get_header(); ?>
<h2>Blog-Index-template</h2>
<?php
$args = array(
  'post_type' => 'post',
  'posts_per_page' => 5,
);

$custom_query = new WP_Query($args);
?>
<div class="container container--narrow page-section">
  <?php
  while ($custom_query->have_posts()) {
    $custom_query->the_post(); ?>
    <div class="post-item">
      <h2 class="headline headline--medium headline--post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

      <div class="metabox">
        <p>Posted by <?php the_author_posts_link(); ?> on <?php the_time('n.j.y'); ?> in <?php echo get_the_category_list(', '); ?></p>
      </div>

      <div class="generic-content">
        <?php the_excerpt(); ?>
        <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">Continue reading &raquo;</a></p>
      </div>

    </div>
  <?php }
  echo paginate_links();
  ?>
  <?php wp_reset_postdata(); ?>
</div>
<?php get_footer(); ?>