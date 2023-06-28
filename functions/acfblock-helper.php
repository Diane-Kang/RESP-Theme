<?php

/**
 *   creates a normal link from acf link array
 */

function acfLink($link, $class = false)
{
  if ($link) {
    $url    = $link['url'];
    $title  = $link['title'] ? $link['title'] : __("kein Titel", "reboot");
    $target = ($link['target']) ? ' target="' . $link['target'] . '"' : false;
    $rel    = ($link['target'] === "_blank") ? ' rel="noopener noreferrer"' : false;
    $class  = ($class) ? ' class="' . $class . '"' : false;

    return "<a href='$url'$target$rel$class>$title</a>";
  }

  return false;
}
