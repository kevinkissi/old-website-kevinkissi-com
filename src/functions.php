<?php
/**
 * kevinkissi functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kevinkissi
 */

if ( ! function_exists( 'kevinkissi_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kevinkissi_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on kevinkissi, use a find and replace
	 * to change 'kevinkissi' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'kevinkissi', get_template_directory() . '/languages' );

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
//add_theme_support( 'post-thumbnails' );

/*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio icon: Add Meta Field
/*-----------------------------------------------------------------------------------*/
function taxonomy_add_new_meta_field() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[icon]"><?php _e( 'Portfolio Category Icon', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[icon]" id="term_meta[icon]" value="">
			<p class="description"><?php _e( 'Enter an icon name for this field.( You can choose icon <a target="_blank" href="http://fortawesome.github.io/Font-Awesome/cheatsheet/">here</a>)','kevinkissi' ); ?></p>
		</div>
	<?php
	}
add_action( 'portfolio_cat_add_form_fields', 'taxonomy_add_new_meta_field');
add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field');

	function taxonomy_edit_meta_field($term) {

		// put the term ID into a variable
		$t_id = $term->term_id;

		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[icon]"><?php _e( 'Portfolio Category Icon', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[icon]" id="term_meta[icon]" value="<?php echo esc_attr( $term_meta['icon'] ) ? esc_attr( $term_meta['icon'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a value for this field.(<a target="_blank" href="http://fortawesome.github.io/Font-Awesome/cheatsheet/">Example</a>)','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	}
add_action( 'portfolio_cat_edit_form_fields', 'taxonomy_edit_meta_field');


	function save_taxonomy_custom_meta( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$cat_keys = array_keys( $_POST['term_meta'] );
			foreach ( $cat_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	}
add_action( 'edited_portfolio_cat', 'save_taxonomy_custom_meta' );
add_action( 'create_portfolio_cat', 'save_taxonomy_custom_meta');

/*-----------------------------------------------------------------------------------*/
/* Taxonomy flow icon: Add Meta Field
/*-----------------------------------------------------------------------------------*/
	function taxonomy_add_new_meta_field_flow() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[icon]"><?php _e( 'Flow Category Icon', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[icon]" id="term_meta[icon]" value="">
			<p class="description"><?php _e( 'Enter an icon name for this field.( You can choose icon <a target="_blank" href="http://fortawesome.github.io/Font-Awesome/cheatsheet/">here</a>)','kevinkissi' ); ?></p>
		</div>
	<?php
	}
add_action( 'flow_cat_add_form_fields', 'taxonomy_add_new_meta_field_flow');
add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_flow');

	function taxonomy_edit_meta_field_flow($term) {

		// put the term ID into a variable
		$t_id = $term->term_id;

		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[icon]"><?php _e( 'Flow Category Icon', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[icon]" id="term_meta[icon]" value="<?php echo esc_attr( $term_meta['icon'] ) ? esc_attr( $term_meta['icon'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a value for this field.(<a target="_blank" href="http://fortawesome.github.io/Font-Awesome/cheatsheet/">Example</a>)','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	}
add_action( 'flow_cat_edit_form_fields', 'taxonomy_edit_meta_field_flow');


	function save_taxonomy_custom_meta_flow( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$cat_keys = array_keys( $_POST['term_meta'] );
			foreach ( $cat_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	}
add_action( 'edited_flow_cat', 'save_taxonomy_custom_meta_flow' );
add_action( 'create_flow_cat', 'save_taxonomy_custom_meta_flow');



/*-----------------------------------------------------------------------------------*/
/*	Register Images Size
/*-----------------------------------------------------------------------------------*/
//add_theme_support('post-thumbnails' );
//
//add_image_size('kevinkissi-large-thumb', 830);
//add_image_size('kevinkissi-medium-thumb', 550, 400, true);
//add_image_size('kevinkissi-small-thumb', 230);

//add_image_size('post-page-image', 800, 10);

//Post Thumbnails
//if ( function_exists( 'add_theme_support' ) ) {        
//	add_theme_support( 'post-thumbnails' );        
//	set_post_thumbnail_size( 150, 150 );   
//	}
//
//if ( function_exists( 'add_image_size' ) ) {         
//add_image_size( 'homepage-thumb', 250, 250, true );         
//add_image_size( 'homepage-preview', 400, 400, true );
//}


/*-----------------------------------------------------------------------------------*/
/*	Register Menus
/*-----------------------------------------------------------------------------------*/

// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
'primary' => esc_html__( 'Primary Menu', 'kevinkissi' ),
) );

register_nav_menus(	array(
'blog_nav' => esc_html__( 'Blog Menu', 'kevinkissi' ),
) );

register_nav_menus(	array(
'portfolio_nav' => esc_html__( 'Portfolio Menu', 'kevinkissi' ),
) );

register_nav_menus(	array(
'content_singles_nav' => esc_html__( 'Content Singles Menu', 'kevinkissi' ),
) );

//---------------------------------------------------------------------------------------
//   Search
//---------------------------------------------------------------------------------------    
function add_search_to_wp_menu ( $items, $args ) {
	if( ('primary' === $args -> theme_location) || ('blog_nav' === $args -> theme_location)  || ('portfolio_nav' === $args -> theme_location) || ('content_singles_nav' === $args -> theme_location)) {
$items .= '<li class="menu-item menu-item-search">';
$items .= '<span><form method="get" class="box menu-search-form" action="' . get_bloginfo('url') . '/">
<div class="container-2 input-group">
<input class="text_input" type="text" name="s" id="search" placeholder="Search..."/>
<span class="input-group-btn icon">
<button type="submit" class="btn btn-secondary" id="searchsubmit" value="search">
<i class="fa fa-search"></i>
</button>
</span>
</div>
</form></span>';
$items .= '</li>';
}
return $items;
}
add_filter('wp_nav_menu_items','add_search_to_wp_menu',10,2);


/*---------------------------------------------------------------------
* Switch default core markup for search form, comment form, and comments
* to output valid HTML5.
----------------------------------------------------------------------*/
add_theme_support( 'html5', array(
'search-form',
'comment-form',
'comment-list',
'gallery',
'caption',
) );

/*----------------------------------------------------------------------
* Enable support for Post Formats.
* See https://developer.wordpress.org/themes/functionality/post-formats/
-----------------------------------------------------------------------*/
add_theme_support( 'post-formats', array(
'aside',
'image',
'video',
'quote',
'link',
'gallery',
'status',
'audio',
'chat',
) );
/**---------------------------------------------------------------------
 * Register widget area.
--------------------------------------------------------------------- */
function kevinkissi_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'kevinkissi' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	//Footer widget areas
	$widget_areas = get_theme_mod('footer_widget_areas', '3');
	for ($i=1; $i<=$widget_areas; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer ', 'kevinkissi' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}

}
add_action( 'widgets_init', 'kevinkissi_widgets_init' );
/*-----------------------------------------------------------------------------------*/
/* Customizing the entry meta
/*-----------------------------------------------------------------------------------*/
 //* Customize the entry meta in the entry footer (requires HTML5 theme support)
add_filter( 'kevinkissi_post_meta', 'kevinkissi_post_meta_filter' );
function sp_post_meta_filter($post_meta) {
$post_meta = '[post_categories] | [post_tags]';
return $post_meta;
}
//* Remove the entry footer markup (requires HTML5 theme support)
remove_action( 'kevinkissi_entry_footer', 'kevinkissi_entry_footer_markup_open', 5 );
remove_action( 'kevinkissi_entry_footer', 'kevinkissi_entry_footer_markup_close', 15 );
// Set up the WordPress core custom background feature.
add_theme_support( 'custom-background', apply_filters( 'kevinkissi_custom_background_args', array(
'default-color' => 'ffffff',
'default-image' => '',
) ) );
}
endif; // kevinkissi_setup
add_action( 'after_setup_theme', 'kevinkissi_setup' );

/*-----------------------------------------------------------------------------------*/
/* social share
/*-----------------------------------------------------------------------------------*/
function kevinkissi_social_sharing_buttons($content) {
	if(is_singular("articles") || is_singular("flow") ){

		// Get current page URL
		$kevinkissiURL = get_permalink();

		// Get current page title
		$kevinkissiTitle = str_replace( ' ', '%20', get_the_title());

		// Get Post Thumbnail for pinterest
		$kevinkissiThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(  ) );

		// Construct sharing URL without using any script
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$kevinkissiTitle.'&amp;url='.$kevinkissiURL.'&amp;via=KevinKissi';
		$facebookURL = 'https://www.facebook.com/dialog/share?app_id=1310744145609056&amp;display=popup&amp;href='.$kevinkissiURL.'&amp;redirect_uri= '.$kevinkissiURL;
//            https://www.facebook.com/sharer/sharer.php?u='.$kevinkissiURL;
		$googleURL = 'https://plus.google.com/share?url='.$kevinkissiURL;
//		$bufferURL = 'https://bufferapp.com/add?url='.$kevinkissiURL.'&amp;text='.$kevinkissiTitle;
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$kevinkissiURL.'&amp;media='.$kevinkissiThumbnail[0].'&amp;description='.$kevinkissiTitle;

//		 Add sharing button at the end of page/page content
//	    $testg = 'onclick="javascript:window.open(this.href, '', ';
//        $testg1='menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600';
//        $testg2=' );return false;"><img src="https://www.gstatic.com/images/icons/gplus-64.png" alt="Share on Google+"';
//        $googlep= $testg . $testg1 . $testg2;

		$content .= '<div class="kevinkissi-social"><hr>';
		$content .= '<span class="">Share article on</span> <a class="kevinkissi-link kevinkissi-twitter" href="'. $twitterURL .'" target="_blank"><span style="color:#55acee"><i class="fa fa-twitter"></i></span></a> <span class="social-divider">&nbsp</span> ';
		$content .= '<a class="kevinkissi-link kevinkissi-facebook" href="'.$facebookURL.'" target="_blank"><span style="color:#3B5998"><i class="fa fa-facebook-official"></i></span></a> <span class="social-divider">&nbsp</span> ';
		$content .= '<a class="kevinkissi-link kevinkissi-googleplus" href="'.$googleURL.'" target="_blank"><span style="color:#DC4E41"><i class="fa fa-google-plus"></i></span></a>'; 
//        <span class="social-divider">|</span> ';
//		$content .= '<a class="kevinkissi-link kevinkissi-buffer" href="'.$bufferURL.'" target="_blank">Buffer</a>';
		$content .= '<a class="kevinkissi-link kevinkissi-pinterest" href="'.$pinterestURL.'" target="_blank"><span style="color:#bd081c;"><i class="fa fa-pinterest"></i></span></a>';
		$content .= '</div>';

		return $content;
	}else{
		// if not a post/page then don't include sharing button
		return $content;
	}
};
add_filter( 'the_content', 'kevinkissi_social_sharing_buttons');
//==============================================================


/*---------------------------------------------------------------------------------------*/
/* Archive Title
/*---------------------------------------------------------------------------------------*/
// Return an alternate title, without prefix, for every type used in the get_the_archive_title().
add_filter('get_the_archive_title', function ($title) {
if ( is_category() ) {
$title = single_cat_title( '', false );
} elseif ( is_tag() ) {
$title = single_tag_title( '', false );
} elseif ( is_author() ) {
$title = '<span class="vcard">' . get_the_author() . '</span>';
} elseif ( is_year() ) {
$title = get_the_date( _x( 'Y', 'yearly archives date format' ) );
} elseif ( is_month() ) {
$title = get_the_date( _x( 'F Y', 'monthly archives date format' ) );
} elseif ( is_day() ) {
$title = get_the_date( _x( 'F j, Y', 'daily archives date format' ) );
} 

elseif ( is_post_type_archive() ) {
$title = post_type_archive_title( '', false );
} 
else {
$title = __( 'Archives' );
}
return $title;
});

//=============================================================
// Allowed Commenting Tags
//=============================================================
function allow_data_event_content() {
global $allowedposttags, $allowedtags;

$allowedtags["pre"] = array(
"class" => array(),
"data-start" => array(),
"data-line" => array(),    
);

$allowedtags["code"] = array(
"class" => array(),
);

$allowedtags["img"] = array(
"src" => array(),
);    
}
add_action( 'init', 'allow_data_event_content' );
remove_filter('the_content', 'wptexturize');
//=============================================================
// Richtex Commenting
//=============================================================
add_filter( 'comment_form_field_comment', 'comment_editor' );

function comment_editor() {
global $post;

wp_editor(
'',
'comment',
array(
'textarea_rows' => 15,
'quicktags' => false,

'tinymce'=> array(

'toolbar1'=> 'bold, italic, strikethrough, link, undo, redo, blockquote, visualblocks, prismjsbutton, eqneditor, fullscreen',

'toolbar2' => '',    

'statusbar' => false, 

),

'wpautop' => false,  

));

}

//-----------------------------------------------
function my_mce_external_plugins() {
    
$plugins['visualblocks'] = get_stylesheet_directory_uri() . '/tinymce/plugins/visualblocks/plugin.js';
//$plugins['preview'] = get_stylesheet_directory_uri() . '/tinymce/plugins/preview/plugin.js';

$plugins['eqneditor'] = get_stylesheet_directory_uri() . '/tinymce/plugins/eqneditor/plugin.js';     
    
$plugins['prismjsbutton'] = get_stylesheet_directory_uri() . '/tinymce/plugins/prismjsbutton/js/wp-prismjs.js';      
    
return $plugins;

}
add_filter('mce_external_plugins', 'my_mce_external_plugins');

function my_mce_buttons($buttons) {
/**
* Add in a core button that's disabled by default
*/
$buttons[] = 'visualblocks';

$buttons[] = 'eqneditor';    

$buttons[] = 'prismjsbutton';   

return $buttons;
}
add_filter('mce_buttons', 'my_mce_buttons');

//====================================================================
// Default comment form: name, email address and website URL
//==================================================================

add_filter('comment_form_default_fields', 'custom_fields');
function custom_fields($fields) {

$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$fields[ 'author' ] = '<div class="col-md-3">' .
//      
'<input id="author" class="comment-author-name" placeholder="Full Name" name="author" type="text" value="'. esc_attr( $commenter['comment_author'] ) .
'" size="30" tabindex="1"' . $aria_req . ' /></div>';

$fields[ 'email' ] = '<div class="col-md-3">'.

'<input id="email" class="comment-author-email" placeholder="Email Address" name="email" type="text" value="'. esc_attr( $commenter['comment_author_email'] ) .
'" size="30"  tabindex="2"' . $aria_req . ' /></div>';

$fields[ 'url' ] = '<div class="col-md-3">' .
//       
'<input id="url" class="comment-author-url" placeholder="Website Url" name="url" type="text" value="'. esc_attr( $commenter['comment_author_url'] ) .
'" size="30"  tabindex="3" /></div>';

  return $fields;
}


/*-----------------------------------------------------------------------------------*/
/* Enqueue Js & Css
/*-----------------------------------------------------------------------------------*/

function kevinkissi_scripts() {
/*============ Styles ============ */
wp_enqueue_style( 'Lato', 'https://fonts.googleapis.com/css?family=Lato');

if ( is_front_page() || is_home() ) {
//wp_enqueue_style( 'kevinkissi-style', get_stylesheet_uri() );
wp_enqueue_style( 'stylefront', get_template_directory_uri() . '/stylefront.css');    
/*============ Javascripts ============ */
wp_enqueue_script( 'corefront', get_template_directory_uri() . '/js/corefront.min.js', array(), '03062016', true );
}

if ( is_page("blog") ) {
wp_enqueue_style( 'styleblog', get_template_directory_uri() . '/styleblog.css');
/*============ Javascripts ============ */
wp_enqueue_script( 'coreblog', get_template_directory_uri() . '/js/coreblog.min.js', array(), '03062016', true );
wp_enqueue_script( 'kevinkissi-bootstrapjs', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
}
        
if ( is_page("portfolio") || is_archive("portfolio")  || is_page("readings") ) {
wp_enqueue_style( 'styleportfolio', get_template_directory_uri() . '/styleportfolio.css');
/*============ Javascripts ============ */
wp_enqueue_script( 'coreportfolio', get_template_directory_uri() . '/js/coreportfolio.min.js', array(), '03062016', true );
wp_enqueue_script( 'kevinkissi-bootstrapjs', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
}
    
if ( is_singular("articles") ) {
//wp_enqueue_style( 'stylearticles', get_template_directory_uri() . '/stylearticles.css');
///*============ Javascripts ============ */
//wp_enqueue_script( 'corearticles', get_template_directory_uri() . '/js/corearticles.min.js', array(), '03062016', true );
wp_enqueue_style( 'styleflow', get_template_directory_uri() . '/styleflow.css');
/*============ Javascripts ============ */
wp_enqueue_script( 'coreflow', get_template_directory_uri() . '/js/coreflow.min.js', array(), '03062016', true );
}   

    
if ( is_singular("flow") ) {
wp_enqueue_style( 'styleflow', get_template_directory_uri() . '/styleflow.css');
/*============ Javascripts ============ */
wp_enqueue_script( 'coreflow', get_template_directory_uri() . '/js/coreflow.min.js', array(), '03062016', true );
}   
    
//if (is_page('flow')) {
   if ( is_page('flow') ) {
wp_enqueue_style( 'styleflow', get_template_directory_uri() . '/styleflow.css');
/*============ Javascripts ============ */
wp_enqueue_script( 'coreflow', get_template_directory_uri() . '/js/coreflow.min.js', array(), '03062016', true );
}   
       
if ( is_search() ) {
wp_enqueue_style( 'stylesearch', get_template_directory_uri() . '/stylesearch.css');
/*============ Javascripts ============ */
wp_enqueue_script( 'coresearch', get_template_directory_uri() . '/js/coresearch.min.js', array(), '03062016', true );
}  
    
if (is_404() || is_page("articles") ) {
wp_enqueue_style( 'style404', get_template_directory_uri() . '/style404.css');
/*============ Javascripts ============ */
wp_enqueue_script( 'core404', get_template_directory_uri() . '/js/core404.min.js', array(), '03062016', true );
}   
    
}
add_action( 'wp_enqueue_scripts', 'kevinkissi_scripts' );



//  Activate jQuery and jQuery Dependents
function kevinkissi_init() {
if (!is_admin()) {

//		Deregister
wp_deregister_script('jquery');

//		Register Google Api jquery
wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', false, '1.11.0', false);

//enque jquery
		wp_enqueue_script('jquery');

}
}
add_action('init', 'kevinkissi_init');


//==================================================================
//Allows me to show excerpts instead of full post content and control how many characters are displayed.
//==============================================
 function get_excerpt($count){
   // $permalink = get_permalink($post->ID);
   $excerpt = get_the_content();
   // $excerpt = get_the_content('&raquo; &raquo; &raquo; &raquo; Read more');
   $excerpt = strip_tags($excerpt);
   $excerpt = substr($excerpt, 0, $count);
   $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
   $excerpt = $excerpt.'...';
   return $excerpt;
 }


/*-----------------------------------------------------------------------------------*/
/* Adding custom field to the readings post screen
/*-----------------------------------------------------------------------------------*/

function add_readings_metaboxes() {
	add_meta_box('wpt_readings_currentcount', 'Reading Status', 'wpt_readings_currentcount', 'readings', 'normal', 'high');
}

// The Event Location Metabox

function wpt_readings_currentcount() {
	global $post;

	// Noncename needed to verify where the data originated
	echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

	// Get the currentcount data if its already been entered
	$current_count = get_post_meta($post->ID, '_currentcount', true);
        $total_count = get_post_meta($post->ID, '_totalpages', true);
         $read_date = get_post_meta($post->ID, '_readdate', true);

	// Echo out the field
        echo '<p>Enter current page number:</p>';
	echo '<input type="text" name="_currentcount" value="' . $current_count  . '" class="widefat" />';
        echo '<p>How many pages are there?</p>';
        echo '<input type="text" name="_totalpages" value="' . $total_count  . '" class="widefat" />';
    echo '<p> When is the date of reading completion? Format: [Month, Year]</p>';
        echo '<input type="text" name="_readdate" value="' . $read_date  . '" class="widefat" />';

}


// Save the Metabox Data

function wpt_save_readings_meta($post_id, $post) {

	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times

//  producing error in admin area :eventmeta_noncename in C:\xampp\htdocs\WP\wp-content\themes\kevinkissi-gulp\build\functions.php on line 358

//    added ( !isset( $_POST['eventmeta_noncename'] ) ||
	if ( !isset( $_POST['eventmeta_noncename'] ) ||  !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
	return $post->ID;
	}

	// Is the user allowed to edit the post or page?
	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;

	// OK, we're authenticated: we need to find and save the data
	// We'll put it into an array to make it easier to loop though.

	$readings_meta['_currentcount'] = $_POST['_currentcount'];
    $readings_meta['_totalpages'] = $_POST['_totalpages'];
    $readings_meta['_readdate'] = $_POST['_readdate'];

	// Add values of $readings_meta as custom fields

	foreach ($readings_meta as $key => $value) { // Cycle through the $readings_meta array!
		if( $post->post_type == 'revision' ) return; // Don't store custom data twice
		$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
	}

}

//add_action('save_post', 'wpt_save_readings_meta');
add_action('save_post', 'wpt_save_readings_meta', 1, 2); // save the custom fields


/*-----------------------------------------------------------------------------------*/
/* Adding custom field to the portfolio post screen
/*-----------------------------------------------------------------------------------*/

function add_portfolio_metaboxes() {
	add_meta_box('wpt_portfolio_projectlink', 'Project Link', 'wpt_portfolio_projectlink', 'portfolio', 'normal', 'high');
}

// The Event Location Metabox

function wpt_portfolio_projectlink() {
	global $post;

	// Noncename needed to verify where the data originated
	echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

	// Get the projectlink data if its already been entered
	$project_link = get_post_meta($post->ID, '_projectlink', true);
//        $total_count = get_post_meta($post->ID, '_totalpages', true);

	// Echo out the field
        echo '<p>Enter a project link value:</p>';
	echo '<input type="text" name="_projectlink" value="' . $project_link  . '" class="widefat" />';

}


// Save the Metabox Data

function wpt_save_portfolio_meta($post_id, $post) {



//  producing error in admin area :eventmeta_noncename in C:\xampp\htdocs\WP\wp-content\themes\kevinkissi-gulp\build\functions.php on line 358

//    added ( !isset( $_POST['eventmeta_noncename'] ) ||
	if ( !isset( $_POST['eventmeta_noncename'] ) ||  !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
	return $post->ID;
	}

	// Is the user allowed to edit the post or page?
	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;

	// OK, we're authenticated: we need to find and save the data
	// We'll put it into an array to make it easier to loop though.

	$portfolio_meta['_projectlink'] = $_POST['_projectlink'];


	// Add values of $portfolio_meta as custom fields

	foreach ($portfolio_meta as $key => $value) { // Cycle through the $portfolio_meta array!
		if( $post->post_type == 'revision' ) return; // Don't store custom data twice
		$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
	}

}

//add_action('save_post', 'wpt_save_portfolio_meta');
add_action('save_post', 'wpt_save_portfolio_meta', 1, 2); // save the custom fields


/*-----------------------------------------------------------------------------------*/
/* Register  Taxonomy
/*-----------------------------------------------------------------------------------*/

// Articles Taxonomy =================================================
$about_labels = array(
    'name'               => _x( 'About', 'post type general name', 'kevinkissi' ),
    'singular_name'      => _x( 'About', 'post type singular name', 'kevinkissi' ),
    'menu_name'          => _x( 'About', 'admin menu', 'kevinkissi' ),
    'name_admin_bar'     => _x( 'About', 'add new on admin bar', 'kevinkissi' ),
    'add_new'            => _x( 'Add New', 'About', 'kevinkissi' ),
    'add_new_item'       => __( 'Add New About', 'kevinkissi' ),
    'new_item'           => __( 'New About', 'kevinkissi' ),
    'edit_item'          => __( 'Edit About', 'kevinkissi' ),
    'view_item'          => __( 'View About', 'kevinkissi' ),
    'all_items'          => __( 'All About', 'kevinkissi' ),
    'search_items'       => __( 'Search About', 'kevinkissi' ),
    'parent_item_colon'  => __( 'Parent About:', 'kevinkissi' ),
    'not_found'          => __( 'No About found.', 'kevinkissi' ),
    'not_found_in_trash' => __( 'No About found in Trash.', 'kevinkissi' ),
);

$about_args = array(
    'labels'             => $about_labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'about' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'editor', 'thumbnail' )
);

register_post_type( 'about', $about_args );

// Portfolio Taxonomy ==========================================
$p_labels = array(
    'name'               => _x( 'Portfolio', 'post type general name', 'kevinkissi' ),
    'singular_name'      => _x( 'Portfolio', 'post type singular name', 'kevinkissi' ),
    'menu_name'          => _x( 'Portfolio', 'admin menu', 'kevinkissi' ),
    'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'kevinkissi' ),
    'add_new'            => _x( 'Add New', 'Portfolio', 'kevinkissi' ),
    'add_new_item'       => __( 'Add New Portfolio', 'kevinkissi' ),
    'new_item'           => __( 'New Portfolio', 'kevinkissi' ),
    'edit_item'          => __( 'Edit Portfolio', 'kevinkissi' ),
    'view_item'          => __( 'View Portfolio', 'kevinkissi' ),
    'all_items'          => __( 'All Portfolios', 'kevinkissi' ),
    'search_items'       => __( 'Search Portfolio', 'kevinkissi' ),
    'parent_item_colon'  => __( 'Parent Portfolio:', 'kevinkissi' ),
    'not_found'          => __( 'No Portfolio found.', 'kevinkissi' ),
    'not_found_in_trash' => __( 'No Portfolio found in Trash.', 'kevinkissi' ),
); 

$p_args = array(
    'labels'             => $p_labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'portfolio' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    'register_meta_box_cb' => 'add_portfolio_metaboxes'
);

register_post_type( 'portfolio', $p_args );

// Articles Taxonomy =================================================
$articles_labels = array(
    'name'               => _x( 'Articles', 'post type general name', 'kevinkissi' ),
    'singular_name'      => _x( 'Articles', 'post type singular name', 'kevinkissi' ),
    'menu_name'          => _x( 'Articles', 'admin menu', 'kevinkissi' ),
    'name_admin_bar'     => _x( 'Articles', 'add new on admin bar', 'kevinkissi' ),
    'add_new'            => _x( 'Add New', 'Articles', 'kevinkissi' ),
    'add_new_item'       => __( 'Add New Articles', 'kevinkissi' ),
    'new_item'           => __( 'New Articles', 'kevinkissi' ),
    'edit_item'          => __( 'Edit Articles', 'kevinkissi' ),
    'view_item'          => __( 'View Articles', 'kevinkissi' ),
    'all_items'          => __( 'All Articles', 'kevinkissi' ),
    'search_items'       => __( 'Search Articles', 'kevinkissi' ),
    'parent_item_colon'  => __( 'Parent Articles:', 'kevinkissi' ),
    'not_found'          => __( 'No Articles found.', 'kevinkissi' ),
    'not_found_in_trash' => __( 'No Articles found in Trash.', 'kevinkissi' ),
);

$articles_args = array(
    'labels'             => $articles_labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'articles' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
);

register_post_type( 'articles', $articles_args );


// Readings Taxonomy ================================================
$read_labels = array(
    'name'               => _x( 'Readings', 'post type general name', 'kevinkissi' ),
    'singular_name'      => _x( 'Readings', 'post type singular name', 'kevinkissi' ),
    'menu_name'          => _x( 'Readings', 'admin menu', 'kevinkissi' ),
    'name_admin_bar'     => _x( 'Readings', 'add new on admin bar', 'kevinkissi' ),
    'add_new'            => _x( 'Add New', 'Readings', 'kevinkissi' ),
    'add_new_item'       => __( 'Add New Readings', 'kevinkissi' ),
    'new_item'           => __( 'New Readings', 'kevinkissi' ),
    'edit_item'          => __( 'Edit Readings', 'kevinkissi' ),
    'view_item'          => __( 'View Readings', 'kevinkissi' ),
    'all_items'          => __( 'All Readings', 'kevinkissi' ),
    'search_items'       => __( 'Search Readings', 'kevinkissi' ),
    'parent_item_colon'  => __( 'Parent Readings:', 'kevinkissi' ),
    'not_found'          => __( 'No Readings found.', 'kevinkissi' ),
    'not_found_in_trash' => __( 'No Readings found in Trash.', 'kevinkissi' ),
//    'register_meta_box_cb' => 'add_readings_metaboxes',
);

$read_args = array(
    'labels'             => $read_labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'readings' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
//			'menu_position' => 5,
			'register_meta_box_cb' => 'add_readings_metaboxes'
);

register_post_type( 'readings', $read_args );
//register_taxonomy( 'readings_cat', array( 'readings' ), $tax_args );

// Flow Taxonomy ====================================================

$flow_labels = array(
    'name'               => _x( 'Flow', 'post type general name', 'kevinkissi' ),
    'singular_name'      => _x( 'Flow', 'post type singular name', 'kevinkissi' ),
    'menu_name'          => _x( 'Flow', 'admin menu', 'kevinkissi' ),
    'name_admin_bar'     => _x( 'Flow', 'add new on admin bar', 'kevinkissi' ),
    'add_new'            => _x( 'Add New', 'Flow', 'kevinkissi' ),
    'add_new_item'       => __( 'Add New Flow', 'kevinkissi' ),
    'new_item'           => __( 'New Flow', 'kevinkissi' ),
    'edit_item'          => __( 'Edit Flow', 'kevinkissi' ),
    'view_item'          => __( 'View Flow', 'kevinkissi' ),
    'all_items'          => __( 'All Flow', 'kevinkissi' ),
    'search_items'       => __( 'Search Flow', 'kevinkissi' ),
    'parent_item_colon'  => __( 'Parent Flow:', 'kevinkissi' ),
    'not_found'          => __( 'No Flow found.', 'kevinkissi' ),
    'not_found_in_trash' => __( 'No Flow found in Trash.', 'kevinkissi' ),
);

$flow_args = array(
    'labels'             => $flow_labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'flow' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'trackbacks', 'post-formats' )
);

register_post_type( 'flow', $flow_args );

// Category ================================================

$tax_labels = array(
    'name'              => _x( 'Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Categories', 'kevinkissi' ),
    'all_items'         => __( 'All Categories', 'kevinkissi' ),
    'parent_item'       => __( 'Parent Category', 'kevinkissi' ),
    'parent_item_colon' => __( 'Parent Category:', 'kevinkissi' ),
    'edit_item'         => __( 'Edit Category', 'kevinkissi' ),
    'update_item'       => __( 'Update Category', 'kevinkissi' ),
    'add_new_item'      => __( 'Add New Category', 'kevinkissi' ),
    'new_item_name'     => __( 'New Category Name', 'kevinkissi' ),
    'menu_name'         => __( 'Category', 'kevinkissi' ),
);

$tax_args = array(
    'hierarchical'      => true,
    'labels'            => $tax_labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'portfolio-cat',
                                  'slug2' => 'articles_cat',
                                  'slug3' => 'readings-cat',
                                  'slug4' =>   'flow_cat' ),
);

register_taxonomy( 'portfolio_cat', array( 'portfolio' ), $tax_args );
//register_taxonomy( 'articles_cat', array( 'articles' ), $tax_args );
register_taxonomy( 'readings_cat', array( 'readings' ), $tax_args );
register_taxonomy( 'flow_cat', array( 'flow' ), $tax_args );



// Tags ================================================

$tags_labels = array(
    'name'              => _x( 'tags', 'taxonomy general name' ),
    'singular_name'     => _x( 'tags', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Tags', 'kevinkissi' ),
    'all_items'         => __( 'All Tags', 'kevinkissi' ),
    'parent_item'       => __( 'Parent Tags', 'kevinkissi' ),
    'parent_item_colon' => __( 'Parent Tags:', 'kevinkissi' ),
    'edit_item'         => __( 'Edit Tags', 'kevinkissi' ),
    'update_item'       => __( 'Update Tags', 'kevinkissi' ),
    'add_new_item'      => __( 'Add New Tags', 'kevinkissi' ),
    'new_item_name'     => __( 'New Tags Name', 'kevinkissi' ),
    'menu_name'         => __( 'Tags', 'kevinkissi' ),
);

$tags_args = array(
    'hierarchical'      => true,
    'labels'            => $tags_labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'articles_tag')

);

register_taxonomy( 'articles_tag', array( 'articles' ), $tags_args );


// Skills ================================================

$skills_labels = array(
    'name'              => _x( 'Skills', 'taxonomy general name' ),
    'singular_name'     => _x( 'Skills', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Skills', 'kevinkissi' ),
    'all_items'         => __( 'All Skills', 'kevinkissi' ),
    'parent_item'       => __( 'Parent Skills', 'kevinkissi' ),
    'parent_item_colon' => __( 'Parent Skills:', 'kevinkissi' ),
    'edit_item'         => __( 'Edit Skills', 'kevinkissi' ),
    'update_item'       => __( 'Update Skills', 'kevinkissi' ),
    'add_new_item'      => __( 'Add New Skills', 'kevinkissi' ),
    'new_item_name'     => __( 'New Skills Name', 'kevinkissi' ),
    'menu_name'         => __( 'Skills', 'kevinkissi' ),
);

$skills_args = array(
    'hierarchical'      => true,
    'labels'            => $skills_labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,


    'rewrite'           => array( 'slug' => 'portfolio_skills')

);

register_taxonomy( 'portfolio_skills', array( 'portfolio' ), $skills_args );


/*---------------------------------------------------------------------------------------*/
/* Portfolio Panel
/*---------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio leaders Title: Add Meta Field
/*-----------------------------------------------------------------------------------*/

       function taxonomy_add_new_meta_field_leader_title() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[leadertitle]"><?php _e( 'Leadership Role', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[leadertitle]" id="term_meta[leadertitle]" value="">
			<p class="description"><?php _e( 'Enter a title value.','kevinkissi' ); ?></p>
		</div>
	<?php
	}
  add_action( 'portfolio_leader_add_form_fields', 'taxonomy_add_new_meta_field_leader_title');
  add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_leader_title');

	function taxonomy_edit_meta_field_leader_title($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[leadertitle]"><?php _e( 'Leadership Role', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[leadertitle]" id="term_meta[leadertitle]" value="<?php echo esc_attr( $term_meta['leadertitle'] ) ? esc_attr( $term_meta['leadertitle'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a title value.','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	} 
add_action( 'portfolio_leader_edit_form_fields', 'taxonomy_edit_meta_field_leader_title');

    
	function save_taxonomy_custom_meta_leader_title( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$leader_keys = array_keys( $_POST['term_meta'] );
			foreach ( $leader_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 
  add_action( 'edited_portfolio_leader', 'save_taxonomy_custom_meta_leader_title' );  
  add_action( 'create_portfolio_leader', 'save_taxonomy_custom_meta_leader_title');
    
/*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio leaders Date: Add Meta Field
/*-----------------------------------------------------------------------------------*/
	
       function taxonomy_add_new_meta_field_leader_date() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[leaderdate]"><?php _e( 'Leadership Dates', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[leaderdate]" id="term_meta[leaderdate]" value="">
			<p class="description"><?php _e( 'Enter a dates value in the form: [Start Month, Start Year to End Month, End Year].','kevinkissi' ); ?></p>
		</div>
	<?php
	}
  add_action( 'portfolio_leader_add_form_fields', 'taxonomy_add_new_meta_field_leader_date');
  add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_leader_date');

	function taxonomy_edit_meta_field_leader_date($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[leaderdate]"><?php _e( 'Leadership Dates', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[leaderdate]" id="term_meta[leaderdate]" value="<?php echo esc_attr( $term_meta['leaderdate'] ) ? esc_attr( $term_meta['leaderdate'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a dates value in the form: [Start Month, Start Year to End Month, End Year].','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	} 
add_action( 'portfolio_leader_edit_form_fields', 'taxonomy_edit_meta_field_leader_date');

    
	function save_taxonomy_custom_meta_leader_date( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$leader_keys = array_keys( $_POST['term_meta'] );
			foreach ( $leader_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 
  add_action( 'edited_portfolio_leader', 'save_taxonomy_custom_meta_leader_date' );  
  add_action( 'create_portfolio_leader', 'save_taxonomy_custom_meta_leader_date');
  
/*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio leaders organization: Add Meta Field
/*-----------------------------------------------------------------------------------*/
	
       function taxonomy_add_new_meta_field_leader_organization() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[leaderorganization]"><?php _e( 'Organization/Capacity', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[leaderorganization]" id="term_meta[leaderorganization]" value="">
			<p class="description"><?php _e( 'Enter a organization value.','kevinkissi' ); ?></p>
		</div>
	<?php
	}
  add_action( 'portfolio_leader_add_form_fields', 'taxonomy_add_new_meta_field_leader_organization');
  add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_leader_organization');

	function taxonomy_edit_meta_field_leader_organization($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[leaderorganization]"><?php _e( 'Organization/Capacity', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[leaderorganization]" id="term_meta[leaderorganization]" value="<?php echo esc_attr( $term_meta['leaderorganization'] ) ? esc_attr( $term_meta['leaderorganization'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a organization value.','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	} 
add_action( 'portfolio_leader_edit_form_fields', 'taxonomy_edit_meta_field_leader_organization');

    
	function save_taxonomy_custom_meta_leader_organization( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$leader_keys = array_keys( $_POST['term_meta'] );
			foreach ( $leader_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 
  add_action( 'edited_portfolio_leader', 'save_taxonomy_custom_meta_leader_organization' );  
  add_action( 'create_portfolio_leader', 'save_taxonomy_custom_meta_leader_organization');
  
/*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio Leaders Division: Add Meta Field
/*-----------------------------------------------------------------------------------*/
	
       function taxonomy_add_new_meta_field_leader_division() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[leaderdivision]"><?php _e( 'Chapter/Division', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[leaderdivision]" id="term_meta[leaderdivision]" value="">
			<p class="description"><?php _e( 'Enter a division value.','kevinkissi' ); ?></p>
		</div>
	<?php
	}
  add_action( 'portfolio_leader_add_form_fields', 'taxonomy_add_new_meta_field_leader_division');
  add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_leader_division');

	function taxonomy_edit_meta_field_leader_division($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[leaderdivision]"><?php _e( 'Chapter/Division', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[leaderdivision]" id="term_meta[leaderdivision]" value="<?php echo esc_attr( $term_meta['leaderdivision'] ) ? esc_attr( $term_meta['leaderdivision'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a division value.','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	} 
add_action( 'portfolio_leader_edit_form_fields', 'taxonomy_edit_meta_field_leader_division');

    
	function save_taxonomy_custom_meta_leader_division( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$leader_keys = array_keys( $_POST['term_meta'] );
			foreach ( $leader_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 
  add_action( 'edited_portfolio_leader', 'save_taxonomy_custom_meta_leader_division' );  
  add_action( 'create_portfolio_leader', 'save_taxonomy_custom_meta_leader_division');
    
  
// ======================================================
// leader Call Functions
// =========================================================
function get_leader_date($leaderdate_id){
$term_meta = get_option( "taxonomy_{$leaderdate_id}" );
return $term_meta['leaderdate'];
}

function get_leader_organization($leaderorganization_id){
$term_meta = get_option( "taxonomy_{$leaderorganization_id}" );
return $term_meta['leaderorganization'];
}

function get_leader_division($leaderdivision_id){
$term_meta = get_option( "taxonomy_{$leaderdivision_id}" );
return $term_meta['leaderdivision'];
}

function get_leader_title($leadertitle_id){
$term_meta = get_option( "taxonomy_{$leadertitle_id}" );
return $term_meta['leadertitle'];
}

// ======================================================
// Leader Taxonomy
// =========================================================
$leader_labels = array(
    'name'              => _x( 'Leadership', 'taxonomy general name' ),
    'singular_name'     => _x( 'Leadership', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Leadership', 'kevinkissi' ),
    'all_items'         => __( 'All Leadership', 'kevinkissi' ),
    'parent_item'       => __( 'Parent Leadership', 'kevinkissi' ),
    'parent_item_colon' => __( 'Parent Leadership:', 'kevinkissi' ),
    'edit_item'         => __( 'Edit Leadership', 'kevinkissi' ),
    'update_item'       => __( 'Update Leadership', 'kevinkissi' ),
    'add_new_item'      => __( 'Add New Leadership', 'kevinkissi' ),
    'new_item_name'     => __( 'New Leadership Name', 'kevinkissi' ),
    'menu_name'         => __( 'Leadership Engagements', 'kevinkissi' ),
);

$leader_args = array(
    'hierarchical'      => true,
    'labels'            => $leader_labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    
        
    'rewrite'           => array( 'slug' => 'portfolio_leader')
                                
);

register_taxonomy( 'portfolio_leader', array( 'portfolio' ), $leader_args );
 /*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio conferences Date: Add Meta Field
/*-----------------------------------------------------------------------------------*/
	
       function taxonomy_add_new_meta_field_conference_date() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[conferencedate]"><?php _e( 'Conference Date', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[conferencedate]" id="term_meta[conferencedate]" value="">
			<p class="description"><?php _e( 'Enter a date value in the form of Month Day, Year.','kevinkissi' ); ?></p>
		</div>
	<?php
	}
  add_action( 'portfolio_conference_add_form_fields', 'taxonomy_add_new_meta_field_conference_date');
  add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_conference_date');

	function taxonomy_edit_meta_field_conference_date($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[conferencedate]"><?php _e( 'Conference Date', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[conferencedate]" id="term_meta[conferencedate]" value="<?php echo esc_attr( $term_meta['conferencedate'] ) ? esc_attr( $term_meta['conferencedate'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a date value in the form of Month Day, Year.','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	} 
add_action( 'portfolio_conference_edit_form_fields', 'taxonomy_edit_meta_field_conference_date');

    
	function save_taxonomy_custom_meta_conference_date( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$conference_keys = array_keys( $_POST['term_meta'] );
			foreach ( $conference_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 
  add_action( 'edited_portfolio_conference', 'save_taxonomy_custom_meta_conference_date' );  
  add_action( 'create_portfolio_conference', 'save_taxonomy_custom_meta_conference_date');
  
  
  /*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio conferences Location: Add Meta Field
/*-----------------------------------------------------------------------------------*/
	
       function taxonomy_add_new_meta_field_conference_location() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[conferencelocation]"><?php _e( 'Conference Location', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[conferencelocation]" id="term_meta[conferencelocation]" value="">
			<p class="description"><?php _e( 'Enter a location value in the form of Institution, City, State (Abr.), Country (Abr.).','kevinkissi' ); ?></p>
		</div>
	<?php
	}
  add_action( 'portfolio_conference_add_form_fields', 'taxonomy_add_new_meta_field_conference_location');
  add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_conference_location');

	function taxonomy_edit_meta_field_conference_location($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[conferencelocation]"><?php _e( 'Conference Location', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[conferencelocation]" id="term_meta[conferencelocation]" value="<?php echo esc_attr( $term_meta['conferencelocation'] ) ? esc_attr( $term_meta['conferencelocation'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a location value in the form of Institution, City, State (Abr.), Country(Abr.).','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	} 
add_action( 'portfolio_conference_edit_form_fields', 'taxonomy_edit_meta_field_conference_location');

    
	function save_taxonomy_custom_meta_conference_location( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$conference_keys = array_keys( $_POST['term_meta'] );
			foreach ( $conference_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 
  add_action( 'edited_portfolio_conference', 'save_taxonomy_custom_meta_conference_location' );  
  add_action( 'create_portfolio_conference', 'save_taxonomy_custom_meta_conference_location');
  
// ======================================================
// conference Call Functions
// =========================================================
function get_conference_date($conferencedate_id){
$term_meta = get_option( "taxonomy_{$conferencedate_id}" );
return $term_meta['conferencedate'];
}

function get_conference_location($conferencelocation_id){
$term_meta = get_option( "taxonomy_{$conferencelocation_id}" );
return $term_meta['conferencelocation'];
}


// ======================================================
// Conference Taxonomy
// =========================================================
$conference_labels = array(
    'name'              => _x( 'Conference', 'taxonomy general name' ),
    'singular_name'     => _x( 'Conference', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Conference', 'kevinkissi' ),
    'all_items'         => __( 'All Conference', 'kevinkissi' ),
    'parent_item'       => __( 'Parent Conference', 'kevinkissi' ),
    'parent_item_colon' => __( 'Parent Conferences:', 'kevinkissi' ),
    'edit_item'         => __( 'Edit Conferences', 'kevinkissi' ),
    'update_item'       => __( 'Update Conferences', 'kevinkissi' ),
    'add_new_item'      => __( 'Add New Conferences', 'kevinkissi' ),
    'new_item_name'     => __( 'New Conferences Name', 'kevinkissi' ),
    'menu_name'         => __( 'Conferences', 'kevinkissi' ),
);

$conference_args = array(
    'hierarchical'      => true,
    'labels'            => $conference_labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    
        
    'rewrite'           => array( 'slug' => 'portfolio_conference')
                                
);

register_taxonomy( 'portfolio_conference', array( 'portfolio' ), $conference_args );

/*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio Talks Title: Add Meta Field
/*-----------------------------------------------------------------------------------*/
	
       function taxonomy_add_new_meta_field_talk_title() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[talktitle]"><?php _e( 'Talk Title', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[talktitle]" id="term_meta[talktitle]" value="">
			<p class="description"><?php _e( 'Enter a title value in the form of Institution, City, State, Country.','kevinkissi' ); ?></p>
		</div>
	<?php
	}
  add_action( 'portfolio_talk_add_form_fields', 'taxonomy_add_new_meta_field_talk_title');
  add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_talk_title');

	function taxonomy_edit_meta_field_talk_title($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[talktitle]"><?php _e( 'Talk Title', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[talktitle]" id="term_meta[talktitle]" value="<?php echo esc_attr( $term_meta['talktitle'] ) ? esc_attr( $term_meta['talktitle'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a title value in the form of Institution, City, State, Country, Year.','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	} 
add_action( 'portfolio_talk_edit_form_fields', 'taxonomy_edit_meta_field_talk_title');

    
	function save_taxonomy_custom_meta_talk_title( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$talk_keys = array_keys( $_POST['term_meta'] );
			foreach ( $talk_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 
  add_action( 'edited_portfolio_talk', 'save_taxonomy_custom_meta_talk_title' );  
  add_action( 'create_portfolio_talk', 'save_taxonomy_custom_meta_talk_title');
    
        
    
/*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio Talks Date: Add Meta Field
/*-----------------------------------------------------------------------------------*/
	
       function taxonomy_add_new_meta_field_talk_date() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[talkdate]"><?php _e( 'Talk Date', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[talkdate]" id="term_meta[talkdate]" value="">
			<p class="description"><?php _e( 'Enter a date value in the form of Month Day, Year.','kevinkissi' ); ?></p>
		</div>
	<?php
	}
  add_action( 'portfolio_talk_add_form_fields', 'taxonomy_add_new_meta_field_talk_date');
  add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_talk_date');

	function taxonomy_edit_meta_field_talk_date($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[talkdate]"><?php _e( 'Talk Date', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[talkdate]" id="term_meta[talkdate]" value="<?php echo esc_attr( $term_meta['talkdate'] ) ? esc_attr( $term_meta['talkdate'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a date value in the form of Month Day, Year.','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	} 
add_action( 'portfolio_talk_edit_form_fields', 'taxonomy_edit_meta_field_talk_date');

    
	function save_taxonomy_custom_meta_talk_date( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$talk_keys = array_keys( $_POST['term_meta'] );
			foreach ( $talk_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 
  add_action( 'edited_portfolio_talk', 'save_taxonomy_custom_meta_talk_date' );  
  add_action( 'create_portfolio_talk', 'save_taxonomy_custom_meta_talk_date');
  
  
  /*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio Talks Location: Add Meta Field
/*-----------------------------------------------------------------------------------*/
	
       function taxonomy_add_new_meta_field_talk_location() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[talklocation]"><?php _e( 'Talk Location', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[talklocation]" id="term_meta[talklocation]" value="">
			<p class="description"><?php _e( 'Enter a location value in the form of Institution, City, State (Abr.), Country (Abr.).','kevinkissi' ); ?></p>
		</div>
	<?php
	}
  add_action( 'portfolio_talk_add_form_fields', 'taxonomy_add_new_meta_field_talk_location');
  add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_talk_location');

	function taxonomy_edit_meta_field_talk_location($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[talklocation]"><?php _e( 'Talk Location', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[talklocation]" id="term_meta[talklocation]" value="<?php echo esc_attr( $term_meta['talklocation'] ) ? esc_attr( $term_meta['talklocation'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a location value in the form of Institution, City, State (Abr.), Country(Abr.).','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	} 
add_action( 'portfolio_talk_edit_form_fields', 'taxonomy_edit_meta_field_talk_location');

    
	function save_taxonomy_custom_meta_talk_location( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$talk_keys = array_keys( $_POST['term_meta'] );
			foreach ( $talk_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 
  add_action( 'edited_portfolio_talk', 'save_taxonomy_custom_meta_talk_location' );  
  add_action( 'create_portfolio_talk', 'save_taxonomy_custom_meta_talk_location');
  
  /*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio Talks source: Add Meta Field
/*-----------------------------------------------------------------------------------*/
	
       function taxonomy_add_new_meta_field_talk_source() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[talksource]"><?php _e( 'Talk Source', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[talksource]" id="term_meta[talksource]" value="">
			<p class="description"><?php _e( 'Enter a source value in the form of Institution, City, State (Abr.), Country (Abr.).','kevinkissi' ); ?></p>
		</div>
	<?php
	}
  add_action( 'portfolio_talk_add_form_fields', 'taxonomy_add_new_meta_field_talk_source');
  add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_talk_source');

	function taxonomy_edit_meta_field_talk_source($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[talksource]"><?php _e( 'Talk Source', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[talksource]" id="term_meta[talksource]" value="<?php echo esc_attr( $term_meta['talksource'] ) ? esc_attr( $term_meta['talksource'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a source value in the form of Institution, City, State (Abr.), Country(Abr.).','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	} 
add_action( 'portfolio_talk_edit_form_fields', 'taxonomy_edit_meta_field_talk_source');

    
	function save_taxonomy_custom_meta_talk_source( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$talk_keys = array_keys( $_POST['term_meta'] );
			foreach ( $talk_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 
  add_action( 'edited_portfolio_talk', 'save_taxonomy_custom_meta_talk_source' );  
  add_action( 'create_portfolio_talk', 'save_taxonomy_custom_meta_talk_source');
   
  
// ======================================================
// Talk Call Functions
// =========================================================
function get_talk_title($talktitle_id){
$term_meta = get_option( "taxonomy_{$talktitle_id}" );
return $term_meta['talktitle'];
}

function get_talk_date($talkdate_id){
$term_meta = get_option( "taxonomy_{$talkdate_id}" );
return $term_meta['talkdate'];
}

function get_talk_location($talklocation_id){
$term_meta = get_option( "taxonomy_{$talklocation_id}" );
return $term_meta['talklocation'];
}

function get_talk_source($talksource_id){
$term_meta = get_option( "taxonomy_{$talksource_id}" );
return $term_meta['talksource'];
} 

// ======================================================
// Talk Taxonomy
// =========================================================
$talk_labels = array(
    'name'              => _x( 'Talk', 'taxonomy general name' ),
    'singular_name'     => _x( 'Talk', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Talk', 'kevinkissi' ),
    'all_items'         => __( 'All Talk', 'kevinkissi' ),
    'parent_item'       => __( 'Parent Talk', 'kevinkissi' ),
    'parent_item_colon' => __( 'Parent Talk:', 'kevinkissi' ),
    'edit_item'         => __( 'Edit Talk', 'kevinkissi' ),
    'update_item'       => __( 'Update Talk', 'kevinkissi' ),
    'add_new_item'      => __( 'Add New Talk', 'kevinkissi' ),
    'new_item_name'     => __( 'New Talk Name', 'kevinkissi' ),
    'menu_name'         => __( 'Talks', 'kevinkissi' ),
);

$talk_args = array(
    'hierarchical'      => true,
    'labels'            => $talk_labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    
        
    'rewrite'           => array( 'slug' => 'portfolio_talk')
                                
);

register_taxonomy( 'portfolio_talk', array( 'portfolio' ), $talk_args );

/*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio Papers Journal: Add Meta Field
/*-----------------------------------------------------------------------------------*/

       function taxonomy_add_new_meta_field_paper_journal() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[paperjournal]"><?php _e( 'Journal Name', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[paperjournal]" id="term_meta[paperjournal]" value="">
			<p class="description"><?php _e( 'Enter a journal value where paper is published' ); ?></p>
		</div>
	<?php
	}
  add_action( 'portfolio_paper_add_form_fields', 'taxonomy_add_new_meta_field_paper_journal');
  add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_paper_journal');

	function taxonomy_edit_meta_field_paper_journal($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[paperjournal]"><?php _e( 'Journal Name', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[paperjournal]" id="term_meta[paperjournal]" value="<?php echo esc_attr( $term_meta['paperjournal'] ) ? esc_attr( $term_meta['paperjournal'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a journal value in the form of Institution, City, State, Country, Year.','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	} 
add_action( 'portfolio_paper_edit_form_fields', 'taxonomy_edit_meta_field_paper_journal');

    
	function save_taxonomy_custom_meta_paper_journal( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$paper_keys = array_keys( $_POST['term_meta'] );
			foreach ( $paper_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 
  add_action( 'edited_portfolio_paper', 'save_taxonomy_custom_meta_paper_journal' );  
  add_action( 'create_portfolio_paper', 'save_taxonomy_custom_meta_paper_journal');
    
        
  
/*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio papers Date: Add Meta Field
/*-----------------------------------------------------------------------------------*/
	
       function taxonomy_add_new_meta_field_paper_date() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[paperdate]"><?php _e( 'Paper Publication/Archive Date', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[paperdate]" id="term_meta[paperdate]" value="">
			<p class="description"><?php _e( 'Enter a date value in the form of Month Day, Year.','kevinkissi' ); ?></p>
		</div>
	<?php
	}
  add_action( 'portfolio_paper_add_form_fields', 'taxonomy_add_new_meta_field_paper_date');
  add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_paper_date');

	function taxonomy_edit_meta_field_paper_date($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[paperdate]"><?php _e( 'Paper Publication/Archive Date', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[paperdate]" id="term_meta[paperdate]" value="<?php echo esc_attr( $term_meta['paperdate'] ) ? esc_attr( $term_meta['paperdate'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a date value in the form of Month Day, Year.','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	} 
add_action( 'portfolio_paper_edit_form_fields', 'taxonomy_edit_meta_field_paper_date');

    
	function save_taxonomy_custom_meta_paper_date( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$paper_keys = array_keys( $_POST['term_meta'] );
			foreach ( $paper_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 
  add_action( 'edited_portfolio_paper', 'save_taxonomy_custom_meta_paper_date' );  
  add_action( 'create_portfolio_paper', 'save_taxonomy_custom_meta_paper_date');
  

/*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio papers status: Add Meta Field
/*-----------------------------------------------------------------------------------*/
	
       function taxonomy_add_new_meta_field_paper_status() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[paperstatus]"><?php _e( 'Paper Status', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[paperstatus]" id="term_meta[paperstatus]" value="">
			<p class="description"><?php _e( 'Enter a status value.','kevinkissi' ); ?></p>
		</div>
	<?php
	}
  add_action( 'portfolio_paper_add_form_fields', 'taxonomy_add_new_meta_field_paper_status');
  add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_paper_status');

	function taxonomy_edit_meta_field_paper_status($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[paperstatus]"><?php _e( 'Paper status', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[paperstatus]" id="term_meta[paperstatus]" value="<?php echo esc_attr( $term_meta['paperstatus'] ) ? esc_attr( $term_meta['paperstatus'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a status value.','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	} 
add_action( 'portfolio_paper_edit_form_fields', 'taxonomy_edit_meta_field_paper_status');

    
	function save_taxonomy_custom_meta_paper_status( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$paper_keys = array_keys( $_POST['term_meta'] );
			foreach ( $paper_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 
  add_action( 'edited_portfolio_paper', 'save_taxonomy_custom_meta_paper_status' );  
  add_action( 'create_portfolio_paper', 'save_taxonomy_custom_meta_paper_status');
  

/*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio papers source: Add Meta Field
/*-----------------------------------------------------------------------------------*/
	
       function taxonomy_add_new_meta_field_paper_source() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[papersource]"><?php _e( 'Paper Source', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[papersource]" id="term_meta[papersource]" value="">
			<p class="description"><?php _e( 'Enter a source value in the form of Institution, City, State (Abr.), Country (Abr.).','kevinkissi' ); ?></p>
		</div>
	<?php
	}
  add_action( 'portfolio_paper_add_form_fields', 'taxonomy_add_new_meta_field_paper_source');
  add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_paper_source');

	function taxonomy_edit_meta_field_paper_source($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[papersource]"><?php _e( 'Paper Source', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[papersource]" id="term_meta[papersource]" value="<?php echo esc_attr( $term_meta['papersource'] ) ? esc_attr( $term_meta['papersource'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a source value in the form of Institution, City, State (Abr.), Country(Abr.).','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	} 
add_action( 'portfolio_paper_edit_form_fields', 'taxonomy_edit_meta_field_paper_source');

    
	function save_taxonomy_custom_meta_paper_source( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$paper_keys = array_keys( $_POST['term_meta'] );
			foreach ( $paper_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 
  add_action( 'edited_portfolio_paper', 'save_taxonomy_custom_meta_paper_source' );  
  add_action( 'create_portfolio_paper', 'save_taxonomy_custom_meta_paper_source');
   
  
// ======================================================
// paper Call Functions
// =========================================================
function get_paper_journal($paperjournal_id){
$term_meta = get_option( "taxonomy_{$paperjournal_id}" );
return $term_meta['paperjournal'];
}

function get_paper_date($paperdate_id){
$term_meta = get_option( "taxonomy_{$paperdate_id}" );
return $term_meta['paperdate'];
}

function get_paper_status($paperstatus_id){
$term_meta = get_option( "taxonomy_{$paperstatus_id}" );
return $term_meta['paperstatus'];
}

function get_paper_source($papersource_id){
$term_meta = get_option( "taxonomy_{$papersource_id}" );
return $term_meta['papersource'];
} 

// ======================================================
// paper Taxonomy
// =========================================================
$paper_labels = array(
    'name'              => _x( 'Paper', 'taxonomy general name' ),
    'singular_name'     => _x( 'Paper', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Paper', 'kevinkissi' ),
    'all_items'         => __( 'All Paper', 'kevinkissi' ),
    'parent_item'       => __( 'Parent Paper', 'kevinkissi' ),
    'parent_item_colon' => __( 'Parent paper:', 'kevinkissi' ),
    'edit_item'         => __( 'Edit Paper', 'kevinkissi' ),
    'update_item'       => __( 'Update Paper', 'kevinkissi' ),
    'add_new_item'      => __( 'Add New Paper', 'kevinkissi' ),
    'new_item_name'     => __( 'New Paper Name', 'kevinkissi' ),
    'menu_name'         => __( 'Papers', 'kevinkissi' ),
);

$paper_args = array(
    'hierarchical'      => true,
    'labels'            => $paper_labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    
        
    'rewrite'           => array( 'slug' => 'portfolio_paper')
                                
);

register_taxonomy( 'portfolio_paper', array( 'portfolio' ), $paper_args );

 /*-----------------------------------------------------------------------------------*/
/* Taxonomy Portfolio skillss ratings: Add Meta Field
/*-----------------------------------------------------------------------------------*/
	
       function taxonomy_add_new_meta_field_skills_ratings() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[skillsratings]"><?php _e( 'Skills ratings', 'kevinkissi' ); ?></label>
			<input type="text" name="term_meta[skillsratings]" id="term_meta[skillsratings]" value="">
			<p class="description"><?php _e( 'Enter a ratings numerical values between 1 and 100.','kevinkissi' ); ?></p>
		</div>
	<?php
	}
  add_action( 'portfolio_skills_add_form_fields', 'taxonomy_add_new_meta_field_skills_ratings');
  add_action( 'genres_add_form_fields', 'taxonomy_add_new_meta_field_skills_ratings');

	function taxonomy_edit_meta_field_skills_ratings($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[skillsratings]"><?php _e( 'Skills ratings', 'kevinkissi' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[skillsratings]" id="term_meta[skillsratings]" value="<?php echo esc_attr( $term_meta['skillsratings'] ) ? esc_attr( $term_meta['skillsratings'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a ratings numerical values between 1 and 100.','kevinkissi' ); ?></p>
			</td>
		</tr>
	<?php
	} 
add_action( 'portfolio_skills_edit_form_fields', 'taxonomy_edit_meta_field_skills_ratings');

    
	function save_taxonomy_custom_meta_skills_ratings( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$skills_keys = array_keys( $_POST['term_meta'] );
			foreach ( $skills_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 
  add_action( 'edited_portfolio_skills', 'save_taxonomy_custom_meta_skills_ratings' );  
  add_action( 'create_portfolio_skills', 'save_taxonomy_custom_meta_skills_ratings');
  
// ======================================================
// Skills Call Functions
// =========================================================
function get_skills_ratings($skillsratings_id){
$term_meta = get_option( "taxonomy_{$skillsratings_id}" );
return $term_meta['skillsratings'];
}

// ======================================================
// Skills Taxonomy
// =========================================================
$skills_labels = array(
    'name'              => _x( 'Skills', 'taxonomy general name' ),
    'singular_name'     => _x( 'Skills', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Skills', 'kevinkissi' ),
    'all_items'         => __( 'All Skills', 'kevinkissi' ),
    'parent_item'       => __( 'Parent Skills', 'kevinkissi' ),
    'parent_item_colon' => __( 'Parent Skills:', 'kevinkissi' ),
    'edit_item'         => __( 'Edit Skills', 'kevinkissi' ),
    'update_item'       => __( 'Update Skills', 'kevinkissi' ),
    'add_new_item'      => __( 'Add New Skills', 'kevinkissi' ),
    'new_item_name'     => __( 'New Skills Name', 'kevinkissi' ),
    'menu_name'         => __( 'Skills', 'kevinkissi' ),
);

$skills_args = array(
    'hierarchical'      => true,
    'labels'            => $skills_labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
           
    'rewrite'           => array( 'slug' => 'portfolio_skills')                               
);

register_taxonomy( 'portfolio_skills', array( 'portfolio' ), $skills_args );

//==================================================
//require get_template_directory() . '/taxonomy-fields/taxonomy-fields.php';
//require get_template_directory() . '/taxonomy-fields/Tax-meta-class/Tax-meta-class.php';
//
////Get the correct taxonomy ID by slug
//$term = get_term_by('portfolio_talk', "");
//$term->addText($prefix.'text_field_id',array('name'=> __('My Text ','tax-meta'),'desc' => 'this is a field desription'));
////Get Taxonomy Meta
//$saved_data = get_tax_meta($term->term_id,'text_field_id');
//echo $saved_data;
/*-----------------------------------------------------------------------------------*/
/* Get Taxonomy Icon
/*-----------------------------------------------------------------------------------*/
function get_tax_icon($tax_id){
    $term_meta = get_option( "taxonomy_{$tax_id}" );
    return '<i class="fa '.$term_meta['icon'].'"></i>';
}


/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image except in Multisite signup and activate pages.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 * 7. Featured content layout.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */


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
//require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// fontawesome icons list
//require_once( get_template_directory()  . '/inc/fontawesome-icons.php');

//Google Fonts
//require_once( get_template_directory()  . '/inc/googlefonts.php');

// nav walker
//require_once( get_template_directory()  . '/inc/navwalker.php');

//require_once( get_template_directory()  . '/inc/mobile-navwalker.php');
