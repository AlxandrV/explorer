<?php
$home = 'home';
if(!is_dir($home)){
    mkdir($home);
}

if(!isset($_POST['cwd'])){
    $url = getcwd() . DIRECTORY_SEPARATOR . $home;
}
else{
    $url = $_POST['cwd'];
}


// variable qui contiendra la fil d'arianne
$path = "";
$breadcrumb = explode(DIRECTORY_SEPARATOR, $url);
// formulaire et boucle pour le breadcrumbs
echo '<form method="POST" id="ch_cwd">';
foreach($breadcrumb as $item){
    $path .= $item.DIRECTORY_SEPARATOR;
    if(strstr($path, $home)){
        echo '<button type="submit" value="' . substr($path, 0, -1) . '" name="cwd">' . $item . '</button>';
    }
    //print_r($path);
}
echo '</form>';

// Si $url ne se termine pas par un répertoire
if(!strstr($url, '.')){
    // redirection vers le répertoire $url
    chdir($url);
    // liste les dossier et fichier du répertoire courant
    $content = scandir($url);
    
    $contents = [];
    // boucle listant élément de $content
    foreach($content as $item) {
        if($item !== "." && $item !== ".."){
            echo '<br><button type="submit" form="ch_cwd" value="' . $url . DIRECTORY_SEPARATOR . $item . '" name="cwd">' . $item . '</button>';
            $contents[$item] = $item;
        }
    }
}
/*echo '<br/>';
var_dump($contents);
echo '<br/>';*/
echo getcwd();

/*$files = fopen('texte.txt', 'r+');
$new_files = '';
if(isset($_POST['write_files'])){
    $new_files = $_POST['write_files'];
    fwrite($files, $new_files);
}
echo '<form method="post">';
echo '<br/><textarea name="write_files">' . fread($files, filesize('texte.txt')) . '</textarea>';
echo '<input type="submit" value="modifier">';
echo '</form>';*/

