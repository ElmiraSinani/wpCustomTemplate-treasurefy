<?php get_header(); ?>


<div class="main-container">
    
    <div class="left-sidebar">
        <?php get_sidebar(); ?>
    </div>
    
    <div class="right-content blog-page page-content">
       
        <div class="search-result" style="font-size: 12px">
            <?php if (have_posts()) : ?>

                    <h2>Search Results</h2>

                    <?php while (have_posts()) : the_post(); ?>

                            <div <?php post_class() ?> id="post-<?php the_ID(); ?>">

                                <a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a>
                                <div class="entry">
                                        <?php the_excerpt(); ?>
                                </div>

                            </div>



                    <?php endwhile; ?>

                    <div class="text-center">
                        <?php trf_content_nav( 'nav-below' ); ?>               
                    </div>

                    <?php //include (TEMPLATEPATH . '/inc/nav.php' ); ?>

            <?php else : ?>

                    <h2>No posts found.</h2>

            <?php endif; ?>

        </div>
        
    
    
    <?php require_once( get_template_directory() .'/templates/inc/consultation-form.php'); ?>

    
        
    </div>
</div>


<?php get_footer(); ?>







