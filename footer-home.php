        
    </div><!-- .main-block END -->
    
    <?php 
        $footerAddress   = get_option('footerAddress') ? get_option('footerAddress') : ''; 
        $footerPhone   = get_option('footerPhone') ? get_option('footerPhone') : ''; 
        $footerMail   = get_option('footerMail') ? get_option('footerMail') : ''; 
        $footerCopy   = get_option('footerCopy') ? get_option('footerCopy') : ''; 
    ?>

    <div class="footer">
        <div class="footer-container">
            <div class="address"><?php echo $footerAddress; ?></div>
            <div class="phone">
                <?php echo $footerPhone; ?>
                <br/>
                <?php echo $footerMail; ?>
            </div>
            <div class="copy">
                <?php echo $footerCopy; ?>
                <div class="footer-menu">
                    <?php 
                        wp_nav_menu( array(
                            'container_class' => 'footer_menu', 
                            'theme_location' => 'footer-menu' 
                        ) );
                    ?>
                </div>
            </div>
        </div>        
    </div>

    <?php wp_footer(); ?>
	
    <!-- Don't forget analytics -->
	
</body>

</html>
