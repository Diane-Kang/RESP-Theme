<?php

/**
 * The template for redirecting page
 * Template Name: Blog Template
 *
 */
?>

<?php get_header(); ?>
<div class="page blog-index category-archive">

  <div class="container ">
    <div class="intro editor-content ">
      <?php the_field('text'); ?>
    </div>


    <div class="category-navi display--desktop">
      <?php //echo category_navi(); 
      getMenu('blog-subnavi', 1, '');
      ?>
    </div>
    <div class="category-navi display--mobile">
      <input type="checkbox" class="checkbox" id="cat-navi-toggle">
      <label for="cat-navi-toggle" class="button">
        <div class="current-category open">Alles<i class="fa-solid fa-filter"></i> <i class="fa-solid fa-xmark"></i></div>
      </label>
      <div class="options">
        <?php //echo category_navi(); 
        getMenu('blog-subnavi', 1, ''); ?>
      </div>
    </div>

    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
      'post_type' => 'post',
      'paged' => $paged,
      'orderby' => 'publish_date',
      'order' => 'DESC'
      // 'posts_per_page' => 3,
    );

    $custom_query = new WP_Query($args);
    ?>
    <div class="post-item-list flex">
      <?php
      while ($custom_query->have_posts()) {
        $custom_query->the_post(); ?>
        <a class="post-item" href="<?php the_permalink(); ?>">
          <div class="thumbnail-wrapper">
            <?php $thumbnail = get_the_post_thumbnail();
            if ($thumbnail) {
              echo $thumbnail;
            } else {
              echo '<img decoding="async" width ="360px" height ="360px" src="http://reap-theme.local/wp-content/uploads/2023/05/1x1-495x495px.png" alt="">';
            }
            ?>
          </div>
          <div class="content-wrapper">
            <div class="teaser">
              <div class="title"><?php the_title(); ?></div>
              <div class="text"><?php the_field('teaser_text'); ?></div>
            </div>
            <div class="cta">
              <p class="btn--underline">weiterlesen</p>
            </div>
          </div>
        </a>
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
  <?php echo paginate_links(); ?>
  <?php wp_reset_postdata(); ?>
</div>
<?php get_footer(); ?>