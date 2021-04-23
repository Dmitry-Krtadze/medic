<?php






$upd_id_substance = $_GET['upd_id_substance'];
$upd_name_substance = $_GET['upd_name_substance'];
$upd_id_fabricator = $_GET['upd_id_fabricator'];
$upd_name_fabricator = $_GET['upd_name_fabricator'];
$upd_sourse_fabricator = $_GET['upd_sourse_fabricator'];
$upd_name_medicinal = $_GET['upd_name_medicinal'];
$upd_medicinal_price = $_GET['upd_medicinal_price'];


$update_form = $_POST['update_form'];


if ($update_form == '') {
    echo 'Введите данные';
    exit();
}

require('connection.php');

$sql = "UPDATE active_substance SET id_substance=:update_form WHERE id_substance =:upd_id_substance";
$stmt = $pdo->prepare($sql);
$stmt->execute([':update_form' => $update_form, ':upd_id_substance' => $upd_id_substance]);


$sql = "UPDATE active_substance SET name_substance=:update_form WHERE id_substance =:upd_id_substance";
$stmt = $pdo->prepare($sql);
$stmt->execute([':update_form' => $update_form, ':upd_id_substance' => $upd_id_substance]);


$sql = "UPDATE fabricator SET id_fabricator =:update_form WHERE id_substance =:upd_id_substance";
$stmt = $pdo->prepare($sql);
$stmt->execute([':update_form' => $update_form, ':upd_id_substance' => $upd_id_substance]);


$sql = "UPDATE fabricator SET name_fabricator=:update_form WHERE id_substance =:upd_id_substance";
$stmt = $pdo->prepare($sql);
$stmt->execute([':update_form' => $update_form, ':upd_id_substance' => $upd_id_substance]);


$sql = "UPDATE fabricator SET source_src=:update_form WHERE id_substance =:upd_id_substance";
$stmt = $pdo->prepare($sql);
$stmt->execute([':update_form' => $update_form, ':upd_id_substance' => $upd_id_substance]);


$sql = "UPDATE medicinal_product SET name_medicinal=:update_form WHERE id_substance =:upd_id_substance";
$stmt = $pdo->prepare($sql);
$stmt->execute([':update_form' => $update_form, ':upd_id_substance' => $upd_id_substance]);

$sql = "UPDATE medicinal_product SET price=:update_form WHERE id_substance =:upd_id_substance";
$stmt = $pdo->prepare($sql);
$stmt->execute([':update_form' => $update_form, ':upd_id_substance' => $upd_id_substance]);
