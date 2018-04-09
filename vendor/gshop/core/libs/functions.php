<?php

function debug($arr){
    echo '<hr><pre>' . print_r($arr, true) . '</pre><hr>';
}
function redirect($http = false){
    if($http){
        $redirect = $http;
    } else {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    }
    header("Location: $redirect");
    exit;
}