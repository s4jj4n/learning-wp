<!DOCTYPE html>
<html <?php language_attributes(); ?> lang="en">

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="icon" href="<?php echo get_theme_file_uri('assets/images/favicon-2020.png') ?>" />


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>


<header>
    <?php echo wp_nav_menu(
        array(
            'theme_location' => 'header-menu',
            'fallback_cb' => false
        )
    );
    ?>
</header>
