<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 

if(get_field('header', 'options')) { the_field('header', 'options'); }

if(get_field('custom_css')) { 
?> 
<style>
<?php the_field('custom_css'); ?>
</style>
<?php 
}
wp_head(); 
?>
</head>
<body <?php body_class(); ?>>
<?php
if(get_field('body','options')) { the_field('body','options'); }


echo '<div class="blank-space w-100 position-fixed" style="
background: rgb(255,255,255);
background: linear-gradient(0deg, rgba(255,255,255,0) 0%, rgba(93,82,103,1) 90%);
background: rgb(255,255,255);
background: linear-gradient(0deg, rgba(255,255,255,0) 0%, rgba(93,82,103,0.25) 20%, rgba(93,82,103,0.5) 40%, rgba(93,82,103,1) 90%);
height:0px;
mix-blend-mode:multiply;
top:0;
left:0;
transition:all 1s ease-in-out;
z-index:8;
"></div>';
echo '<header class="position-fixed pt-3 pb-3 w-100" style="top:0;left:0;z-index:9;">';

echo '<div class="nav">';
echo '<div class="container">';
echo '<div class="row align-items-center">';

echo '<div class="col-lg-3 col-6 text-center">';
echo '<a href="' . home_url() . '">';

$logo = get_field('logo','options'); 
if($logo){
echo wp_get_attachment_image($logo['id'],'full',"",['class'=>'h-auto','style'=>'width:205px;transition:all 1s ease-in-out;','id'=>'logo-main']); 
}

echo '</a>';
echo '</div>';

echo '<div class="col-lg-9 col-6 mobile-hidden">';

wp_nav_menu(array(
    'menu' => 'primary',
    'menu_class'=>'menu text-white d-flex flex-wrap list-unstyled justify-content-center mb-0'
));

echo '</div>';
echo '<div class="col-lg-4 col-6 desktop-hidden">';
echo '<a id="navToggle" class="nav-toggle">';
echo '<div>';
echo '<div class="line-1 bg-accent-secondary"></div>';
echo '<div class="line-2 bg-accent-secondary"></div>';
echo '<div class="line-3 bg-accent-secondary"></div>';
echo '</div>';
echo '</a>';
echo '</div>';
echo '<div id="navMenuOverlay" class="position-fixed z-2"></div>';
echo '<div class="col-lg-4 col-md-8 col-11 nav-items bg-white desktop-hidden" id="navItems">';

echo '<div class="pt-5 pb-5">';
echo '<div class="close-menu">';
echo '<div>';
echo '<span id="navMenuClose" class="close h1">X</span>';
echo '</div>';
echo '</div>';
echo '<a href="' . home_url() . '">';

$logoFooter = get_field('logo_footer','options'); 
if($logoFooter){
echo wp_get_attachment_image($logoFooter['id'],'full',"",['class'=>'w-100 h-auto','style'=>'max-width:250px;']);
}

echo '</a>';
echo '</div>';
wp_nav_menu(array(
'menu' => 'primary',
'menu_class'=>'menu d-flex flex-wrap list-unstyled justify-content-center mb-0'
)); 
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';

echo '</header>';

if(!is_front_page()) {

echo '<section class="hero position-relative overflow-h">';
$globalPlaceholderImg = get_field('global_placeholder_image','options');
if(is_page()){
if(has_post_thumbnail()){
the_post_thumbnail('full', array('class' => 'w-100 bg-img position-absolute img-parallax-custom','style'=>'height:106%;'));
} else {
echo wp_get_attachment_image($globalPlaceholderImg['id'],'full','',['class'=>'w-100 bg-img position-absolute img-parallax-custom','style'=>'height:106%;']);
}
} else {
echo wp_get_attachment_image($globalPlaceholderImg['id'],'full','',['class'=>'w-100 bg-img position-absolute img-parallax-custom','style'=>'height:106%;']);
}


if(!is_front_page() && is_page()) {
echo '<div class="text-white text-center position-relative hero-padding" style="padding:300px 0px 400px">';

echo '<div class="position-absolute w-100 h-100" style="background: rgb(93,82,103);
background: linear-gradient(0deg, rgba(93,82,103,.7) 10%, rgba(255,255,255,0) 50%, rgba(93,82,103,1) 90%);top:0;left:0;mix-blend-mode:multiply;"></div>';

if(have_rows('header_content')): while(have_rows('header_content')): the_row();

$headerIcon = get_sub_field('header_icon');

if($headerIcon){
    echo wp_get_attachment_image($headerIcon['id'],'full','',
        [
            'class'=>'position-absolute',
            'style'=>'
                width: 75px;
                height: 75px;
                bottom: 25px;
                left: 50%;
                transform: translate(-50%,0);'
        ]
    );
}

endwhile; endif;

echo '<div class="position-relative">';
echo '<div class="multiply overlay position-absolute w-100 h-100 bg-img"></div>';
echo '<div class="position-relative">';
echo '<div class="container">';
echo '<div class="row justify-content-center">';
echo '<div class="col-lg-10">';

echo '<div class="d-inline-block position-relative" style="min-width:230px;">';
echo get_template_part('partials/borders');

echo '<h1 class="pt-3 pb-3 mb-0 text-uppercase" style="letter-spacing:.2em;">' . get_the_title() . '</h1>';

echo '<div class="pl-3 pr-3">';
if ( have_posts() ) : while ( have_posts() ) : the_post();
the_content();
endwhile; else:
    echo '<p>Sorry, no posts matched your criteria.</p>';
endif;
echo '</div>';
echo '</div>';

echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
}



if(!is_front_page() && !is_page()) {
echo '<div class="container pt-5 pb-5 text-white text-center">';
echo '<div class="row">';
echo '<div class="col-md-12">';
if(is_single()){
echo '<h1 class="">' . single_post_title() . '</h1>';
} elseif(is_author()){
echo '<h1 class="">Author: ' . get_the_author() . '</h1>';
} elseif(is_tag()){
echo '<h1 class="">' . get_single_tag_title() . '</h1>';
} elseif(is_category()){
echo '<h1 class="">' . get_single_cat_title() . '</h1>';
} elseif(is_archive()){
echo '<h1 class="">' . get_archive_title() . '</h1>';
}
elseif(!is_front_page() && is_home()){
echo '<h1 class="">' . get_the_title(133) . '</h1>';
}
echo '</div>';
echo '</div>';
echo '</div>';
}

echo '</section>';
} // end of !is_front_page()
?>