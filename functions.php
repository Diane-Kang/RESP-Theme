<?php

$allowedBlocks = [];

define('THEMEPATH', get_template_directory());
define('FUNCTIONSPATH', THEMEPATH . '/functions/');

// initial settings : add css, Lato font localize, custom post type: theme reference, fontawsome
require_once(FUNCTIONSPATH . 'init.php');
// acf block helper functions
require_once(FUNCTIONSPATH . 'acfblock-helper.php');
// initial settings : acf block register 
require_once(FUNCTIONSPATH . 'acfblock.php');
// Add funktions for template building
require_once(THEMEPATH . '/template-parts/navigation/nav-functions.php');
require_once(THEMEPATH . '/acf-blocks/subnavigation/functions.php');
// Theme Feature
//-- Blog: default editor ignored -> acf would be used 
add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);
function prefix_disable_gutenberg($current_status, $post_type)
{
  if ('post' === $post_type) return false;
  return $current_status;
}
/**
 * remove all default block types from wordpress
 *
 * @link https://rudrastyh.com/gutenberg/remove-default-blocks.html
 */

function allowedBlockTypes($original_allowedBlocks)
{
  global $allowedBlocks;
  array_push($allowedBlocks, "core/spacer", "core/paragraph", "core/heading", "core/columns");
  return $allowedBlocks;
  // return $original_allowedBlocks;
}

add_filter('allowed_block_types_all', 'allowedBlockTypes');
