<?php

// create navigation menus
register_nav_menus(array(
  'primary' => __('Hauptnavigation', 'reboot'),
  'meta' => __('Meta', 'reboot'),
  'footer' => __('Footer', 'reboot'),
  'social' => __('Social', 'reboot')
));

function getMenu($menu_name = 'primary', $depth = 0, $nav_class = '', $container = 'nav')
{
  // get_nav_menu_locations() : Get our nav locations 
  // $locations[$menu_name] : check if there is the targeted nav object already;
  // $menu_name: from register_nav_menus
  if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
    $nav_arg = array(
      'theme_location'  => $menu_name,
      'container'       => $container,
      'container_class' => 'nav ' . $nav_class,
      'menu_class'      => 'main-menu',
      'menu_id'         => '',
      'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
      'fallback_cb'     => false,
      'depth'           => $depth,
      'walker'          => new WPDocs_Walker_Nav_Menu(),
    );
    return wp_nav_menu($nav_arg);
  } else {
    return "check your menu";
  }
}

add_filter('nav_menu_css_class', 'remove_menu_classes', 10, 2);

function remove_menu_classes($classes)
{

  if (!is_array($classes))
    return $classes;

  // List of allowed menu classes
  $allowed =  array(
    'current-menu-item',
    'current-menu-ancestor',
    'menu-item-has-children',
    'linkedin',
    'facebook',
    'instagram',
    'twitter',
    'youtube'
  );


  foreach ($classes as $key => $class) {

    // keep allowed classes
    if (in_array($class, $allowed))
      continue;

    // keep font awesome classes
    if (0 === strpos($class, 'fa-'))
      continue;

    // remove the rest
    unset($classes[$key]);
  }

  return $classes;
}

add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var)
{
  return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
}



/**
 * Custom walker class.
 */
class WPDocs_Walker_Nav_Menu extends Walker_Nav_Menu
{

  /**
   * Starts the list before the elements are added.
   *
   * Adds classes to the unordered list sub-menus.
   *
   * @param string $output Passed by reference. Used to append additional content.
   * @param int    $depth  Depth of menu item. Used for padding.
   * @param array  $args   An array of arguments. @see wp_nav_menu()
   */
  function start_lvl(&$output, $depth = 0, $args = array())
  {
    // Depth-dependent classes.
    $indent = ($depth > 0  ? str_repeat("\t", $depth) : ''); // code indent
    $display_depth = ($depth + 1); // because it counts the first submenu as 0
    $classes = array(
      'sub-menu',
      'menu-depth-' . $display_depth
    );
    $class_names = implode(' ', $classes);

    // Build HTML for output.
    $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
  }

  /**
   * Start the element output.
   *
   * Adds main/sub-classes to the list items and links.
   *
   * @param string $output Passed by reference. Used to append additional content.
   * @param object $item   Menu item data object.
   * @param int    $depth  Depth of menu item. Used for padding.
   * @param array  $args   An array of arguments. @see wp_nav_menu()
   * @param int    $id     Current item ID.
   */
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
  {
    global $wp_query;
    $indent = ($depth > 0 ? str_repeat("\t", $depth) : ''); // code indent

    // Depth-dependent classes.
    $depth_classes = array(
      'menu-item-depth-' . $depth
    );
    $depth_class_names = esc_attr(implode(' ', $depth_classes));

    // Passed classes.
    $classes = empty($item->classes) ? array() : (array) $item->classes;
    $class_names = esc_attr(implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item)));

    // don't need class name 
    // $class_names = "";

    // Build HTML.
    $output .= $indent . '<li class="' . $depth_class_names . ' ' . $class_names . '">';

    // Link attributes.
    $attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : '';
    $attributes .= ' class="menu-link ' . ($depth > 0 ? 'sub-menu-link' : 'main-menu-link') . '"';

    if ($args->theme_location == 'social') {
      $item_output = sprintf(
        '%1$s<a%2$s><i class="fa-brands %3$s"></i></a>%4$s',
        $args->before,
        $attributes,
        'fa-' . strtolower(apply_filters('the_title', $item->title, $item->ID)),
        $args->after
      );
    } else {
      $item_output = sprintf(
        '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
        $args->before,
        $attributes,
        $args->link_before,
        apply_filters('the_title', $item->title, $item->ID),
        $args->link_after,
        $args->after
      );
    }
    // }
    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}
