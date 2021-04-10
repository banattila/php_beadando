<?php
$config = [
    'title' => 'title'
];
function getTitle(){
    global $config;
    $uri = explode("/", $_SERVER['REQUEST_URI'])[2];
    $title = explode(".", $uri)[0];
    $config['title'] = $title;
    echo $config['title'];
}
