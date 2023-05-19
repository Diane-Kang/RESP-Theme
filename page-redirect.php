<?php

/**
 * The template for redirecting page
 * Template Name: Weiterleitung
 *
 */
if ($page = get_field('page::redirect:url')) {
  wp_redirect($page, 301);
}
