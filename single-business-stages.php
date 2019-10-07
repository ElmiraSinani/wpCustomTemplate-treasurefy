<?php get_header(); ?>

<div class="main-container">
    <div class="sidebar-bg"></div>
    <div class="left-sidebar">
        <div class="content">

            <div class="logo">
                <div class="mobile-close">X</div>
                <?php echo getLogo(); ?>
            </div>

            <div class="main_menu page-menu">
                <?php echo getBusinessStagesMenu(); ?>
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
    <div class="right-content stages-page page-content">
        <?php $terms = ''; ?>
        <?php $mailchimpLsitID = ''; ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php 
            $terms = get_the_terms(get_the_ID(), 'stage-cats' );
            $mailchimpLsitID = rwmb_meta( 'maichimp-list-id', 'type=text' ) ? rwmb_meta( 'maichimp-list-id', 'type=text' ) : '';
            
            $title1 = rwmb_meta( 'service-title-1', 'type=text' ) ? rwmb_meta( 'service-title-1', 'type=text' ) : '';
            $title2 = rwmb_meta( 'service-title-2', 'type=text' ) ? rwmb_meta( 'service-title-2', 'type=text' ) : '';
            $title3 = rwmb_meta( 'service-title-3', 'type=text' ) ? rwmb_meta( 'service-title-3', 'type=text' ) : '';
            
            $contentTitle = rwmb_meta( 'service-content-title', 'type=text' ) ? rwmb_meta( 'service-content-title', 'type=text' ) : '';
            $titles = explode("|", $contentTitle);
            $contentTitle1 = $titles['0'];
            $contentTitle2 = $titles['1'];
            
            $contentText = rwmb_meta( 'service-wysiwyg', 'type=wysiwyg' ) ? rwmb_meta( 'service-wysiwyg', 'type=wysiwyg' ) : '';
            
            $testimonialAuthor = rwmb_meta( 'testimonial-author', 'type=text' ) ? rwmb_meta( 'testimonial-author', 'type=text' ) : '';
            $testimonialText = rwmb_meta( 'testimonial-wysiwyg', 'type=wysiwyg' ) ? rwmb_meta( 'testimonial-wysiwyg', 'type=wysiwyg' ) : '';
            
            $relatedServices = rwmb_meta( '_related_services', 'type=select' ) ? rwmb_meta( '_related_services', 'type=select' ) : '';
            $portfolioItems = rwmb_meta( '_related_portfolio', 'type=select' ) ? rwmb_meta( '_related_portfolio', 'type=select' ) : '';
           
            $fixedH = rwmb_meta( 'fixed-height-1', 'type=text' ) ? rwmb_meta( 'fixed-height-1', 'type=text' ) : '';
            var_dump($fixedH);
        ?>
        
        <div class="content-header">
            <div class="title1" >
                <div><?php echo $title1; ?></div>
            </div>
            <div class="title2" >
                 <div><?php echo $title2; ?></div>
            </div>
            <div class="title3">
                <div><?php echo $title3; ?></div>
            </div>            
        </div>
        
        <div class="line"></div>
        
        <div class="stage-main-div">
            
            <?php if( $contentTitle != '' || $contentText != '' ) { ?>
            <div class="page-main-content stage" style="height: <?php echo $fixedH; ?>">
                <h1><?php echo $contentTitle1; ?></h1>
                <h2><?php echo $contentTitle2; ?></h2>
                <p><?php echo $contentText; ?></p>
            </div> <!-- /.page-main-content.stage -->       
            <?php } ?>
        
        <?php endwhile; endif; ?>
            
            <div class="stage-testimonial" style="height: <?php echo $fixedH; ?>">
                <div class="text">
                    <?php echo $testimonialText; ?>
                </div>
                <div class="author">
                    <?php echo $testimonialAuthor; ?>
                </div>
            </div> <!-- /.stage-testimonial -->
            
        </div><!-- /.stage-main-div -->
        
               
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