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


<?php

// получение даных с полей таблицы и запись из в переменные
$upd_id_substance = $_GET['upd_id_substance'];
$upd_name_substance = $_GET['upd_name_substance'];
$upd_id_fabricator = $_GET['upd_id_fabricator'];
$upd_name_fabricator = $_GET['upd_name_fabricator'];
$upd_sourse_fabricator = $_GET['upd_sourse_fabricator'];
$upd_name_medicinal = $_GET['upd_name_medicinal'];
$upd_medicinal_price = $_GET['upd_medicinal_price'];

?>



<body>
    <div class="wrapper">
        <div class="wrap">
            <!-- форма для обновления данных в базе даных -->
            <form action="" method="post">
                <input name="update_form" value="<?php echo $upd_id_substance .
                                                        $upd_name_substance .
                                                        $upd_id_fabricator .
                                                        $upd_name_fabricator .
                                                        $upd_sourse_fabricator .
                                                        $upd_name_medicinal .
                                                        $upd_medicinal_price
                                                    ?>" type="text" required>
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

// получение даных с формы и запись в переменую
$update_form = $_POST['update_form'];




// проверка на пустое поле
if ($update_form == '') {
    echo 'Введите данные';
    exit();
}


// подключение к базе данных
require('connection.php');




// изменение данных в таблице active_substance - поле id_substance
// запрос на изменения данных   
$sql = "UPDATE active_substance SET id_substance=:update_form WHERE id_substance =:upd_id_substance";
// подготовка запроса
$stmt = $pdo->prepare($sql);
// подставление данных из переменных
$stmt->execute([':update_form' => $update_form, ':upd_id_substance' => $upd_id_substance]);



// изменение данных в таблице active_substance - поле name_substance
// запрос на изменения данных 
$sql = "UPDATE active_substance SET name_substance=:update_form WHERE name_substance=:upd_name_substance";
// подготовка запроса
$stmt = $pdo->prepare($sql);
// подставление данных из переменных
$stmt->execute([':update_form' => $update_form, ':upd_name_substance' => $upd_name_substance]);




// изменение данных в таблице fabricator - поле id_fabricator
// запрос на изменения данных
$sql = "UPDATE fabricator SET id_fabricator =:update_form WHERE id_fabricator =:upd_id_fabricator";
// подготовка запроса
$stmt = $pdo->prepare($sql);
// подставление данных из переменных
$stmt->execute([':update_form' => $update_form, ':upd_id_fabricator' => $upd_id_fabricator]);




// изменение данных в таблице fabricator - поле name_fabricator
// запрос на изменения данных
$sql = "UPDATE fabricator SET name_fabricator =:update_form WHERE name_fabricator =:upd_name_fabricator";
// подготовка запроса
$stmt = $pdo->prepare($sql);
// подставление данных из переменных
$stmt->execute([':update_form' => $update_form, ':upd_name_fabricator' => $upd_name_fabricator]);




// изменение данных в таблице fabricator - поле source_src
// запрос на изменения данных
$sql = "UPDATE fabricator SET source_src =:update_form WHERE source_src =:upd_sourse_fabricator";
// подготовка запроса
$stmt = $pdo->prepare($sql);
// подставление данных из переменных
$stmt->execute([':update_form' => $update_form, ':upd_sourse_fabricator' => $upd_sourse_fabricator]);




// изменение данных в таблице fabricator - поле source_src
// запрос на изменения данных
$sql = "UPDATE medicinal_product SET name_medicinal =:update_form WHERE name_medicinal =:upd_name_medicinal";
// подготовка запроса
$stmt = $pdo->prepare($sql);
// подставление данных из переменных
$stmt->execute([':update_form' => $update_form, ':upd_name_medicinal' => $upd_name_medicinal]);




// изменение данных в таблице fabricator - поле source_src
// запрос на изменения данных
$sql = "UPDATE medicinal_product SET price =:update_form WHERE price =:upd_medicinal_price";
// подготовка запроса
$stmt = $pdo->prepare($sql);
// подставление данных из переменных
$stmt->execute([':update_form' => $update_form, ':upd_medicinal_price' => $upd_medicinal_price]);
?>

</html>
