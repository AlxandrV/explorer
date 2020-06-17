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
$content = scandir($url);

$path = "";
$breadcrumb = explode(DIRECTORY_SEPARATOR, $url);
echo '<form method="POST" id="ch_cwd">';
foreach($breadcrumb as $item){
    $path .= $item.DIRECTORY_SEPARATOR;
    echo '<button type="submit" value="' . substr($path, 0, -1) . '" name="cwd">' . $item . '</button>';
}
echo '</form>';
$contents = [];
foreach($content as $item) {
    if($item !== "." && $item !== ".."){
        echo '<br><button type="submit" form="ch_cwd" value="' . $url . DIRECTORY_SEPARATOR . $item . '" name="cwd">' . $item . '</button>';
        //$contents[$item] = $item;
    }
}
echo getcwd();
