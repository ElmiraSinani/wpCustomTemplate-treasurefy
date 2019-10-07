<?php
/**
 * Template Name: Home Page Template
 */
get_header();
?>

<div class="main-container">
    
    <div class="sidebar-bg"></div>
    <div class="left-sidebar">
        <?php get_sidebar(); ?>
    </div>
    
    <div class="right-content front-page">
        
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php
            $title1 = rwmb_meta( 'front-title-1', 'type=textarea' ) ? rwmb_meta( 'front-title-1', 'type=textarea' ) : '';
            $title2 = rwmb_meta( 'front-title-2', 'type=text' ) ? rwmb_meta( 'front-title-2', 'type=text' ) : '';
            
            $contentTitle = rwmb_meta( 'front-content-title', 'type=text' ) ? rwmb_meta( 'front-content-title', 'type=text' ) : '';
            $contentText = rwmb_meta( 'front-main-wysiwyg', 'type=wysiwyg' ) ? rwmb_meta( 'front-main-wysiwyg', 'type=wysiwyg' ) : '';
       
            $stageTitle = rwmb_meta( 'front-stage-title', 'type=text' ) ? rwmb_meta( 'front-stage-title', 'type=text' ) : '';
            $stageText = rwmb_meta( 'front-stage-text', 'type=text' ) ? rwmb_meta( 'front-stage-text', 'type=text' ) : '';
            $stageUrl = rwmb_meta( 'front-stage-url', 'type=text' ) ? rwmb_meta( 'front-stage-url', 'type=text' ) : '#';
      
            $testimonialTitle = rwmb_meta( 'front-testimonial-text', 'type=text' ) ? rwmb_meta( 'front-testimonial-text', 'type=text' ) : '';
            $testimonialUrl = rwmb_meta( 'front-testimonial-url', 'type=text' ) ? rwmb_meta( 'front-testimonial-url', 'type=text' ) : '#';
            
            $blogTitle = rwmb_meta( 'front-blog-title', 'type=text' ) ? rwmb_meta( 'front-blog-title', 'type=text' ) : '#';
            
            $callText = rwmb_meta( 'front-call-text', 'type=text' ) ? rwmb_meta( 'front-call-text', 'type=text' ) : '#';
            $callBtnUrl = rwmb_meta( 'front-call-btn-url', 'type=text' ) ? rwmb_meta( 'front-call-btn-url', 'type=text' ) : '#';

            $testimonial = get_posts( array( 'numberposts' => 1, 'testimonial-cat' => 'front-page', 'post_type' =>'testimonial', ) );
            $testimonial = $testimonial['0'];
            
            $blogPosts = get_posts( array( 'numberposts' => 3, 'post_type' =>'blog' ) );
        ?>
        
        <h1 class="pageTitle"><?php echo $title1; ?></h1>
        <h2 class="pageSubTitle"><?php echo $title2; ?></h2>
        
        <div class="content-row">
            <div class="left">
                <div class="mainContent">
                    <h1><?php echo $contentTitle; ?></h1>
                    <div class="text">
                        <?php echo html_cut($contentText, 220); ?>
                    </div>
                </div>
                <div class="content-row">
                    <div class="businessStages">
                        <h1><?php echo $stageTitle; ?></h1>
                        <div class="text"><?php echo $stageText; ?></div>
                        <a href="<?php echo $stageUrl; ?>" class="arrow">more</a>
                    </div>
                    <div class="testimonials">
                        <h1><?php echo $testimonialTitle; ?></h1>
                        <div class="text">
                             <?php echo $testimonial->post_content; ?>
                        </div>
                        <div class="author"><?php echo $testimonial->post_title; ?></div>
                        <a href="<?php echo $testimonialUrl;?>" class="arrow">more</a>
                    </div>
                </div>
            </div>
            
            <div class="right">
                <div class="marketingWisdom">
                    <h1><?php echo $blogTitle; ?></h1>
                    <ul>
                        <?php foreach ($blogPosts as $post){ ?>
                        <li>
                            <a href="<?php echo get_permalink( $post->ID );?>">
                               <?php echo html_cut($post->post_title, 50); ?>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="signUp">
                    <?php echo do_shortcode('[contact-form-7 id="87" title="Front Page Sign up"]'); ?>
                </div>
            </div>
        </div>
        <div class="paddB15"></div>
        <!-- <div class="front-call-action">
            <?php echo $callText; ?> 
            <a href="<?php echo $callBtnUrl; ?>" class="learn-more">Learn More</a>
        </div> -->
        
        <?php endwhile; endif; ?>
        
    </div>
    
</div>

<?php get_footer('home'); ?>