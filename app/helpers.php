<?php

if(!function_exists('readingTime')) {
     function readingTime($text) {
        $words=str_word_count(strip_tags($text));
        $minutes=ceil($words/200);
        return $minutes;
     }
}






















?>