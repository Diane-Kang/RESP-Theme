
<?php
$allowedBlocks = [];
// blocks
// namespace for resp blocks: respblock
// class for GBBlock registeration
class JSXBlock
{
  public $name, $data, $renderCallback;

  function __construct($name, $renderCallback = null)
  {
    $this->name = $name;
    $this->renderCallback = $renderCallback;
    add_action('init', [$this, 'onInit']);
    $this->addBlockarray();
  }

  function addBlockarray()
  {
    global $allowedBlocks;
    array_push($allowedBlocks, "respblock/{$this->name}");
  }

  function ourRenderCallback($attributes, $content)
  {
    // In between ob_start(); and ob_get_clean(); will be a pure html/php 
    ob_start();
    require get_theme_file_path("/blocks/{$this->name}.php");
    return ob_get_clean();
  }

  function onInit()
  {
    wp_register_script($this->name, get_stylesheet_directory_uri() . "/build/{$this->name}.js", array('wp-blocks', 'wp-editor'));

    $ourArgs = array(
      'editor_script' => $this->name
    );

    if ($this->renderCallback) {
      $ourArgs['render_callback'] = [$this, 'ourRenderCallback'];
    }

    register_block_type("respblock/{$this->name}", $ourArgs);
  }
}

new JSXBlock('banner', true);
new JSXBlock('genericheading');
new JSXBlock('genericbutton');


/**
 * remove all default block types from wordpress
 *
 * @link https://rudrastyh.com/gutenberg/remove-default-blocks.html
 */
function allowedBlockTypes($allowedBlocks)
{
  global $allowedBlocks;
  return $allowedBlocks;
}

// add_filter('allowed_block_types_all', 'allowedBlockTypes');


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
