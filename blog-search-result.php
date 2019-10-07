<?php

get_header();

// Get data from URL into variables
$_name = $_GET['s'] != '' ? $_GET['s'] : '';

// Start the Query
$args = array(
        'post_type'     =>  'blog', // your CPT
        's'             =>  $_name, // looks into everything with the keyword from your 'name field'
    );
$query = new WP_Query( $args );

// Open this line to Debug what's query WP has just run
// var_dump($vehicleSearchQuery->request);
?>


<div class="main-container">
    <div class="sidebar-bg"></div>
    <div class="left-sidebar">
        <?php get_sidebar(); ?>
    </div>
    
    <div class="right-content blog-page page-content">

        
    <?php
        $title1 = get_post_meta( '11', 'service-title-1', true);
        $title2 = get_post_meta( '11', 'service-title-2', true);
        $title3 = get_post_meta( '11', 'service-title-3', true);
       
    ?>
    <div class="content-header blog">
        <div class="title1" >
            <div ><?php echo $title1; ?></div>
        </div>
        <div class="title2" >
             <div ><?php echo $title2; ?></div>
        </div>
        <div class="title3">
            <div ><?php echo $title3; ?></div>
        </div>            
    </div>
        
    <div class="line"></div>
    
    <div class="blog-main-block">
        
        <div class="blog-items">
            <div class="keword-block">
                <h1><?php echo $_GET['s']; ?></h1>
                <p>Here are more articles about <?php echo $_GET['s']; ?>. Enjoy!</p>
            </div>
            <div class="masonry">
            <?php 
               if( $query->have_posts() ) :
                    while( $query->have_posts() ) : $query->the_post();
            ?>
                <div class="item" >
                    <div class="image">
                        <?php
                        if(has_post_thumbnail()){
                            the_post_thumbnail( 'full' ); 
                        }
                        ?>
                    </div>
                    <div class="content">
                        <div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                        <div class="author">
                            <a href="<?php echo get_author_posts_url( get_the_author_meta('ID') ) ?>" >
                                BY <?php the_author(); ?>
                            </a>
                        </div>
                        <div class="text">                             
                            <?php echo html_cut( get_the_content(), 185 ) . '...'; ?>                         
                        </div>
                        
                        <div class="buttons">
                            <a class="read-more" href="<?php the_permalink(); ?>">Read More</a>
                            <ul class="social-light">
                                <li class="fb">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_the_permalink()); ?>">
                                        FB
                                    </a>
                                </li>
                                <li class="tw">
                                    <a href="https://twitter.com/home?status=<?php echo urlencode(get_the_permalink()); ?>">
                                        TW
                                    </a>
                                </li>
                                <li class="gp">
                                   <a href="https://plus.google.com/share?url=<?php echo urlencode(get_the_permalink()); ?>">
                                    G+
                                   </a>
                                </li>
                                <li class="in">
                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_the_permalink()); ?>&title=<?php echo get_the_title(); ?>&summary=&source=">
                                    In
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>                    
                </div>
           <?php endwhile;
                else :
                    _e( 'Sorry, nothing matched your search criteria', 'textdomain' );
                endif;
                wp_reset_postdata();
            ?>
            </div>
        </div>
        
        <?php require_once( get_template_directory() .'/templates/inc/blog-sidebar.php'); ?>
        
        
    </div>
    
    
    <?php require_once( get_template_directory() .'/templates/inc/consultation-form.php'); ?>

    
        
    </div>
</div>


<?php get_footer(); ?>
