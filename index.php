<?php
require_once("helpers.php");

$is_auth = rand(0, 1);

$user_name = 'Рамазан'; // укажите здесь ваше имя

function formatPrice($num): string
{
    $num = ceil($num);

    if ($num > 1000) {
        $num = number_format($num, 0, ".", " ");
    }

    return "{$num}₽";
}

function getTimeLeft($data): array //$data - время истечения слота
{
    date_default_timezone_set('Europe/Moscow'); //часовой пояс Московский
    $currentDate = date_create(); //метка текущей даты
    $finalDate = date_create($data); //метка даты истечения слота

    $diff = date_diff($finalDate, $currentDate); //разность между метками
    $formatDiff = date_interval_format($diff, "%d %H %I"); //форматирование в день, часы, минуты
    $arr = explode(" ", $formatDiff); //добавление в массив 0-дни, 1-часы, 2-минуты

    $hours = $arr[0] * 24 + $arr[1];
    $minutes = intval($arr[2]);

    $hours = str_pad($hours, 2, "0", STR_PAD_LEFT);
    $minutes = str_pad($minutes, 2, "0", STR_PAD_LEFT);

    $res[] = $hours;
    $res[] = $minutes;

    return $res;

}

$categories = [
    "boards" => "Доски и лыжи",
    "attachment" => "Крепления",
    "boots" => "Ботинки",
    "clothing" => "Одежда",
    "tools" => "Инструменты",
    "other" => "Разное"
];

$catalogs = [
    [
        "title" => "2014 Rossignol District Snowboard",
        "category" => $categories["boards"],
        "price" => 10999,
        "image" => "img/lot-1.jpg",
        "expiration" => "2023-06-13"
    ],
    [
        "title" => "DC Ply Mens 2016/2017 Snowboard",
        "category" => $categories["boards"],
        "price" => 159999,
        "image" => "img/lot-2.jpg",
        "expiration" => "2023-06-13"
    ],
    [
        "title" => "Крепления Union Contact Pro 2015 года размер L/XL",
        "category" => $categories["attachment"],
        "price" => 8000,
        "image" => "img/lot-3.jpg",
        "expiration" => "2023-06-14"
    ],
    [
        "title" => "Ботинки для сноуборда DC Mutiny Charocal",
        "category" => $categories["boots"],
        "price" => 10999,
        "image" => "img/lot-4.jpg",
        "expiration" => "2023-06-14"
    ],
    [
        "title" => "Куртка для сноуборда DC Mutiny Charocal",
        "category" => $categories["clothing"],
        "price" => 7500,
        "image" => "img/lot-5.jpg",
        "expiration" => "2023-06-13"
    ],
    [
        "title" => "Маска Oakley Canopy",
        "category" => $categories["other"],
        "price" => 5400,
        "image" => "img/lot-6.jpg",
        "expiration" => "2023-06-13"
    ],
];

$pageContent = include_template("main.php", [
    "categories" => $categories,
    "catalogs" => $catalogs
]);

$layoutContent = include_template("layout.php", [
    "is_auth" => $is_auth,
    "user_name" => $user_name,
    "content" => $pageContent,
    "categories" => $categories,
    "titleName" => "Главная"
]);

print($layoutContent);


