<?php
// init
$home = 'home';
//  créer un repertoire si inexistant
if(!is_dir($home)){
    mkdir($home);
}
chdir(getcwd() . DIRECTORY_SEPARATOR . $home);
$url = getcwd();

$content = scandir($url);
var_dump($content);
foreach($content as $item){
   //echo $item . '<br/>';
}

//$display_files = [];

foreach($content as $item){
    if($item !== '.' && $item !== '..'){
        echo $item . '<br/>';
    }
}
