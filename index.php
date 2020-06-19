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

chdir($url);
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

// liste les dossier et fichier du répertoire courant
$content = scandir($url);

$contents = [];
$contents_size = [];
$contents_date = [];
$contents_type = [];
foreach ($content as $item) {
    if ($item !== "." && $item !== "..") {
        // récupère la date de dernère modif de $item et la stock
        $contents_date[$item] = filemtime($item);
        // si $item est un dossier on le nomme "dossier"
        if(is_dir($item)){
            $contents_type[$item] = "dossier";
            $contents_size[$item] = "";
        }
        // sinon nommer "fichier"
        else{
            $contents_type[$item] = "fichier";
            $contents_size[$item] = filesize($item);
        }
        // stock $item dans $contents[]
        $contents[$item] = $item;
        echo "<br><button type='submit' form='ch_cwd' value='" . $url . DIRECTORY_SEPARATOR . $item . "' name='cwd'>" . $item . " " . $contents_size[$item] . " " . $contents_type[$item] . "</button>";
    }
}
/*echo '<br/>';
echo '<br/>';

$files = fopen('texte.txt', 'r+');
$new_files = fread($files, filesize('texte.txt'));
if(isset($_POST['write_files'])){
    $new_files = $_POST['write_files' . '\r\n'];
    fwrite($files, $new_files);
}
echo '<form method="post">';
echo '<br/><textarea name="write_files"></textarea>';
echo '<input type="submit" value="modifier">';
echo '</form>';

echo '<br/>' . getcwd();*/