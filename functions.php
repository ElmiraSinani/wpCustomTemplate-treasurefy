<?php
 
/**
 * Customizer additions.
 *
 * @since Twenty Fifteen 1.0
 */
require_once 'templates/inc/globeSettings.php';
require_once 'templates/inc/custom-meta-boxes.php';
require_once 'templates/inc/services-menu.php';
require_once 'templates/inc/business-stages-menu.php';
require_once 'templates/inc/consultation-form-functions.php';

// Add RSS links to <head> section
automatic_feed_links();

// Clean up the <head>
function removeHeadLinks() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');

// Page Settings
// Page Settings
add_theme_support('post-thumbnails');  




function register_treasurefy_menus() {
    register_nav_menus(
        array(
            'main-menu' => __('Home Menu','treasurefy'),
            'about-menu' => __('About Page Menu','treasurefy'),
            'footer-menu' => __('Footer Menu','treasurefy'),
        )
    );
}
add_action('init', 'register_treasurefy_menus');

function company_sidebar_init() {
 register_sidebar(array(
        'name' => 'AD Space Widget',
        'id' => 'ad-space',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}
 add_action( 'init', 'company_sidebar_init' );

function load_styles_and_scripts() {
    
     //load scripts
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '', true);
    }
     
    wp_enqueue_style('mediaqueries', get_template_directory_uri() . '/css/media-queries.css', false, null);    
    wp_deregister_script( 'bxslider' );
    wp_enqueue_script('social-scripts', get_template_directory_uri() . '/js/social-api-scripts.js', array(), '', true);   
    wp_enqueue_script('bxslider', get_template_directory_uri() . '/js/jquery.bxslider/jquery.bxslider.min.js', array(), '', true);   
    
    wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom-script.js', array(), '', true);
    
 }
 
 add_action('wp_enqueue_scripts', 'load_styles_and_scripts');
 

function get_the_slug($echo=false){
  $slug = basename(get_permalink());
  do_action('before_slug', $slug);
  $slug = apply_filters('slug_filter', $slug);
  if( $echo ) echo $slug;
  do_action('after_slug', $slug);
  return $slug;
}

function currentPageSlug(){
    global $post;
    $slug = get_post( $post )->post_name;
    
    return $slug;
}

function getLogo(){
    $logo = get_option('standardLogo');
    
    $content = '<a href="'.home_url().'"><img src="'.$logo.'" /></a>';
    
    return $content;
}

function getSocialMenu(){
    
    $facebook   = get_option('facebook') ? get_option('facebook') : '#'; 
    $googlePlus = get_option('googlePlus') ? get_option('googlePlus') : '#'; 
    $twitter    = get_option('twitter') ? get_option('twitter') : '#'; 
    $linkedIn   = get_option('linkedIn') ? get_option('linkedIn') : '#' ; 
    $mail       = get_option('mail') ? get_option('mail') : ''; 
    
    $content  = '<ul class="social-block">';
    $content .= '<li class="facebook"><a target="_blank" href="'.$facebook.'">FB</a></li>';
    $content .= '<li class="googlePlus"><a target="_blank" href="'.$googlePlus.'">GP</a></li>';
    $content .= '<li class="twitter"><a target="_blank" href="'.$twitter.'">TW</a></li>';
    $content .= '<li class="linkedIn"><a target="_blank" href="'.$linkedIn.'">IN</a></li>';
    
    //$content .= '<li class="mail"><a target="_blank" href="mailto:'.$mail.'">Mail</a></li>';
    $content .= '<li class="mail"><a href="mailto:'.$mail.'?Subject=Treasurefy%20Mail" target="_top">Mail</a></li>';
    $content .= '</ul>';
    
    return $content;
}


function wpse_load_custom_search_template(){
    if( isset($_REQUEST['search']) == 'blog' ) {
        require('blog-search-result.php');
        die();
    }
}
add_action('init','wpse_load_custom_search_template');


add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>
	<table class="form-table">

		<tr>
                    <th><label for="twitter">Author Subtitle</label></th>

                    <td>
                        <input type="text" name="authorSubtitle" id="authorSubtitle" value="<?php echo esc_attr( get_the_author_meta( 'authorSubtitle', $user->ID ) ); ?>" class="regular-text" /><br />
                        <span class="description">Short Quote about Author.</span>
                    </td>
		</tr>

	</table>
<?php }

add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) )
            return false;

    /* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
    update_usermeta( $user_id, 'authorSubtitle', $_POST['authorSubtitle'] );
}


if ( ! function_exists( 'trf_content_nav' ) ) :
    /**
     * Displays navigation to next/previous pages when applicable.
     *
     */
    function trf_content_nav( $html_id ) {
            global $wp_query;

            $html_id = esc_attr( $html_id );
            if ( function_exists( 'wp_paginate' ) ) {
                    wp_paginate();
            }
            else {
                if ( $wp_query->max_num_pages > 1 ) : ?>
                        <nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
                                <h3 class="assistive-text"><?php _e( 'Post navigation', 'kino' ); ?></h3>
                                <div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'kino' ) ); ?></div>
                                <div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'kino' ) ); ?></div>
                        </nav><!-- #<?php echo $html_id; ?> .navigation -->
                <?php endif;
            }
    }
endif;



function html_cut($text, $max_length)
{
    $tags   = array();
    $result = "";

    $is_open   = false;
    $grab_open = false;
    $is_close  = false;
    $in_double_quotes = false;
    $in_single_quotes = false;
    $tag = "";

    $i = 0;
    $stripped = 0;

    $stripped_text = strip_tags($text);

    while ($i < strlen($text) && $stripped < strlen($stripped_text) && $stripped < $max_length)
    {
        $symbol  = $text{$i};
        $result .= $symbol;

        switch ($symbol)
        {
           case '<':
                $is_open   = true;
                $grab_open = true;
                break;

           case '"':
               if ($in_double_quotes)
                   $in_double_quotes = false;
               else
                   $in_double_quotes = true;

            break;

            case "'":
              if ($in_single_quotes)
                  $in_single_quotes = false;
              else
                  $in_single_quotes = true;

            break;

            case '/':
                if ($is_open && !$in_double_quotes && !$in_single_quotes)
                {
                    $is_close  = true;
                    $is_open   = false;
                    $grab_open = false;
                }

                break;

            case ' ':
                if ($is_open)
                    $grab_open = false;
                else
                    $stripped++;

                break;

            case '>':
                if ($is_open)
                {
                    $is_open   = false;
                    $grab_open = false;
                    array_push($tags, $tag);
                    $tag = "";
                }
                else if ($is_close)
                {
                    $is_close = false;
                    array_pop($tags);
                    $tag = "";
                }

                break;

            default:
                if ($grab_open || $is_close)
                    $tag .= $symbol;

                if (!$is_open && !$is_close)
                    $stripped++;
        }

        $i++;
    }

    while ($tags)
        $result .= "</".array_pop($tags).">";

    return $result;
}