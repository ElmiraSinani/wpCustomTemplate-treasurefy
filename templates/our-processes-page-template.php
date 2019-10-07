<?php
/**
 * Template Name: Our Processes Page Template
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
                <div class="menu-header"><a class="show-front-menu"></a><span>About</span></div>
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
            
            $processTitle = rwmb_meta( 'process-content-title', 'type=text' ) ? rwmb_meta( 'process-content-title', 'type=text' ) : '';
            $processText = rwmb_meta( 'process-main-wysiwyg', 'type=wysiwyg' ) ? rwmb_meta( 'process-main-wysiwyg', 'type=wysiwyg' ) : '';
            
            $mailchimpLsitID = rwmb_meta( 'maichimp-list-id', 'type=text' ) ? rwmb_meta( 'maichimp-list-id', 'type=text' ) : ''; 

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
        
        
        <div class="our-process">
            <h1><?php echo $processTitle; ?></h1>
            <?php echo $processText; ?>
        </div>
        
        <?php endwhile; endif; ?>
        
        
        <?php getConsultationForm($mailchimpLsitID); ?>
        
        
    </div>
    
</div>

<?php get_footer(); ?>