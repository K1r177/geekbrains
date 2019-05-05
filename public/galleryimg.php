<?php

require_once __DIR__ . '/../config/config.php';


//var_dump(scandir(WWW_DIR . IMG_DIR));



//$gallery = galleryDraw(IMG_DIR);
$galleryimg = galleryImg($_GET['id']);


echo render(TEMPLATES_DIR . 'index.tpl', [
	'title' => 'Галерея',
	'h1' => 'Просмотр фото с id '.$_GET['id'],
	'content' => $galleryimg 
]);
