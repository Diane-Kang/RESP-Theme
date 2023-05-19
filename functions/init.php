<?php
// fontend style
function resp_theme_style_files()
{
  wp_enqueue_style('resp_theme_main_styles', get_theme_file_uri('/build/style-index.css'));
  wp_enqueue_style('resp_theme_extra_styles', get_theme_file_uri('/build/index.css'));
}
add_action('wp_enqueue_scripts', 'resp_theme_style_files');


function resp_theme_features()
{
  /*
* Let WordPress manage the document title.
* By adding theme support, we declare that this theme does not use a
* hard-coded <title> tag in the document head, and expect WordPress to
  * provide it for us.
  */
  add_theme_support('title-tag');
  // add_theme_support('post-thumbnails');
  // add_image_size('professorLandscape', 400, 260, true);
  //Use frontend style in backend editor
  add_theme_support('editor-styles');
  add_editor_style(array('build/style-index.css'));
}
add_action('after_setup_theme', 'resp_theme_features');


class local_fonts
{
  function __construct()
  {
    add_action('wp_enqueue_scripts', array($this, 'fonts'));
  }

  function fonts()
  {
    // Generate correspond fonts.css by https://gwfh.mranftl.com/fonts
    wp_enqueue_style('fonts_css', get_theme_file_uri('fonts/fonts.css'), array(), 1.0, false);
  }
}

/* Make hooks accessible for other plugins/themes with given variable */
new local_fonts();
