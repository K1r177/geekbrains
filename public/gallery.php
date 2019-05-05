<?php

require_once __DIR__ . '/../config/config.php';


//var_dump(scandir(WWW_DIR . IMG_DIR));



//$gallery = galleryDraw(IMG_DIR);
$gallery = createGallery();


echo render(TEMPLATES_DIR . 'index.tpl', [
	'title' => 'Галерея',
	'h1' => 'Галерея',
	'content' => $gallery 
]);
