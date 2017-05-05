<footer class="full-width-container primary-footer">
    <div class="container">
        <div class="row" >
            <?php if ( is_active_sidebar( 'footer-widget' ) ) : ?>
                <div id="widget-area" class="widget-area col-md-2 col-md-offset-10">
                    <?php dynamic_sidebar( 'footer-widget' ); ?>
                </div><!-- .widget-area -->
            <?php endif; ?>
        </div><!-- end row -->
        
        <?php if ( has_nav_menu( 'social_menu' ) ) : ?>
            <div class="row">
                <nav id="social-navigation" class="social-navigation" role="navigation">
                    <?php
                        // Social links navigation menu.
                        wp_nav_menu( array(
                            'theme_location' => 'social_menu',
                            'depth'          => 1,
                            'link_before'    => '<span class="screen-reader-text">',
                            'link_after'     => '</span>',
                        ) );
                    ?>
                </nav><!-- .social-navigation -->
            </div>
        <?php endif; ?>
        
        <div class="row footer-bottom">
            <?php
            $footer_text = '&copy; ' . date("Y") . ' <a href="' . esc_url( home_url() ) . '">' . get_bloginfo( 'name' ) . '</a>';
            $footer_text .= '<span class="sep"> | </span>';
            $footer_text .= get_bloginfo( "description" ); ?>
        </div>
        
    </div><!-- end container -->
</footer><!-- end full-width-container -->

    
</div><!-- end page wrapper -->

<?php wp_footer(); ?>

</body>
</html>