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
               
    <div class="page-post-content">
        <h2>Error 404 - Page Not Found</h2>
    </div>  
       
    <?php getConsultationForm($mailchimpLsitID); ?>        
        
    </div>
    
</div>
<?php get_footer(); ?>

	

