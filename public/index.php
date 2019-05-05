<?php


require_once '../config/config.php';



echo render(TEMPLATES_DIR . 'index.tpl', [
	'title' => 'Заголовок сайта',
	'h1' => 'Привет, Андрей',
	'content' => 'Добро пожаловать, на мой чудо сайт'
]);