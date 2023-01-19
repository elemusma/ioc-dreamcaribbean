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

echo '<div class="row" style="">';

while(have_rows('individual_bars')): the_row();

$barsCounter++;

$title = get_sub_field('title');
$ID = sanitize_title_with_dashes($title);
$image = get_sub_field('image');
$imageMobile = get_sub_field('image_mobile');
$icon = get_sub_field('icon');
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

echo '<div class="position-absolute w-100 h-100 col-full-background-borders" style="top:0;left:0;border-left:1px solid white;pointer-events:none;"></div>';


echo '<div class="position-relative inner-content-outer" style="transition:all .25s ease-in-out;">';

if($link){
    echo '<a class="" href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '" style="text-decoration:none;">';
}

echo '<div class="image-title">';
echo '<div class="d-inline-block" style="">';
echo wp_get_attachment_image($icon['id'],'full','',['class'=>'','style'=>'width:75px;height:75px;object-fit:contain;']);
echo '</div>';

echo '<div class="mt-3 mb-3"><span class="h6 text-white">' . $title . '</span></div>';
echo '</div>';

echo '<div class="pl-3 pr-3 text-white inner-content">';
echo $innerContent;
echo '</div>';

if($link){
    echo '</a>';
}

echo '</div>';
echo '</div>';

endwhile;

echo '</div>';
// echo '</div>';
echo '</section>';
endif;
// end of bars repeaters

endwhile; endif;

// end of bars

endwhile; endif;
}
endwhile; endif;
?>