<!DOCTYPE html >
<!--[if lt IE 7 ]> <html class="no-js ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    
    <!--[if lt IE 9]>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5shiv.min.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/respond.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>

<link href="https://fonts.googleapis.com/css?family=Roboto+Slab|Source+Sans+Pro|Gidugu|Oswald|Raleway" rel="stylesheet">

<body <?php body_class(); ?>>

<div class="page-wrapper" data-scroll-speed="500">
    <!-- BEGIN NAV -->
    <nav class="primary-navigation navbar" role="navigation">
        <div class="container">

            <div class="navbar-header">
                <?php if ( get_theme_mod( 'themeora-img-upload-logo' ) ) { ?>
                    <a href="<?php echo home_url( '/' ); ?>">
                        <img class="logo-uploaded" style="max-width:<?php echo esc_attr( get_theme_mod( 'themeora-img-upload-logo-width', '200' ) ); ?>px" src="<?php echo esc_url( get_theme_mod( 'themeora-img-upload-logo' ) );?>" alt="<?php the_title(); ?>" />
                    </a>
                <?php } else { ?>
                    <h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php } ?>
                <?php if ( get_theme_mod( 'themeora-show-description-header' ) == 'Yes' ) : ?>
                    <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                <?php endif; ?>
                    
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="menu-text sr-only"><?php _e('Menu', 'oren'); ?></span>
                    <span class="fa fa-bars"></span>
                </button>
            </div><!-- end navbar-header -->

            <div class="navbar-collapse collapse" id="nav-spy" style="padding: <?php echo esc_html( get_theme_mod('themeora-img-upload-logo-padding', '0') ) ?>px 0px;">
                <div class="nav-wrap">
                    <!-- primary nav -->
                    <?php 
                        if ( has_nav_menu('primary_menu') ) {
                            wp_nav_menu(array(
                            'container' =>false,
                            'theme_location' => 'primary_menu',
                            'menu_class' => 'nav navbar-nav',
                            'echo' => true,
                            'before' => '',
                            'after' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'depth' => 0,
                            'walker' => new themeora_Walker_Nav_Menu()
                            )); 
                        }
                    ?>
                </div><!--end nav-wrap -->
            </div><!-- end .navbar-collapse #nav-spy -->
        </div>
        
    </nav>
    <!-- END NAV -->