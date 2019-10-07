<?php
/**
 * Template Name: Contact Page Template
 */
get_header();
?>

<div class="main-container">
    <div class="sidebar-bg"></div>
    <div class="left-sidebar">
        <?php get_sidebar(); ?>
    </div>
    
    <div class="right-content contact-page page-content">
    <?php $mailchimpLsitID = ''; ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
    <?php
        $title1 = rwmb_meta( 'service-title-1', 'type=text' ) ? rwmb_meta( 'service-title-1', 'type=text' ) : '';
        $title2 = rwmb_meta( 'service-title-2', 'type=text' ) ? rwmb_meta( 'service-title-2', 'type=text' ) : '';
        $title3 = rwmb_meta( 'service-title-3', 'type=text' ) ? rwmb_meta( 'service-title-3', 'type=text' ) : '';

        $color1 = rwmb_meta( 'service-title-color-1', 'type=color' ) ? rwmb_meta( 'service-title-color-1', 'type=color' ) : '';
        $color2 = rwmb_meta( 'service-title-color-2', 'type=color' ) ? rwmb_meta( 'service-title-color-2', 'type=color' ) : '';
        $color3 = rwmb_meta( 'service-title-color-3', 'type=color' ) ? rwmb_meta( 'service-title-color-3', 'type=color' ) : '';

        $mainTaitle = rwmb_meta( 'contact-content-title', 'type=text' ) ? rwmb_meta( 'contact-content-title', 'type=text' ) : '';
        $mainContent = rwmb_meta( 'contact-main-wysiwyg', 'type=wysiwyg' ) ? rwmb_meta( 'contact-main-wysiwyg', 'type=wysiwyg' ) : '';
        $mainImage = rwmb_meta( 'contact_main_icon', 'type=image_advanced' ) ? rwmb_meta( 'contact_main_icon', 'type=image_advanced' ) : '';
        foreach ( $mainImage as $image){
            $url = $image['full_url'];
            break;
        }
        
        $contactHello = rwmb_meta( 'contact-hello', 'type=wysiwyg' ) ? rwmb_meta( 'contact-hello', 'type=wysiwyg' ) : '';
        $contactForm = rwmb_meta( 'contact-form-shortcode', 'type=text' ) ? rwmb_meta( 'contact-form-shortcode', 'type=text' ) : '';
        
        $contactBlockTitle = rwmb_meta( 'contact-block-title', 'type=text' ) ? rwmb_meta( 'contact-block-title', 'type=text' ) : '';
        $address1 = rwmb_meta( 'contact-address1', 'type=wysiwyg' ) ? rwmb_meta( 'contact-address1', 'type=wysiwyg' ) : '';
        $address2 = rwmb_meta( 'contact-address2', 'type=wysiwyg' ) ? rwmb_meta( 'contact-address2', 'type=wysiwyg' ) : '';
        $phone = rwmb_meta( 'contact-phone', 'type=text' ) ? rwmb_meta( 'contact-phone', 'type=text' ) : '';
        $mail = rwmb_meta( 'contact-email', 'type=text' ) ? rwmb_meta( 'contact-email', 'type=text' ) : '';
        
        $pathImg = rwmb_meta( 'contact_path_image', 'type=image_advanced' ) ? rwmb_meta( 'contact_path_image', 'type=image_advanced' ) : '';
        foreach ( $pathImg as $image){
            $pathImgUrl = $image['full_url'];
            break;
        }
        
        $mapImg = rwmb_meta( 'contact_map_image', 'type=image_advanced' ) ? rwmb_meta( 'contact_map_image', 'type=image_advanced' ) : '';
        foreach ( $mapImg as $image){
            $mapImgUrl = $image['full_url'];
            break;
        }
        
        $mailchimpLsitID = rwmb_meta( 'maichimp-list-id', 'type=text' ) ? rwmb_meta( 'maichimp-list-id', 'type=text' ) : ''; 


    ?>
    <div class="content-header">
        <div class="title1" >
            <div style="color: <?php echo $color1; ?>"><?php echo $title1; ?></div>
        </div>
        <div class="title2" >
             <div style="background-color: <?php echo $color2; ?>"><?php echo $title2; ?></div>
        </div>
        <div class="title3">
            <div style="background-color: <?php echo $color3; ?>"><?php echo $title3; ?></div>
        </div>            
    </div>

    <div class="line"></div>

    <div class="contact-row" >        
        <div class="main-content">
            <h1><?php echo $mainTaitle; ?></h1>
            <div class="text"><?php echo html_cut($mainContent, 280); ?></div>
        </div>
        <div class="main-image">
            <img src="<?php echo $url; ?>" />
        </div>
    </div>
    
    <div class="contact-row" > 
        <div class="hello-box"><?php echo $contactHello; ?></div>
        <div class="contact-form-box"><?php if( $contactForm !='' ){echo do_shortcode($contactForm);} ?></div>
    </div>
    
    <div class="contact-row" >
        <div class="absImagePath">
            <img src="<?php echo $pathImgUrl; ?>" />
        </div>
        <div class="contact-info-box">
            <h1><?php echo $contactBlockTitle; ?></h1>
            <div class="address">
                <div class="item">
                    <?php echo $address1; ?>
                </div>
                <div class="item">
                    <?php echo $address2; ?>
                </div>
            </div>
            <div class="phone"><?php echo $phone; ?></div>
            <div class="mail"><?php echo $mail; ?></div>
        </div>
        <div class="contact-map-image"><img src="<?php echo $mapImgUrl; ?>" /></div>
    </div>

    <?php endwhile; endif; ?>
    
    <?php getConsultationForm($mailchimpLsitID); ?>
    
    </div>
</div>


<?php get_footer(); ?>