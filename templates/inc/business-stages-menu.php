<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getBusinessStagesMenu() {
    
    
    // The Query
    $servicesArgs = array(
        'post_type' => 'business-stages',
        'order' => 'DASC',
    );
    $services_query = new WP_Query( $servicesArgs );
    
    $post_type = get_post_type_object( get_post_type($post) );
    $pageSlug = currentPageSlug();
    
    $content = '<ul class="services-menu stage-menu">';
    $content .= '<li class="first"><a class="show-front-menu"></a><span>'.$post_type->label.'</span></li>';
    
    if ( $services_query->have_posts() ) { 
        while ( $services_query->have_posts() ) { 
            $services_query->the_post(); 
            $slug = get_the_slug();             
            $activClass = ( $pageSlug == $slug ) ? 'active' : '';            
            $title = get_the_title();
              
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


