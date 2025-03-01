<?php

function dd($arrayItem){
    echo '<pre>';
    var_dump($arrayItem);
    echo '</pre>';
    die();
}

function authorisation($condition, $responseCode = Response::FORBIDDEN){
    if(!$condition){
        abort($responseCode);
    }
}