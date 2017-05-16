<?php

    /*

    * Template Name: Book

    */

get_header();
// Get theme options
$enable_parallax = get_theme_mod('themeora_enable_parallax', 'yes');
$parallax_settings = '';
if ( 'yes' === $enable_parallax ){
    //advanced users can change this line to change the parallax effect. For documentation check https://github.com/Prinzhorn/skrollr
    $parallax_settings = 'data-center="background-position: 50% 50%;"
    data-top-bottom="background-position: 50% 20%;"';
}

// Get the featured image to set as the background of the header. Use header_image if set, featured image if not
?>

<header >
	<div class="container">
    <h1 class="title"><span><?php the_title(); ?></span></h1>
	</div>
</header>

<div class="full-width-container main-content-area">
    
    <div class="container">
        <div class="row">
            <div class="col-md-4"><?php 
			if ( has_post_thumbnail() ) {
			the_post_thumbnail();
			}  ?>
			</div>
            <div class="col-md-8"><?php the_meta(); ?></div>
            <?php the_content(); ?>
            <div class="content">
            </div> <!-- end row -->
        </div><!-- end container -->
</div><!-- end main-content-area -->


<?php get_footer(); ?>


