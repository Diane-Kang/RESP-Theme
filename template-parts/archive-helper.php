<?php
function category_navi()
{
  // check current site identity
  $current_cat = single_cat_title('', false);
  $categories = get_categories();
  // parse toc
  ob_start();
  if (!$current_cat) {
    echo '<a class="current-category" href="/blog/">All</a>';
  } else {
    echo '<a href="/blog/">All</a>';
  }
  foreach ($categories as $category) {
    $cat_name = $category->name;
    if ($cat_name == $current_cat) {
      $class = "current-category";
    } else {
      $class = "";
    }
    echo '<a class="' . $class . '" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
  }

  return ob_get_clean();
}
