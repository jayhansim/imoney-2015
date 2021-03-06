<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
  External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
  Theme Support
\*------------------------------------*/

if (function_exists('add_theme_support'))
{
  // Add Menu Support
  add_theme_support('menus');

  // Add Thumbnail Theme Support
  add_theme_support('post-thumbnails');
  add_image_size('large', 800, '', true); // Large Thumbnail
  add_image_size('medium', 300, '', true); // Medium Thumbnail
  add_image_size('small', 200, '', true); // Small Thumbnail
  //add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

  // Add Support for Custom Backgrounds - Uncomment below if you're going to use
  /*add_theme_support('custom-background', array(
  'default-color' => 'FFF',
  'default-image' => get_template_directory_uri() . '/img/bg.jpg'
  ));*/

  // Add Support for Custom Header - Uncomment below if you're going to use
  /*add_theme_support('custom-header', array(
  'default-image'     => get_template_directory_uri() . '/img/headers/default.jpg',
  'header-text'     => false,
  'default-text-color'    => '000',
  'width'       => 1000,
  'height'      => 198,
  'random-default'    => false,
  'wp-head-callback'    => $wphead_cb,
  'admin-head-callback'   => $adminhead_cb,
  'admin-preview-callback'  => $adminpreview_cb
  ));*/

  // Enables post and comment RSS feed links to head
  add_theme_support('automatic-feed-links');

  // Localisation Support
  load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}
// function html5(){
//     add_theme_support( 'html5', array(
//         'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
//     ) );
// }
// add_action( 'after_setup_theme', 'html5' );


/*------------------------------------*\
  Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
  wp_nav_menu(
  array(
  'theme_location'  => 'header-menu',
  'menu'            => '',
  'container'       => 'div',
  'container_class' => 'menu-{menu slug}-container',
  'container_id'    => '',
  'menu_class'      => 'menu',
  'menu_id'         => '',
  'echo'            => true,
  'fallback_cb'     => 'wp_page_menu',
  'before'          => '',
  'after'           => '',
  'link_before'     => '',
  'link_after'      => '',
  'items_wrap'      => '<ul>%3$s</ul>',
  'depth'           => 0,
  'walker'          => ''
  )
  );
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
  wp_deregister_script('jquery');
  wp_register_script('jquery', "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js", false, '1.11.3', false);

  wp_register_script('basejs', get_template_directory_uri() . '/js/base.min.js', array('jquery'), '', false); // base
  wp_enqueue_script('basejs'); // Enqueue it!
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
  if (is_page('pagenamehere')) {
    wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
    wp_enqueue_script('scriptname'); // Enqueue it!
  }
}

// Load HTML5 Blank styles
function html5blank_styles()
{
  wp_register_style('basecss', get_template_directory_uri() . '/css/base.css', array(), '1.0', 'all');
  wp_enqueue_style('basecss'); // Enqueue it!

  if(is_singular('home-buying-guide')) {
    wp_register_style('hbgcss', get_template_directory_uri() . '/css/hbg.css', array(), '1.0', 'all');
    wp_enqueue_style('hbgcss'); // Enqueue it!
  }
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
  register_nav_menus(array( // Using array to specify more menus if needed
    'header-menu' => __('Header Menu'), // Main Navigation
    'sidebar-menu' => __('Sidebar Menu'), // Sidebar Navigation
    'footer-menu' => __('Footer Menu'),
    'overlay-menu' => __('Overlay Menu'),
    'overlay-menu-bm' => __('Overlay Menu BM')
  ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
  $args['container'] = false;
  return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
  return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
  return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
// function add_slug_to_body_class($classes)
// {
//     global $post;
//     if (is_home()) {
//         $key = array_search('blog', $classes);
//         if ($key > -1) {
//             unset($classes[$key]);
//         }
//     } elseif (is_page()) {
//         $classes[] = sanitize_html_class($post->post_name);
//     } elseif (is_singular()) {
//         $classes[] = sanitize_html_class($post->post_name);
//     }

//     return $classes;
// }

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
  // Main Sidebar
  register_sidebar(array(
    'name' => __('Main Sidebar', 'html5blank'),
    'description' => __('Widget area for Main Sidebar', 'html5blank'),
    'id' => 'sidebar',
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h5>',
    'after_title' => '</h5>'
  ));

  // Featured Focus Topic
  register_sidebar(array(
    'name' => __('Featured Topic', 'html5blank'),
    'description' => __('Featured topic on front page', 'html5blank'),
    'id' => 'featured-topic',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h5>',
    'after_title' => '</h5>'
  ));

  // Leaderboard
  register_sidebar(array(
    'name' => __('Leaderboard', 'html5blank'),
    'description' => __('Leaderboard ad', 'html5blank'),
    'id' => 'leaderboard',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h5>',
    'after_title' => '</h5>'
  ));

  // Home Buying Guide
  register_sidebar(array(
    'name' => __('Home Buying Guide', 'html5blank'),
    'description' => __('Home Buying Guide Sidebar', 'html5blank'),
    'id' => 'home-buying-guide',
    'before_widget' => '<div id="%1$s" class="%1$s %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h5>',
    'after_title' => '</h5>'
  ));
}

// Remove wp_head() injected Recent Comment styles
// function my_remove_recent_comments_style()
// {
//     global $wp_widget_factory;
//     remove_action('wp_head', array(
//         $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
//         'recent_comments_style'
//     ));
// }

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
  global $wp_query;
  $big = 999999999;
  echo paginate_links(array(
    'base' => str_replace($big, '%#%', get_pagenum_link($big)),
    'format' => '?paged=%#%',
    'mid_size' => 2,
    // 'prev_next' => false,
    'prev_text' => __('&lsaquo; Prev '),
    'next_text' => __('Next &rsaquo;'),
    'current' => max(1, get_query_var('paged')),
    'total' => $wp_query->max_num_pages
  ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
  return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
  return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
  global $post;
  if (function_exists($length_callback)) {
    add_filter('excerpt_length', $length_callback);
  }
  if (function_exists($more_callback)) {
    add_filter('excerpt_more', $more_callback);
  }
  $output = get_the_excerpt();
  $output = apply_filters('wptexturize', $output);
  $output = apply_filters('convert_chars', $output);
  $output = '<p>' . $output . '</p>';
  echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
  global $post;
  return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
// function remove_admin_bar()
// {
//     return false;
// }

// Remove 'text/css' from our enqueued stylesheet
// function html5_style_remove($tag)
// {
//     return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
// }

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
// function remove_thumbnail_dimensions( $html )
// {
//     $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
//     return $html;
// }

/*------------------------------------*\
  Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('wp_enqueue_scripts', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
//add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
//add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
//add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
// remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
// remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
// remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
// remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
// remove_action('wp_head', 'index_rel_link'); // Index link
// remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
// remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
// remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
// remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
// remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
// remove_action('wp_head', 'rel_canonical');
// remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
//add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
//add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
//add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
//add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
//add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
// add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
// add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
//remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
// add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
// add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.
// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
  ShortCode Functions
\*------------------------------------*/

// block shortcode
function imoney_block($atts, $content = null) {
  extract(shortcode_atts(array(
    'title' => '',
    'type' => ''
  ), $atts));

  if(empty($type)) {
    if(empty($title)) {
      return '<div class="block">' .
      '<div>' . $content .'</div></div>';
    } else {
      return '<div class="block">' .
      '<div class="block__title">' . $title . '</div>' . '<div>' . $content .'</div></div>';
    }
  } else {
    if(empty($title)) {
      return '<div class="block block--' . esc_attr($type) . '">' .
        '<div>' . $content .'</div></div>';
    } else {
      return '<div class="block block--' . esc_attr($type) . '">' .
        '<div class="block__title">' . $title . '</div>' . '<div>' . $content .'</div></div>';
    }

  }
}

add_shortcode('block', 'imoney_block');

// product shortcode
function imoney_product_insertion($atts, $content = null) {
  extract(shortcode_atts(array(
    'image' => 'http://placehold.it/160x100',
    'name' => 'Product Name',
    'feature' => 'Product feature in one line',
    'link' => '#',
    'cta' => '#',
    'promo' => '',
  ), $atts));

  return
    '<div class="product ' . esc_attr($promo) . '">' .
    '<div class="product__image"><img src="' . esc_attr($image) . '" alt="' . esc_attr($name) . '"></div>' .
    '<div class="product__description"><h4><a href="' . esc_attr($link) . '" target="_blank">' . $name . '</a></h4>' .
    '<p>' . $content . '</p><em>' . $feature . '</em></div>' .
    '<div class="product__cta"><a href="' . esc_attr($cta) . '" target="_blank" class="btn btn-lg btn-apply">Apply Now</a></div>' .
    '</div>';
}

add_shortcode('product', 'imoney_product_insertion');

// <div class="product promo">
// <div class="product__image"><img src="http://placehold.it/160x100" alt=""></div>
// <div class="product__description">
// <h4><a href="#">Citibank Rewards Platinum Card</a></h4>
// <p>Earn 1000 miles for every RM1,280 spent</p>
// <em>Interest Rate (p.a): 8.88%, FREE annual fee</em>
// </div>
// <div class="product__cta"><a href="#" class="btn btn-lg btn-apply">Apply Now</a></div>
// </div>
// Shortcode Demo with Nested Capability
// function html5_shortcode_demo($atts, $content = null)
// {
//     return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
// }

// Shortcode Demo with simple <h2> tag
// function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
// {
//     return '<h2>' . $content . '</h2>';
// }

?>
