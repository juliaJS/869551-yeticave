<?php
function connectDb($dbConfig) {
    $con = mysqli_connect($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['database']);
    mysqli_set_charset($con, "utf8");

    if (!$con) {
        print("Ошибка в подключении к базе данных: " . mysqli_connect_error());
    }

    return $con;
}

function getCategories($con) {
    $sql = "SELECT * FROM categories";
    $result = mysqli_query($con, $sql);
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $categories;
}

function getLots($con) {
    $sql = 'SELECT l.id, l.title, l.price, l.image, c.name AS category_name, MAX(r.amount) FROM lots l '
        . 'LEFT JOIN categories c ON c.id = l.category_id '
        . 'LEFT JOIN rates r ON r.lot_id = l.id '
        . 'GROUP BY l.id '
        . 'ORDER BY l.`create_time` DESC';
    $result = mysqli_query($con, $sql);
    $lots = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $lots;
}

function getLotById($con, $id) {
    $sql = 'SELECT l.id, l.title, l.price, l.image, c.name FROM lots l '
         . 'LEFT JOIN categories c ON c.id = l.category_id '
         . 'WHERE l.id = ' . $id;
    $result = mysqli_query($con, $sql);
    $lots = mysqli_fetch_all($result, MYSQLI_ASSOC);
     if (!$lots) {
         return false;
     }
     return $lots[0];
}