<?php

/**
 * Card-List Block Template.
 *
 */


// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
  $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// // Load values and assign defaults.
$device             = get_field('block::device') == "all" ? '' : 'display--' . get_field('block::device');
$distance_over      = 'p-top--' . get_field('block::distance:over');
$distance_under     = 'p-bottom--' . get_field('block::distance:under');

$bg_color           = get_field('block::background:color') ? 'bg-' . get_field('block::background:color') : "";
$bg_gradient        = get_field('block::background:gradient');
$box_design         = get_field('block::boxdesign');

$button1link        = get_field('block::buttons:btn1-link');
$button1type        = get_field('block::buttons:btn1-type');
$button2link        = get_field('block::buttons:btn2-link');
$button2type        = get_field('block::buttons:btn2-type');

if (!empty($button1link)) {
  $button1link["url"] = "#";
  $button1link["title"] = "Home";
}
if (!empty($button2link)) {
  $button2link["url"] = "#";
  $button2link["title"] = "CTA";
}



$custom_anchor      = get_field('block::cssid');


if (!empty($custom_anchor)) {
  $anchor = 'id="' . esc_attr($custom_anchor) . '" ';
}

$module_classes = "module {$device} ";
$container_classes = "container {$distance_over} {$distance_under} ";

if ($bg_color != "") {
  if ($box_design == "fullwidth") {
    $module_classes .= $bg_color;
  }
  if ($box_design == "box-design") {
    $container_classes .= $bg_color;
  }
}

?>
<div class="module card-list image-first">
  <div class="container p-top--small p-bottom--small">
    <div class="card flex">
      <div class="card--inner flexible flex flex-col">
        <div class="card__image">
          <img src="http://reap-theme.local/wp-content/themes/RESP-theme/img/1x1--495x495px.png" alt="" />
        </div>
        <div class="card__text-content flexible flex flex-col">
          <h3 class="heading heading3 text-center">Heading</h3>
          <div class="text flexible">
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem
              laborum fugit dolores ipsa beatae ullam, nam voluptas ut
              eveniet atque, aliquid, reprehenderit reiciendis nobis
              magnam corrupti facere illum consectetur doloribus?
            </p>
          </div>
          <div class="buttons flex flex-col">
            <a class="btn btn--fill" href="#">button1</a>
            <a class="btn btn--empty" href="#">button2</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card flex">
      <div class="card--inner flexible flex flex-col">
        <div class="card__image">
          <img src="http://reap-theme.local/wp-content/themes/RESP-theme/img/1x1--495x495px.png" alt="" />
        </div>
        <div class="card__text-content flexible flex flex-col">
          <h3 class="heading heading3 text-center">Heading</h3>
          <div class="text flexible">
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem
              laborum fugit dolores ipsa beatae ullam, nam voluptas ut
              facere illum consectetur doloribus?
            </p>
          </div>
          <div class="buttons flex flex-col">
            <a class="btn btn--fill" href="#">button1</a>
            <a class="btn btn--empty" href="#">button2</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card flex">
      <div class="card--inner flexible flex flex-col">
        <div class="card__image">
          <img src="http://reap-theme.local/wp-content/themes/RESP-theme/img/1x1--495x495px.png" alt="" />
        </div>
        <div class="card__text-content flexible flex flex-col">
          <h3 class="heading heading3 text-center">Heading</h3>
          <div class="text flexible">
            <p>Lorem consectetur doloribus?</p>
          </div>
          <div class="buttons flex flex-col">
            <a class="btn btn--fill" href="#">button1</a>
            <a class="btn btn--empty" href="#">button2</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>