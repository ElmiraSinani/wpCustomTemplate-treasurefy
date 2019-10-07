<div class="page-portfolio-block">
    <h1> Portfolio </h1>
        <?php
        $args = array(
            'post_type' => 'portfolio',
            //'order' => 'DASC',
            'post__not_in' => array('65'),
            'posts_per_page' => 4
        );
        $portfolio = new WP_Query($args);
            
        if ( $portfolio->have_posts() ) { 
            while ( $portfolio->have_posts() ) { 
                $portfolio->the_post();                
                
                $title = get_the_title();                
                $text = rwmb_meta( 'service-wysiwyg', 'type=color' ) ? rwmb_meta( 'service-wysiwyg', 'type=color' ) : '';
                $content = html_cut($text, 167);
                
                $images = rwmb_meta( 'portfolio_images', 'type=image_advanced' ) ? rwmb_meta( 'portfolio_images', 'type=image_advanced' ) : '';        
                foreach ($images as $firstImage) {
                    
                    $imgUrl = $firstImage['full_url'];
                    break;
                }
                
        ?>
        
        <div class="item" >
            <div class="image">
                <img src="<?php echo $imgUrl; ?>" />
            </div>
            <div class="item-content">
                <div class="title"><a href="<?php the_permalink(); ?>"><?php echo $title; ?></a></div>                
            </div>
        </div>
        

        <?php  
        
        } //and while 
                } else {
                            // no posts found
                } //end if
                // Restore original Post Data 
                wp_reset_postdata();
        ?>
</div>