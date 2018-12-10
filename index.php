<?php
require_once('functions.php');

$is_auth = rand(0, 1);

$user_name = 'Юлия';
$user_avatar = 'img/user.jpg';


/*
//Подключение
$con = mysqli_connect("localhost", "root", "", "yeticave");

//Кодировка
mysqli_set_charset($con, "utf8");

//Получение текста ошибки или успешности подключения
if ($con == false) {
	print ("Ошибка подключения: " . mysqli_connect_error());
}
else {
	//Чтение данных
	$sql = 'SELECT * FROM categories';
	//выполняем запрос
	$result = mysqli_query($con, $sql);

	//запрос выполнен успешно
	if ($result) {
		//результат преобразуем в массив
		$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
	}
	else {
		//получить текст последней ошибки
		print ("Ошибка подключения: " . mysqli_error($con));
	}

	//Запрос на показ лотов
	$sql = 'SELECT l.id, l.title, l.price, l.image, c.name, MAX(r.amount) FROM lots l'
		 . 'LEFT JOIN categories c ON c.id = l.category_id'
		 . 'LEFT JOIN rates r ON r.lot_id = l.id'
		 . 'GROUP BY l.id'
		 . 'ORDER BY l.`create_time` DESC';

	//выполняем запрос и получаем результат
	if ($res = mysqli_query($con, $sql)) {
		$lots = mysqli_fetch_all($res, MYSQLI_ASSOC);

		//Передаем в шаблон результат выполнения
		$content = include_template('layout.php', ['lots' => $lots]);
	else {
		//либо подключаем шаблон с ошибкой
		print ("Ошибка подключения: " . mysqli_error($con));
	}
}

print(include_template('index.php', ['content' => $content, 'categories' => $categories]));

*/



$categories = ["Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"];

$lots = [
    [  	'name' => '2014 Rossignol District Snowboard',
		'category' => 'Доски и лыжи',
		'price' => 10999,
		'picture' => 'img/lot-1.jpg'
    ],
    [	'name' => 'DC Ply Mens 2016/2017 Snowboard',
		'category' => 'Доски и лыжи',
		'price' => 159999,
		'picture' => 'img/lot-2.jpg'
    ],
    [	'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
		'category' => 'Крепления',
		'price' => 8000,
		'picture' => 'img/lot-3.jpg'
    ],
    [	'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
		'category' => 'Ботинки',
		'price' => 10999,
		'picture' => 'img/lot-4.jpg'
    ],
    [  'name' => 'Куртка для сноуборда DC Mutiny Charocal',
	   'category' => 'Одежда',
	   'price' => 7500,
	   'picture' => 'img/lot-5.jpg'
    ],
    [  'name' => 'Маска Oakley Canopy',
	   'category' => 'Разное',
	   'price' => 5400,
	   'picture' => 'img/lot-6.jpg'
	]
];


$page_content = include_template('index.php', [
	'categories' => $categories,
    'lots' => $lots
]);
$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'title' => 'Yeti Cave | Главная',
    'user_name' => $user_name,
    'categories' => $categories,
    'is_auth' => $is_auth
]);

print($layout_content);
