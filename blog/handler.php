<?php
include 'db.php';

// C какой статьи будет осуществляться вывод
$startFrom = $_POST['startFrom'];

// Получаем 10 статей, начиная с последней отображенной
$res = mysqli_query($db, "SELECT * FROM `content` WHERE `fixed` = 0 ORDER BY `id` DESC LIMIT {$startFrom}, 10");

// Формируем массив со статьями
$articles = array();
while ($row = mysqli_fetch_assoc($res))
{
    $articles[] = $row;
}

// Превращаем массив статей в json-строку для передачи через Ajax-запрос
echo json_encode($articles);