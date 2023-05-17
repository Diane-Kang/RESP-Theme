<?php

// create navigation menus
register_nav_menus(array(
  'primary' => __('Hauptnavigation', 'reboot'),
  'meta' => __('Meta', 'reboot'),
  'footer' => __('Footer', 'reboot'),
  'social' => __('Social', 'reboot')
));

function getMenuItems($menu_name = 'primary')
{

  $menuLocations = get_nav_menu_locations(); // Get our nav locations (set in our theme, usually functions.php)
  // This returns an array of menu locations ([LOCATION_NAME] = MENU_ID);
  $menuID = $menuLocations['primary']; // Get the *primary* menu ID
  $primaryNav = wp_get_nav_menu_items($menuID); // Get the array of wp objects, the nav items for our queried location.
  $previous_parent = -1;
  $string = "";
  foreach ((array)$primaryNav as $key => $menu_item) {
    $string .= '<li>' . $menu_item->title . '</li>';
  }

  return $string;
  $parent = array();
  return $parent;
}

add_filter('nav_menu_css_class', 'remove_menu_classes', 10, 2);

function remove_menu_classes($classes)
{

  // List of allowed menu classes
  $allowed =  array(
    'current-menu-item',
    'menu-item-has-children',
    'first',
    'last',
    'vertical',
    'horizontal'
  );

  if (!is_array($classes))
    return $classes;

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
