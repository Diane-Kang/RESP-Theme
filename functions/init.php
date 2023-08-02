<?php
// Enqueue style and js
function resp_theme_files()
{
  wp_enqueue_style('resp_theme_main_styles', get_theme_file_uri('/build/style-index.css'));
  // Javascript need to be loaded in footer: last variable need to be true
  wp_enqueue_script('resp_theme_js', get_template_directory_uri() . '/build/index.js', array(), '', true);
}
add_action('wp_enqueue_scripts', 'resp_theme_files');

// Add custom acf block editor(backend) style
function enqueue_block_editor_custom_files()
{
  wp_enqueue_style('acf-block-editor-style', get_template_directory_uri() . '/css/acf-editor-style.css');
  wp_enqueue_style('resp_theme_main_styles', get_theme_file_uri('/build/style-index.css'));
}
add_action('enqueue_block_editor_assets', 'enqueue_block_editor_custom_files');

function resp_theme_features()
{
  /*
* Let WordPress manage the document title.
* By adding theme support, we declare that this theme does not use a
* hard-coded <title> tag in the document head, and expect WordPress to
  * provide it for us.
  */
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  // add_image_size('professorLandscape', 400, 260, true);
  //Use frontend style in backend editor
  add_theme_support('editor-styles');
}
add_action('after_setup_theme', 'resp_theme_features');



// Font localize
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


// Load Font Awesome
add_action('wp_enqueue_scripts', 'enqueue_font_awesome');
function enqueue_font_awesome()
{
  // wp_enqueue_script('font-awesome-svg', get_template_directory_uri() . '/asset/fontawesome-kit-resp/js/all.js');
  wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/asset/fontawesome-kit-resp/css/all.css');
}
