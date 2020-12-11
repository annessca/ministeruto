<?php
/**
 * Music Minister functions and definitions
 *
 * @package Music Minister
 *
 */
// Add scritps snd stylesheets
function ministeruto_scripts() {
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css', '3.7.0' );
    wp_enqueue_style( 'audioplayer', get_template_directory_uri() . '/assets/css/audioplayer.css' );
    wp_enqueue_style( 'elegant-icons', get_template_directory_uri() . '/assets/css/elegant-icons.css' );
    wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/assets/css/flaticon.css' );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', '4.7.0' );
    wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/assets/css/jquery-ui.css', '1.12.1' );
    wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/assets/css/jquery-ui.min.css', '1.12.1' );
    wp_enqueue_style( 'nice-select', get_template_directory_uri() . '/assets/css/nice-select.css' );
    wp_enqueue_style( 'owl.carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', '2.2.1' );
    wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/assets/css/slicknav.css', '1.0.10' );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css' );
    wp_enqueue_style( 'theme-default', get_template_directory_uri() . '/assets/css/theme-default.css' );
    wp_enqueue_style( 'themify-icons', get_template_directory_uri() . '/assets/css/themify-icons.css' );

    wp_enqueue_script( 'jquery.validate', get_template_directory_uri() . '/assets/js/jquery.validate.min.js', array( 'jquery' ), '1.11.1', true );
    wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), '2.2.1', true );
    wp_enqueue_script( 'modernizr-3.5.0', get_template_directory_uri() . '/assets/js/vendor/modernizr-3.5.0.min.js', array( 'jquery' ), '3.5.0', true );
    wp_enqueue_script( 'imagesloaded.pkgd', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array(), '4.1.4', true );
    wp_enqueue_script( 'isotope.pkgd', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array(), '3.0.5', true );
    wp_enqueue_script( 'jquery.scrollUp', get_template_directory_uri() . '/assets/js/jquery.scrollUp.min.js', array( 'jquery' ), '2.4.1', true );
    wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/assets/js/slicknav.min.js', array( 'jquery' ), '1.0.10', true );
    wp_enqueue_script( 'scrollIt', get_template_directory_uri() . '/assets/js/scrollIt.js', array(), true );
    wp_enqueue_script( 'menu', get_template_directory_uri() . '/assets/js/menu.js', array(), true );
    wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array(), true );
    wp_enqueue_script( 'extras', get_template_directory_uri() . '/assets/js/extras.js', array(), true );
    wp_enqueue_script( 'nice-select', get_template_directory_uri() . '/assets/js/nice-select.min.js', array(), true );
    
    wp_enqueue_script( 'plugins', get_template_directory_uri() . '/assets/js/plugins.js', array(), true );
    wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array(), true );
    wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.js', array(), true );
    wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/js/waypoints.min.js', array(), '2.0.3', true );
    wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.min.js', array(), '1.1.3', true );
}

add_action( 'wp_enqueue_scripts', 'ministeruto_scripts' );


/* Magnific popup - https://dimsemenov.com/plugins/magnific-popup/ */
   
function enqueue_magnificpopup_styles() {
    wp_enqueue_style('magnific_popup_style', get_stylesheet_directory_uri().'/magnific-popup/magnific-popup.css', array());
}
add_action('wp_enqueue_scripts', 'enqueue_magnificpopup_styles');
     
   
function enqueue_magnificpopup_scripts() {
    wp_enqueue_script('magnific_init_script', get_stylesheet_directory_uri().'/magnific-popup/jquery.magnific-popup-init.js', array('jquery') );
    wp_enqueue_script('magnific_popup_script', get_stylesheet_directory_uri().'/magnific-popup/jquery.magnific-popup.min.js', array('jquery') );
}
add_action('wp_enqueue_scripts', 'enqueue_magnificpopup_scripts');

function enqueue_prettyphoto_styles() {
    wp_enqueue_style('pretty_photo_style', get_stylesheet_directory_uri().'/pretty-photo/css/prettyPhoto.css', array());
}
add_action('wp_enqueue_scripts', 'enqueue_prettyphoto_styles');
   
    
function enqueue_prettyphoto_scripts() {
    wp_enqueue_script('jquery.prettyPhoto', get_stylesheet_directory_uri().'/pretty-photo/js/jquery.prettyPhoto.js', array('jquery'), '3.1.6', true );
}
add_action('wp_enqueue_scripts', 'enqueue_prettyphoto_scripts');

function oiw_lightbox_post($content) {
    global $post;
    $pattern = "/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
    $replacement = '<a$1 rel="prettyPhoto" data-rel="prettyPhoto[]" href=$2$3.$4$5$6</a>';
    $content = preg_replace($pattern, $replacement, $content);
    return $content;
}
add_filter('the_content', 'oiw_lightbox_post');
   
// Add Theme support
add_theme_support( 'post-thumbnails' );
add_image_size( 'blog-archive', 690, 269 );

function gb_comment_form_tweaks ($fields) {
    //add placeholders and remove labels
    $fields['author'] = '<input id="author" name="author" value="" placeholder="Name*" size="30" maxlength="245" required="required" type="text">';

    $fields['email'] = '<input id="email" name="email" type="email" value="" placeholder="Email*" size="30" maxlength="100" aria-describedby="email-notes" required="required">';	

    //unset comment so we can recreate it at the bottom
    unset($fields['comment']);

    $fields['comment'] = '<textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" placeholder="Comment*" required="required"></textarea>';

    //remove website
    unset($fields['url']);

    return $fields;
}

add_filter('comment_form_fields', 'gb_comment_form_tweaks');

function media_menu_setting() {
    add_menu_page( 'Media Menu', 'Media Menu', 'manage_options', 'media-menu', 'media_menu_page', null, 99);
}
add_action( 'admin_menu', 'media_menu_setting' );

function media_menu_page() { ?>
    <div class="wrap">
        <h1>Media Menu</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields( 'section' );
            do_settings_sections( 'theme-options' );
            submit_button();
            ?>
        </form>
    </div>
<?php 
}

function twitter_link() { ?>
	<input type="text" name="twitter" id="twitter" value="<?php echo get_option( 'twitter' ); ?>"/>
<?php 
}

function instagram_link() { ?>
	<input type="text" name="instagram" id="instagram" value="<?php echo get_option('instagram'); ?>"/>
<?php 
}

function facebook_link() { ?>
	<input type="text" name="facebook" id="facebook" value="<?php echo get_option('facebook'); ?>"/>
<?php 
}

function linkedin_link() { ?>
	<input type="text" name="linkedin" id="linkedin" value="<?php echo get_option('linkedin'); ?>"/>
<?php 
}

function media_menu_page_setup() {
    add_settings_section( 'section', 'All Settings', null, 'theme-options' );
    add_settings_field( 'twitter', 'Twitter Url', 'twitter_link', 'theme-options', 'section' );
    add_settings_field( 'facebook', 'Facebook Url', 'facebook_link', 'theme-options', 'section' );
    add_settings_field( 'instagram', 'Instagram Url', 'instagram_link', 'theme-options', 'section' );
    add_settings_field( 'linkedin', 'Linkedin Url', 'linkedin_link', 'theme-options', 'section' );
    register_setting('section', 'twitter');
    register_setting('section', 'facebook');
    register_setting('section', 'instagram');
    register_setting('section', 'linkedin');
}

add_action( 'admin_init', 'media_menu_page_setup' );

function create_music_video() {
    register_post_type( 'music-video', array(
        'labels'    => array(
            'name'  => __( 'Music Video' )
        ),
        'public'    => true,
        'hierarchical'    => true,
        'has_archive'    => true,
        'supports'    => array(
            'title',
            'excerpt',
            'thumbnail',
            'custom-fields'
        ),
        'taxonomies'    => array(
            'category'
        )
    ));
    register_taxonomy_for_object_type( 'category', 'music-video' );
}
add_action( 'init', 'create_music_video' );

function create_announce_event() {
    register_post_type( 'announce-event', array(
        'labels'    => array(
            'name'  => __( 'Announce Event' )
        ),
        'public'    => true,
        'hierarchical'    => true,
        'has_archive'    => true,
        'supports'    => array(
            'title',
            'excerpt',
            'custom-fields',
            'thumbnail'
        ),
        'taxonomies'    => array(
            'post_tag',
            'category'
        )
    ));
}
add_action( 'init', 'create_announce_event' );

function create_cover() {
    register_post_type( 'cover', array(
        'labels'    => array(
            'name'  => __( 'Album Cover' )
        ),
        'public'    => true,
        'hierarchical'    => true,
        'has_archive'    => true,
        'supports'    => array(
            'title',
            'thumbnail',
        )
    ));
}
add_action( 'init', 'create_cover' );

function create_audio_track() {
    register_post_type( 'audio-track', array(
        'labels'    => array(
            'name'  => __( 'Audio Track' )
        ),
        'public'    => true,
        'hierarchical'    => true,
        'has_archive'    => true,
        'supports'    => array(
            'title',
            'custom-fields'
        )
    ));
}
add_action( 'init', 'create_audio_track' );
