<?php
/**
 * Template Name: Blog Page Template
 */
get_header();
?>

<div class="main-container">
    <div class="sidebar-bg"></div>
    <div class="left-sidebar">
        <?php get_sidebar(); ?>
    </div>
    
    <div class="right-content blog-page page-content">
    <?php $mailchimpLsitID = ''; ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
    <?php
        $title1 = rwmb_meta( 'service-title-1', 'type=text' ) ? rwmb_meta( 'service-title-1', 'type=text' ) : '';
        $title2 = rwmb_meta( 'service-title-2', 'type=text' ) ? rwmb_meta( 'service-title-2', 'type=text' ) : '';
        $title3 = rwmb_meta( 'service-title-3', 'type=text' ) ? rwmb_meta( 'service-title-3', 'type=text' ) : '';
       
        $mailchimpLsitID = rwmb_meta( 'maichimp-list-id', 'type=text' ) ? rwmb_meta( 'maichimp-list-id', 'type=text' ) : '';
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
    <?php endwhile; endif; ?>
    <div class="line"></div>

    <div class="blog-main-block">
        <div class="blog-items">
            <div class="masonry">
            <?php 
                $args = array('post_type' => 'blog');
                $blogQuery = new WP_Query($args);
                if ( $blogQuery->have_posts() ) { 
                    while ( $blogQuery->have_posts() ) { 
                        $blogQuery->the_post(); 
            ?>
                <div class="item" >
                    <div class="image">
                        <a href="<?php the_permalink(); ?>">
                        <?php
                        if(has_post_thumbnail()){
                            the_post_thumbnail( 'thumbnail' ); 
                        }
                        ?>
                        </a>
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
                                    <!--<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_the_permalink()); ?>">-->
                                    <a class="share-btn" data-title='<?php echo get_the_title(); ?>' data-content='<?php echo html_cut( get_the_excerpt(), 150 );?>' data-image='<?php the_post_thumbnail_url('full'); ?>' data-link='<?php the_permalink(); ?>'>
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
           <?php } //and while 
                    } else {
                                // no posts found
                    } //end if
                    // Restore original Post Data 
                    wp_reset_postdata();
            ?>
            </div>
        </div>
        
        <?php require_once( get_template_directory() .'/templates/inc/blog-sidebar.php'); ?>
        
    </div>
    
    
    <?php getConsultationForm($mailchimpLsitID); ?>

    
        
    </div>
</div>


<?php get_footer(); ?>