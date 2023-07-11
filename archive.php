<?php

/**
 * Posts Archive page 
 * 
 *
 */

//  we force to have only category archive
// if (!is_category()) {
//   wp_redirect('/blog/', 301);
// }

?>


<?php get_header(); ?>
<div class="page blog-index category-archive">
  <div class="container ">
    <div class="category-navi display--desktop">
      <?php echo category_navi(); ?>
    </div>
    <div class="category-navi display--mobile">
      <input type="checkbox" class="checkbox" id="cat-navi-toggle">
      <label for="cat-navi-toggle" class="button">
        <div class="current-category open"><?php echo single_cat_title('', false); ?><i class="fa-solid fa-filter"></i> <i class="fa-solid fa-xmark"></i></div>
      </label>
      <div class="options">
        <?php echo category_navi(); ?>
      </div>

    </div>

    <h1 class="heading1 text-center">Blog-Liste</h1>
    <div class="intro-wrapper grid12">
      <div class="intro grid12-10">
        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
      </div>
    </div>

    <?php

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
      'post_type' => 'post',
      'paged' => $paged,
      // 'posts_per_page' => 3,
      'cat' => get_cat_ID(single_cat_title('', false))
    );

    $custom_query = new WP_Query($args);
    ?>
    <div class="post-item-list flex">
      <?php
      while ($custom_query->have_posts()) {
        $custom_query->the_post(); ?>
        <div class="post-item">
          <div class="thumbnail-wrapper">
            <?php $thumbnail = get_the_post_thumbnail();
            if ($thumbnail) {
              echo $thumbnail;
            } else {
              echo '<img decoding="async" src="http://reap-theme.local/wp-content/uploads/2023/05/1x1-495x495px.png" alt="">';
            }
            ?>
          </div>
          <div class="content-wrapper">
            <div class="teaser">
              <div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
              <div class="text"><?php the_field('teaser_text'); ?></div>
            </div>
            <div class="cta">
              <a class="btn--underline" href="<?php the_permalink(); ?>">weiterlesen</a>
            </div>

          </div>
        </div>
      <?php } ?>
    </div>
    <!-- pagination -->
    <div class="pagination">
      <?php

      $total_pages = $custom_query->max_num_pages;
      $big = 999999999; // need an unlikely integer

      if ($total_pages > 1) {
        $current_page = max(1, get_query_var('paged'));

        echo paginate_links(array(
          'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
          'format' => '?paged=%#%',
          'current' => $current_page,
          'total' => $total_pages,
          'prev_text'          => __('vorige'),
          'next_text'          => __('nächste'),
        ));
      }
      ?>
    </div>

  </div>
  <?php wp_reset_postdata(); ?>
</div>
<?php get_footer(); ?>