<?php
function getSubNavigationItems($type, $parentId, $id)
{
  $items = [];

  if ($type === 'subpages') {

    $subPages = new WP_Query(array(
      'post_type' => 'page',
      'posts_per_page' => -1,
      'post_parent' => $parentId,
      'order' => 'ASC',
      'orderby' => 'menu_order'
    ));

    if ($subPages->have_posts()) {
      while ($subPages->have_posts()) {
        $subPages->the_post();
        $item = [
          'link' => get_permalink(),
          'title' => get_the_title(),
          'active' => get_the_ID() === $id
        ];

        $items[] = $item;
      }
    }
    wp_reset_postdata();
  } else if ($type === 'customlinks') {
    while (have_rows('block::subnavi:links')) {
      the_row();
      $link = get_sub_field('block::subnavi:link');
      if ($link) {
        $id = url_to_postid($link['url']);
        $item = [
          'link' => $link['url'],
          'active' => get_the_ID() === $id && !strpos($link['url'], '#'),
          'title' => $link['title'],
        ];
      } else {
        $item = "you have not choose any link";
      }
      $items[] = $item;
    }
  }

  return $items;
}
