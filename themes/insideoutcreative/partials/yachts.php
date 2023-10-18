<?php

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
        echo '<a href="' . get_the_permalink() . '" class="col-lg-4 col-md-6 text-center mb-5 text-white col-yachts" style="">';
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

?>