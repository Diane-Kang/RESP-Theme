<?php
// check if required Plugin installed & activated
add_action('admin_notices', 'showAdminMessages');

function showAdminMessages()
{
  $plugin_messages = array();
  include_once(ABSPATH . 'wp-admin/includes/plugin.php');

  // Acf pro Plugin 
  if (!is_plugin_active('advanced-custom-fields-pro/acf.php')) {
    $plugin_messages[] = 'This theme requires you to install the ACF Plugin Pro, <a href="https://www.advancedcustomfields.com/my-account/view-licenses/">download it from here</a>.';
  }
  // Acf pro Plugin 
  if (!is_plugin_active('svg-support/svg-support.php')) {
    $plugin_messages[] = 'This theme requires you to install the svg-support Plugin, <a href="https://wordpress.org/plugins/svg-support/">download it from here</a>.';
  }


  if (count($plugin_messages) > 0) {
    echo '<div id="message" class="error">';

    foreach ($plugin_messages as $message) {
      echo '<p><strong>' . $message . '</strong></p>';
    }

    echo '</div>';
  }
}


// Enqueue style and js
function pe_theme_files()
{
  //front end
  wp_enqueue_style('pe_theme_main_styles', get_theme_file_uri('/build/style-index.css'));
  // Javascript need to be loaded in footer: last variable need to be true
  wp_enqueue_script('pe_theme_js', get_template_directory_uri() . '/build/index.js', array(), '', true);
}
add_action('wp_enqueue_scripts', 'pe_theme_files');

// following section replaced by the pe_theme_feature, add_editor_style
// // Add custom acf block editor(backend) style
// function enqueue_block_editor_custom_files()
// {
//   // apply frontend stlying in backend as well, for preview mode  
//   // wp_enqueue_style('pe_theme_main_styles', get_theme_file_uri('/build/style-index.css'));
//   // additional editor style
//   // wp_enqueue_style('acf-block-editor-style', get_template_directory_uri() . '/css/acf-editor-style.css');
// }
// add_action('enqueue_block_editor_assets', 'enqueue_block_editor_custom_files');

function pe_theme_features()
{
  /*
* Let WordPress manage the document title.
* By adding theme support, we declare that this theme does not use a
* hard-coded <title> tag in the document head, and expect WordPress to
  * provide it for us.
  */
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  set_post_thumbnail_size(360, 360, false);
  add_image_size('logo-150', 150, 150, false);
  add_image_size('cardimage-200', 200, 200, false);
  //medium 300
  add_image_size('medium-550', 550, 0, false);
  //medium-large 786
  //large 1024


  // Editor style. add custom acf-aditor css and front end style https://www.billerickson.net/getting-your-theme-ready-for-gutenberg/
  add_theme_support('editor-styles');
  add_editor_style(get_template_directory_uri() . '/css/acf-editor-style.css');
  add_editor_style(get_theme_file_uri('/build/style-index.css'));
}
add_action('after_setup_theme', 'pe_theme_features');




// Font localize : Text font & Icon font 
class local_fonts
{
  function __construct()
  {
    add_action('wp_enqueue_scripts', array($this, 'fonts'));
  }

  function fonts()
  {
    // Generate correspond fonts.css by https://gwfh.mranftl.com/fonts
    wp_enqueue_style('fonts_css', get_theme_file_uri('asset/fonts/fonts.css'), array(), 1.0, false);
    // Font awesome icon as font 
    wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/asset/fontawesome-kit-resp/css/all.css');
    // Usage 
    // 
  }
}
new local_fonts();




function registerTypeThemeRef()
{
  register_post_type(
    'theme_reference',
    array(
      'labels' => array(
        'name' => __('Theme Ref'),
        'singular_name' => __('Theme Ref')
      ),
      'public' => true,
      'has_archive' => false,
      'show_in_rest' => true,
      'menu_icon' => 'dashicons-excerpt-view'
    )
  );
}

add_action('init', 'registerTypeThemeRef');
