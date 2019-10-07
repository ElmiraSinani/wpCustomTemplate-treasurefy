<?php get_header(); ?>

<div class="main-container">
    <div class="sidebar-bg"></div>
    <div class="left-sidebar">
        <?php get_sidebar(); ?>
    </div>
    <div class="right-content single-portfolio-page page-content">
    <?php
         $mailchimpLsitID = get_option('maichimpPortfolioList') ? get_option('maichimpPortfolioList') : '';
    ?>   
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>        
        <div class="page-post-content">
            <h2><?php the_title();?></h2>
            <p><?php the_content(); ?></p>
        </div>
        <?php endwhile; endif; ?>

    
       
        <?php getConsultationForm($mailchimpLsitID); ?>        
        
    </div>
    
</div>
<?php get_footer(); ?>