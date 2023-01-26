<?php

if(have_rows('builder')): while(have_rows('builder')): the_row();
$layout = get_sub_field('layout');

if($layout == 'Bars') {
if(have_rows('bars_group')): while(have_rows('bars_group')): the_row();

    // echo '<div class="pt-5 pb-5"></div>';

    // start of bars

if(have_rows('bars_section')): while(have_rows('bars_section')): the_row();
echo '<section class="pt-5 pb-5 position-relative d-lg-none" style="">';
echo '<div class="container">';
echo '<div class="row justify-content-center">';


echo '<div class="col-md-9 text-center">';
$mainContent = get_sub_field('content');
echo get_sub_field('content');
echo '</div>';


echo '</div>';
echo '</div>';

echo '<div class="d-flex align-items-center w-100">';

// echo '<div class="bg-accent-secondary w-100" style="height:4px;"></div>';
// echo wp_get_attachment_image(554,'full','',['class'=>'w-auto mr-4 ml-4','style'=>'']);
// echo '<div class="bg-accent-secondary w-100" style="height:4px;"></div>';

echo '</div>';

echo '</section>';

if(have_rows('individual_bars')):
$barsCounter = 0;
echo '<section class="position-relative overflow-h section-bars" style="">';

echo '<div class="position-absolute text-center text-white w-100 z-3 d-lg-block d-none pt-4 pb-4 pl-2 pr-2" style="top:25%;left:0;background:rgba(0,0,0,.5);">';
echo $mainContent;
echo '<div class="d-flex align-items-center w-100">';

// echo '<div class="bg-accent-secondary w-100" style="height:4px;"></div>';
// echo wp_get_attachment_image(554,'full','',['class'=>'w-auto mr-4 ml-4','style'=>'']);
// echo '<div class="bg-accent-secondary w-100" style="height:4px;"></div>';

echo '</div>';
echo '</div>';

echo '<div class="container-fluid" style="">';
echo '<div class="row" style="">';

while(have_rows('individual_bars')): the_row();

$barsCounter++;

$title = get_sub_field('title');
$ID = sanitize_title_with_dashes($title);
$image = get_sub_field('image');
$imageMobile = get_sub_field('image_mobile');
$icon = get_sub_field('icon');
$iconHover = get_sub_field('icon_on_hover');
$innerContent = get_sub_field('inner_content');
$link = get_sub_field('link');

if($link):
$link_url = $link['url'];
$link_title = $link['title'];
$link_target = $link['target'] ? $link['target'] : '_self';
endif;


echo '<div class="col-lg col-md-6 text-center w-100 overflow-h position-relative z-2 col-full-background d-flex align-items-end justify-content-center" style="padding-top:200px;padding-bottom:0px;min-height:100vh;" id="col-' . $ID . '">';

if($barsCounter == 1){

    // start of image mobile for first column
    if($imageMobile){
        echo wp_get_attachment_image($imageMobile['id'],'full','',['class'=>'position-absolute d-lg-none d-block w-100 h-100','style'=>'top:0;left:0;object-fit:cover;']);
        echo wp_get_attachment_image($image['id'],'full','',['class'=>'position-absolute d-lg-block d-none h-100 img-full-background','style'=>'top:0;object-fit:cover;min-width:100vw;']);
    } else {
        echo wp_get_attachment_image($image['id'],'full','',['class'=>'position-absolute h-100 img-full-background','style'=>'top:0;object-fit:cover;min-width:100vw;']);
    }
    // end of image mobile for first column

} else {

    if($imageMobile){
        echo wp_get_attachment_image($imageMobile['id'],'full','',['class'=>'position-absolute d-lg-none d-block w-100 h-100','style'=>'top:0;left:0;object-fit:cover;']);
        echo wp_get_attachment_image($image['id'],'full','',['class'=>'position-absolute d-lg-block d-none h-100 img-full-background','style'=>'top:0;object-fit:cover;min-width:100vw;']);
    } else {
        echo wp_get_attachment_image($image['id'],'full','',['class'=>'position-absolute h-100 img-full-background','style'=>'top:0;object-fit:cover;min-width:100vw;']);
    }

}
echo '<div class="position-absolute h-100 col-full-background-overlay bg-black d-lg-block d-none" style="opacity:.4;pointer-events:none;top:0;width:110vw;left:-' . ($barsCounter-1) . '00%;mix-blend-mode:multiply;"></div>';

echo '<div class="position-absolute w-100 h-100 bg-accent-secondary d-lg-none d-block" style="opacity:.5;pointer-events:none;top:0;mix-blend-mode:multiply;"></div>';

if($barsCounter != 1){
    echo '<div class="position-absolute w-100 h-100 col-full-background-borders" style="top:0;left:0;border-left:1px solid white;pointer-events:none;"></div>';
}


echo '<div class="position-relative inner-content-outer pb-5" style="transition:all .25s ease-in-out;">';

echo '<div class="position-absolute w-100 h-100 inner-content-details-hover-bg" style="
background: #517476;
height: 120%;
top: -10%;
z-index: -1;
transition:all .25s ease-in-out;
opacity:0;
"></div>';

echo '<div class="position-absolute inner-content-details-hover" style="background:#33fff8;height:75%;width:2px;left:25px;top:5%;transition:all .25s ease-in-out;opacity:0;"></div>';
echo '<div class="position-absolute inner-content-details-hover" style="background:#33fff8;height:75%;width:2px;right:25px;top:5%;transition:all .25s ease-in-out;opacity:0;"></div>';

if($link){
    echo '<a class="" href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '" style="text-decoration:none;">';
}

echo '<div class="image-title">';
echo '<div class="d-inline-block position-relative" style="">';
echo wp_get_attachment_image($icon['id'],'full','',['class'=>'icon-state','style'=>'width:75px;height:75px;object-fit:contain;transition:all .25s ease-in-out;']);
echo wp_get_attachment_image($iconHover['id'],'full','',['class'=>'icon-hover position-absolute','style'=>'top:0;left:0;width:75px;height:75px;object-fit:contain;transition:all .25s ease-in-out;opacity: 0;pointer-events:none;']);
echo '</div>';

echo '<div class="mt-3 mb-3"><span class="h6 text-white">' . $title . '</span></div>';
echo '</div>';

echo '<div class="pl-5 pr-5 text-white inner-content">';
echo $innerContent;
echo '</div>';

if($link){
    echo '</a>';
}

echo '</div>';
echo '</div>';

endwhile;

echo '</div>'; // end of row
echo '</div>'; // end of row
// echo '</div>';
echo '</section>';
endif;
// end of bars repeaters

endwhile; endif;

// end of bars

endwhile; endif;
} elseif ($layout == 'Titles'){

    if(have_rows('titles_group')): while(have_rows('titles_group')): the_row();
    echo '<section class="text-center p-5 ' . get_sub_field('classes') . '" style="' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';
    echo '<div class="d-inline-block pl-4 pr-4" style="border-left:2px solid #33fff8;border-right: 2px solid #33fff8;letter-spacing:.2em;">';
    echo '<span class="h6 d-block">' . get_sub_field('pretitle') . '</span>';
    echo '<h2 class="cormorant-garamond h1">' . get_sub_field('title') . '</h2>';
    echo '</div>';
    echo '</section>';
endwhile; endif;
} elseif ($layout == 'Content'){
    if(have_rows('content_group')): while(have_rows('content_group')): the_row();
    echo '<section class="text-center pb-5 ' . get_sub_field('classes') . '" style="' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';

    echo '<div class="container">';
    echo '<div class="row justify-content-center">';
    echo '<div class="col-lg-9">';

    echo get_sub_field('content');

    echo '</div>';
    echo '</div>';
    echo '</div>';
    
    echo '</section>';
    endwhile; endif;
} elseif($layout == 'Content + Image'){
    if(have_rows('content_image_group')): while(have_rows('content_image_group')): the_row();
    echo '<section class="pt-5 pb-5 content-image ' . get_sub_field('classes') . '" style="background:#f5f5f5;' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';
    
    if(have_rows('content_image_repeater')): 
        while(have_rows('content_image_repeater')): the_row();
        $imgSide = get_sub_field('image_side');
        $image = get_sub_field('image');
        echo '<div class="container">';
        
        if($imgSide == 'Left'){
            echo '<div class="row justify-content-between">';
        } else {
            echo '<div class="row justify-content-between flex-row-reverse">';
        }
        
        echo '<div class="col-lg-6">';
        if($image){
            echo wp_get_attachment_image($image['id'],'full','',['class'=>'w-100 h-100','style'=>'object-fit:cover;']);
        }
        echo '</div>';
        
        
        echo '<div class="col-lg-6">';
        echo '<div class="lead">';
        echo get_sub_field('content');
        echo '</div>';
        echo '</div>';

            echo '</div>';
            echo '</div>';
        endwhile; 
    endif;
    
    echo '</section>';
endwhile; endif;
} elseif ($layout == 'Image'){
    if(have_rows('image_group')): while(have_rows('image_group')): the_row();
    $img = get_sub_field('image');

    echo '<section class="pt-5 pb-5 ' . get_sub_field('classes') . '" style="' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';

    if(get_sub_field('content')){
        echo '<div class="container">';
        echo '<div class="row justify-content-center">';
        echo '<div class="col-lg-9">';

        echo get_sub_field('content');

        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    if($img){
        echo wp_get_attachment_image($img['id'],'full','',['class'=>'w-100 h-auto']);
    }

    echo '</section>';
    
    endwhile; endif;
} elseif ($layout == 'Yachts'){
    if(have_rows('yachts_group')): while(have_rows('yachts_group')): the_row();
    
    if(get_sub_field('display_yachst') == 'Yes'){
        if(have_rows('yachts_content','options')): while(have_rows('yachts_content','options')): the_row();

        $bgImg = get_sub_field('background_image');
    echo '<section class="position-relative ' . get_sub_field('classes') . '" style="padding:100px 0;' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';

    if($bgImg){
        echo wp_get_attachment_image($bgImg['id'],'full','',['class'=>'w-100 h-100 position-absolute','style'=>'top:0;left:0;object-fit:cover;']);
    }

    if(get_sub_field('content')){
        echo '<div class="container">';
        echo '<div class="row justify-content-center">';
        echo '<div class="col-lg-9 text-center">';

        echo get_sub_field('content');

        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    $yachts = get_sub_field('yachts');

    if( $yachts ):
        echo '<div class="container">';
        echo '<div class="row justify-content-center">';
    foreach( $yachts as $post ): 
    // Setup this post for WP functions (variable must be named $post).
    setup_postdata($post);
        echo '<a href="' . get_the_permalink() . '" class="col-lg-4 col-md-6 text-center mb-5 text-white" style="">';
        echo '<div class="img-hover overflow-h">';
            the_post_thumbnail('full',array(
                'class'=>'w-100',
                'style'=>'height:250px;object-fit:cover;'
            ));
        echo '</div>';
        echo '<h3 class="text-white cormorant-garamond h5 text-uppercase pt-3 ls-2">' . get_the_title() . '</h3>';
        echo '<span class="text-accent-tertiary text-uppercase ls-2" style="">LEARN MORE</span>';
        echo '</a>';
    endforeach;
        // Reset the global post object so that the rest of the page works correctly.
        wp_reset_postdata(); 
        echo '</div>';
        echo '</div>';
    endif;

    if(get_sub_field('content_bottom')){
        echo '<div class="container">';
        echo '<div class="row justify-content-center">';
        echo '<div class="col-lg-9 text-center">';

        echo get_sub_field('content_bottom');

        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    echo '</section>';
        
        endwhile; endif;
    }

    
    endwhile; endif;
}
endwhile; endif;

// echo 'title';
?>