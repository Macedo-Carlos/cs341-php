<?php

// Build the HTML for the scriptures list
function scripturesGrid($scriptures){
    $block = '<div>';
    foreach ($scriptures as $scripture) {
        $block .= '<p>';
        $block .= "<span class='scrRef'>$scripture[book] $scripture[chapter]:$scripture[verseFrom]</span> - ";
        $block .= "\"<span class='scrCont'>$scripture[content]</span>\"";
        $block .= '</p>';
    }
    $block .= '</div>';
    return $block;
}

?>