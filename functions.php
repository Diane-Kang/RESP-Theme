
<?php
$allowedBlocks = [];

define('THEMEPATH', get_template_directory());
require_once(THEMEPATH . '/jsxblock.php');




//
function university_files()
{
  // fontend style
  wp_enqueue_style('university_main_styles', get_theme_file_uri('/build/style-index.css'));
  wp_enqueue_style('university_extra_styles', get_theme_file_uri('/build/index.css'));

  wp_localize_script('main-university-js', 'universityData', array(
    'root_url' => get_site_url(),
    'nonce' => wp_create_nonce('wp_rest')
  ));
}

add_action('wp_enqueue_scripts', 'university_files');


function university_features()
{
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_image_size('professorLandscape', 400, 260, true);
  add_image_size('professorPortrait', 480, 650, true);
  add_image_size('pageBanner', 1500, 350, true);
  add_theme_support('editor-styles');
  add_editor_style(array('build/style-index.css', 'build/index.css'));
}

add_action('after_setup_theme', 'university_features');

/**
 * remove all default block types from wordpress
 *
 * @link https://rudrastyh.com/gutenberg/remove-default-blocks.html
 *    function addBlockarray()
 * {
 *   global $allowedBlocks;
 *   array_push($allowedBlocks, "respblock/{$this->name}");
 * }\
 * 
 */
function allowedBlockTypes($allowedBlocks)
{
  global $allowedBlocks;
  return $allowedBlocks;
}

// add_filter('allowed_block_types_all', 'allowedBlockTypes');

add_action('init', 'register_acf_blocks');
function register_acf_blocks()
{
  register_block_type(__DIR__ . '/acf-blocks/textbox');
}
