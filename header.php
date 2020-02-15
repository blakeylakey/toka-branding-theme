<?php
/* header stuff */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .primary-menu-nav-item a {
            color: <?php echo get_theme_mod("primary_color"); ?> !important;
        }
        h1, h2 {
            color: <?php echo get_theme_mod("primary_color"); ?> !important;
        }
        h3, h4, h5, h6, p, a {
            color: <?php echo get_theme_mod("secondary_color"); ?>  !important;
        }
        .header-special-notice {
            background-color: <?php echo get_theme_mod("special_color"); ?> !important;
        }

    </style>
    <?php wp_head(); ?>
</head>


<body>

    <div class="header-special-notice">
        <div class="row header-special-notice-row">
            <div class="col-8">
                <p class="mb-0">Get a custom engraved jar today and keep your herbs fresh...</p>
            </div>
            <div class="col-4 d-flex">
                <?php
                wp_nav_menu(array(
                    'menu_class' => 'nav ml-auto special-nav-bar',
                    'theme_location' => 'special',
                    'container' => false
                ));
                ?>
            </div>
        </div>
    </div>

    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="<?php echo get_bloginfo( 'url' ); ?>">
                <?php if (get_theme_mod("site_logo")) : ?>
                    <img id="site-logo" src="<?php echo wp_get_attachment_url(get_theme_mod("site_logo")); ?>" height="<?php echo get_theme_mod("site_logo_height"); ?>" alt="<?php echo get_bloginfo('description') ?>" />
                <?php else : ?>
                    <?php echo get_bloginfo('name'); ?>
                <?php endif; ?>
            </a>


            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php
                wp_nav_menu(array(
                    'menu_class' => 'navbar-nav ml-auto nav-line-bottom',
                    'theme_location' => 'primary',
                    'container' => false
                ));
                ?>
            </div>

            <div>
                <?php echo wc_get_cart_url(); ?>
            </div>
        </nav>
    </header>