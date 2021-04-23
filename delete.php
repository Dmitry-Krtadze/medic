<?php
$id1 = $_GET['id1'];
$id2 = $_GET['id2'];


require('connection.php');



$sql = 'DELETE FROM `active_substance` WHERE `id_substance` = :id1';
$query = $pdo->prepare($sql);
$query->execute(['id1' => $id1]);


$sql = 'DELETE FROM `fabricator` WHERE `id_fabricator` = :id2';
$query = $pdo->prepare($sql);
$query->execute(['id2' => $id2]);






header('Location: /');
