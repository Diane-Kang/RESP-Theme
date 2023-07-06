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

<!-- Function for Table of Content & Content -->
<?php

$toc_headings = array();
$blog_content = '';


$heading_generic_n = 0;
if (have_rows('blog_content')) {
  while (have_rows('blog_content')) {
    the_row();
    if (get_row_layout() == 'heading') {
      $heading = get_sub_field('heading');
      $h_tag = $heading['tag'];
      $title_text = $heading['text'];
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
    } elseif (get_row_layout() == 'image') {
      $image = get_sub_field('image');
      if ($image) {
        $image_html = '';
        $image_html .= '
          <div class="img-container"> <img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" /></div>';
        $blog_content .= $image_html;
      }
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

<!-- Template -->
<?php get_header(); ?>
<div class="container blog">
  <div class="blog--header">
    <nav class="breadcrumms text-bold">
      <a href="<?php echo home_url('blog'); ?>">Blog Home</a>
      <?php $category = get_field('category'); ?>
      <?php if ($category) : ?>
        <a href="<?php echo esc_url(get_term_link($category)); ?>"><?php echo esc_html($category->name); ?></a>
      <?php endif; ?>
      <span><?php the_title(); ?></span>

    </nav>
    <div class="blog-meta-data">
      <div class="date">erstellt am <?php echo get_the_date('d.F.Y'); ?></div>
      <div class="reading-time">Lesedauer: ca. <?php echo round(str_word_count(preg_replace('#<[^>]+>#', ' ', $blog_content)) / 100); ?> Minute</div>
    </div>
    <h1 class="blog-title center"><?php the_title(); ?></h1>
  </div>
  <div class="blog--content">
    <div class="intro">
      <div class="toc--outter">
        <?php echo get_toc($toc_headings); ?>
      </div>
      <div class="abstrct"><?php the_field('intro_text'); ?></div>
    </div>
    <div class="content">
      <div class="content--inner">
        <?php echo $blog_content ?>
      </div>
    </div>
  </div>
</div>

<button class="scrollup-button btn btn--fill" id="btnUP" title="Go to top">
  <i class="fa-solid fa-chevron-up"></i>
</button>

<?php get_footer(); ?>