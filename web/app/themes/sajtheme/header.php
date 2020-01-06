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
    <div class="social-nav">
        <ul>
            <?php
            $twitterLink= get_theme_mod('twitter');
            $facebookLink= get_theme_mod('facebook');
            $instaLink= get_theme_mod('instagram');
            $linkedinLink= get_theme_mod('linkedin');
            ?>
            <?php if ($facebookLink) { ?>
                <li><a href="<?php echo $facebookLink; ?>" target="_blank"
                       class="fontawesome social-icon facebook">F</a></li>
            <?php } ?>
            <?php if ($twitterLink) { ?>
                <li><a href="<?php echo $twitterLink; ?>" target="_blank"
                       class="fontawesome social-icon twitter">T</a></li>
            <?php } ?>
            <?php if ($instaLink) { ?>
                <li><a href="<?php echo $instaLink; ?>" target="_blank"
                       class="fontawesome social-icon instagram">I</a></li>
            <?php } ?>
            <?php if ($linkedinLink) { ?>
                <li><a href="<?php echo $linkedinLink; ?>" target="_blank"
                       class="fontawesome social-icon linkedin">L</a></li>
            <?php } ?>
        </ul>
    </div>

    <?php echo wp_nav_menu(
        array(
            'theme_location' => 'header-menu',
            'fallback_cb' => false
        )
    );
    ?>
</header>
