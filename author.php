<?php get_header(); ?>

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
    
        $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
        
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
            <div class="author-info">
                <h1><?php echo $curauth->user_firstname.' '.$curauth->user_lastname; ?></h1>
                <div class="content">
                    <div class="image">
                        <div class="cover"> <?php userphoto($curauth->ID); ?></div>                        
                    </div>
                    <div class="text">
                        <div class="text-italic">
                            <?php echo $curauth->authorSubtitle; ?>
                        </div>
                        
                        <div class="connect">
                            <a class="btn" href="#">Contact this Author</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="author-about keword-block">
                <h1>About the Author</h1>
                <p><?php echo $curauth->user_description; ?></p>
            </div>
            
            
            <div class="masonry">
            <?php 
                $args = array('post_type' => 'blog', 'author' => $curauth->ID );
                $blogQuery = new WP_Query($args);
                if ( $blogQuery->have_posts() ) { 
                    while ( $blogQuery->have_posts() ) { 
                        $blogQuery->the_post(); 
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
                        <div class="author">BY <?php the_author(); ?></div>
                        <div class="text"> <?php the_content(); ?> </div>
                        
                        <div class="buttons">
                            <a class="read-more" href="<?php the_permalink(); ?>">Read More</a>
                            <ul class="social-light">
                                <li class="fb"><a href="https://www.facebook.com/Treasurefy/">FB</a></li>
                                <li class="tw"><a href="https://twitter.com/treasurefy">TW</a></li>
                                <li class="gp"><a href="https://plus.google.com/+Treasurefy/posts">G+</a></li>
                                <li class="in"><a href="https://www.linkedin.com/company/2717539?trk=tyah&amp;trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A2717539%2Cidx%3A1-1-1%2CtarId%3A1457681716881%2Ctas%3Atreasurefy">In</a></li>
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
    
    
    <?php require_once( get_template_directory() .'/templates/inc/consultation-form.php'); ?>

    
        
    </div>
</div>


<?php get_footer(); ?>