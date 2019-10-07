<?php get_header(); ?>

<div class="main-container">
    <div class="sidebar-bg"></div>
    <div class="left-sidebar">
        <?php get_sidebar(); ?>
    </div>
    
    <div class="right-content portfolio-page page-content">
        
        <?php 
        
        $mailchimpLsitID = get_option('maichimpPortfolioList') ? get_option('maichimpPortfolioList') : '';
        
        
        $args = array(
            'p' => 65, // id of a page, post, or custom type
            'post_type' => 'portfolio'
            );
        $mainPortfolio = new WP_Query($args);
            
        if ( $mainPortfolio->have_posts() ) { 
            while ( $mainPortfolio->have_posts() ) { 
                $mainPortfolio->the_post(); 
                
                $title1 = rwmb_meta( 'service-title-1', 'type=text' ) ? rwmb_meta( 'service-title-1', 'type=text' ) : '';
                $title2 = rwmb_meta( 'service-title-2', 'type=text' ) ? rwmb_meta( 'service-title-2', 'type=text' ) : '';
                $title3 = rwmb_meta( 'service-title-3', 'type=text' ) ? rwmb_meta( 'service-title-3', 'type=text' ) : '';

                $color1 = rwmb_meta( 'service-title-color-1', 'type=color' ) ? rwmb_meta( 'service-title-color-1', 'type=color' ) : '';
                $color2 = rwmb_meta( 'service-title-color-2', 'type=color' ) ? rwmb_meta( 'service-title-color-2', 'type=color' ) : '';
                $color3 = rwmb_meta( 'service-title-color-3', 'type=color' ) ? rwmb_meta( 'service-title-color-3', 'type=color' ) : '';        
                
                
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
        
        
        <?php  
        
        } //and while 
                } else {
                            // no posts found
                } //end if
                // Restore original Post Data 
                wp_reset_postdata();
        ?>
        
        
        <?php
        $args = array(
            'post_type' => 'portfolio',
            //'order' => 'DASC',
            'post__not_in' => array('65')
        );
        $portfolio = new WP_Query($args);
        $cnt = '';
        $filter = '<a class="all selected" data-filter="*">All</a>';
        
        $filterTerms = get_terms( 'portfolio-cat', array('hide_empty' => false,) );
        
        foreach ( $filterTerms as $term){
           $filter .= '<a class="'.$term->slug.'" data-filter="'.$term->slug.'">'.$term->name.'</a>';
        }
        
        
        
        $cnt .='<div class="portfolio-block"><div class="masonry">';
        
        if ( $portfolio->have_posts() ) { 
            while ( $portfolio->have_posts() ) { 
                $portfolio->the_post();
                
                $terms = get_the_terms(get_the_ID(), 'portfolio-cat' );
                //var_dump($terms);
                
                $title = get_the_title();                
                $text = rwmb_meta( 'service-wysiwyg', 'type=color' ) ? rwmb_meta( 'service-wysiwyg', 'type=color' ) : '';
                $content = html_cut($text, 167);
                
                $images = rwmb_meta( 'portfolio_images', 'type=image_advanced' ) ? rwmb_meta( 'portfolio_images', 'type=image_advanced' ) : '';        
               
                foreach ($images as $firstImage) {                    
                    $imgUrl = $firstImage['full_url'];
                    break;
                }
        $cat = '';  
        $class = '';
        foreach ($terms as $term){
            $cat .= '<span class="'.$term->slug.'">'.$term->name.'</span> '; 
            $class .= ' '.$term->slug;
        }
        
        $cnt .= '<div class="portfolio-item'.$class.'" >';
        $cnt .= '<div class="image"><a href="'.get_the_permalink().'">
                    <img src="'.$imgUrl.'" /> </a>';
        $cnt .= '<a href="'.get_the_permalink().'" ><div class="abs-hover">'. html_cut( get_the_content(), 230) .'...
                    <div class="more"><span >Read More</span></div>
                    </div></a>';
        $cnt .= '</div>';
        $cnt .= '<div class="item-content">
                    <div class="title"><a href="'.get_the_permalink().'">'.$title.'</a></div>
                    <div class="terms">';
                    
        $cnt .= $cat;            
                        
        $cnt .= '</div>';
        $cnt .= '</div>
            </div>';
        

        
        
        } //and while 
                } else {  } //end if
                // Restore original Post Data 
                wp_reset_postdata();
       
            $cnt .= '</div></div>';
            
            
            echo '<div class="portfolio-filter">'.$filter.'</div>';
            echo $cnt;
       
       ?>
            
        <?php getConsultationForm($mailchimpLsitID); ?>
        
    </div>
    
</div>

<?php get_footer(); ?>