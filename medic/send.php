<?php
$id_substance_form = $_POST['id_substance'];
$name_substance_form = $_POST['name_substance_form'];
$id_fabricator = $_POST['id_fabricator'];
$name_fabricator_form = $_POST['name_fabricator_form'];
$sourse_fabricator_form = $_POST['sourse_fabricator_form'];
$name_medicinal_form = $_POST['name_medicinal_form'];
$medicinal_price_form = $_POST['medicinal_price_form'];

if (
    $name_substance_form == '' &&
    $name_fabricator_form == '' &&
    $sourse_fabricator_form == '' &&
    $name_medicinal_form == '' &&
    $medicinal_price_form == ''
) {
    echo 'Введите данные';
    exit();
}

require('connection.php');

$query = $pdo->query('SELECT * FROM `active_substance` WHERE id_substance');
while ($row = $query->fetch(PDO::FETCH_BOTH)) {
    if ($row[0] == $id_substance) {
        print 'В таблице "Действующие вещество" уже существует такой артикул';
        exit();
    }
}
$query = $pdo->query('SELECT * FROM `fabricator` WHERE id_fabricator');
while ($row = $query->fetch(PDO::FETCH_BOTH)) {
    if ($row[0] == $id_substance) {
        print 'В таблице "Производитель" уже существует такой артикул';
        exit();
    }
}


$sql = 'INSERT INTO active_substance(id_substance, name_substance) VALUES (:id_substance, :name_substance_form)';
$query = $pdo->prepare($sql);
$query->execute(['id_substance' => $id_substance, 'name_substance_form' => $name_substance_form]);


$sql = 'INSERT INTO fabricator(id_fabricator ,name_fabricator, source_src) VALUES (:id_fabricator ,:name_fabricator_form, :sourse_fabricator_form)';
$query = $pdo->prepare($sql);
$query->execute(['id_fabricator' => $id_fabricator, 'name_fabricator_form' => $name_fabricator_form, 'sourse_fabricator_form' => $sourse_fabricator_form]);


$sql = 'INSERT INTO medicinal_product(name_medicinal, id_substanse_prod, id_fabricator_prod, price) VALUES (:name_medicinal_form, :id_substanse_prod, :id_fabricator_prod, :medicinal_price_form)';
$query = $pdo->prepare($sql);
$query->execute(['name_medicinal_form' => $name_medicinal_form, 'id_substanse_prod' => $id_substance, 'id_fabricator_prod' => $id_fabricator, 'medicinal_price_form' => $medicinal_price_form]);




header('Location: /');
