<?php
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

// new JSXBlock('banner', true);
// new JSXBlock('genericheading');
// new JSXBlock('genericbutton');
