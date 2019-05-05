<?php

require_once __DIR__ . '/../config/config.php';

echo render(TEMPLATES_DIR . 'index.tpl', [
	'title' => 'Контакты',
	'h1' => 'Контакты',
	'content' => render(TEMPLATES_DIR . 'contacts.tpl')
]);
