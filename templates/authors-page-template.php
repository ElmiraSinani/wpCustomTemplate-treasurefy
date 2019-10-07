<?php
/**
 * Template Name: Authors Page Template
 */
get_header();
?>

<div class="main-container">
    <div class="sidebar-bg"></div>
    <div class="left-sidebar">
        <?php get_sidebar(); ?>
    </div>
    
    <div class="right-content blog-page page-content">
    <?php 
    $mailchimpLsitID = '';
    $mainTitle = '';
    $mainContent = '';
    if (have_posts()) : while (have_posts()) : the_post(); 
        
        $mainTitle = rwmb_meta( 'main-authors-title', 'type=text' ) ? rwmb_meta( 'main-authors-title', 'type=text' ) : '';
        $mainContent = rwmb_meta( 'main-authors-wysiwyg', 'type=text' ) ? rwmb_meta( 'main-authors-wysiwyg', 'type=text' ) : '';
        $mailchimpLsitID = rwmb_meta( 'maichimp-list-id', 'type=text' ) ? rwmb_meta( 'maichimp-list-id', 'type=text' ) : ''; 
        
    endwhile; endif; 
    ?>
  
        
   <?php
        $title1 = get_post_meta( '11', 'service-title-1', true);
        $title2 = get_post_meta( '11', 'service-title-2', true);
        $title3 = get_post_meta( '11', 'service-title-3', true);       
    ?>
    <div class="content-header blog">
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

    <div class="blog-main-block authors">
        <div class="blog-items">
            <div class="keword-block">
                <h1><?php echo $mainTitle; ?></h1>
                <p><?php echo $mainContent; ?></p>
            </div>
            <?php 
                $args = array(
                            'blog_id'      => $GLOBALS['blog_id'],
                            'role'         => 'author',
                            'meta_key'     => '',
                            'meta_value'   => '',
                            'meta_compare' => '',
                            'meta_query'   => array(),
                            'include'      => array(),
                            'exclude'      => array(),
                            'orderby'      => 'login',
                            'order'        => 'ASC',
                            'offset'       => '',
                            'search'       => '',
                            'number'       => '',
                            'count_total'  => false,
                            'fields'       => 'all',
                            'who'          => ''
                        );
                $users = get_users( $args );
                ?>
                <?php foreach($users as $item): ?>
                <div class="item" >
                    <div class="author-content">
                        <div class="title">
                            <?php echo $item->display_name ?>
                        </div>
                        <div class="image">
                           <?php userphoto($item->ID); ?>	
                        </div>                        
                        <div class="text"> 
                            <?php 
                                $desc = nl2br(get_the_author_meta('description', $item->ID));
                                echo html_cut($desc, 265); 
                            ?> 
                        </div> 
                        <div class="button">
                            <a href="<?php echo get_author_posts_url($item->ID) ?>" title="<?php echo $item->display_name ?>">
                                More from this Author
                            </a>
                        </div>
                    </div>                    
                </div>
            <?php endforeach; ?>
            
        </div>
        
        <?php require_once( get_template_directory() .'/templates/inc/blog-sidebar.php'); ?>
        
    </div>
    
    
    <?php getConsultationForm($mailchimpLsitID); ?>

    
        
    </div>
</div>


<?php get_footer(); ?>