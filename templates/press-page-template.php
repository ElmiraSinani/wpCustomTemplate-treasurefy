<?php
/**
 * Template Name: Press Page Template
 */
get_header();
?>

<div class="main-container press">
    
    <div class="sidebar-bg"></div>
    <div class="left-sidebar">
        <div class="content">

            <div class="logo">
                <div class="mobile-close">X</div>
                <?php echo getLogo(); ?>
            </div>

            <div class="about-menu page-menu">
                <div class="menu-header"><a class='show-front-menu'></a><span>About</span></div>
                <?php 
                    wp_nav_menu( array(
                        'container_class' => 'main_menu', 
                        'theme_location' => 'about-menu' 
                    ) );
                ?>
            </div>
            
            <div class="front-menu hide-menu">
                <?php 
                    wp_nav_menu( array(
                        'container_class' => 'main_menu', 
                        'theme_location' => 'main-menu' 
                    ) );
                ?>
            </div>

            <?php echo getSocialMenu(); ?>
        </div>
    </div>
    <div class="right-content  about-page page-content">
        <?php $mailchimpLsitID = ''; ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php    
            
            $title1 = rwmb_meta( 'service-title-1', 'type=text' ) ? rwmb_meta( 'service-title-1', 'type=text' ) : '';
            $title2 = rwmb_meta( 'service-title-2', 'type=text' ) ? rwmb_meta( 'service-title-2', 'type=text' ) : '';
            $title3 = rwmb_meta( 'service-title-3', 'type=text' ) ? rwmb_meta( 'service-title-3', 'type=text' ) : '';
            
            $contentTitle = rwmb_meta( 'about-content-title', 'type=text' ) ? rwmb_meta( 'about-content-title', 'type=text' ) : '';
            $contentText = rwmb_meta( 'about-main-wysiwyg', 'type=wysiwyg' ) ? rwmb_meta( 'about-main-wysiwyg', 'type=wysiwyg' ) : '';
            
            $contactBlockTitle = rwmb_meta( 'press-contact-title', 'type=text' ) ? rwmb_meta( 'press-contact-title', 'type=text' ) : '';
            $contactName = rwmb_meta( 'press-contact-name', 'type=text' ) ? rwmb_meta( 'press-contact-name', 'type=text' ) : '';
            $contactPos = rwmb_meta( 'press-contact-position', 'type=text' ) ? rwmb_meta( 'press-contact-position', 'type=text' ) : '';
            $contactSubtitle = rwmb_meta( 'press-contact-subtitle', 'type=wysiwyg' ) ? rwmb_meta( 'press-contact-subtitle', 'type=wysiwyg' ) : '';
            $contactImg = rwmb_meta( 'press_contact_image', 'type=image_advanced' ) ? rwmb_meta( 'press_contact_image', 'type=image_advanced' ) : '';
            foreach ($contactImg as $value) {
                $contactImgUrl = $value['full_url'];
                break;
            }
            $contactPhone = rwmb_meta( 'press-contact-phone', 'type=text' ) ? rwmb_meta( 'press-contact-phone', 'type=text' ) : '';
            $contactEmail = rwmb_meta( 'press-contact-email', 'type=text' ) ? rwmb_meta( 'press-contact-email', 'type=text' ) : '';
            $contactBioLink = rwmb_meta( 'press-biography-link', 'type=text' ) ? rwmb_meta( 'press-biography-link', 'type=text' ) : '';
            $contactPubLink = rwmb_meta( 'press-publications-link', 'type=text' ) ? rwmb_meta( 'press-publications-link', 'type=text' ) : '';
            $contactVcardLink = rwmb_meta( 'press-vcard-link', 'type=text' ) ? rwmb_meta( 'press-vcard-link', 'type=text' ) : '';
            
            $releasesTitle = rwmb_meta( 'press-releases-title', 'type=text' ) ? rwmb_meta( 'press-releases-title', 'type=text' ) : '';
            $releasesContent = rwmb_meta( 'press-releases-content', 'type=wysiwyg' ) ? rwmb_meta( 'press-releases-content', 'type=wysiwyg' ) : '';
            $releasesLink = rwmb_meta( 'press-releases-link', 'type=text' ) ? rwmb_meta( 'press-releases-link', 'type=text' ) : '';
            
            $blogTitle = rwmb_meta( 'press-blog-title', 'type=text' ) ? rwmb_meta( 'press-blog-title', 'type=text' ) : '';
            $blogContent = rwmb_meta( 'press-blog-content', 'type=wysiwyg' ) ? rwmb_meta( 'press-blog-content', 'type=wysiwyg' ) : '';
            $blogLink = rwmb_meta( 'press-blog-link', 'type=text' ) ? rwmb_meta( 'press-blog-link', 'type=text' ) : '';
            
            $brandTitle = rwmb_meta( 'press-brand-title', 'type=text' ) ? rwmb_meta( 'press-brand-title', 'type=text' ) : '';
            $brandContent = rwmb_meta( 'press-brand-content', 'type=wysiwyg' ) ? rwmb_meta( 'press-brand-content', 'type=wysiwyg' ) : '';
            $brandLinkText = rwmb_meta( 'press-brand-link-text', 'type=text' ) ? rwmb_meta( 'press-brand-link-text', 'type=text' ) : '';
            $brandLink = rwmb_meta( 'press-brand-link', 'type=text' ) ? rwmb_meta( 'press-brand-link', 'type=text' ) : '';

            $testimonialAuthor = rwmb_meta( 'testimonial-author', 'type=text' ) ? rwmb_meta( 'testimonial-author', 'type=text' ) : '';
            $testimonialContent = rwmb_meta( 'testimonial-wysiwyg', 'type=wysiwyg' ) ? rwmb_meta( 'testimonial-wysiwyg', 'type=wysiwyg' ) : '';
            
            $mailchimpLsitID = rwmb_meta( 'maichimp-list-id', 'type=text' ) ? rwmb_meta( 'maichimp-list-id', 'type=text' ) : ''; 
            
            $fixedH = rwmb_meta( 'fixed-height-1', 'type=text' ) ? rwmb_meta( 'fixed-height-1', 'type=text' ) : '';
        ?>
        
        <div class="content-header about-header">
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
        
        <div class="press-main-block">
            <div class="press-main-content">
                <h1><?php echo $contentTitle; ?></h1>
                <div class="text">
                    <?php echo $contentText; ?>
                </div>               
            </div>
            <div class="press-contact">
                <div class="block-title no-hover"> <?php echo $contactBlockTitle; ?> </div>
                <div class="name"> <?php echo $contactName; ?></div>
                <div class="position no-hover"> <?php echo $contactPos; ?></div>
                <div class="img"><img src="<?php echo $contactImgUrl;?>" /></div>
                <div class="contactInfo no-hover">                                   
                    <div class="phone"><?php echo $contactPhone;?></div>
                    <div class="email"><?php echo $contactEmail;?></div>
                </div>
                <div class="subtitle"><?php echo $contactSubtitle;?></div>
                <div class="buttons">
                    <a href="<?php echo $contactBioLink;?>" >Biography</a>
                    <a href="<?php echo $contactPubLink;?>" >Publications</a>
                    <a href="<?php echo $contactVcardLink;?>" >vCard</a>
                </div>
            </div>
        </div>
        <?php
            $releases = get_posts( array( 'numberposts' => 3, 'blog-cat' => 'press-releases', 'post_type' =>'blog' ) );
            $articles = get_posts( array( 'numberposts' => 3, 'post_type' =>'blog' ) );
            
        ?>
        <div class="press-block2">
            <div class="releases">
                <h1>Press Releases</h1>
                <ul>
                <?php foreach ($releases as $post){ ?>
                    <li>
                        <a href="<?php echo get_permalink( $post->ID );?>" > 
                            <?php echo html_cut($post->post_content, 126); ?> 
                            <span class="date"><?php echo date("d M Y", strtotime($post->post_date) ); ?></span>
                        </a>
                        
                    </li>
                <?php } ?>
                </ul>
                <a class="viewAll" href="<?php echo home_url(); ?>/blog-cat/press-releases">View All</a>
            </div>
            <div class="releases">
                <h1>Blog Articles</h1>
                <ul>
                <?php foreach ($articles as $post){ ?>
                    <li>
                        <a href="<?php echo get_permalink( $post->ID );?>" > 
                            <?php echo html_cut($post->post_content, 126); ?> 
                            <span class="date"><?php echo date("d M Y", strtotime($post->post_date) ); ?></span>
                        </a>
                        
                    </li>
                <?php } ?>
                </ul>
                <a class="viewAll" href="<?php echo home_url(); ?>/marketing-wisdom">View All</a>
            </div>
        </div>
        
        <div class="services-block2 ">
            <div class="competitors press-brand" style="height: <?php echo $fixedH; ?>" >
                <h1><?php echo $brandTitle; ?></h1>
                <div class="text"><?php echo $brandContent; ?></div>
                <div class="click-here">
                    <a href="<?php echo $brandLink; ?>"><?php echo $brandLinkText; ?></a>
                </div>
            </div>
            <div class="testimonial" style="height: <?php echo $fixedH; ?>" >
                <div class="text">
                    <?php echo $testimonialContent; ?>
                </div>
                <div class="author"><?php echo $testimonialAuthor; ?></div>
            </div>
        </div>
        
        <?php endwhile; endif; ?>
        
        
        <?php getConsultationForm($mailchimpLsitID); ?>
        
        
    </div>
    
</div>

<?php get_footer(); ?>