<?php

$allowedBlocks = [];

define('THEMEPATH', get_template_directory());
define('FUNCTIONSPATH', THEMEPATH . '/functions/');

// initial settings : add css, Lato font localize, custom post type: theme reference, fontawsome
require_once(FUNCTIONSPATH . 'init.php');
// initial settings : acf block register 
require_once(FUNCTIONSPATH . 'acfblock.php');
// Add funktions for template building
require_once(THEMEPATH . '/template-parts/navigation/nav-functions.php');
require_once(THEMEPATH . '/acf-blocks/subnavigation/functions.php');




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
