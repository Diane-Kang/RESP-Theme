<header class="header--outer center">
    <div class="header flex">
        <div class="logo flex">
            <a href="<?= esc_url(home_url('/')); ?>" rel="home" class="center">
                <?php $logo = get_field('logo', 'option'); ?>
                <?php if ($logo): ?>
                    <?php echo wp_get_attachment_image($logo, 'medium'); ?>
                <?php else: ?>
                    <img width="300"
                        src="<?php echo get_template_directory_uri(); ?>/asset/img/jira-logo-scaled-1-300x50.png"
                        class="attachment-medium size-medium" alt="" decoding="async"
                        srcset="<?php echo get_template_directory_uri(); ?>/asset/img/jira-logo-scaled-1-300x50.png    300w"
                        sizes="(max-width: 300px) 100vw, 300px" />
                <?php endif; ?>
            </a>
        </div>
        <input type="checkbox" class="hamburger__checkbox" id="navi-toggle">
        <label for="navi-toggle" class="hamburger__button">
            <span class="hamburger__icon">&nbsp;</span>
        </label>
        <div class="header--container flex">
            <?php getMenu('primary', 3, 'header-main-navi'); ?>
            <?php getMenu('meta', 2, 'header-meta'); ?>
        </div>
    </div>
</header>