<?php

function dream_caribbean_stylesheets() {
wp_enqueue_style('style', get_stylesheet_uri() );

wp_enqueue_style('bootstrap', get_theme_file_uri('/css/bootstrap.min.css'));
wp_enqueue_style('body', get_theme_file_uri('/css/sections/body.css'));
wp_enqueue_style('nav', get_theme_file_uri('/css/sections/nav.css'));
wp_enqueue_style('popup', get_theme_file_uri('/css/sections/popup.css'));
wp_enqueue_style('hero', get_theme_file_uri('/css/sections/hero.css'));
wp_enqueue_style('contact', get_theme_file_uri('/css/sections/contact.css'));
wp_enqueue_style('img', get_theme_file_uri('/css/elements/img.css'));

// if(is_front_page()){
	wp_enqueue_style('home', get_theme_file_uri('/css/sections/home.css'));
// }
if(is_page_template('templates/about.php')){
	wp_enqueue_style('about-custom', get_theme_file_uri('/css/sections/about.css'));
	wp_enqueue_style('intro', get_theme_file_uri('/css/sections/intro.css'));
}
if( is_page_template('templates/content-page.php' ) ){
	wp_enqueue_style('content-page', get_theme_file_uri('/css/sections/content-page.css'));
}
if(is_single() || is_page_template('templates/blog.php') || is_archive() || is_category() || is_tag() || is_404() ) {
wp_enqueue_style('blog', get_theme_file_uri('/css/sections/blog.css'));
}

wp_enqueue_style('photo-gallery', get_theme_file_uri('/css/sections/photo-gallery.css'));
wp_enqueue_style('footer', get_theme_file_uri('/css/sections/footer.css'));
wp_enqueue_style('sidebar', get_theme_file_uri('/css/sections/sidebar.css'));
wp_enqueue_style('social-icons', get_theme_file_uri('/css/sections/social-icons.css'));
wp_enqueue_style('btn', get_theme_file_uri('/css/elements/btn.css'));
// fonts
wp_enqueue_style('fonts', get_theme_file_uri('/css/elements/fonts.css'));
wp_enqueue_style('proxima-nova', get_theme_file_uri('/proxima-nova/proxima-nova.css'));
// wp_enqueue_style('blair-itc', get_theme_file_uri('/blair-itc/blair-itc.css'));
// wp_enqueue_style('aspira', get_theme_file_uri('/aspira-font/aspira-font.css'));
wp_enqueue_style('cormorant', '//use.typekit.net/elg3wqv.css');
wp_enqueue_style('minion', '//use.typekit.net/drb4vig.css');


}
add_action('wp_enqueue_scripts', 'dream_caribbean_stylesheets');
// for footer
function dream_caribbean_stylesheets_footer() {
	// wp_enqueue_style('style-footer', get_theme_file_uri('/css/style-footer.css'));
	// owl carousel
	wp_enqueue_style('owl.carousel.min', get_theme_file_uri('/owl-carousel/owl.carousel.min.css'));
	wp_enqueue_style('owl.theme.default', get_theme_file_uri('/owl-carousel/owl.theme.default.min.css'));
	wp_enqueue_style('lightbox-css', get_theme_file_uri('/lightbox/lightbox.min.css'));
	// wp_enqueue_script('font-awesome', '//use.fontawesome.com/fff80caa08.js');

	// owl carousel
	wp_enqueue_script('jquery-min', get_theme_file_uri('/owl-carousel/jquery.min.js'));
	wp_enqueue_script('owl-carousel', get_theme_file_uri('/owl-carousel/owl.carousel.min.js'));
	wp_enqueue_script('owl-carousel-custom', get_theme_file_uri('/owl-carousel/owl-carousels.js'));
	wp_enqueue_script('lightbox-min-js', get_theme_file_uri('/lightbox/lightbox.min.js'));
	wp_enqueue_script('lightbox-js', get_theme_file_uri('/lightbox/lightbox.js'));

    // aos
    // wp_enqueue_script('aos-js', get_theme_file_uri('/aos/aos.js'));
    // wp_enqueue_script('aos-custom-js', get_theme_file_uri('/aos/aos-custom.js'));
    // wp_enqueue_style('aos-css', get_theme_file_uri('/aos/aos.css'));

	// jquery fittext
	// wp_enqueue_script('jquery-min-js', get_theme_file_uri('/jquery-fittext/jquery.min.js'));
    // wp_enqueue_script('jquery-fittext', get_theme_file_uri('/jquery-fittext/jquery.fittext.js'));
    // wp_enqueue_script('jquery-fittext-custom', get_theme_file_uri('/jquery-fittext/fittext.js'));

	// jquery modal
	// wp_enqueue_script('jquery-modal-js', get_theme_file_uri('/jquery-modal/jquery.modal.min.js'));
	// wp_enqueue_style('jquery-modal-css', get_theme_file_uri('/jquery-modal/jquery.modal.min.css'));
	// wp_enqueue_style('custom-modal', get_theme_file_uri('/jquery-modal/modal-custom.css'));
    // general
	// if(!is_front_page()){
		wp_enqueue_script('nav-js', get_theme_file_uri('/js/nav.js'));
	// }
	
	wp_enqueue_script('popup-js', get_theme_file_uri('/js/popup.js'));
	wp_enqueue_script('main-js', get_theme_file_uri('/js/main.js'));
	
	if(is_single()){
		wp_enqueue_script('blog-js', get_theme_file_uri('/js/blog.js'));
		}
	}
	
add_action('get_footer', 'dream_caribbean_stylesheets_footer');

// loads enqueued javascript files deferred
function mind_defer_scripts( $tag, $handle, $src ) {
	$defer = array( 
	  'jquery-min',
	  'owl-carousel',
	  'owl-carousel-custom',
	  'lightbox-min-js',
	  'lightbox-js',
	  'aos-js',
	  'aos-custom-js',
	  'nav-js',
	  'blog-js',
	  'contact-js'
	);
	if ( in_array( $handle, $defer ) ) {
	   return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
	}
	  
	  return $tag;
  } 
  add_filter( 'script_loader_tag', 'mind_defer_scripts', 10, 3 );

function dream_caribbean_menus() {
 register_nav_menus( array(
   'primary' => __( 'Primary' )));
register_nav_menus( array(
'secondary' => __( 'Secondary' )));
 register_nav_menu('footer',__( 'Footer' ));
 add_theme_support('title-tag');
 add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'dream_caribbean_menus');

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();
}

// removes gutenberg styles from all pages but the blog posts
function smartwp_remove_wp_block_library_css(){

	if(!is_single()) {
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wp-block-library-theme' );
		wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
	}
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

// add_filter('show_admin_bar', '__return_false');

// add_filter('comment_form_default_fields', 'remove_website_field_from_comment_form');
function remove_website_field_from_comment_form($fields)
{
    if (isset($fields['url'])) {
        unset($fields['url']);
    }
    return $fields;
}

/*Base URL shorcode*/
add_shortcode( 'base_url', 'baseurl_shortcode' );
function baseurl_shortcode( $atts ) {

    return site_url();
	// [base_url]

}

function divider_shortcode( $atts, $content = null ) {

	$a = shortcode_atts( array(

		'class' => '',

		'style' => ''

	), $atts );

	return '<div class="divider ' . esc_attr($a['class']) . '" style="' . esc_attr($a['style']) . '"></div>';

	// [divider class="" style=""]
}

add_shortcode( 'divider', 'divider_shortcode' );

function btn_shortcode( $atts, $content = null ) {

	$a = shortcode_atts( array(
	
	'class' => '',
	
	'href' => '',
	
	'style' => '',
	
	'target' => '',

	'id' => ''
	
	), $atts );
	
	// return '<a class="btn-accent-primary" href="' . esc_attr($a['href']) . '" target="' . esc_attr($a['target']) . '">' . $content . '</a>';

	$button = "";

	$button .= '<a class="btn-main d-inline-block pt-2 pb-2 pl-4 pr-4 bg-accent-secondary text-white bold ls-2 small ' . esc_attr($a['class']) . '" href="' . esc_attr($a['href']) . '" style="transition:all .25s ease-in-out;box-shadow:0px 3px 3px rgba(0,0,0,.25);border:1px solid #b0bcbf;' . esc_attr($a['style']) . '" target="' . esc_attr($a['target']) . '" id="' . esc_attr($a['id']) . '">';

	$button .= '<span class="pt-1 pb-1 pl-5 pr-5 d-inline-block" style="border:1px solid white;">';
	$button .= $content;

	$button .= '</span>';
	$button .= '</a>';
	
	return $button;
	
	// [button href="#" class="btn-main" style=""]Learn More[/button]
	
	}
	
	add_shortcode( 'button', 'btn_shortcode' );

	function btn_span_shortcode( $atts, $content = null ) {

	$a = shortcode_atts( array(
	
	'class' => '',
	
	'style' => '',
	
	'target' => '',

	'id' => ''
	
	), $atts );
	
	// return '<a class="btn-accent-primary" href="' . esc_attr($a['href']) . '" target="' . esc_attr($a['target']) . '">' . $content . '</a>';

	$button = "";

	$button .= '<div class="btn-main d-inline-block pt-2 pb-2 pl-4 pr-4 bg-accent-secondary text-white bold ls-2 small ' . esc_attr($a['class']) . '" style="transition:all .25s ease-in-out;box-shadow:0px 3px 3px rgba(0,0,0,.25);border:1px solid #b0bcbf;' . esc_attr($a['style']) . '" target="' . esc_attr($a['target']) . '" id="' . esc_attr($a['id']) . '">';

	$button .= '<span class="pt-1 pb-1 pl-5 pr-5 d-inline-block" style="border:1px solid white;">';
	$button .= $content;

	$button .= '</span>';
	$button .= '</div>';
	
	return $button;
	
	// [buttonmodal class="btn-main" style=""]Learn More[/buttonmodal]
	
	}
	
	add_shortcode( 'buttonmodal', 'btn_span_shortcode' );

function spacer_shortcode( $atts, $content = null ) {

	$a = shortcode_atts( array(

		'class' => '',

		'style' => ''

	), $atts );

	return '<div class="spacer ' . esc_attr($a['class']) . '" style="' . esc_attr($a['style']) . '"></div>';

	// [spacer class="" style=""]
}

add_shortcode( 'spacer', 'spacer_shortcode' );

function titles_with_border( $atts, $content = null ) {

	$a = shortcode_atts( array(

		'class' => '',

		'style' => '',

		'pretitle' => '',

		'title' => ''

	), $atts );

	$output = "";

	$output .= '<div class="d-inline-block pl-4 pr-4" style="border-left:2px solid #33fff8;border-right: 2px solid #33fff8;letter-spacing:.2em;">';
    $output .= '<span class="h6 d-block">' . esc_attr($a['pretitle']) . '</span>';
    $output .= '<h2 class="cormorant-garamond h1">' . esc_attr($a['title']) . '</h2>';
    $output .= '</div>';

	return $output;

	// [special_titles pretitle="" title=""]
}

add_shortcode( 'special_titles', 'titles_with_border' );

function pricing_table_shortcode( $atts, $content = null ) {

	$a = shortcode_atts( array(

		'class' => '',

		'style' => ''

	), $atts );

	$pricingTable = "";

	if(have_rows('pricing_table_repeater')):
		$pricingTable .= '<table class="pricing-table mb-4 ' . esc_attr($a['class']) . '" style="' . esc_attr($a['style']) . '">';
		$pricingTable .= '<tbody>';
			$pricingTable .= '<tr>';
			$pricingTable .= '<th>GUESTS</th>';
			$pricingTable .= '<th>FULL-BOARD USD/WEEK</th>';
			$pricingTable .= '</tr>';
		$pricingTableCounter = 0;
		while(have_rows('pricing_table_repeater')): the_row();
		$pricingTableCounter++;

		// if($pricingTableCounter == 1){
		// 	$pricingTable .= '<tr>';
		// 	$pricingTable .= '<th>' . get_sub_field('left_column') . '</th>';
		// 	$pricingTable .= '<th>' . get_sub_field('right_column') . '</th>';
		// 	$pricingTable .= '</tr>';
		// } else {
			$pricingTable .= '<tr>';
			$pricingTable .= '<td>' . get_sub_field('left_column') . '</td>';
			$pricingTable .= '<td>' . get_sub_field('right_column') . '</td>';
			$pricingTable .= '</tr>';
		// }
		endwhile;
		$pricingTable .= '</tbody>';
		$pricingTable .= '</table>';
	endif;

	return $pricingTable;

	// [pricing_table class="" style=""]
}

add_shortcode( 'pricing_table', 'pricing_table_shortcode' );

function my_page_title_shortcode() {
    return get_the_title();
	// [page_title]
}
add_shortcode('page_title', 'my_page_title_shortcode');

  function rewrite_relative_urls($content) {
	$base_url = home_url('/');
  
	// Regex pattern to match relative URLs
	$pattern = '/(href|src)=["\'](?!http|\/\/)([^"\']+)[\'"]/i';
	
	// Replace relative URLs with absolute URLs
	$content = preg_replace_callback($pattern, function ($matches) use ($base_url) {
	  $relative_url = $matches[2];
	  $absolute_url = $base_url . ltrim($relative_url, '/');
	  return $matches[1] . '="' . $absolute_url . '"';
	}, $content);
  
	return $content;
  }
  
  add_action('template_redirect', 'redirect_relative_urls');


function social_media_icons( $atts, $content = null ) {

	$a = shortcode_atts( array(

		'class' => '',

		'style' => '',

		'icon-class' => '',

		'icon-style' => ''

	), $atts );

	$socialIcons = '';

	if(have_rows('social_icons','options')): 
		$socialIcons .= '<div class="si d-flex flex-wrap ' . esc_attr($a['class']) . '" style="' . esc_attr($a['style']) . '">';
		while(have_rows('social_icons','options')): the_row(); 
	$svgOrImg = get_sub_field('svg_or_image');
	$socialLink = get_sub_field('link');
	$svg = get_sub_field('svg');
	$image = get_sub_field('image');
	
	$socialLink_url = $socialLink['url'];
	$socialLink_title = $socialLink['title'];
	$socialLink_target = $socialLink['target'] ? $socialLink['target'] : '_self';
	
	$socialIcons .= '<a href="' . $socialLink_url . '" target="' . $socialLink_target . '" style="text-decoration:none;" class="si-icon-link">';
	
	if($svgOrImg == 'SVG') {
	
		$socialIcons .= '<div class="svg-icon">';
		$socialIcons .= $svg;
		$socialIcons .= '</div>';
	} elseif($svgOrImg == 'Image') {
	
		$socialIcons .= wp_get_attachment_image($image['id'],'full','',['class'=>'img-si']);
	
	}
	$socialIcons .= '</a>';
	
	endwhile; 
	
	$socialIcons .= '</div>';
	endif; 

	return $socialIcons;
	// return get_template_part('partials/si');

	// [social_icons class="" style=""]

}

add_shortcode( 'social_icons', 'social_media_icons' );