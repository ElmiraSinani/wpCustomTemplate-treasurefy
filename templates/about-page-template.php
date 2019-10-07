<?php
/**
 * Template Name: About Page Template
 */
get_header();
?>

<div class="main-container">
    
    <div class="sidebar-bg"></div>
    <div class="left-sidebar">
        <div class="content">

            <div class="logo">
                <div class="mobile-close">X</div>
                <?php echo getLogo(); ?>
            </div>

            <div class="about-menu page-menu">
                <div class="menu-header"><a class='show-front-menu' ></a><span>About</span></div>
                <?php 
                    wp_nav_menu( array(
                        'container_class' => 'main_menu', 
                        'theme_location' => 'about-menu' 
                    ) );
                ?>
            </div>
            
            <div class="front-menu hide-menu">
                <?php 
                    wp_nav_menu( array(
                        'container_class' => 'main_menu', 
                        'theme_location' => 'main-menu' 
                    ) );
                ?>
            </div>

            <?php echo getSocialMenu(); ?>
        </div>
    </div>
    <div class="right-content  about-page page-content">
        <?php $mailchimpLsitID = ''; ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php    
            $title1 = rwmb_meta( 'service-title-1', 'type=text' ) ? rwmb_meta( 'service-title-1', 'type=text' ) : '';
            $title2 = rwmb_meta( 'service-title-2', 'type=text' ) ? rwmb_meta( 'service-title-2', 'type=text' ) : '';
            $title3 = rwmb_meta( 'service-title-3', 'type=text' ) ? rwmb_meta( 'service-title-3', 'type=text' ) : '';
            
            $contentTitle = rwmb_meta( 'about-content-title', 'type=text' ) ? rwmb_meta( 'about-content-title', 'type=text' ) : '';
            $contentText = rwmb_meta( 'about-main-wysiwyg', 'type=wysiwyg' ) ? rwmb_meta( 'about-main-wysiwyg', 'type=wysiwyg' ) : '';
           
            $aboutUsTitle = rwmb_meta( 'about-us-title', 'type=text' ) ? rwmb_meta( 'about-us-title', 'type=text' ) : '';
            $aboutUsText = rwmb_meta( 'about-us-wysiwyg', 'type=wysiwyg' ) ? rwmb_meta( 'about-us-wysiwyg', 'type=wysiwyg' ) : '';
           
            $visionTitle = rwmb_meta( 'our-vision-title', 'type=text' ) ? rwmb_meta( 'our-vision-title', 'type=text' ) : '';
            $visionText = rwmb_meta( 'our-vision-wysiwyg', 'type=wysiwyg' ) ? rwmb_meta( 'our-vision-wysiwyg', 'type=wysiwyg' ) : '';
            
            $missionTitle = rwmb_meta( 'our-mission-title', 'type=text' ) ? rwmb_meta( 'our-mission-title', 'type=text' ) : '';
            $missionText = rwmb_meta( 'our-mission-wysiwyg', 'type=wysiwyg' ) ? rwmb_meta( 'our-mission-wysiwyg', 'type=wysiwyg' ) : '';
            
            $dreamsTitle = rwmb_meta( 'our-dreams-title', 'type=text' ) ? rwmb_meta( 'our-dreams-title', 'type=text' ) : '';
            $dreamsText = rwmb_meta( 'our-dreams-wysiwyg', 'type=wysiwyg' ) ? rwmb_meta( 'our-dreams-wysiwyg', 'type=wysiwyg' ) : '';
           
            $testimonialAuthor = rwmb_meta( 'testimonial-author', 'type=text' ) ? rwmb_meta( 'testimonial-author', 'type=text' ) : '';
            $testimonialContent = rwmb_meta( 'testimonial-wysiwyg', 'type=wysiwyg' ) ? rwmb_meta( 'testimonial-wysiwyg', 'type=wysiwyg' ) : '';
            
            $mailchimpLsitID = rwmb_meta( 'maichimp-list-id', 'type=text' ) ? rwmb_meta( 'maichimp-list-id', 'type=text' ) : ''; 
            
            $fixedH = rwmb_meta( 'fixed-height-1', 'type=text' ) ? rwmb_meta( 'fixed-height-1', 'type=text' ) : '';
        ?>
        
        <div class="content-header about-header">
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
        
        <div class="page-main-content auto-height">
            <h1><?php echo $contentTitle; ?></h1>
            <p><?php echo $contentText; ?></p>
        </div>
        
        <?php endwhile; endif; ?>
        
        <div class="services-block2">
            <div class="competitors" style="height: <?php echo $fixedH; ?>">
                <h1><?php echo $aboutUsTitle; ?></h1>
                <div class="text">
                    <?php echo $aboutUsText; ?>
                </div>
            </div>
            <div class="testimonial" style="height: <?php echo $fixedH; ?>">
                <div class="text">
                    <?php echo $testimonialContent; ?>
                </div>
                <div class="author"><?php echo $testimonialAuthor; ?></div>
            </div>
        </div>
        
        <div class="about-posts">
            <div class="item">
                <h1><?php echo $visionTitle; ?></h1>
                <div class="text">
                    <?php echo $visionText; ?>
                </div>
            </div>
            <div class="item">
                <h1><?php echo $missionTitle; ?></h1>
                <div class="text">
                    <?php echo $missionText; ?>
                </div>
            </div>
            <div class="item">
                <h1><?php echo $dreamsTitle; ?></h1>
                <div class="text">
                    <?php echo $dreamsText; ?>
                </div>
            </div>
        </div>
     
        <?php getConsultationForm($mailchimpLsitID); ?>
    </div>
    
</div>

<?php get_footer(); ?>