<?php

//Домашнее задание
header('Content-Type: text/html; charset=utf-8');



$regions = [
	"Московская область" => ["Москва", "Зеленоград", "Клин"],
	"Ленинградская область" => ["Санкт-Петербург", "Всеволожск", "Павловск"],
	"Рязанская область" => ["Рязань", "Ряжск", "Сапожок"]
];






foreach ($regions as $region_name => $cities) { //неосмысленные имена
	echo $region_name . '<br>';

	$arrLength = count($regions[$region_name]);
	for ($i = 0; $i < $arrLength; $i++) { //count внутри цикла
		if ($i == $arrLength - 1) {
			echo $cities[$i] . '.' . '<br>'; //не использование $value
		} else {
			echo $cities[$i] . ', ';
		}
	}
}


$a = 0;
while ($a++ < 100) {
	$result .= $a; //$result не задан
}








function generateMenu($items)
{
	echo '<ul>';
	foreach ($items as $item) {
		echo '<li>';
		echo '<a href="' . $item['link'] . '">' . $item['title'] . '</a>';
		if(isset($item['children'])) {
			generateMenu($item['children']);
		}
		echo "</li>";
	}
	echo '</ul>';
}



$menu = [
	[
		'title' => 'Главная',
		'link' => '/'
	],
	[
		'title' => 'Контакты',
		'link' => '/contancts'
	],
	[
		'title' => 'Статьи',
		'link' => '/articles',
		'children' => [
			[
				'title' => 'Котики',
				'link' => '/articles/cats'
			],
			[
				'title' => 'Собачки',
				'link' => '/articles/dogs',
				'children' => [
					[
						'title' => 'Доберманы',
						'link' => '/articles/dogs/dobermani'
					],
					[
						'title' => 'Корги',
						'link' => '/articles/dogs/corgi',
						'children' => [/* */]
					]
				]
			]
		]
	]
];


generateMenu($menu);











//Подключение файлов с кодом
//include
//require
//include_once
//require_once


$file = fopen("file.txt", "r");
if (!$file) {
	echo("Ошибка открытия файла");
}

echo "Файл открыт";
fclose($file);


//Если не знаем размер файла
$file = fopen("file.txt", "r");
if (!$file) {
	echo("Ошибка открытия файла");
} else {
	$buffer = '';
	while (!feof($file)) {
		$buffer .= fread($file, 1); //fgets
	}
	echo $buffer;
	fclose($file);
}


//Если размер файла не большой
$file = fopen("file.txt", "r");
if (!$file) {
	echo("Ошибка открытия файла");
} else {
	$buffer = fread($file, filesize("file.txt"));
	echo $buffer;
	fclose($file);
}


// удобно
echo file_get_contents("file.txt");


// запись файлов
$filename = "file.txt";
file_put_contents("file.txt", "Some Data"); //FILE_APPEND


//шаблонизатор
function render($file, $variables = [])
{
	if (!is_file($file)) {
		echo 'Template file "' . $file . '" not found';
		exit();
	}

	if (filesize($file) === 0) {
		echo 'Template file "' . $file . '" is empty';
		exit();
	}


	$templateContent = file_get_contents($file);

	if (empty($variables)) {
		return $templateContent;
	}

	foreach ($variables as $key => $value) {
		if (empty($value) || !is_string($value)) {
			continue;
		}

		$key = '{{' . strtoupper($key) . '}}';

		$templateContent = str_replace($key, $value, $templateContent);
	}

	return $templateContent;
}


echo render('../templates/index.tpl', [
	'title' => 'Мой супер сайт',
	'header' => 'Добро пожаловать',
	'content' => 'Это мой первый сайт, не судите строго',
	'footer' => date('Y')
]);

scandir('./');

