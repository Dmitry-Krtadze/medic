<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>
        Редактирование
    </title>
</head>

<body>
    <div class="wrapper">
        <div class="wrap">
            <form action="" method="post">
                <input name="update_form" placeholder="Ведите новое значение" type="text" required>
                <button class="update_btn_form" type="submit">Отправить</button>
            </form>
            <br>
            <br>
            <br>
            <a href="/index.php"><button>Назад</button></a>
        </div>
    </div>
</body>
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



$sql = "UPDATE active_substance SET name_substance=:update_form WHERE name_substance=:upd_name_substance";
$stmt = $pdo->prepare($sql);
$stmt->execute([':update_form' => $update_form, ':upd_name_substance' => $upd_name_substance]);



$sql = "UPDATE fabricator SET id_fabricator =:update_form WHERE id_fabricator =:upd_id_fabricator";
$stmt = $pdo->prepare($sql);
$stmt->execute([':update_form' => $update_form, ':upd_id_fabricator' => $upd_id_fabricator]);



$sql = "UPDATE fabricator SET name_fabricator =:update_form WHERE name_fabricator =:upd_name_fabricator";
$stmt = $pdo->prepare($sql);
$stmt->execute([':update_form' => $update_form, ':upd_name_fabricator' => $upd_name_fabricator]);



$sql = "UPDATE fabricator SET source_src =:update_form WHERE source_src =:upd_sourse_fabricator";
$stmt = $pdo->prepare($sql);
$stmt->execute([':update_form' => $update_form, ':upd_sourse_fabricator' => $upd_sourse_fabricator]);



$sql = "UPDATE medicinal_product SET name_medicinal =:update_form WHERE name_medicinal =:upd_name_medicinal";
$stmt = $pdo->prepare($sql);
$stmt->execute([':update_form' => $update_form, ':upd_name_medicinal' => $upd_name_medicinal]);



$sql = "UPDATE medicinal_product SET price =:update_form WHERE price =:upd_medicinal_price";
$stmt = $pdo->prepare($sql);
$stmt->execute([':update_form' => $update_form, ':upd_medicinal_price' => $upd_medicinal_price]);
?>

</html>