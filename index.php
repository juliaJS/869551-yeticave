<?php
require_once('functions/formatter.php');
require_once('functions/database.php');
require_once('functions/template.php');
require_once('functions/time.php');

$config = require 'config.php';

$con = connectDb($config['db']);

$categories = getCategories($con);

$lots = getLots($con);

$is_auth = rand(0, 1);
$user_name = 'Юлия';
$user_avatar = 'img/user.jpg';

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
