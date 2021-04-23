<?php
// удаление записей в таблице

// получение даных для удаление поля id_substance
$id1 = $_GET['id1'];

// получение даных для удаление поля id_fabricator
$id2 = $_GET['id2'];

//подключение к базе данных
require('connection.php');


// запрос на удаление записи
$sql = 'DELETE FROM `active_substance` WHERE `id_substance` = :id1';
$query = $pdo->prepare($sql);
$query->execute(['id1' => $id1]);

// запрос на удаление записи
$sql = 'DELETE FROM `fabricator` WHERE `id_fabricator` = :id2';
$query = $pdo->prepare($sql);
$query->execute(['id2' => $id2]);





// возращение на главную страничку
header('Location: /');
