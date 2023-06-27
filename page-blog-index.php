<?php

/**
 * The template for redirecting page
 * Template Name: Blog Template
 *
 */
function get_excerpt($excerpt_org)
{
  $excerpt = $excerpt_org;
  $excerpt = substr($excerpt, 0, 200);
  $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
  $excerpt = trim(preg_replace('/\s+/', ' ', $excerpt));
  $excerpt = $excerpt . '...';
  return $excerpt;
}
?>



<?php get_header(); ?>
<div class="container blog-index category-archive">
  <div class="category-navi">
    <ul class="flex">
      <li class="current-cat-menu"><a href="/blog/">all</a></li>
      <li><a href="/category/news/">news</a></li>
      <li><a href="/category/immobilenmarkt/">immobilenmarkt</a></li>
      <li><a href="/category/updates/">updates</a></li>
    </ul>
  </div>
  <h1 class="heading text-center">Blog-Liste</h1>
  <div class="grid12">
    <div class="grid12-10">
      Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
    </div>
  </div>

  <?php
  // wp_list_categories();
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 12,
  );

  $custom_query = new WP_Query($args);
  ?>
  <div class="post-item-list grid12">
    <?php
    while ($custom_query->have_posts()) {
      $custom_query->the_post(); ?>
      <div class="post-item flex flex-col">
        <div class="thumbnail-wrapper center">
          <?php $thumbnail = get_the_post_thumbnail();
          if ($thumbnail) {
            echo $thumbnail;
          } else {
            echo '<img decoding="async" src="http://reap-theme.local/wp-content/uploads/2023/05/1x1-495x495px.png" alt="">';
          }
          ?>
        </div>
        <div class="content-wrapper flexible flex flex-col">
          <h5 class="headline headline--medium headline--post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
          <div class="flexible">
            <?php echo get_excerpt(get_the_excerpt()); ?>
          </div>
          <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">weiterlesen</a></p>

        </div>
      </div>
    <?php } ?>
  </div>

  <?php echo paginate_links(); ?>
  <?php wp_reset_postdata(); ?>
</div>
<?php get_footer(); ?>