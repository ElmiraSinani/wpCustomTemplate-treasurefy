<?php get_header(); ?>

<div class="main-container">
    <div class="sidebar-bg"></div>
    <div class="left-sidebar">
        <div class="content">

            <div class="logo">
                <div class="mobile-close">X</div>
                <?php echo getLogo(); ?>
            </div>

            <div class="main_menu page-menu ">
                <?php echo getServicesMenu(); ?>
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
    <div class="right-content services-page page-content">
        <?php $mailchimpLsitID = ''; ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php    
            
            $title1 = rwmb_meta( 'service-title-1', 'type=text' ) ? rwmb_meta( 'service-title-1', 'type=text' ) : '';
            $title2 = rwmb_meta( 'service-title-2', 'type=text' ) ? rwmb_meta( 'service-title-2', 'type=text' ) : '';
            $title3 = rwmb_meta( 'service-title-3', 'type=text' ) ? rwmb_meta( 'service-title-3', 'type=text' ) : '';
            
            $color1 = rwmb_meta( 'service-title-color-1', 'type=color' ) ? rwmb_meta( 'service-title-color-1', 'type=color' ) : '';
            $color2 = rwmb_meta( 'service-title-color-2', 'type=color' ) ? rwmb_meta( 'service-title-color-2', 'type=color' ) : '';
            $color3 = rwmb_meta( 'service-title-color-3', 'type=color' ) ? rwmb_meta( 'service-title-color-3', 'type=color' ) : '';
            
            $contentTitle = rwmb_meta( 'service-content-title', 'type=text' ) ? rwmb_meta( 'service-content-title', 'type=text' ) : '';
            $contentText = rwmb_meta( 'service-wysiwyg', 'type=wysiwyg' ) ? rwmb_meta( 'service-wysiwyg', 'type=wysiwyg' ) : '';
            
            $howToTitle = rwmb_meta( 'how-to-title', 'type=text' ) ? rwmb_meta( 'how-to-title', 'type=text' ) : '';
            $howToText = rwmb_meta( 'how-to-wysiwyg', 'type=wysiwyg' ) ? rwmb_meta( 'how-to-wysiwyg', 'type=wysiwyg' ) : '';
            
            $testimonialAuthor = rwmb_meta( 'testimonial-author', 'type=text' ) ? rwmb_meta( 'testimonial-author', 'type=text' ) : '';
            $testimonialText = rwmb_meta( 'testimonial-wysiwyg', 'type=wysiwyg' ) ? rwmb_meta( 'testimonial-wysiwyg', 'type=wysiwyg' ) : '';
            
            $relatedServices = rwmb_meta( '_related_services', 'type=select' ) ? rwmb_meta( '_related_services', 'type=select' ) : '';
            $portfolioItems = rwmb_meta( '_related_portfolio', 'type=select' ) ? rwmb_meta( '_related_portfolio', 'type=select' ) : '';
            
            $mailchimpLsitID = rwmb_meta( 'maichimp-list-id', 'type=text' ) ? rwmb_meta( 'maichimp-list-id', 'type=text' ) : '';
           
            $fixedH = rwmb_meta( 'fixed-height-1', 'type=text' ) ? rwmb_meta( 'fixed-height-1', 'type=text' ) : '';
         
        ?>
        
        <div class="content-header">
            <div class="title1" >
                <div style="color: <?php echo $color1; ?>"><?php echo $title1; ?></div>
            </div>
            <div class="title2" >
                 <div style="background-color: <?php echo $color2; ?>"><?php echo $title2; ?></div>
            </div>
            <div class="title3">
                <div style="background-color: <?php echo $color3; ?>"><?php echo $title3; ?></div>
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
                <h1><?php echo $howToTitle; ?></h1>
                <div class="text">
                     <?php echo $howToText; ?>
                </div>
            </div>
            <div class="testimonial" style="height: <?php echo $fixedH; ?>">
                <div class="text">
                    <?php echo $testimonialText; ?>
                </div>
                <div class="author"><?php echo $testimonialAuthor; ?></div>
            </div>
        </div>
        
        <?php require_once 'templates/inc/our-process-block.php'; ?>
        
        <div class="related-services">
            <h1>Related Services</h1>
             <div class="inner-block">
                
                <?php 
                    if ($relatedServices != '' ){ 
                        foreach ($relatedServices as $serviceId) {    
                            $servicePost = get_post($serviceId);                        
                            $color = get_post_meta( $serviceId, 'service-menu-border-color', true);
                            $serviceHoverTxt = get_post_meta( $serviceId, 'service-wysiwyg', true);
                ?>
                <div class="related-items" style="color:<?php echo $color;?>; border-color: <?php echo $color;?>">
                    <div class="item">
                        <span class="title"><?php echo $servicePost->post_title; ?></span>                   
                    </div>
                    <a href="<?php echo get_permalink( $serviceId ); ?>">
                        <div class="hover-text" style="background: <?php echo $color;?>">                    
                            <?php echo html_cut($serviceHoverTxt, 180); ?>                    
                        </div>
                    </a>
                </div> 
                <?php } } ?>
            </div>
        </div>
        
        <!--//$portfolioItems-->        
        <div class="page-portfolio-block">
             <h1> Portfolio </h1>
            <div class="inner-block">
               
                <?php
                if( $portfolioItems != '' ){
                    foreach ( $portfolioItems as $portfolioId ){
                        $portfolioPost = get_post($portfolioId);                        
                        $title = $portfolioPost->post_title;
                        $text = get_post_meta( $portfolioId, 'service-wysiwyg', true);                                         
                        $content = html_cut($text, 167);
                        $image =  get_post_meta( $portfolioId, 'portfolio_images', true);
                ?>
                <div class="item" >
                    <div class="image">
                        <a href="<?php echo get_permalink( $portfolioId ); ?>">
                            <?php echo wp_get_attachment_image($image); ?>
                        </a>
                    </div>
                    <div class="item-content">
                        <div class="title"><a href="<?php echo get_permalink( $portfolioId ); ?>"><?php echo $title; ?></a></div>                
                    </div>
                </div>
            
                <?php  }
                    }
                ?>
            </div>
        </div>        
       
        <?php getConsultationForm($mailchimpLsitID); ?>
                
    </div>
    
</div>
<?php get_footer(); ?>