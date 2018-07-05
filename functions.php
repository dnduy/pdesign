<?php
/**
 * WP Bootstrap Starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_Bootstrap_Starter
 */

if ( ! function_exists( 'wp_bootstrap_starter_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wp_bootstrap_starter_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on WP Bootstrap Starter, use a find and replace
	 * to change 'wp-bootstrap-starter' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wp-bootstrap-starter', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'wp-bootstrap-starter' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wp_bootstrap_starter_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

    function wp_boostrap_starter_add_editor_styles() {
        add_editor_style( 'custom-editor-style.css' );
    }
    add_action( 'admin_init', 'wp_boostrap_starter_add_editor_styles' );

}
endif;
add_action( 'after_setup_theme', 'wp_bootstrap_starter_setup' );


/**
 * Add Welcome message to dashboard
 */
function wp_bootstrap_starter_reminder(){
        $theme_page_url = 'https://afterimagedesigns.com/wp-bootstrap-starter/?dashboard=1';

            if(!get_option( 'triggered_welcomet')){
                $message = sprintf(__( 'Welcome to WP Bootstrap Starter Theme! Before diving in to your new theme, please visit the <a style="color: #fff; font-weight: bold;" href="%1$s" target="_blank">theme\'s</a> page for access to dozens of tips and in-depth tutorials.', 'wp-bootstrap-starter' ),
                    esc_url( $theme_page_url )
                );

                printf(
                    '<div class="notice is-dismissible" style="background-color: #6C2EB9; color: #fff; border-left: none;">
                        <p>%1$s</p>
                    </div>',
                    $message
                );
                add_option( 'triggered_welcomet', '1', '', 'yes' );
            }

}
add_action( 'admin_notices', 'wp_bootstrap_starter_reminder' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_bootstrap_starter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wp_bootstrap_starter_content_width', 1170 );
}
add_action( 'after_setup_theme', 'wp_bootstrap_starter_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_bootstrap_starter_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wp-bootstrap-starter' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'wp-bootstrap-starter' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'wp-bootstrap-starter' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'wp-bootstrap-starter' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'wp_bootstrap_starter_widgets_init' );



/**
 * Enqueue scripts and styles.
 */
function wp_bootstrap_starter_scripts() {
	// load bootstrap css
	wp_enqueue_style( 'wp-bootstrap-starter-bootstrap-css', get_template_directory_uri() . '/inc/assets/css/bootstrap.min.css' );
    // fontawesome cdn
    wp_enqueue_style( 'wp-bootstrap-pro-fontawesome-cdn', '//use.fontawesome.com/releases/v5.0.12/css/all.css' );
	// load bootstrap css
	// load AItheme styles
	// load WP Bootstrap Starter styles
	wp_enqueue_style( 'wp-bootstrap-starter-style', get_stylesheet_uri() );
    if(get_theme_mod( 'theme_option_setting' ) && get_theme_mod( 'theme_option_setting' ) !== 'default') {
        wp_enqueue_style( 'wp-bootstrap-starter-'.get_theme_mod( 'theme_option_setting' ), get_template_directory_uri() . '/inc/assets/css/presets/theme-option/'.get_theme_mod( 'theme_option_setting' ).'.css', false, '' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'poppins-lora') {
        wp_enqueue_style( 'wp-bootstrap-starter-poppins-lora-font', '//fonts.googleapis.com/css?family=Lora:400,400i,700,700i|Poppins:300,400,500,600,700' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'montserrat-merriweather') {
        wp_enqueue_style( 'wp-bootstrap-starter-montserrat-merriweather-font', '//fonts.googleapis.com/css?family=Merriweather:300,400,400i,700,900|Montserrat:300,400,400i,500,700,800' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'poppins-poppins') {
        wp_enqueue_style( 'wp-bootstrap-starter-poppins-font', '//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'roboto-roboto') {
        wp_enqueue_style( 'wp-bootstrap-starter-roboto-font', '//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'arbutusslab-opensans') {
        wp_enqueue_style( 'wp-bootstrap-starter-arbutusslab-opensans-font', '//fonts.googleapis.com/css?family=Arbutus+Slab|Open+Sans:300,300i,400,400i,600,600i,700,800' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'oswald-muli') {
        wp_enqueue_style( 'wp-bootstrap-starter-oswald-muli-font', '//fonts.googleapis.com/css?family=Muli:300,400,600,700,800|Oswald:300,400,500,600,700' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'montserrat-opensans') {
        wp_enqueue_style( 'wp-bootstrap-starter-montserrat-opensans-font', '//fonts.googleapis.com/css?family=Montserrat|Open+Sans:300,300i,400,400i,600,600i,700,800' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'robotoslab-roboto') {
        wp_enqueue_style( 'wp-bootstrap-starter-robotoslab-roboto', '//fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700|Roboto:300,300i,400,400i,500,700,700i' );
    }
    if(get_theme_mod( 'preset_style_setting' ) && get_theme_mod( 'preset_style_setting' ) !== 'default') {
        wp_enqueue_style( 'wp-bootstrap-starter-'.get_theme_mod( 'preset_style_setting' ), get_template_directory_uri() . '/inc/assets/css/presets/typography/'.get_theme_mod( 'preset_style_setting' ).'.css', false, '' );
    }
    //Color Scheme
    /*if(get_theme_mod( 'preset_color_scheme_setting' ) && get_theme_mod( 'preset_color_scheme_setting' ) !== 'default') {
        wp_enqueue_style( 'wp-bootstrap-starter-'.get_theme_mod( 'preset_color_scheme_setting' ), get_template_directory_uri() . '/inc/assets/css/presets/color-scheme/'.get_theme_mod( 'preset_color_scheme_setting' ).'.css', false, '' );
    }else {
        wp_enqueue_style( 'wp-bootstrap-starter-default', get_template_directory_uri() . '/inc/assets/css/presets/color-scheme/blue.css', false, '' );
    }*/

	wp_enqueue_script('jquery');

    // Internet Explorer HTML5 support
    wp_enqueue_script( 'html5hiv',get_template_directory_uri().'/inc/assets/js/html5.js', array(), '3.7.0', false );
    wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );

	// load bootstrap js
    wp_enqueue_script('wp-bootstrap-starter-popper', get_template_directory_uri() . '/inc/assets/js/popper.min.js', array(), '', true );
	wp_enqueue_script('wp-bootstrap-starter-bootstrapjs', get_template_directory_uri() . '/inc/assets/js/bootstrap.min.js', array(), '', true );
    wp_enqueue_script('wp-bootstrap-starter-themejs', get_template_directory_uri() . '/inc/assets/js/theme-script.min.js', array(), '', true );
	wp_enqueue_script( 'wp-bootstrap-starter-skip-link-focus-fix', get_template_directory_uri() . '/inc/assets/js/skip-link-focus-fix.min.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_bootstrap_starter_scripts' );


function wp_bootstrap_starter_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    <div class="d-block mb-3">' . __( "To view this protected post, enter the password below:", "wp-bootstrap-starter" ) . '</div>
    <div class="form-group form-inline"><label for="' . $label . '" class="mr-2">' . __( "Password:", "wp-bootstrap-starter" ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" class="form-control mr-2" /> <input type="submit" name="Submit" value="' . esc_attr__( "Submit", "wp-bootstrap-starter" ) . '" class="btn btn-primary"/></div>
    </form>';
    return $o;
}
add_filter( 'the_password_form', 'wp_bootstrap_starter_password_form' );



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load plugin compatibility file.
 */
require get_template_directory() . '/inc/plugin-compatibility/plugin-compatibility.php';

/**
 * Load custom WordPress nav walker.
 */
if ( ! class_exists( 'wp_bootstrap_navwalker' )) {
    require_once(get_template_directory() . '/inc/wp_bootstrap_navwalker.php');
}




// Remove built in shortcode
// remove_shortcode('gallery', 'gallery_shortcode');

// Replace with custom shortcode
function shortcode_gallery($attr) {
    $post = get_post();

    static $instance = 0;
    $instance++;

    if (!empty($attr['ids'])) {
        if (empty($attr['orderby'])) {
            $attr['orderby'] = 'post__in';
        }
        $attr['include'] = $attr['ids'];
    }

    $output = apply_filters('post_gallery', '', $attr);

    if ($output != '') {
        return $output;
    }

    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby']) {
            unset($attr['orderby']);
        }
    }

    extract(shortcode_atts(array(
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'id' => $post->ID,
        'itemtag' => '',
        'icontag' => '',
        'captiontag' => '',
        'columns' => 3,
        'size' => 'thumbnail',
        'include' => '',
        'link' => '',
        'exclude' => ''
                    ), $attr));

    $id = intval($id);

    if ($order === 'RAND') {
        $orderby = 'none';
    }

    if (!empty($include)) {
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif (!empty($exclude)) {
        $attachments = get_children(array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
    } else {
        $attachments = get_children(array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
    }

    if (empty($attachments)) {
        return '';
    }

    if (is_feed()) {
        $output = "\n";
        foreach ($attachments as $att_id => $attachment) {
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        }
        return $output;
    }

    //Bootstrap Output Begins Here
    //Bootstrap needs a unique carousel id to work properly. Because I'm only using one gallery per post and showing them on an archive page, this uses the $post->ID to allow for multiple galleries on the same page.

    $output .= '<div id="carousel-' . $post->ID . '" class="carousel slide" data-ride="carousel">'; 
    $output .= '<!-- Indicators -->';
    $output .= '<ol class="carousel-indicators">';

    //Automatically generate the correct number of slide indicators and set the first one to have be class="active".
    $indicatorcount = 0;
    foreach ($attachments as $id => $attachment) {
        if ($indicatorcount == 1) {
            $output .= '<li data-target="#carousel-' . $post->ID . '" data-slide-to="' . $indicatorcount . '" class="active"></li>';
        } else {
            $output .= '<li data-target="#carousel-' . $post->ID . '" data-slide-to="' . $indicatorcount . '"></li>';
        }
        $indicatorcount++;
    }

    $output .= '</ol>';
    $output .= '<!-- Wrapper for slides -->';
    $output .= '<div class="carousel-inner">';
    $i = 0;

    //Begin counting slides to set the first one as the active class
    $slidecount = 1;
    foreach ($attachments as $id => $attachment) {
        $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);

        if ($slidecount == 1) {
            $output .= '<div class="item active">';
        } else {
            $output .= '<div class="item">';
        }

        $image_src_url = wp_get_attachment_image_src($id, $size);
        $output .= '<img src="' . $image_src_url[0] . '">';
        $output .= '    </div>';


        if (trim($attachment->post_excerpt)) {
            $output .= '<div class="caption hidden">' . wptexturize($attachment->post_excerpt) . '</div>';
        }

        $slidecount++;
    }

    $output .= '</div>';
    $output .= '<!-- Controls -->';
    $output .= '<a class="left carousel-control" href="#carousel-' . $post->ID . '" data-slide="prev">';
    $output .= '<span class="glyphicon glyphicon-chevron-left"></span>';
    $output .= '</a>';
    $output .= '<a class="right carousel-control" href="#carousel-' . $post->ID . '" data-slide="next">';
    $output .= '<span class="glyphicon glyphicon-chevron-right"></span>';
    $output .= '</a>';
    $output .= '</div>';
    $output .= '</dl>';
    $output .= '</div>';

    return $output;
    }



    function getImage() {
    global $more;
    $more = 1;
    $link = get_permalink();
    $content = get_the_content();
    $count = substr_count($content, '<img');
    $start = 0;
    for($i=1;$i<=$count;$i++) {
        $imgBeg = strpos($content, '<img', $start);
        $post = substr($content, $imgBeg);
        $imgEnd = strpos($post, '>');
        $postOutput = substr($post, 0, $imgEnd+1);
        $postOutput = preg_replace('/width="([0-9]*)" height="([0-9]*)"/', '',$postOutput);;
        if(stristr($postOutput,'<img')) { echo $postOutput; }
        $start=$imgEnd+1;
    }
    $more = 0;
}
add_post_type_support( 'page', 'excerpt' );

function about_page($id){
    $page_id = 82;
    $post_about = get_post($page_id); 
    $excerpt = $post_about->post_excerpt;
    ?>
    <div class="container about-page">
    <div class="row">
        
    <div class="col-md-12">
        
        <div class="row">
            
        <div class="col-md-7">
            <?php echo get_the_post_thumbnail( $page_id); ?>
        </div>
        <div class="col-md-5 justify-content-around ">
            <h3 class="brand-title"><span><?php echo $post_about->post_title; ?></span></h3>
            <?php echo $excerpt; ?>
        </div>
        </div>
    </div>
    </div>
</div>
    <?php
    // echo $excerpt;
}
add_shortcode( 'gioithieu', 'about_page' );
function sologan(){ ?>
    
    <div id="home-slogan">
        <div class="container">
        <div class="row col-md-12 col-sm-12 home-slogan-content text-center">
            <div class="slogan-title ">
                <div class="container">Với vai trò là chuyên gia thương hiệu <br><b>Big Brand có thể giúp bạn</b></div>
                
            </div>
            <div class="row">
                
            <div class="col-md-3 col-sm-4 col-xs-6 nopadding text-center">
                <img src="<?php bloginfo( 'template_directory' ); ?>/images/icon-idea.png" alt="">
                <p class="space2">
                     CHIẾN LƯỢC <br> THƯƠNG HIỆU
                </p>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 nopadding text-center">
                <img class="space1" src="<?php bloginfo( 'template_directory' ); ?>/images/icon-but.png" alt="">
                
                <p class="space1">
                    THIẾT KẾ LOGO <br> THƯƠNG HIỆU
                </p>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 nopadding text-center">
            
                <img class="space2" src="<?php bloginfo( 'template_directory' ); ?>/images/icon-brand.png" alt="">

                <p class="space2">
                    ĐẶT TÊN/SLOGAN
                </p>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 nopadding text-center ">
                <img src="<?php bloginfo( 'template_directory' ); ?>/images/icon-office.png" alt="">
                <p>
                     NỘI THẤT SHOWROOM
                </p>
            </div>

            </div>
        </div>
        </div>
        <div class="col-md-pull-12 thamkhao text-left">
            <div class="container">
                <span>Tham khảo các dự án thiết kế thương hiệu</span> 
                <br>        
                <span> <b>BIG BRAND đã thực hiện</b> </span>
            </div>
        </div>
        
    </div>
 
    <?php
}
add_shortcode( 'sologan','sologan' );
function quytrinh(){
    ?>
    <div id="quytrinh">
    <div class="container">

        <div class="row bot-row-service"> 

          
                    <div class="list-service col-md-2 col-xs-12 offset-md-1">

                        <p class="col-xs-2 col-md-12 p-quytrinh" style="">01.</p>

                        <span>CHỌN GÓI DỊCH VỤ</span>

                    </div>

                
                    <div class="list-service col-xs-12 col-md-2">

                        <p class="col-xs-2 col-md-12 p-quytrinh" style=" ">02.</p>

                        <span>BÁO GIÁ DỊCH VỤ TRONG 24H</span>

                    </div>

                
                    <div class="list-service col-xs-12 col-md-2">

                        <p class="col-xs-2 col-md-12 p-quytrinh" style=" ">03.</p>

                        <span>LÊN Ý TƯỞNG THIẾT KẾ</span>

                    </div>

                
                    <div class="list-service col-xs-12 col-md-2">

                        <p class="col-xs-2 col-md-12 p-quytrinh" style=" ">04.</p>

                        <span>Ý KIẾN &amp; CHỈNH SỬA</span>

                    </div>

                
                    <div class="list-service  col-xs-12 col-md-2">

                        <p class="col-xs-2 col-md-12 p-quytrinh" style="">05.</p>

                        <span>BÀN GIAO SẢN PHẨM</span>

                    </div>
                </div>
                



    </div>
  </div>
    <?php
}
add_shortcode( 'quytrinh', 'quytrinh' );
function contact(){
    ?>
    <div id="brand-contact">
    <div class="container">
      <div class="row brand-contact-content">
        <div class="col-md-12">
          <div class="col-md-3  brand-contact-title">
            <span class="">Bạn cần tư vấn thiết kế</span> 
          </div>
            
        </div>  
        <div class="col-md-6 offset-md-3 text-center nopadding">
          <!-- <a class="btn-contact "  data-toggle="modal" data-target="#contactModal href="#">LIÊN HỆ NGAY ĐỂ ĐƯƠC HỖ TRỢ</a> -->
          <button type="button" class="btn-contact  " data-toggle="modal" data-target="#contactModal">LIÊN HỆ NGAY ĐỂ ĐƯƠC HỖ TRỢ</button>


           <div class="modal fade" id="contactModal" role="dialog">
              <div class="modal-dialog">
              
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="col-md-12">
                    <p class="text-center contact-title-left  ">BẠN CÓ NHU CẦU VỀ GIẢI PHÁP THƯƠNG HIỆU <br>
                    <b>HÃY LIÊN HỆ VỚI CHÚNG TÔI ĐỂ ĐƯỢC TƯ VẤN VÀ HỖ TRỢ TỐT NHẤT</b>
                    </p>
                  </div>
                  <div class="col-md-12 ct-form">
                     
                   
                  <div role="form" class="wpcf7" id="wpcf7-f104-o1" lang="en-US" dir="ltr">
<div class="screen-reader-response"></div>
<form action="/#wpcf7-f104-o1" method="post" class="wpcf7-form" novalidate="novalidate">
<div style="display: none;">
<input type="hidden" name="_wpcf7" value="104">
<input type="hidden" name="_wpcf7_version" value="4.9.1">
<input type="hidden" name="_wpcf7_locale" value="en_US">
<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f104-o1">
<input type="hidden" name="_wpcf7_container_post" value="0">
</div>
<div class="col-md-12">
<span class="wpcf7-form-control-wrap your-name"><input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text col-md-12" aria-invalid="false" placeholder="Họ tên"></span>
</div>
<div class="col-md-5">
<span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email col-md-12" aria-invalid="false" placeholder="Email"></span>
</div>
<div class="col-md-5 class:col-md-12 offset-md-2">
<span class="wpcf7-form-control-wrap tel-593"><input type="tel" name="tel-593" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-tel" aria-invalid="false" placeholder="Điện thoại"></span>
</div>
<div class="col-md-12">
<span class="wpcf7-form-control-wrap tencongty"><input type="text" name="tencongty" value="" size="40" class="wpcf7-form-control wpcf7-text col-md-12" aria-invalid="false" placeholder="Tên công ty hoặc cơ sở kinh doanh, dịch vụ"></span>
</div>
<div class="col-md-12">
<span class="wpcf7-form-control-wrap tieudedichvu"><input type="text" name="tieudedichvu" value="" size="40" class="wpcf7-form-control wpcf7-text col-md-12" aria-invalid="false" placeholder="Tiêu đề dịch vụ:"></span>
</div>
<div class="col-md-12">
<span class="wpcf7-form-control-wrap your-message"><textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea col-md-12" aria-invalid="false" placeholder="Cho chúng tối biết nội dung chi tiết yêu cầu dịch vụ tại đây:"></textarea></span>
</div>
<div class="col-md-3 offset-md-9">
<input type="submit" value="Gửi yêu cầu tư vấn" class="wpcf7-form-control wpcf7-submit col-md-12 btn btn-default"><span class="ajax-loader"></span>
</div>
<div class="wpcf7-response-output wpcf7-display-none"></div></form></div>                  </div> 

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
                
              </div>
            </div> <!--#/myModal -->

        </div>
      </div>    
    </div>  
  </div>
    <?php
}
add_shortcode( 'contact', 'contact' );
function homecontent(){
    ?>
    <div class="container">
<h2 class="brand-title text-center">Các dự án Big Brand đã thực hiện</h2>
<ul class="nav nav-tabs">
    <li class="nav-item"><a class="nav-link active" href="#home" data-toggle="tab">Văn phòng thiết kế</a></li>
    <li class="nav-item"><a class="nav-link" href="#menu1" data-toggle="tab">Xưởng nội thất</a></li>
    <li class="nav-item"><a class="nav-link" href="#menu2" data-toggle="tab">Nhân sự</a></li>
    <li class="nav-item"><a class="nav-link" href="#menu3" data-toggle="tab">Hoạt động </a></li>
    <li class="nav-item"><a class="nav-link" href="#menu4" data-toggle="tab">Thi công</a></li>
</ul>
</div>
<div class="tab-content">
<div id="home" class="tab-pane active"><?php echo do_shortcode( '[ajax_load_more container_type="div" post_type="post" category="bar-nha-hang-cafe" scroll="false" button_label="XEM TẤT CẢ DỰ ÁN" posts_per_page="9"]' ); ?> </div>
<div id="menu1" class="tab-pane fade"><?php echo do_shortcode( '[ajax_load_more container_type="div" post_type="post" category="bar-nha-hang-cafe" scroll="false" button_label="XEM TẤT CẢ DỰ ÁN" posts_per_page="9"]'); ?></div>
<div id="menu2" class="tab-pane fade"><?php echo do_shortcode( '[ajax_load_more container_type="div" post_type="post" category="bar-nha-hang-cafe" scroll="false" button_label="XEM TẤT CẢ DỰ ÁN" posts_per_page="9"]' ); ?></div>
<div id="menu3" class="tab-pane fade"><?php echo do_shortcode( '[ajax_load_more container_type="div" post_type="post" category="bar-nha-hang-cafe" scroll="false" button_label="XEM TẤT CẢ DỰ ÁN" posts_per_page="9"]' ); ?></div>
<div id="menu4" class="tab-pane fade"><?php echo do_shortcode( '[ajax_load_more container_type="div" post_type="post" category="bar-nha-hang-cafe" scroll="false" button_label="XEM TẤT CẢ DỰ ÁN" posts_per_page="9"]' ); ?></div>
</div>
<div class="clear"></div>
    <?php
}
add_shortcode( 'homecontent', 'homecontent' );