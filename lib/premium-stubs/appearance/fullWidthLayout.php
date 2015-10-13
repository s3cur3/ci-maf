<?php

function ciGetContainerClass() {
    $containerClass = "container";

    if(get_option('navbar_fixed', false)) {
        $containerClass .= " fixed-navbar";
    }
    if(get_option("full_screen_image_bg")) {
        $containerClass .= " has-bg-img";
    }
    if(ciGetNormalizedMeta('make_fancy_landing', false)) {
        $containerClass .= " fancy-landing";
    }
    $containerClass .= " text-align-" . ciGetNormalizedMeta('alignment', 'left');
    return $containerClass;
}



 