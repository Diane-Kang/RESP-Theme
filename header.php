<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php //if (is_singular() && pings_open(get_queried_object())) : ?>
        <!-- <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"> -->
    <?php //endif; ?>
    <?php wp_head(); ?>

    <script type="text/javascript">
        const themePath = '<?= get_template_directory_uri(); ?>';
    </script>
</head>

<body <?php body_class('Body'); ?>>

<?php do_action('wp_after_body'); ?>

<header class="Header">
    <div class="Header__container container container--wide">
      header
    </div>
</header>


<main class="main">

