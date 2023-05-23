<header class="header--outer center">
  <div class="header flex">
    <div class="logo flex">
      <a href="<?= esc_url(home_url('/')); ?>" rel="home" class="center">
        <img src="<?php echo get_template_directory_uri(); ?>/asset/img/logo.png" alt="real">
      </a>
    </div>
    <button class="nav-button hamburger" type="button" role="button" aria-label="Menu" aria-controls="navigation--primary">
      <span class="hamburger__box">
        <span class="hamburger__middle"></span>
      </span>
    </button>
    <div class="header--container flex">
      <?php getMenu('primary', 3, 'header-main-navi'); ?>
      <?php getMenu('meta', 2, 'header-meta'); ?>
    </div>
  </div>
</header>