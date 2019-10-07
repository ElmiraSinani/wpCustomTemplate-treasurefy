<?php get_header(); ?>

<div class="main-container">
    <div class="sidebar-bg"></div>
    <div class="left-sidebar">
        <?php get_sidebar(); ?>
    </div>
    <div class="right-content single-portfolio-page page-content">
    <?php
         $mailchimpLsitID = get_option('maichimpPortfolioList') ? get_option('maichimpPortfolioList') : '';
         $imgList= '';
         $imgPager = '';
         $mainTitle = '';
         $mainContent = '';
         $terms = '';
    ?>   
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>        
        
        <?php 
            $terms = get_the_terms(get_the_ID(), 'portfolio-cat' );
            $mainTitle = get_the_title();
            $mainContent = get_the_content();
            $i = 0;
            $images = rwmb_meta( 'portfolio_images', 'type=image_advanced' ) ? rwmb_meta( 'portfolio_images', 'type=image_advanced' ) : '';        
            foreach ($images as $img){
                $imgList .= '<li><img src="'.$img['full_url'].'" /></li>';
                $imgPager .= '<a data-slide-index="'.$i.'" href=""><img src="'.$img['url'].'" /></a>';
                $i++;
            }
            
        ?>
        
    <?php endwhile; endif; ?>
        
    <?php 
                
        $challengesTitle = rwmb_meta( 'challenges-title', 'type=text' ) ? rwmb_meta( 'challenges-title', 'type=text' ) : '';
        $challengesText = rwmb_meta( 'challenges-wysiwyg', 'type=wysiwyg' ) ? rwmb_meta( 'challenges-wysiwyg', 'type=wysiwyg' ) : '';
        
        $solutionTitle = rwmb_meta( 'solution-title', 'type=text' ) ? rwmb_meta( 'solution-title', 'type=text' ) : '';
        $solutionText = rwmb_meta( 'solution-wysiwyg', 'type=wysiwyg' ) ? rwmb_meta( 'solution-wysiwyg', 'type=wysiwyg' ) : '';
       
        $resultsTitle = rwmb_meta( 'results-title', 'type=text' ) ? rwmb_meta( 'results-title', 'type=text' ) : '';
        $resultsText = rwmb_meta( 'results-wysiwyg', 'type=wysiwyg' ) ? rwmb_meta( 'results-wysiwyg', 'type=wysiwyg' ) : '';
       
        $testimonialTitle = rwmb_meta( 'testimonial-author', 'type=text' ) ? rwmb_meta( 'testimonial-author', 'type=text' ) : '';
        $testimonialText = rwmb_meta( 'testimonial-wysiwyg', 'type=wysiwyg' ) ? rwmb_meta( 'testimonial-wysiwyg', 'type=wysiwyg' ) : '';
       
        $relatedServices = rwmb_meta( '_related_services', 'type=select' ) ? rwmb_meta( '_related_services', 'type=select' ) : '';
    ?>
        
        <div class="portfolio-gallery">   
            <div class="left">
                <ul class="bxslider"><?php echo $imgList; ?></ul>
            </div>
            <div class="right">
                <div id="bx-pager"><?php echo $imgPager; ?></div> 
            </div>                      
        </div>
        <div class="page-main-content">
            <h1><?php echo $mainTitle; ?></h1>
            <p><?php echo $mainContent; ?></p>
        </div>
        <div class="services-block2">
            <div class="competitors">                
                <h1><?php echo $challengesTitle; ?></h1>
                <div class="text">
                    <?php echo html_cut($challengesText, 300); ?>
                </div>
            </div>
            <div class="testimonial">
                <div class="text">
                    <?php echo $testimonialText;?>
                </div>
                <div class="author"><?php echo $testimonialTitle;  ?></div>
            </div>
        </div>
        
        <div class="portfolio-block3">
            <div class="solutions">
                <h1><?php echo $solutionTitle; ?></h1>
                <div class="text">
                    <?php echo html_cut($solutionText, 460); ?>
                </div>
            </div>
            <div class="results">
                <h1><?php echo $resultsTitle; ?></h1>
                <div class="text">
                    <?php echo $resultsText; ?>
                </div>
            </div>
        </div>
        
        <div class="related-services">
            <h1>Services Provided</h1>
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
       
        <?php getConsultationForm($mailchimpLsitID); ?>        
        
    </div>
    
</div>
<?php get_footer(); ?>