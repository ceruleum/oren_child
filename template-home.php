<?php

/*
* Template Name: Home
*/





/*  
    Building the page header
--------------------------------------------------------------------------------------- */
get_header();





// Get theme options  


// Get the featured image to set as the background of the header. Use header_image if set, featured image if not
$background_image = '';

if ( wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full-size' ) ) {
    $background_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full-size' );
    $background_image = $background_image[0];
}

if ( get_header_image() ) {
    $background_image = get_header_image();
}


// Setup paging for portfolio pagaination
if ( get_query_var('paged') ) {
    $paged = get_query_var('paged');
} elseif ( get_query_var('page') ) {
    $paged = get_query_var('page');
} else {
    $paged = 1;
}


// Set a variable to tell us if there are pagination links to we can take care of spacing issues
$pagination = false;
?>





<?php 
/*  
    Building the title section of the homepage
    NB : the homeage may have a Title and an Excerpt (optional)
--------------------------------------------------------------------------------------- */

if ( $paged === 1 ) : ?>
    <?php if ( have_posts() ) : ?>
        <header class="full-width-container center-page welcome-screen <?php $background_image != '' ? print 'header-with-background' : '' ?> <?php has_excerpt() ? print 'header-with-excerpt ' : print 'header-without-excerpt'; ?>" role="banner" data-welcome-background="<?php echo $background_image; ?>" >
            <div class="container welcome-container">
                <div class="row welcome-row">
                    <div class="col-md-10 col-md-offset-1">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <h1 class=""><?php the_title(); ?></h1>
                            <h2 class=""><?php the_content(); ?></h2>
                            <?php
                            if ( has_excerpt() ) {
                                the_excerpt();
                            } ?>
                        <?php endwhile; ?>
                    </div><!-- end col-md-10 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </header><!-- end header - full width container -->
        <?php wp_reset_query(); ?>
    <?php endif; ?>
<?php endif; ?>





 <?php
/* 
    Building the Portfolio section of the homepage
--------------------------------------------------------------------------------------- */

// Get options for the portfolio
$people_on_home_page = -1;

// Get posts assigned to the template-portfolio-item.php template
$args = array(
    'post_type' => 'page',
    'meta_key' => '_wp_page_template',
    'meta_value' => 'template-person.php',
    'post_status' => 'publish',
    'posts_per_page' => $people_on_home_page,
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'paged' => $paged
);

// Send the request
$wp_query = new WP_Query( $args );

// Set the pagination variable to true if we have more than one page
if ( $wp_query->max_num_pages > 1 ) $pagination = true;

// Work out how big the image should be based on how many cols we want
$img_size = 'themeora-portfolio-span-8';

if ( $wp_query->have_posts() ) : ?>
    <ul id="masonry-wrapper" class="portfolio-cols-4">
        <?php while ( $wp_query->have_posts() ) : $wp_query->the_post();
            // Check if the portfolio has an image. Only load the item if it does
            if ( has_post_thumbnail( $wp_query->post->ID ) ) :
                $previewImage = wp_get_attachment_image_src( get_post_thumbnail_id( $wp_query->post->ID ), $img_size ); ?>
                <li class="masonry-item">
                    <div class="person">
                        <a href="<?php the_permalink(); ?>" class="portfolio-link" title="<?php echo $person_name; ?>">
                            <img src="<?php echo $previewImage[0] ?>" class="img-adapt" alt="<?php the_title(); ?>" />
                            <div class="portfolio-details">
                                <div class="details-text">
                                    <h2><?php the_title(); ?></h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </li><!-- masonry-item -->
            <?php endif; ?>
        <?php endwhile; ?>
    </ul><!-- posts-wrapper -->
<?php 
themeora_paging();
wp_reset_query();
endif;
?>

   


<!--   
<?php
/* 
    Show the post content after the portfolio if set, if the homepage has any content
--------------------------------------------------------------------------------------- */

$homepage_content = get_the_content();

if ( !empty( $homepage_content ) && $paged === 1 ) : ?>
    <div class="full-width-container main-content-area <?php $pagination === true ? print 'no-top-padding' : '' ?>">
        <div class="container">
            <div class="col-md-12 homepage-content">
                <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?> 
                <?php endwhile; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

 
-->  


<?php 
/* 
    Build the page footer
--------------------------------------------------------------------------------------- */
get_footer(); ?>