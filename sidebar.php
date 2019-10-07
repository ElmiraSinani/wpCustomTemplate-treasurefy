<!--Left Sidebar Content-->
<div class="content">
    
    <div class="logo">
        <div class="mobile-close">X</div>
        <?php echo getLogo(); ?>
    </div>
    
    <div class="front-menu">
        <?php 
            wp_nav_menu( array(
                'container_class' => 'main_menu', 
                'theme_location' => 'main-menu' 
            ) );
        ?>
    </div>
    
    <div class="search-box">
        <?php //get_template_part( 'full', 'searchform' ); ?>        
        <?php get_search_form() ?>        
    </div>

    <?php echo getSocialMenu(); ?>
    
</div>