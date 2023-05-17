<?php
$menu = get_query_var('navigationMenu');
$class = get_query_var('navigationClass') ?: $menu;
?>
<?php printf('<pre>%s</pre>', print_r(getMenuItems(), 1)); ?>
<?php wp_nav_menu(
  array(
    'theme_location'  => 'primary',
    'container'       => 'nav',
    'container_class' => 'nav',
    'menu_class'      => 'main-menu',
    'menu_id'         => '',
    'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
    'fallback_cb'     => false,
  )
); ?>