<?php
function acf_relative_path($link = "", $buttontype)
{
  // link exist 
  if (isset($link) && isset($link["url"])) {
    // if internal link
    if (wp_is_internal_link($link["url"])) {
      $url    = esc_url(parse_url($link["url"], PHP_URL_PATH));
    }
    // if external link
    else {
      $url = esc_url($link["url"]);
    }

    // if
    if ($buttontype == "fill"  || $buttontype == "empty") {
      $class  = ' class="btn btn--' . $buttontype . '"';
    }
    // if link
    else if ($buttontype == "link") {
      $class  = ' class="link link--underline"';
    }

    $target = ($link['target']) ? 'target="' . $link['target'] . '"' : false;
    $rel    = ($link['target'] === "_blank") ? ' rel="noopener noreferrer"' : false;
    $title  = $link['title'] ? $link['title'] : "No Title";
    return "<a href='$url'$class$target$rel>$title</a>";
  }

  return "";
}
