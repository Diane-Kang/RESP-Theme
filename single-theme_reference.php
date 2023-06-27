<?php

/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 */
?>

<!-- Table of Content & Content -->
<?php

$toc_headings = array();
$blog_content = '';
$num_words = 0;

$heading_generic_n = 0;
if (have_rows('blog_content')) {
  while (have_rows('blog_content')) {
    the_row();
    if (get_row_layout() == 'heading') {

      $h_tag = get_sub_field('block::heading:tag');
      $title_text = get_sub_field('block::heading:text');
      // Add id for the h2 heading
      if ($h_tag == 'h2') {
        $heading_generic_id = 'ToC-ref-' . $heading_generic_n;
        $blog_content .= '<' . $h_tag . ' id="' . $heading_generic_id . '">' . $title_text . '</' . $h_tag . '>';
        $toc_headings[$heading_generic_n]["id"] = $heading_generic_id;
        $toc_headings[$heading_generic_n]["text"] = $title_text;
        $heading_generic_n++;
      }
      // if it is not h2 heading, then no id.  
      else {
        $blog_content .= '<' . $h_tag . '>' . $title_text . '</' . $h_tag . '>';
      }
    } elseif (get_row_layout() == 'paragraph') {
      $paragraph = get_sub_field('paragraph');
      $blog_content .= $paragraph;
    }
  }
}

function get_toc($toc_headings)
{
  // parse toc
  ob_start();
?>
  <div class="toc">
    <div class="toc-title text-bold">Inhaltsverzeichnis</div>
    <ul>
      <?php
      for ($i = 0; $i < count($toc_headings); $i++) {
        echo '<li><a href="#' . $toc_headings[$i]["id"] . '">' . $toc_headings[$i]["text"] . '</a></li>';
      }
      ?>
    </ul>
  </div>
<?php
  return ob_get_clean();
}

?>

<?php get_header(); ?>
<?php the_content(); ?>
<?php get_footer(); ?>