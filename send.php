<?php
// получение даных с формы и запись из в переменные
$id_substance_form = $_POST['id_substance'];
$name_substance_form = $_POST['name_substance_form'];
$id_fabricator = $_POST['id_fabricator'];
$name_fabricator_form = $_POST['name_fabricator_form'];
$sourse_fabricator_form = $_POST['sourse_fabricator_form'];
$name_medicinal_form = $_POST['name_medicinal_form'];
$medicinal_price_form = $_POST['medicinal_price_form'];

// проверка на незаполененые поля, если хотя бы одно поле будет не заполненно выполнение дальнейшего кода не выполняется

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


// подключение к базе даных

require('connection.php');





// так как в базе данных стоит уникальное значение индетефикаторов id_substance и id_fabricator реализована проверка уже сущетвующие значения

// проверка поля id_substance на уже сущетвующие значения в базе данных
// выбор поля id_substance
$query = $pdo->query('SELECT * FROM `active_substance` WHERE id_substance');
// цыкл переберающий все значения в базе данных на наличие совпадений
while ($row = $query->fetch(PDO::FETCH_BOTH)) {
    if ($row[0] == $id_substance) {
        // если найдены совпадения выдаем ошибку
        print 'В таблице "Действующие вещество" уже существует такой артикул';
        exit();
    }
}


// проверка поля id_fabricator на уже сущетвующие значения в базе данных
// выбор поля id_fabricator
$query = $pdo->query('SELECT * FROM `fabricator` WHERE id_fabricator');
// цыкл переберающий все значения в базе данных на наличие совпадений
while ($row = $query->fetch(PDO::FETCH_BOTH)) {
    if ($row[0] == $id_substance) {
        // если найдены совпадения выдаем ошибку
        print 'В таблице "Производитель" уже существует такой артикул';
        exit();
    }
}

// выбор таблицы active_substance, выбор полей id_substance, name_substance и присваивание им значений :id_substance, :name_substance_form
$sql = 'INSERT INTO active_substance(id_substance, name_substance) VALUES (:id_substance, :name_substance_form)';
// подгатовление запроса
$query = $pdo->prepare($sql);
// подставление данных из переменных в запрос
$query->execute(['id_substance' => $id_substance, 'name_substance_form' => $name_substance_form]);



// выбор таблицы fabricator, выбор полей id_fabricator ,name_fabricator, source_src и присваивание им значений :id_fabricator ,:name_fabricator_form, :sourse_fabricator_form
$sql = 'INSERT INTO fabricator(id_fabricator ,name_fabricator, source_src) VALUES (:id_fabricator ,:name_fabricator_form, :sourse_fabricator_form)';
// подгатовление запроса
$query = $pdo->prepare($sql);
// подставление данных из переменных в запрос
$query->execute(['id_fabricator' => $id_fabricator, 'name_fabricator_form' => $name_fabricator_form, 'sourse_fabricator_form' => $sourse_fabricator_form]);




// выбор таблицы medicinal_product, выбор полей name_medicinal, id_substanse_prod, id_fabricator_prod, price
//  и присваивание им значений :name_medicinal_form, :id_substanse_prod, :id_fabricator_prod, :medicinal_price_form
$sql = 'INSERT INTO medicinal_product(name_medicinal, id_substanse_prod, id_fabricator_prod, price) VALUES (:name_medicinal_form, :id_substanse_prod, :id_fabricator_prod, :medicinal_price_form)';
// подгатовление запроса
$query = $pdo->prepare($sql);
// подставление данных из переменных в запрос
$query->execute(['name_medicinal_form' => $name_medicinal_form, 'id_substanse_prod' => $id_substance, 'id_fabricator_prod' => $id_fabricator, 'medicinal_price_form' => $medicinal_price_form]);



// возращение на главную страничку
header('Location: /');
