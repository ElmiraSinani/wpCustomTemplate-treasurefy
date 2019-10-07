        
    </div><!-- .main-block END -->
    
    <?php 
        $footerAddress   = get_option('footerAddress') ? get_option('footerAddress') : ''; 
        $footerPhone   = get_option('footerPhone') ? get_option('footerPhone') : ''; 
        $footerMail   = get_option('footerMail') ? get_option('footerMail') : ''; 
        $footerCopy   = get_option('footerCopy') ? get_option('footerCopy') : ''; 
        $footerCopy1   = get_option('footerCopy1') ? get_option('footerCopy1') : ''; 
        $footerFormTxt  = get_option('footerFormTxt') ? get_option('footerFormTxt') : ''; 
        $footerLogo  = get_option('footerLogo') ? get_option('footerLogo') : ''; 
    ?>

    <div class="footer">
        <div class="footer-container fpage">
            <div class="paddress">
                <div class="addr"><?php echo $footerAddress; ?> </div>               
                <div class="phoneNum"><?php echo $footerPhone; ?></div>                
                <div class="mail"><?php echo $footerMail; ?></div>
            </div>
            <div class="pform">
                <?php echo do_shortcode('[contact-form-7 id="148" title="Footer Contact Form"]')?>
            </div>
            
            <div class="pcopy">
                <?php echo $footerCopy; ?>
                <div class="footer-menu">
                    <?php 
                        wp_nav_menu( array(
                            'container_class' => 'footer_menu', 
                            'theme_location' => 'footer-menu' 
                        ) );
                    ?>                    
                </div>
                <div class="logoBlock">
                    <div class="copy1"><?php echo $footerCopy1; ?></div>
                    <div class="flogo"><img src="<?php echo $footerLogo; ?>" /></div>
                </div>
            </div>
        </div>        
    </div>

    <?php wp_footer(); ?>
	
    <!-- Don't forget analytics -->
	
</body>

</html>
