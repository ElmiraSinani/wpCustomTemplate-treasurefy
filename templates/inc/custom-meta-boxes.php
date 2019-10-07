<?php

add_filter( 'rwmb_meta_boxes', 'ccode_meta_boxes' );
function ccode_meta_boxes( $meta_boxes ) {
    
    $meta_boxes[] = array(       
        'title'      => 'Service Content Titles',
        'post_types' => array( 'services' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
               'name'  => __( 'Content Title 1', 'trf' ),
                'id'   => 'service-title-1',
                'type'  => 'text',               
            ),
            array(
                'name'  => __( 'Content Title Color 1', 'trf' ),
                'id'   => 'service-title-color-1',
                'type'  => 'color',               
            ),
            array(
                'name'  => __( 'Content Title 2', 'trf' ),
                'id'   => 'service-title-2',
                'type'  => 'text',               
            ),
            array(
                'name'  => __( 'Content Title Color 2', 'trf' ),
                'id'   => 'service-title-color-2',
                'type'  => 'color',               
            ),            
            array(
                'name'  => __( 'Content Title 3', 'trf' ),
                'id'   => 'service-title-3',
                'type'  => 'text',               
            ),
            array(
                'name'  => __( 'Content Title Color 3', 'trf' ),
                'id'   => 'service-title-color-3',
                'type'  => 'color',               
            ),             
        )
    );  
    
    $meta_boxes[] = array(       
        'title'      => 'Service Content',
        'post_types' => array( 'services' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
               'name'  => __( 'Title', 'trf' ),
                'id'   => 'service-content-title',
                'type'  => 'text',               
            ),
            array(
               'name'    => __( 'Content', 'trf' ),
                'id'      => "service-wysiwyg",
                'type'    => 'wysiwyg',
                // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                'raw'     => false,
                // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                'options' => array(
                        'textarea_rows' => 4,
                        'teeny'         => true,
                        'media_buttons' => false,
                ),          
            ),
                      
        )
    );
    $meta_boxes[] = array(       
        'title'      => 'Business Stages Content',
        'post_types' => array( 'business-stages' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
               'name'  => __( 'Title', 'trf' ),
                'id'   => 'service-content-title',
                'type'  => 'text',               
            ),
            array(
               'name'    => __( 'Content', 'trf' ),
                'id'      => "service-wysiwyg",
                'type'    => 'wysiwyg',
                // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                'raw'     => false,
                // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                'options' => array(
                        'textarea_rows' => 4,
                        'teeny'         => true,
                        'media_buttons' => false,
                ),          
            ),
            array(
               'name'    => __( 'Main Page Hover Text', 'trf' ),
                'id'      => "stage-hover-wysiwyg",
                'type'    => 'wysiwyg',
                // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                'raw'     => false,
                // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                'options' => array(
                        'textarea_rows' => 4,
                        'teeny'         => true,
                        'media_buttons' => false,
                ),          
            ),
                      
        )
    );
    
    $meta_boxes[] = array(       
        'title'      => 'Style Settings',
        'post_types' => array( 'services' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
                'name'  => __( 'Fixed Height', 'trf' ),
                'id'   => 'fixed-height-1',
                'type'  => 'text',  
                'std'   => '200px',
                'desc' => 'Fixed height for White & Blue boxes(ex. 300px)'
            ),            
                      
        )
    );
    $meta_boxes[] = array(       
        'title'      => 'Style Settings',
        'post_types' => array( 'business-stages' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
                'name'  => __( 'Fixed Height', 'trf' ),
                'id'   => 'fixed-height-1',
                'type'  => 'text',  
                'std'   => '365px',
                'desc' => 'Fixed height for Yellow & Blue boxes(ex. 300px)'
            ),            
                      
        )
    );
    
    
    $meta_boxes[] = array(       
        'title'      => 'How to Block (White Second block)',
        'post_types' => array( 'services' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
               'name'  => __( 'Title', 'trf' ),
                'id'   => 'how-to-title',
                'type'  => 'text',               
            ),
            array(
               'name'    => __( 'Content', 'trf' ),
                'id'      => "how-to-wysiwyg",
                'type'    => 'wysiwyg',
                // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                'raw'     => false,
                // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                'options' => array(
                        'textarea_rows' => 4,
                        'teeny'         => true,
                        'media_buttons' => false,
                ),          
            ),
                      
        )
    );
    
    $meta_boxes[] = array(       
        'title'      => 'Testimonial Block ',
        'post_types' => array( 'services', 'business-stages', 'portfolio' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
               'name'  => __( 'Author', 'trf' ),
                'id'   => 'testimonial-author',
                'type'  => 'text',               
            ),
            array(
               'name'    => __( 'Testimonial Content', 'trf' ),
                'id'      => "testimonial-wysiwyg",
                'type'    => 'wysiwyg',
                // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                'raw'     => false,
                // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                'options' => array(
                        'textarea_rows' => 4,
                        'teeny'         => true,
                        'media_buttons' => false,
                ),          
            ),
                      
        )
    );   
    
    $meta_boxes[] = array(       
        'title'      => 'Portfolio Items',
        'post_types' => array( 'services', 'business-stages' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
                'name'        => __( 'Portfolio Items', 'trf' ),
                'id'          => '_related_portfolio',
                'type'        => 'post',
                // 'clone'       => true,
                 'multiple'    => true,
                // Post type: string (for single post type) or array (for multiple post types)
                'post_type'   => array( 'portfolio' ),
                // Default selected value (post ID)
                'std'         => 1,
                // Field type, either 'select' or 'select_advanced' (default)
                'field_type'  => 'select_advanced ',
                // Placeholder
                'placeholder' => __( 'Select an Item', 'trf' ),
                // Query arguments (optional). No settings means get all published posts
                // @see https://codex.wordpress.org/Class_Reference/WP_Query
                'query_args'  => array(
                    'post_status'    => 'publish',
                    'posts_per_page' => - 1,
                    'post__not_in' => array(65)
                )
            ),
        )
    );
    $meta_boxes[] = array(       
        'title'      => 'Related Services',
        'post_types' => array( 'services', 'business-stages', 'portfolio' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
                'name'        => __( 'All Services', 'trf' ),
                'id'          => '_related_services',
                'type'        => 'post',
                // 'clone'       => true,
                 'multiple'    => true,
                // Post type: string (for single post type) or array (for multiple post types)
                'post_type'   => array( 'services' ),
                // Default selected value (post ID)
                'std'         => 1,
                // Field type, either 'select' or 'select_advanced' (default)
                'field_type'  => 'select_advanced ',
                // Placeholder
                'placeholder' => __( 'Select an Item', 'trf' ),
                // Query arguments (optional). No settings means get all published posts
                // @see https://codex.wordpress.org/Class_Reference/WP_Query
                'query_args'  => array(
                    'post_status'    => 'publish',
                    'posts_per_page' => - 1,
                    'post__not_in' => array(65)
                )
            ),
        )
    );
    
    
    $meta_boxes[] = array(       
        'title'      => 'Challenges Block ',
        'post_types' => array( 'portfolio' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
               'name'  => __( 'Title', 'trf' ),
                'id'   => 'challenges-title',
                'type'  => 'text',               
            ),
            array(
               'name'    => __( 'Content', 'trf' ),
                'id'      => "challenges-wysiwyg",
                'type'    => 'wysiwyg',
                // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                'raw'     => false,
                // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                'options' => array(
                        'textarea_rows' => 4,
                        'teeny'         => true,
                        'media_buttons' => false,
                ),          
            ),
                      
        )
    ); 
    $meta_boxes[] = array(       
        'title'      => 'Solution Block ',
        'post_types' => array( 'portfolio' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
               'name'  => __( 'Title', 'trf' ),
                'id'   => 'solution-title',
                'type'  => 'text',               
            ),
            array(
               'name'    => __( 'Content', 'trf' ),
                'id'      => "solution-wysiwyg",
                'type'    => 'wysiwyg',
                // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                'raw'     => false,
                // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                'options' => array(
                        'textarea_rows' => 4,
                        'teeny'         => true,
                        'media_buttons' => false,
                ),          
            ),
                      
        )
    ); 
    $meta_boxes[] = array(       
        'title'      => 'Results Block ',
        'post_types' => array( 'portfolio' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
               'name'  => __( 'Title', 'trf' ),
                'id'   => 'results-title',
                'type'  => 'text',               
            ),
            array(
               'name'    => __( 'Content', 'trf' ),
                'id'      => "results-wysiwyg",
                'type'    => 'wysiwyg',
                // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                'raw'     => false,
                // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                'options' => array(
                        'textarea_rows' => 4,
                        'teeny'         => true,
                        'media_buttons' => false,
                ),          
            ),
                      
        )
    ); 
    
    $meta_boxes[] = array(       
        'title'      => 'Menu Colors',
        'post_types' => array( 'services'),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(           
            array(
                'name'  => __( 'Menu Content Color', 'trf' ),
                'id'   => 'service-menu-content-color',
                'type'  => 'color',               
            ),
            array(
                'name'  => __( 'Menu Border Color', 'trf' ),
                'id'   => 'service-menu-border-color',
                'type'  => 'color',               
            ),                       
        )
    );
    
    $meta_boxes[] = array(       
        'title'      => 'Business Stages Content Titles',
        'post_types' => array(  'business-stages' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
               'name'  => __( 'Content Title 1', 'trf' ),
                'id'   => 'service-title-1',
                'type'  => 'text',               
            ),
            array(
                'name'  => __( 'Content Title 2', 'trf' ),
                'id'   => 'service-title-2',
                'type'  => 'text',               
            ),            
            array(
                'name'  => __( 'Content Title 3', 'trf' ),
                'id'   => 'service-title-3',
                'type'  => 'text',               
            ),             
        )
    );
    
    $meta_boxes[] = array(       
        'title'      => 'Post Background Icon',
        'post_types' => array( 'business-stages' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(           
            array(
                'id'               => 'services_icon_upload',
                'name'             => __( 'Post Icon ', 'trf' ),
                'type'             => 'image_advanced',
                'force_delete'     => false,
                // Maximum image uploads
                'max_file_uploads' => 1,
            ),                                
        )
    );
    
    $meta_boxes[] = array(       
        'title'      => 'You Might Also be Interested In',
        'post_types' => array( 'blog', ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
                'name'        => __( 'Related Blog Posts', 'trf' ),
                'id'          => '_related_blog_posts',
                'type'        => 'post',
                // 'clone'       => true,
                 'multiple'    => true,
                // Post type: string (for single post type) or array (for multiple post types)
                'post_type'   => array( 'blog' ),
                // Default selected value (post ID)
                'std'         => 1,
                // Field type, either 'select' or 'select_advanced' (default)
                'field_type'  => 'select_advanced ',
                // Placeholder
                'placeholder' => __( 'Select an Item', 'trf' ),
                // Query arguments (optional). No settings means get all published posts
                // @see https://codex.wordpress.org/Class_Reference/WP_Query
                'query_args'  => array(
                    'post_status'    => 'publish',
                    'posts_per_page' => - 1,
                )
            ),
        )
    );
    
    // checks for post/page ID to show box for ony pages
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];  
    
    //#2 home page
    if ( $post_id == 2 ){
        remove_post_type_support('page', 'editor');
        $meta_boxes[] = array(       
                'title'      => 'Front Page Settings',
                'post_types' => array( 'page' ),
                'context'    => 'normal',
                'priority'   => 'high',
                'fields' => array(
                    array(
                       'name'  => __( 'Title 1', 'trf' ),
                        'id'   => 'front-title-1',
                        'type'  => 'textarea',               
                    ),
                    array(
                       'name'  => __( 'Title 2', 'trf' ),
                        'id'   => 'front-title-2',
                        'type'  => 'text',               
                    ),
                    array(
                        'name'  => __( 'Main Content Title', 'trf' ),
                        'id'   => 'front-content-title',
                        'type'  => 'text',               
                    ),
                    array(
                       'name'    => __( 'Main Content', 'trf' ),
                        'id'      => "front-main-wysiwyg",
                        'type'    => 'wysiwyg',
                        // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                        'raw'     => false,
                        // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                        'options' => array(
                                'textarea_rows' => 1,
                                'teeny'         => true,
                                'media_buttons' => false,
                        ),          
                     ),
                    array(
                        'name'  => __( 'Business Stages Box Title', 'trf' ),
                        'id'   => 'front-stage-title',
                        'type'  => 'text',               
                    ),           
                    array(
                        'name'  => __( 'Business Stages Box Text', 'trf' ),
                        'id'   => 'front-stage-text',
                        'type'  => 'text',               
                    ),           
                    array(
                        'name'  => __( 'Business Stages Arrow URL', 'trf' ),
                        'id'   => 'front-stage-url',
                        'type'  => 'text',               
                    ),           
                    array(
                        'name'  => __( 'Testimonials Box Title', 'trf' ),
                        'id'   => 'front-testimonial-text',
                        'type'  => 'text',  
                        'desc' => 'You can chenge content from Testimonials. Make sure to select category Front Page'
                    ),           
                    array(
                        'name'  => __( 'Testimonials Arrow URL', 'trf' ),
                        'id'   => 'front-testimonial-url',
                        'type'  => 'text',  
                    ),           
                    array(
                        'name'  => __( 'Marketing Wisdom box Title', 'trf' ),
                        'id'   => 'front-blog-title',
                        'type'  => 'text',  
                    ),           
                    array(
                        'name'  => __( 'Call to Action box Text', 'trf' ),
                        'id'   => 'front-call-text',
                        'type'  => 'text',  
                    ),           
                    array(
                        'name'  => __( 'Call to Action Button URL', 'trf' ),
                        'id'   => 'front-call-btn-url',
                        'type'  => 'text',  
                    ),           
                )
            ); 
    }
    
    
    
    $meta_boxes[] = array(       
        'title'      => 'Consultation Form Submit Settings',
        'post_types' => array( 'services', 'business-stages' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
               'name'  => __( 'Mailchimp List Id', 'trf' ),
               'id'   => 'maichimp-list-id',
               'type'  => 'text',               
            ),                      
        )
    );
    
    // #65 portfoio main page
    // #15 portfoio about page
    // #13 about page
    // #9 our peocesses
    //#18 join us page
    // #7 press page
    //#11 marketing wisdom or blog
    
    $changableTitles = array('65', '15', '13', '9', '18', '7', '11', '150' );
    
    if ( in_array($post_id, $changableTitles) ) 
    {
        remove_post_type_support('portfolio', 'editor');
        remove_post_type_support('page', 'editor');
        remove_meta_box('portfolio-catdiv', 'portfolio', 'side');
                 
        if ( $post_id == 65 || $post_id == 15 ){
            $meta_boxes[] = array(       
                'title'      => 'Main Page Titles',
                'post_types' => array( 'portfolio', 'business-stages', 'page' ),
                'context'    => 'normal',
                'priority'   => 'high',
                'fields' => array(
                    array(
                       'name'  => __( 'Content Title 1', 'trf' ),
                        'id'   => 'service-title-1',
                        'type'  => 'text',               
                    ),
                    array(
                        'name'  => __( 'Content Title Color 1', 'trf' ),
                        'id'   => 'service-title-color-1',
                        'type'  => 'color',               
                    ),
                    array(
                        'name'  => __( 'Content Title 2', 'trf' ),
                        'id'   => 'service-title-2',
                        'type'  => 'text',               
                    ),
                    array(
                        'name'  => __( 'Content Title Color 2', 'trf' ),
                        'id'   => 'service-title-color-2',
                        'type'  => 'color',               
                    ),            
                    array(
                        'name'  => __( 'Content Title 3', 'trf' ),
                        'id'   => 'service-title-3',
                        'type'  => 'text',               
                    ),
                    array(
                        'name'  => __( 'Content Title Color 3', 'trf' ),
                        'id'   => 'service-title-color-3',
                        'type'  => 'color',               
                    ),            
                )
            ); 
        }
        
        if ( in_array($post_id, array('7', '9', '11', '13', '18')) ){ // press, process, wisdom, about, join
            
            $meta_boxes[] = array(       
                'title'      => 'Main Page Titles',
                'post_types' => array( 'portfolio', 'business-stages', 'page' ),
                'context'    => 'normal',
                'priority'   => 'high',
                'fields' => array(
                    array(
                       'name'  => __( 'Content Title 1', 'trf' ),
                        'id'   => 'service-title-1',
                        'type'  => 'text',               
                    ),                    
                    array(
                        'name'  => __( 'Content Title 2', 'trf' ),
                        'id'   => 'service-title-2',
                        'type'  => 'text',               
                    ),           
                    array(
                        'name'  => __( 'Content Title 3', 'trf' ),
                        'id'   => 'service-title-3',
                        'type'  => 'text',               
                    )         
                )
            );
            
            if ( $post_id != 11 ){
                $meta_boxes[] = array(       
                    'title'      => 'Main Content block',
                    'post_types' => array( 'page' ),
                    'context'    => 'normal',
                    'priority'   => 'high',
                    'fields' => array(
                        array(
                            'name'  => __( 'Main Content Title', 'trf' ),
                            'id'   => 'about-content-title',
                            'type'  => 'text',               
                        ),
                        array(
                           'name'    => __( 'Main Content', 'trf' ),
                            'id'      => "about-main-wysiwyg",
                            'type'    => 'wysiwyg',
                            // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                            'raw'     => false,
                            // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                            'options' => array(
                                    'textarea_rows' => 1,
                                    'teeny'         => true,
                                    'media_buttons' => false,
                            ),          
                         ),

                    )
                );  
            }
            
        }
        
        if( in_array($post_id, array('7', '9', '11', '15', '13', '18', '150')) ){
            $meta_boxes[] = array(       
                'title'      => 'Consultation Form Submit Settings',
                'post_types' => array( 'page' ),
                'context'    => 'normal',
                'priority'   => 'high',
                'fields' => array(
                    array(
                       'name'  => __( 'Mailchimp List Id', 'trf' ),
                       'id'   => 'maichimp-list-id',
                       'type'  => 'text',               
                    ),                      
                )
            );
        }
        
        
        if ( $post_id == 15 ){ //#15 contact page
            
            $meta_boxes[] = array(       
                'title'      => 'Contact Info block',
                'post_types' => array( 'page' ),
                'context'    => 'normal',
                'priority'   => 'high',
                'fields' => array(
                    array(
                        'name'  => __( 'Contact Main Content Title', 'trf' ),
                        'id'   => 'contact-content-title',
                        'type'  => 'text',               
                    ),
                    array(
                       'name'    => __( 'Contact Main Content', 'trf' ),
                        'id'      => "contact-main-wysiwyg",
                        'type'    => 'wysiwyg',
                        // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                        'raw'     => false,
                        // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                        'options' => array(
                                'textarea_rows' => 1,
                                'teeny'         => true,
                                'media_buttons' => false,
                        ),          
                     ),
                    array(
                        'id'               => 'contact_main_icon',
                        'name'             => __( 'Contact Main Content Image', 'trf' ),
                        'type'             => 'image_advanced',
                        'force_delete'     => false,
                        // Maximum image uploads
                        'max_file_uploads' => 1,
                    ),  
                    array(
                        'name'  => __( 'Hello Text', 'trf' ),
                        'id'   => 'contact-hello',
                        'type'    => 'wysiwyg',
                        // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                        'raw'     => false,
                        // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                        'options' => array(
                            'textarea_rows' => 1,
                            'teeny'         => true,
                            'media_buttons' => false,
                        ),             
                    ),          
                    array(
                        'name'    => __( 'Drop us a line Form Shortcode', 'trf' ),
                         'id'      => "contact-form-shortcode",
                         'type'    => 'text',                     
                     ), 

                    array(
                       'name'  => __( 'Contact Block title', 'trf' ),
                        'id'   => 'contact-block-title',
                        'type'  => 'text',               
                    ), 

                    array(
                        'name'    => __( 'Contact Block Address 1', 'trf' ),
                         'id'      => "contact-address1",
                         'type'    => 'wysiwyg',
                         // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                         'raw'     => false,
                         // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                         'options' => array(
                                 'textarea_rows' => 1,
                                 'teeny'         => true,
                                 'media_buttons' => false,
                         ),          
                     ),
                    array(
                        'name'    => __( 'Contact Block Address 2', 'trf' ),
                         'id'      => "contact-address2",
                         'type'    => 'wysiwyg',
                         // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                         'raw'     => false,
                         // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                         'options' => array(
                                 'textarea_rows' => 1,
                                 'teeny'         => true,
                                 'media_buttons' => false,
                         ),          
                    ),

                    array(
                       'name'  => __( 'Phone', 'trf' ),
                        'id'   => 'contact-phone',
                        'type'  => 'text',               
                    ), 
                    array(
                       'name'  => __( 'Email', 'trf' ),
                        'id'   => 'contact-email',
                        'type'  => 'text',               
                    ), 

                    array(
                        'id'               => 'contact_map_image',
                        'name'             => __( 'Contact Map Image', 'trf' ),
                        'type'             => 'image_advanced',
                        'force_delete'     => false,
                        // Maximum image uploads
                        'max_file_uploads' => 1,
                    ),
                    array(
                        'id'               => 'contact_path_image',
                        'name'             => __( 'Contact Path Background', 'trf' ),
                        'type'             => 'image_advanced',
                        'force_delete'     => false,
                        // Maximum image uploads
                        'max_file_uploads' => 1,
                    ),
                )
            ); 
                         
        } //post #15
        
        if ( $post_id == 13 ) { //#13 about page
            
            $meta_boxes[] = array(       
                'title'      => 'About Info block',
                'post_types' => array( 'page' ),
                'context'    => 'normal',
                'priority'   => 'high',
                'fields' => array(
                    array(
                        'name'  => __( 'About Main Content Title', 'trf' ),
                        'id'   => 'about-us-title',
                        'type'  => 'text',               
                    ),
                    array(
                       'name'    => __( 'About Main Content', 'trf' ),
                        'id'      => "about-us-wysiwyg",
                        'type'    => 'wysiwyg',
                        // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                        'raw'     => false,
                        // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                        'options' => array(
                                'textarea_rows' => 1,
                                'teeny'         => true,
                                'media_buttons' => false,
                        ),          
                     ),
                    array(
                        'name'  => __( 'Author', 'trf' ),
                         'id'   => 'testimonial-author',
                         'type'  => 'text',               
                    ),
                    array(
                       'name'    => __( 'Testimonial Content', 'trf' ),
                        'id'      => "testimonial-wysiwyg",
                        'type'    => 'wysiwyg',
                        // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                        'raw'     => false,
                        // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                        'options' => array(
                                'textarea_rows' => 4,
                                'teeny'         => true,
                                'media_buttons' => false,
                        ),          
                    ),
                    array(
                        'name'  => __( 'Fixed Height', 'trf' ),
                        'id'   => 'fixed-height-1',
                        'type'  => 'text',  
                        'std'   => '310px',
                        'desc' => 'Fixed height for White & Blue boxes(ex. 300px)'
                    ),
                    array(
                        'name'  => __( 'Our Vision Title', 'trf' ),
                        'id'   => 'our-vision-title',
                        'type'  => 'text',               
                    ),
                    array(
                       'name'    => __( 'Our Vision Content', 'trf' ),
                        'id'      => "our-vision-wysiwyg",
                        'type'    => 'wysiwyg',
                        // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                        'raw'     => false,
                        // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                        'options' => array(
                                'textarea_rows' => 1,
                                'teeny'         => true,
                                'media_buttons' => false,
                        ),          
                    ),
                    array(
                        'name'  => __( 'Our Mission Title', 'trf' ),
                        'id'   => 'our-mission-title',
                        'type'  => 'text',               
                    ),
                    array(
                       'name'    => __( 'Our Mission Content', 'trf' ),
                        'id'      => "our-mission-wysiwyg",
                        'type'    => 'wysiwyg',
                        // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                        'raw'     => false,
                        // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                        'options' => array(
                                'textarea_rows' => 1,
                                'teeny'         => true,
                                'media_buttons' => false,
                        ),          
                    ),
                    array(
                        'name'  => __( 'Our Dreams Title', 'trf' ),
                        'id'   => 'our-dreams-title',
                        'type'  => 'text',               
                    ),
                    array(
                       'name'    => __( 'Our Dreams Content', 'trf' ),
                        'id'      => "our-dreams-wysiwyg",
                        'type'    => 'wysiwyg',
                        // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                        'raw'     => false,
                        // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                        'options' => array(
                                'textarea_rows' => 1,
                                'teeny'         => true,
                                'media_buttons' => false,
                        ),          
                    ),
                    
                )
            );  
            
        }
        
        if ( $post_id == 9 || $post_id == 18) {
            $meta_boxes[] = array(       
                'title'      => 'Second Block',
                'post_types' => array( 'page' ),
                'context'    => 'normal',
                'priority'   => 'high',
                'fields' => array(
                    array(
                        'name'  => __( 'Second Block Title', 'trf' ),
                        'id'   => 'process-content-title',
                        'type'  => 'text',               
                    ),
                    array(
                       'name'    => __( 'Second Block Content', 'trf' ),
                        'id'      => "process-main-wysiwyg",
                        'type'    => 'wysiwyg',
                        // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                        'raw'     => false,
                        // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                        'options' => array(
                                'textarea_rows' => 5,
                                'teeny'         => true,
                                'media_buttons' => true,
                        ),          
                     ),
                    
                )
            ); 
        }
        
        if ( $post_id == 7 ){ //#7 press page blocks
            
            $meta_boxes[] = array(       
                'title'      => 'Press Contac Block',
                'post_types' => array( 'page' ),
                'context'    => 'normal',
                'priority'   => 'high',
                'fields' => array(
                    array(
                        'name'  => __( 'Block Title', 'trf' ),
                        'id'   => 'press-contact-title',
                        'type'  => 'text',               
                    ),                    
                    array(
                        'name'  => __( 'Name', 'trf' ),
                        'id'   => 'press-contact-name',
                        'type'  => 'text',               
                    ),                    
                    array(
                        'name'  => __( 'Position', 'trf' ),
                        'id'   => 'press-contact-position',
                        'type'  => 'text',               
                    ),
                    array(
                       'name'    => __( 'Sub Title', 'trf' ),
                        'id'      => "press-contact-subtitle",
                        'type'    => 'wysiwyg',
                        // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                        'raw'     => false,
                        // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                        'options' => array(
                            'textarea_rows' => 1,
                            'teeny'         => true,
                            'media_buttons' => false,
                        ),          
                    ),
                    array(
                        'id'               => 'press_contact_image',
                        'name'             => __( 'Contact Image', 'trf' ),
                        'type'             => 'image_advanced',
                        'force_delete'     => false,
                        // Maximum image uploads
                        'max_file_uploads' => 1,
                    ), 
                    
                    array(
                        'name'  => __( 'Phone', 'trf' ),
                        'id'   => 'press-contact-phone',
                        'type'  => 'text',               
                    ),
                    array(
                        'name'  => __( 'Email', 'trf' ),
                        'id'   => 'press-contact-email',
                        'type'  => 'text',               
                    ),
                    array(
                        'name'  => __( 'Biography Link', 'trf' ),
                        'id'   => 'press-biography-link',
                        'type'  => 'text',               
                    ),
                    array(
                        'name'  => __( 'Publications Link', 'trf' ),
                        'id'   => 'press-publications-link',
                        'type'  => 'text',               
                    ),
                    array(
                        'name'  => __( 'vCard Link', 'trf' ),
                        'id'   => 'press-vcard-link',
                        'type'  => 'text',               
                    ),
                           
                )
            );
            
            $meta_boxes[] = array(       
                'title'      => 'Press Releases',
                'post_types' => array( 'page' ),
                'context'    => 'normal',
                'priority'   => 'high',
                'fields' => array(
                    array(
                        'name'  => __( 'Block Title', 'trf' ),
                        'id'   => 'press-releases-title',
                        'type'  => 'text',               
                    ),                                               
                )
            );
            
            $meta_boxes[] = array(       
                'title'      => 'Blog Articles',
                'post_types' => array( 'page' ),
                'context'    => 'normal',
                'priority'   => 'high',
                'fields' => array(
                    array(
                        'name'  => __( 'Block Title', 'trf' ),
                        'id'   => 'press-blog-title',
                        'type'  => 'text',               
                    ),                                               
                )
            );
            
            $meta_boxes[] = array(       
                'title'      => 'Brand Assets',
                'post_types' => array( 'page' ),
                'context'    => 'normal',
                'priority'   => 'high',
                'fields' => array(
                    array(
                        'name'  => __( 'Block Title', 'trf' ),
                        'id'   => 'press-brand-title',
                        'type'  => 'text',               
                    ),  
                    array(
                       'name'    => __( 'Content', 'trf' ),
                        'id'      => "press-brand-content",
                        'type'    => 'wysiwyg',
                        // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                        'raw'     => false,
                        // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                        'options' => array(
                            'textarea_rows' => 1,
                            'teeny'         => true,
                            'media_buttons' => false,
                        ),          
                    ),
                    array(
                        'name'  => __( 'Download Link Test', 'trf' ),
                        'id'   => 'press-brand-link-text',
                        'type'  => 'text',               
                    ),                    
                    array(
                        'name'  => __( 'Download Link', 'trf' ),
                        'id'   => 'press-brand-link',
                        'type'  => 'text',               
                    ),                                              
                )
            );
            $meta_boxes[] = array(       
                'title'      => 'Testimonial Box',
                'post_types' => array( 'page' ),
                'context'    => 'normal',
                'priority'   => 'high',
                'fields' => array(
                     array(
                        'name'  => __( 'Author', 'trf' ),
                         'id'   => 'testimonial-author',
                         'type'  => 'text',               
                    ),
                    array(
                       'name'    => __( 'Testimonial Content', 'trf' ),
                        'id'      => "testimonial-wysiwyg",
                        'type'    => 'wysiwyg',
                        // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                        'raw'     => false,
                        // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                        'options' => array(
                                'textarea_rows' => 4,
                                'teeny'         => true,
                                'media_buttons' => false,
                        ),          
                    ),                                                                  
                )
            );
            $meta_boxes[] = array(       
                'title'      => 'Style Settings',
                'post_types' => array( 'page' ),
                'context'    => 'normal',
                'priority'   => 'high',
                'fields' => array(
                     array(
                        'name'  => __( 'Fixed Height', 'trf' ),
                        'id'   => 'fixed-height-1',
                        'type'  => 'text',  
                        'std'   => '310px',
                        'desc' => 'Fixed height for Red & Blue boxes(ex. 300px)'
                    ),                                                                
                )
            );
            
        }
        
        if ( $post_id == 150 ){ // #150 authors page
            $meta_boxes[] = array(       
                'title'      => 'Contact Info block',
                'post_types' => array( 'page' ),
                'context'    => 'normal',
                'priority'   => 'high',
                'fields' => array(
                    array(
                        'name'  => __( 'Contact Main Content Title', 'trf' ),
                        'id'   => 'main-authors-title',
                        'type'  => 'text',               
                    ),
                    array(
                       'name'    => __( 'Contact Main Content', 'trf' ),
                        'id'      => "main-authors-wysiwyg",
                        'type'    => 'wysiwyg',
                        // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                        'raw'     => false,
                        // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                        'options' => array(
                                'textarea_rows' => 1,
                                'teeny'         => true,
                                'media_buttons' => false,
                        ),          
                    ),      
                    
                )
            ); 
        }
        
        
        
    } else { //adding images box to all portfolio items excluding main page
        $meta_boxes[] = array(       
            'title'      => 'Portfolio Images',
            'post_types' => array( 'international' ),
            'context'    => 'normal',
            'priority'   => 'high',
            'fields' => array(           
                array(
                    'id'  => 'portfolio_images',
                    'name' => __( 'Upload Portfolio Images ', 'trf' ),
                    'type' => 'image_advanced',
                    'force_delete' => false,

                ),                                
            )
        );
        
    }
    
    
    
    return $meta_boxes;
}

add_action('admin_init','trf_meta_init');

function trf_meta_init()
{

}