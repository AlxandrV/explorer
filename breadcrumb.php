<?php

$home = 'home';

// affcihe le dossier courant (configurer pour 'home' par défaut)
$url = getcwd();
// /var/www/html/home

// renvoie le dernier créer
$current_folder = explode('/', $url);
//var_dump($current_folder);
//echo end($current_folder);

// numéro clé du dossier 'home'
$key = array_search('home', $current_folder);

// boucle fil d'arianne
for($i = $key; $i < count($current_folder); $i++){
	echo '<a href="' . $current_folder[$i] . '/' . $current_folder[$i] .'.php">' . $current_folder[$i] . '</a>';
}