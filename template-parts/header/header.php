<header class="header--outer center">
  <div class="header flex">
    <div class="logo flex">
      <a href="<?= esc_url(home_url('/')); ?>" rel="home" class="center">
        <img src="<?php echo get_template_directory_uri(); ?>/asset/img/logo.png" alt="real">
      </a>
    </div>
    <input type="checkbox" class="navigation__checkbox" id="navi-toggle">
    <label for="navi-toggle" class="navigation__button">
      <span class="navigation__icon">&nbsp;</span>
    </label>
    <div class="header--container flex">
      <?php getMenu('primary', 3, 'header-main-navi'); ?>
      <?php getMenu('meta', 2, 'header-meta'); ?>
    </div>


  </div>
</header>