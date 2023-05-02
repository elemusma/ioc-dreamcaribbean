<?php

if(have_rows('builder')): while(have_rows('builder')): the_row();
$layout = get_sub_field('layout');

if($layout == 'Bars') {
if(have_rows('bars_group')): while(have_rows('bars_group')): the_row();

    // echo '<div class="pt-5 pb-5"></div>';

    // start of bars

if(have_rows('bars_section')): while(have_rows('bars_section')): the_row();
echo '<section class="pb-5 position-relative d-lg-none section-bars-mobile" style="padding-top:140px;">';
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
    echo '<div class="position-absolute w-100 h-100 col-full-background-borders" style="top:0;left:0;border-left:1px solid rgba(255,255,255,.5);pointer-events:none;"></div>';
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

echo '<div class="position-absolute inner-content-details-hover" style="background:var(--accent-secondary);height:75%;width:2px;left:25px;top:5%;transition:all .25s ease-in-out;opacity:0;"></div>';
echo '<div class="position-absolute inner-content-details-hover" style="background:var(--accent-secondary);height:75%;width:2px;right:25px;top:5%;transition:all .25s ease-in-out;opacity:0;"></div>';

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
    echo '<section class="text-center section-content pt-5 pb-5 ' . get_sub_field('classes') . '" style="' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';

    echo '<div class="container">';
    echo '<div class="row justify-content-center">';
    echo '<div class="col-lg-9">';

    echo get_sub_field('content');

    echo '</div>';
    echo '</div>';
    echo '</div>';
    
    echo '</section>';
    endwhile; endif;
} elseif($layout == 'Columns'){
    if(have_rows('columns_group')): while(have_rows('columns_group')): the_row();
    
    echo '<section class="pt-5 pb-5 columns-repeater ' . get_sub_field('classes') . '" style="' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';
    echo '<div class="container">';
    echo '<div class="row justify-content-between">';
    if(have_rows('columns_repeater')): 
        $columnsRepeater = 0;
        while(have_rows('columns_repeater')): the_row();
        $columnsRepeater++;
        $fields = get_sub_field('field_group');
            echo '<div class="col-lg-4 p-0">';
            
                


            if($columnsRepeater != 1 || $fields != 'Titles'){
                if ($fields != 'Image' && $fields != 'Content'){
                    echo '<div 
                        class="position-absolute h-100 bg-accent-quaternary" 
                        style="width:2px;left:0px;"
                        ></div>';
                }
            }

            if ($fields == 'Titles'){
                if(have_rows('titles_group')): while(have_rows('titles_group')): the_row();
                echo '<div class="pl-3 pr-3">';
                echo '<h2 class="cormorant-garamond h3 ls-2 text-center">' . get_sub_field('title') . '</h2>';
                echo '<h3 class="h5 ls-2 text-center">' . get_sub_field('subtitle') . '</h3>';
                echo '</div>';
                endwhile; endif;
            }

            if ($fields == 'Content'){
                echo '<div class="pl-3 pr-3">';
                echo '<div class="h-100 d-flex align-items-center justify-content-center pt-5 pb-5">';
                echo '<div class="position-relative">';
                
                echo '<div class="position-absolute h-100 bg-accent-quaternary" style="width:2px;left:0px;"></div>';
                
                // if(have_rows('titles_group')): while(have_rows('titles_group')): the_row();
                echo '<div class="mt-3" style="font-size:125%;line-height:2;">';
                echo get_sub_field('content');
                echo '</div>';
                echo '</div>'; 
                echo '</div>';
                echo '</div>';
                // endwhile; endif;
            }

            if ($fields == 'Image'){
                $img = get_sub_field('image');
                // if(have_rows('titles_group')): while(have_rows('titles_group')): the_row();
                    echo wp_get_attachment_image($img['id'],'full','',['class'=>'w-100 h-100','style'=>'object-fit:cover;']);
                // endwhile; endif;
            }
            
            
            echo '</div>'; // end of col
        endwhile; 
    endif;
    echo '</div>';
    echo '</div>';
    echo '</section>';

    endwhile; endif;

} elseif($layout == 'Content + Image'){
    if(have_rows('content_image_group')): while(have_rows('content_image_group')): the_row();
    echo '<section class="pt-5 pb-5 content-image bg-light-gray ' . get_sub_field('classes') . '" style="' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';
    
    if(have_rows('content_image_repeater')): 
        while(have_rows('content_image_repeater')): the_row();
        $imgSide = get_sub_field('image_side');
        $image = get_sub_field('image');
        echo '<div class="container pt-5">';
        
        if($imgSide == 'Left'){
            echo '<div class="row justify-content-between">';
        } else {
            echo '<div class="row justify-content-between flex-row-reverse">';
        }
        
        echo '<div class="col-lg-6 p-0">';
        if($image){
            echo wp_get_attachment_image($image['id'],'full','',['class'=>'w-100 h-100','style'=>'object-fit:cover;']);
        }
        echo '</div>';
        
        
        echo '<div class="col-lg-6 pt-lg-0 pt-5">';
        echo '<div class="pl-4 position-relative">';

        echo '<div class="position-absolute bg-accent-quaternary" style="height:80%;width:2px;left:0px;bottom:0;"></div>';

        echo '<div class="">';
        echo get_sub_field('content');
        echo '</div>';
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
    
    if(get_sub_field('display_yachts') == 'Yes'){
        if(have_rows('yachts_content','options')): while(have_rows('yachts_content','options')): the_row();

        $bgImg = get_sub_field('background_image');
    echo '<section class="position-relative ' . get_sub_field('classes') . '" style="padding:100px 0;' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';

    if($bgImg){
        echo wp_get_attachment_image($bgImg['id'],'full','',['class'=>'w-100 h-100 position-absolute','style'=>'top:0;left:0;object-fit:cover;']);
    }

    if(get_sub_field('content_top')){
        echo '<div class="container">';
        echo '<div class="row justify-content-center">';
        echo '<div class="col-lg-9 text-center">';

        echo get_sub_field('content_top');

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
} elseif($layout == 'Gallery'){
    if(have_rows('gallery_group')): while(have_rows('gallery_group')): the_row();

        $bgImg = get_sub_field('background_image');
    echo '<section class="position-relative bg-light-gray ' . get_sub_field('classes') . '" style="padding:100px 0;' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';

    if($bgImg){
        echo wp_get_attachment_image($bgImg['id'],'full','',['class'=>'w-100 h-100 position-absolute','style'=>'top:0;left:0;object-fit:cover;']);
    }

        echo '<div class="container">';
        echo '<div class="row justify-content-center">';

        $gallery = get_sub_field('gallery');
        if( $gallery ): 
            echo '<div class="gallery-carousel owl-carousel owl-theme arrows-middle">';
            foreach( $gallery as $image ):
                echo '<div class="img-hover overflow-h">';
                // echo '<div class="position-relative">';
                echo '<a href="' . wp_get_attachment_image_url($image['id'], 'full') . '" data-lightbox="image-set" data-title="' . $image['title'] . '">';
                echo wp_get_attachment_image($image['id'], 'full','',['class'=>'w-100 img-portfolio','style'=>'height:450px;object-fit:cover;'] );
                echo '</a>';
                // echo '</div>';
                echo '</div>';
            endforeach;
            echo '</div>';
        endif;

        echo '</div>';
        echo '</div>';
        echo '</section>';

    endwhile; endif;
} elseif ( $layout == 'Review Gallery'){
    if(have_rows('review_gallery')): while(have_rows('review_gallery')): the_row();

    $bgImg = get_sub_field('background_image');
    echo '<section class="position-relative bg-light-gray pt-5 pb-5 ' . get_sub_field('classes') . '" style="' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';

    if($bgImg){
        echo wp_get_attachment_image($bgImg['id'],'full','',['class'=>'w-100 h-100 position-absolute','style'=>'top:0;left:0;object-fit:cover;']);
    }

    $gallery = get_sub_field('gallery');

    if( $gallery ): 
    echo '<div class="container">';
    echo '<div class="row justify-content-center">';
            
    foreach( $gallery as $image ):
    echo '<div class="col-md-6 col col-portfolio mt-3 mb-3 overflow-h">';
    echo '<div class="position-relative">';
    // echo '<a href="' . wp_get_attachment_image_url($image['id'], 'full') . '" data-lightbox="image-set" data-title="' . $image['title'] . '">';
    echo wp_get_attachment_image($image['id'], 'full','',[
        'class'=>'w-100',
        'style'=>'height:500px;object-fit:cover;'
    ] );
    // echo '</a>';
    echo '</div>';
    echo '</div>';
    endforeach; 
    echo '</div>';
    echo '</div>';
    endif;


    echo '</section>';

    endwhile; endif;
} elseif ($layout == 'Two Text Columns'){
    if(have_rows('two_text_columns')): while(have_rows('two_text_columns')): the_row();

    echo '<section class="pt-5 pb-5 content-image bg-light-gray ' . get_sub_field('classes') . '" style="' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';

    echo '<div class="container">';
    echo '<div class="row">';

    if(have_rows('left_content_block')): while(have_rows('left_content_block')): the_row();
    echo '<div class="col-lg-6  .' . get_sub_field('column_classes') . '" style="' . get_sub_field('column_classes') . '">';

    echo get_sub_field('content');

    echo '</div>';
    endwhile; endif;
    
    if(have_rows('right_content_block')): while(have_rows('right_content_block')): the_row();
    echo '<div class="col-lg-6  .' . get_sub_field('column_classes') . '" style="' . get_sub_field('column_classes') . '">';

    echo get_sub_field('content');

    echo '</div>';
    endwhile; endif;

    echo '</div>';
    echo '</div>';

    echo '</section>';

    endwhile; endif;
} elseif ($layout == 'Three Column Gallery'){
    if(have_rows('three_column_gallery')): while(have_rows('three_column_gallery')): the_row();
    echo '<section class="pt-5 pb-5 three-column-gallery bg-light-gray ' . get_sub_field('classes') . '" style="' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';

    $gallery = get_sub_field('gallery');
    if( $gallery ): 
        echo '<div class="container">';
            echo '<div class="row">';
            foreach( $gallery as $image ):
                echo '<div class="col-md-4">';
                // echo '<div class="position-relative">';
                // echo '<a href="' . wp_get_attachment_image_url($image['id'], 'full') . '" data-lightbox="image-set" data-title="' . $image['title'] . '">';
                echo wp_get_attachment_image($image['id'], 'full','',[
                    'class'=>'w-100 img-portfolio',
                    'style'=>'height:250px;object-fit:cover;'
                    ] );
                // echo '</a>';
                // echo '</div>';
                echo '</div>';
            endforeach; 
            echo '</div>';
        echo '</div>';
    endif;

    echo '</section>';
    endwhile; endif;
} elseif ($layout == 'How We Work'){
    if(have_rows('how_we_work_group')): while(have_rows('how_we_work_group')): the_row();
    echo '<section class="pt-5 pb-5 three-column-gallery bg-light-gray ' . get_sub_field('classes') . '" style="' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';

    echo '<div class="container">';
    echo '<div class="row justify-content-center">';
    echo '<div class="col-lg-6 text-center pb-4">';
    echo '<h2 class="cormorant-garamond h1">' . get_sub_field('title') . '</h2>';
    echo '</div>';
    echo '</div>';
    
    if(have_rows('content_repeater')):
        $howWeWorkRepeater = 0;
        while(have_rows('content_repeater')): the_row();
        $howWeWorkRepeater++;

        echo '<div class="position-relative pt-4 pb-4">';
        echo '<hr style="border-color:var(--accent-secondary);">';
        echo '<span class="position-absolute font-italic" style="color:#8fb9da;opacity:.75;font-size:7rem;top:50%;left:50%;transform:translate(-50%,-45%);z-index:1;font-family: minion-pro, serif;">' . $howWeWorkRepeater . '</span>';
        echo '</div>';

        if($howWeWorkRepeater % 2 == 0){
            echo '<div class="row flex-row-reverse justify-content-center">';
            // echo '</div>';
        } else {
            echo '<div class="row justify-content-center">';
        }

        echo '<div class="col-lg-6">';
        $img = get_sub_field('image');
        echo wp_get_attachment_image($img['id'],'full','',[
            'class'=>'w-100 h-auto',
            'style'=>'object-fit:cover;'
        ]);
        echo '</div>';

        echo '<div class="col-lg-6">';
        echo get_sub_field('content');
        echo '</div>';
        

        echo '</div>';
        endwhile;
    endif;

    echo '</div>';

    echo '</section>';
    endwhile; endif;
} elseif ($layout == 'Process'){
    if(have_rows('process_group')): while(have_rows('process_group')): the_row();
    $bgImg = get_sub_field('background_image');
    echo '<section class="position-relative content-section bg-attachment ' . get_sub_field('classes') . '" style="background:url(' . wp_get_attachment_image_url($bgImg['id'], 'full') . ');background-size:cover;background-attachment:fixed;padding:125px 0px 75px;' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';

    // echo get_template_part('partials/borders-gold');


    // if($bgImg){
    //     echo wp_get_attachment_image($bgImg['id'],'full','',[
    //         'class'=>'w-100 h-100 position-absolute bg-img',
    //         'style'=>'top:0;left:0;object-fit:cover;'
    //     ]);
    // }

    echo '<div class="position-absolute w-100" style="top:0;left:0;">';
    echo '<?xml version="1.0" encoding="UTF-8"?>
    <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 945.19 82.31">
      <defs>
        <style>
          .cls-1 {
            fill: #fff;
            stroke: #fff;
            stroke-miterlimit: 10;
          }
        </style>
      </defs>
      <g id="Layer_1-2" data-name="Layer 1">
        <path class="cls-1" d="m.5.5h944.19v81.17S492.92-31.27.5,81.67V.5Z"/>
      </g>
    </svg>';
    echo '</div>';

    echo '<div class="position-absolute w-100 h-100" style="background: rgb(255,255,255);
    background: linear-gradient(0deg, rgba(255,255,255,1) 5%, rgba(255,255,255,0) 100%);bottom:0;"></div>';

    echo '<div class="container">';
    echo '<div class="row justify-content-center">';
    echo '<div class="col-lg-9 text-center pb-5">';

    echo get_sub_field('content_top');

    echo '</div>';
    echo '</div>';

    // $pages = get_sub_field('pages');

    if(have_rows('columns_repeater')):
        echo '<div class="container">';
        echo '<div class="row justify-content-center">';
        $pagesCounter=0;
        while(have_rows('columns_repeater')): the_row();

        $pagesCounter++;
        // sprintf("%02d", $pagesCounter)

        echo '<div class="col-lg-4 col-md-6 mb-5 col-services ' . get_sub_field('column_classes') . '" style="text-decoration:none;' . get_sub_field('column_style') . '" id="">';

        echo '<div class="position-absolute" style="top:-150px;left:0;" id="' . get_sub_field('column_id') . '"></div>';

        echo '<div class="aos-animation h-100" data-aos="fade-in" data-aos-delay="' . $pagesCounter . '00">';
        if(get_sub_field('title_above')){
            echo '<span class="bold text-accent-secondary text-center d-block">' . get_sub_field('title_above') . '</span>';
        }

        // echo '<a href="' . get_the_permalink() . '" class="col-lg-4 col-md-6 text-white mb-5 col-services" style="text-decoration:none;">';
        echo '<div class="position-relative pl-5 pr-5 h-100 col-services-hover" style="padding-top:50px;padding-bottom:50px;transition:all .25s ease-in-out;">';

        // start of hover box
        // echo '<div class="hover-box bg-accent-dark position-absolute w-100 h-100 z-1 d-flex align-items-center justify-content-center pl-5 pr-5 col-services-hover-content" style="border:6px solid #fbcf02;top:0;left:0;transition:all .25s ease-in-out;">';

        // echo '<div>';
        // echo get_sub_field('content_hover');
        // echo '</div>';

        // echo '</div>';
        // end of hover box

        echo '<div class="position-absolute w-100 h-100 bg-accent" style="top:0;left:0;box-shadow: inset 0px 0px 5px rgba(0,0,0,.9);opacity:.5;"></div>';

        // echo '<div class="hover-box bg-accent position-absolute w-100 h-100" style="top:0;left:0;transition:all .25s ease-in-out;box-shadow: inset 0px 0px 5px rgba(0,0,0,.9);"></div>';

        echo '<div class="position-absolute w-100 h-100 bg-accent-quaternary" style="top:0;left:0;mix-blend-mode:overlay;opacity:.28;border:2px solid var(--accent-primary);"></div>';

        echo '<div class="position-relative pb-3 h-100">';
        // echo '<span class="h1 d-block coromant-garamond number" style="font-size:41px;">' . sprintf("%02d", $pagesCounter) . '</span>';

        // echo '<span class="mb-5 d-block coromant-garamond pl-5 h4" style="">' . get_sub_field('title') . '</span>';

        echo '<div class="d-flex align-items-start">';
        // echo '<div style="height: 35px;
        // width: 35px;
        // border: 1px solid var(--accent-primary);
        // display: flex;
        // align-items: center;
        // justify-content: center;
        // border-radius: 50%;
        // margin-right: 15px;">';
        // echo '<span class="plus-sign">&plus;</span>';
        // echo '</div>';

        echo '<img src="https://insideoutcreative.io/wp-content/uploads/2023/02/Circle-Ellipses.png" alt="" height="20px" width="auto" class="pr-3">';

        echo '<div class="position-relative">';
        echo '<h3 class="title" style="color:#4d4c4c;font-size:32px;">' . get_sub_field('title') . '</h3>';

        

        // echo '<div class="position-absolute" style="border-bottom:8px solid var(--accent-primary);width:75px;bottom:-15px;left:0;"></div>';

        echo '</div>';
        echo '</div>';

        if(get_sub_field('content')){
            echo get_sub_field('content');
        }


        
        echo '</div>';

        echo '</div>';

        echo '</div>';
        echo '</div>'; // end of col
        // echo '</a>';
        endwhile;
            
            echo '</div>'; // end of row
            echo '</div>'; // end of container
        endif;
    
        echo '<div class="row">';
    echo '<div class="col-12 text-center pb-5">';

    echo get_sub_field('content_bottom');

    echo '</div>';
    echo '</div>';

    echo '</div>';
    
    echo '</section>';
endwhile; endif;
} elseif($layout == 'Text Columns'){
    if(have_rows('text_columns_group')): while(have_rows('text_columns_group')): the_row();
    wp_enqueue_script('counter-js', get_theme_file_uri('/js/counter.js'));

    echo '<section class="position-relative text-columns text-white ' . get_sub_field('classes') . '" style="background:#00adb7;padding:75px 0;' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';

    // echo get_template_part('partials/borders-gold');

    $bgImg = get_sub_field('background_image');

    if($bgImg){
        echo wp_get_attachment_image($bgImg['id'],'full','',[
            'class'=>'w-100 h-100 position-absolute bg-img',
            'style'=>'top:0;left:0;object-fit:cover;'
        ]);
    }

    if(have_rows('columns_repeater')):
        $columnsRepeater = 0;
        echo '<div class="container-fluid">';
            echo '<div class="row justify-content-center">';
            while(have_rows('columns_repeater')): the_row();
            $columnsRepeater++;

            if($columnsRepeater > 7 ) {
                $columnsRepeater = 1;
            }

            echo '<div class="col-lg-2 col-md-4 text-center mt-4 mb-4" data-aos="fade-up" data-aos-delay="' . $columnsRepeater . '00">';

            if($columnsRepeater != 1){
                echo '<div class="bg-accent-secondary h-100 position-absolute d-md-block d-none" style="top:0;left:0;width:2px;"></div>';

                // echo '<div class="text-center">';
                echo '<div class="bg-accent w-50 ml-auto mr-auto d-md-none d-block mt-4 mb-4" style="top:0;left:0;height:2px;"></div>';
                // echo '</div>';
            }

            echo '<span class="d-block" style="font-size:40px;">' . get_sub_field('title') . '</span>';
            echo '<span class="d-block bold">' . get_sub_field('subtitle') . '</span>';

            echo '</div>';
            endwhile;
            echo '</div>';
        echo '</div>';
    endif;

    echo '</section>';
    endwhile; endif;
}
endwhile; endif;

// echo 'title';
?>