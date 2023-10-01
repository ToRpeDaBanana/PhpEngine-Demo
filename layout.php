<?php
function top ( $title ) {
$layout  = file_get_contents('templates/header.html');
$layout = str_replace('{{ title }}', $title , $layout);
echo $layout;

}

function message($text){
    exit ('{"message": "'.$text.'"}');
}

function go($url){
    exit ('{"go": "'.$url.'"}');
}

function bottom () {
    require_once 'templates/footer.html';

}




?>