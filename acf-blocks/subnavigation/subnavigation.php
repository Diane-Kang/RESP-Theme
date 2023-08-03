<?php
$parentId = false;
$type = false;

if (get_field('block::subnavi:type') == 'subpages') {
  global $post;
  $parentId = (is_page() && $post->post_parent) ? wp_get_post_parent_id(get_the_ID()) : get_the_ID();
  // $parentId = get_the_ID();
  $type = "subpages";
} else {
  $type = "customlinks";
}

$items = getSubNavigationItems($type, $parentId, get_the_ID());

?>
<?php if ($items) : ?>
  <!-- <span class="Anchor" data-id="navigation"></span> -->
  <div class="subnavi-sticky-marker"></div>

  <div class="module subnavigation display--desktop ">
    <div class="container">
      <nav>
        <?php foreach ($items as $item) : ?>
          <?php $link = $item['link'] . ($type === "nav" ? "#navigation" : ""); ?>
          <a href="<?= $link; ?>" class="<?= $item['active'] ? ' active' : ''; ?>"><?= $item['title']; ?></a>
        <?php endforeach; ?>
      </nav>
    </div>
  </div>
  <div class="subnavi-placeholder"></div>
<?php endif; ?>

<?php
