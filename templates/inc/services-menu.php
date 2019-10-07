<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getServicesMenu() {
    
    
    // The Query
    $servicesArgs = array(
        'post_type' => 'services',
        'order' => 'DASC',
        'posts_per_page' => -1
    );
    $services_query = new WP_Query( $servicesArgs );
    
    $post_type = get_post_type_object( get_post_type($post) );
    $pageSlug = currentPageSlug();
    
    $content = '<ul class="services-menu">';
    $content .= '<li class="first"><a class="show-front-menu"></a><span>'.$post_type->label.'</span></li>';
    
    if ( $services_query->have_posts() ) { 
        while ( $services_query->have_posts() ) { 
            $services_query->the_post(); 
            $slug = get_the_slug();
             
            $activClass = ( $pageSlug == $slug ) ? 'active' : '';
            
            $title = get_the_title();
            $menuContentColor = rwmb_meta( 'service-menu-content-color', 'type=color' ) ? rwmb_meta( 'service-menu-content-color', 'type=color' ) : '';
            $menuBorderColor = rwmb_meta( 'service-menu-border-color', 'type=color' ) ? rwmb_meta( 'service-menu-border-color', 'type=color' ) : '';
            
            ?>
            <style type="text/css">
                .main_menu ul.services-menu li.<?php echo $slug; ?>:hover,
                .main_menu ul.services-menu li.<?php echo $slug; ?>.active{
                    border-left: 9px solid <?php echo $menuBorderColor; ?>;
                    background-color: <?php echo $menuContentColor; ?>;
                }
            </style>
            <?php
            
            $content .= '<li class="'.$slug." ".$activClass.'" ><a href="'.get_permalink().'" >'.$title.'</a></li>';

        } //and while 
    } else {
                // no posts found
    } //end if
    // Restore original Post Data 
    wp_reset_postdata(); 
    
    $content .= '</ul>';
    
    return $content;
}


