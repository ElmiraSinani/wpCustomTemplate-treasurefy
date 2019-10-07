<?php get_header(); ?>

<div class="main-container">
    
    <div class="sidebar-bg"></div>
    <div class="left-sidebar">
        <?php get_sidebar(); ?>
    </div>
    
    <div class="right-content blog-single-page page-content">
        
        <div class="blog-page-content">
            <?php $comments = ''; ?>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
            <?php  
                $comments = get_comments( array( 'post_id' => get_the_ID() ) ); 
                $relatedPosts = rwmb_meta( '_related_blog_posts', 'type=select' ) ? rwmb_meta( '_related_blog_posts', 'type=select' ) : '';
            ?>
            <div class="blog-single-content">
                <div class="image">
                    <?php
                    if(has_post_thumbnail()){
                        the_post_thumbnail( 'full' ); 
                    }
                    ?>
                </div>
                <div class="title-block">
                    <div class="title">
                        <?php the_title(); ?>
                        <div class="author">by <?php the_author(); ?></div>
                    </div>                
                   <ul class="social-light">
                        <li class="fb">
                            <!--<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_the_permalink()); ?>">-->
                            <a class="share-btn" data-title='<?php echo get_the_title(); ?>' data-content='<?php echo html_cut( get_the_excerpt(), 150 );?>' data-image='<?php the_post_thumbnail_url('full'); ?>' data-link='<?php the_permalink(); ?>'>
                                FB
                            </a>
                        </li>
                        <li class="tw">
                            <a href="https://twitter.com/home?status=<?php echo urlencode(get_the_permalink()); ?>">
                                TW
                            </a>
                        </li>
                        <li class="gp">
                           <a href="https://plus.google.com/share?url=<?php echo urlencode(get_the_permalink()); ?>">
                            G+
                           </a>
                        </li>
                        <li class="in">
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_the_permalink()); ?>&title=<?php echo get_the_title(); ?>&summary=&source=">
                            In
                            </a>
                        </li>
                    </ul>               
                </div>
                <div class="content-block">
                    <?php the_content(); ?>
                </div>
            </div>
            

            <div class="related-blogs">
                <h1>You Might Also be Interested In</h1>
                
                <?php
                    if ($relatedPosts != '' ){ 
                    foreach ($relatedPosts as $postId) {  
                    $blogPost = get_post($postId);
                    
                ?>
                <div class="item">
                    <a href="<?php echo get_permalink( $postId ); ?>">
                    <div class="image">
                        <?php echo  get_the_post_thumbnail ( $postId,  'thumbnail' );                         
                        ?>
                    </div>
                    
                    <div class="title">                       
                        <?php echo html_cut( $blogPost->post_title, 27 ) ?>                        
                        <div class="name">by <?php the_author(); ?></div>
                    </div> 
                    </a>
                </div>
                <?php
                     } }
                ?>
            </div>
            
            <div class="share-comment-block">
                <div class="form-block">
                    <h1>Share your Thoughts</h1>
                    <div class="form">
                    <?php 
                    if ( !is_user_logged_in () ){ 
                        $comments_args = array(
                            // Change the title of send button 
                            'label_submit' => __( 'Post Comment', 'textdomain' ),
                            // Change the title of the reply section
                            'title_reply' =>'',
                            // Remove "Text or HTML to be displayed after the set of comment fields".
                            'comment_notes_after' => '',
                            // Redefine your own textarea (the comment body).
                            'fields' => array(
                                'author' => '<div class="input-row"><label>Name</label><input type="text" id="author" name="author" /></div>',
                                'email' => '<div class="input-row"><label>Email</label><input type="email" id="email" name="email"/><span>Your email address will not be published.</span></div>',
                                'url' => '',
                                'comment_field' => '<div class="input-row"><label>Comment</label><textarea id="comment" name="comment" aria-required="true"></textarea></div>',
                            ), 
                            'comment_field' => '', 
                        );
                    }else{
                        $comments_args = array(
                            // Change the title of send button 
                            'label_submit' => __( 'Post Comment', 'textdomain' ),
                            // Change the title of the reply section
                            'title_reply' => __( 'Write a Reply or Comment', 'textdomain' ),
                        );
                    }
                    comment_form( $comments_args );
                    ?>
                    
                    </div>
                </div>
                <div class="author-block">
                    <h1>About the Author</h1>
                    <div class="image"> <?php userphoto_the_author_thumbnail() ?></div>
                    <div class="name"><?php the_author_firstname(); echo " "; the_author_lastname(); ?></div>
                    <div class="text">
                    <?php 
                        echo html_cut( nl2br(get_the_author_meta('description')), 215 ); 
                    ?>
                    </div>
                    <div class="button">
                        <a class="learn-more" href="<?php echo get_author_posts_url( get_the_author_meta('ID') ) ?>">Learn More</a>
                    </div>
                </div>
                
            </div>
            
            <div class="recent-comments">                
                <h1>Recent Comments</h1>
               
                <ul>
                <?php if($comments !='') { foreach ($comments as $coment){?>
                    <li>
                        <div class="text">
                            <?php echo $coment->comment_content; ?>
                        </div>
                        <div class="meta">
                            <?php echo $coment->comment_author; ?> -  
                            <?php echo date("F j, Y", strtotime($coment->comment_date)); ?>

                        </div>
                        <div class="line"></div>
                    </li>
                <?php } }?>                    
                    
                
                <!-- <div class="pager">
                    <a href="#" >&lt;</a>
                    <a href="#" >1</a>
                    <a href="#" class="active">2</a>
                    <a href="#" >3</a>
                    <a href="#" >...</a>
                    <a href="#" >6</a>
                    <a href="#" >&gt;</a>
                </div> -->
                
            </div>
            <?php endwhile; endif; ?>
        </div>
        
        
        <?php require_once( get_template_directory() .'/templates/inc/blog-sidebar.php'); ?>
        
        <?php $mailchimpLsitID = get_post_meta( '11', 'maichimp-list-id', true); ?>
        <?php getConsultationForm($mailchimpLsitID); ?>
    </div>
    
</div>
<?php get_footer(); ?>