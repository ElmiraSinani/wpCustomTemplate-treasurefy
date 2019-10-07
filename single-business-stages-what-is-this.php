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
            
            $mailchimpLsitID = rwmb_meta( 'maichimp-list-id', 'type=text' ) ? rwmb_meta( 'maichimp-list-id', 'type=text' ) : '';
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
        
        <div class="stage-main-content auto-height">
            <h1><?php echo $contentTitle; ?></h1>
            <p><?php echo $contentText; ?></p>
        </div>
        
        <?php endwhile; endif; ?>
        
        <div class="stage-item-block">
        <?php 
            // The Query
            $stagesArgs = array(
                'post_type' => 'business-stages',
                'order' => 'DASC',
                'post__not_in' => array('49')
            );
            $stages_query = new WP_Query( $stagesArgs );
            
            
            if ( $stages_query->have_posts() ) { 
                while ( $stages_query->have_posts() ) { 
                    $stages_query->the_post(); 
                    
                    $slug = get_the_slug();                      
                    $title = get_the_title();
                    $icon = rwmb_meta( 'services_icon_upload', 'type=color' ) ? rwmb_meta( 'services_icon_upload', 'type=color' ) : '';
                    $text = rwmb_meta( 'service-wysiwyg', 'type=color' ) ? rwmb_meta( 'service-wysiwyg', 'type=color' ) : '';
                    $content = html_cut($text, 167);
                    $contentHover = rwmb_meta( 'stage-hover-wysiwyg', 'type=color' ) ? rwmb_meta( 'stage-hover-wysiwyg', 'type=color' ) : '';
                    foreach ( $icon as $val ){
                        $iconUrl = $val['url'];
                    }
            ?>    
            <?php //var_dump( $iconUrl ); die();?>
            
            <div class="stage-item" >
                <a href="<?php the_permalink(); ?>">
                <div class="title"><span><?php echo $title; ?></span></div>
                <div class="content" style="background-image: url('<?php echo $iconUrl; ?>')">                    
                    <div class="hover-text">                        
                        <?php if( $text != ''){ ?>
                        <?php echo $contentHover; ?>
                        <?php } ?>
                    </div>                
                </div>
                </a>
            </div>
                    
            <?php    } //and while 
            } else {
                        // no posts found
            } //end if
            // Restore original Post Data 
            wp_reset_postdata(); 
        ?>
        </div>
        
        <?php getConsultationForm($mailchimpLsitID); ?>
        
    </div>
    
</div>
<?php get_footer(); ?>