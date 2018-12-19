<?php
require_once('functions/formatter.php');
require_once('functions/database.php');
require_once('functions/template.php');
require_once('functions/time.php');

if (!isset($_GET['id'])) {
    die('Не задан параметр запроса id');
}
$id = intval($_GET['id']);

$config = require 'config.php';

$con = connectDb($config['db']);

$categories = getCategories($con);

$lot = getLotById($con, $id);
if(!$lot) {
    die('Выбранного лота не существует');
}

print(include_template('lot.php', ['lot' => $lot, 'content' => $content, 'categories' => $categories]));
