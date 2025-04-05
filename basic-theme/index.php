<?php

/**
 * Theme Header
 */

?>

<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <!-- static way get logo -->
                    <!-- <a href="/"><img src="<?php //echo get_template_directory_uri(); ?>/assets/media/logo.svg" alt=""></a> -->
                    
                    <!-- Dynamic way to get logo -->
                    <a href="/"><img src="<?php echo get_theme_mod('mythemenew_logo'); ?>" alt=""></a>
                </div>
                <div class="col-md-9">
                    <?php wp_nav_menu( array('theme_location' => 'primary', 'menu_id' => 'nav-menu')); ?>
                </div>
            </div>
        </div>
    </header>
    
    <?php wp_footer(); ?>
</body>
</html>