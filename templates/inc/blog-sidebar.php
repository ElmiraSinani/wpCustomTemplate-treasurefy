
<div class="blog-sidebar">
    <div class="search">
        <?php get_template_part( 'blog', 'searchform' ); ?>
    </div>

    <div class="wisdom-form">
       <?php  echo do_shortcode('[contact-form-7 id="110" title="Blog Subscribe Form"]'); ?>                
    </div>

    <div class="papular-posts">
        <h1>Popular Posts</h1>
        <?php $articles = get_posts( array( 'numberposts' => 3, 'post_type' =>'blog' ) ); ?>
        <ul>
            <?php foreach ($articles as $post){ ?>
            <li>
                <a href="<?php echo get_permalink( $post->ID );?>">
                    <?php echo html_cut($post->post_title, 70); ?> 
                </a>
            </li>
            <?php } ?>
        </ul>
    </div>

    <div class="add-space">
        <?php if ( is_active_sidebar( 'ad-space' ) ) : ?>
            <?php dynamic_sidebar( 'ad-space' ); ?>
        <?php endif; ?>        
    </div>

</div>