<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medications</title>
    <!-- фавикон -->
    <link rel="icon" href="/img/favicon/icons8-heart-health-50.png" type="image/x-icon">
    <!-- шрифт -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <!-- стили -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Создание класа-огранечителя -->
    <div class="wrapper">
        <!-- создание общего класа -->
        <div class="wrap">
            <!-- форма для добавление в базу даных -->
            <details open>
                <summary>Добавить данные</summary>
                <section class="send">

                    <form action="send.php" class="send__form" method="POST">


                        <p class="send__form__text">Действующие вещество</p>

                        <input name="id_substance_form" placeholder="Введите артикул" class="send__form__input" type="text" required>

                        <input name="name_substance_form" placeholder="Введите вещество" class="send__form__input" type="text" required>

                        <p class="send__form__text">Производитель</p>

                        <input name="id_fabricator" class="send__form__input" placeholder="Введите артикул" type="text" required>

                        <input name="name_fabricator_form" class="send__form__input" placeholder="Производитель" type="text" required>

                        <input name="sourse_fabricator_form" class="send__form__input" placeholder="Ссылка на производителя" type="text" required>

                        <p class="send__form__text">Лекарсвеное вещество</p>

                        <input name="name_medicinal_form" class="send__form__input" placeholder="Название лекарства" type="text" required>

                        <input name="medicinal_price_form" class="send__form__input" placeholder="Цена лекарства" type="text" required>


                        <button class="send__form__button" type="submit">Отправить</button>

                    </form>

                </section>
            </details>
        </div>
    </div>






    <!-- секция для вывода даных с базы даных в таблицу -->
    <section>
        <details open>
            <summary>Открыть таблицы</summary>
            <div class="data__base">

                <!-- вывод артикула из таблицы "Действующие вещества" -->

                <table>
                    <tr>
                        <td>
                            <!-- имя столбика -->
                            <p>Артикул вещества</p>
                            <?php
                            // поключение к базе данных
                            require('connection.php');
                            // выбор нужной таблицы
                            $query = $pdo->query('SELECT * FROM `active_substance`');
                            // цыкл который выводит даные из таблицы
                            while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                                // обращение к полю таблицы и вывод из ней даных
                                echo '<tr><td>' . $row->id_substance . '';
                                // фукция "редактирования записей" для конкретного поля
                                echo '<a href="/updater.php?upd_id_substance=' . $row->id_substance . '"><img class="btn-table" src="/img/icons/icons8-pencil-50.png" alt=""></a></td></tr>';
                            }
                            ?>
                        </td>
                    </tr>
                </table>

                <!-- вывод название из таблицы "Действующие вещества" -->

                <table>
                    <tr>
                        <td>
                            <!-- имя столбика -->
                            <p>Вещество</p>
                            <?php
                            // поключение к базе данных
                            require('connection.php');
                            // выбор нужной таблицы
                            $query = $pdo->query('SELECT * FROM `active_substance`');
                            // цыкл который выводит даные из таблиц
                            while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                                // обращение к полю таблицы и вывод из ней даных
                                echo '<tr><td>' . $row->name_substance . '';
                                // фукция "редактирования записей" для конкретного поля
                                echo '<a href="/updater.php?upd_name_substance=' . $row->name_substance . '"><img class="btn-table" src="/img/icons/icons8-pencil-50.png" alt=""></a>/td></tr>';
                            }
                            ?>
                        </td>
                    </tr>
                </table>

                <!-- вывод артикула производителя -->

                <table>
                    <tr>
                        <td>
                            <!-- имя столбика -->
                            <p>Артикул производителя</p>
                            <?php
                            // поключение к базе данных
                            require('connection.php');
                            // выбор нужной таблицы
                            $query = $pdo->query('SELECT * FROM `fabricator`');
                            // цыкл который выводит даные из таблиц
                            while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                                // обращение к полю таблицы и вывод из ней даных
                                echo '<tr><td>' . $row->id_fabricator . '';
                                // фукция "редактирования записей" для конкретного поля
                                echo '<a href="/updater.php?upd_id_fabricator=' . $row->id_fabricator . '"><img class="btn-table" src="/img/icons/icons8-pencil-50.png" alt=""></a></td></tr>';
                            }
                            ?>
                        </td>
                    </tr>
                </table>

                <!-- вывод названия компании производителя -->

                <table>
                    <tr>
                        <td>
                            <!-- имя столбика -->
                            <p>Производитель</p>
                            <?php
                            // поключение к базе данных
                            require('connection.php');
                            // выбор нужной таблицы
                            $query = $pdo->query('SELECT * FROM `fabricator`');
                            // цыкл который выводит даные из таблиц
                            while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                                // обращение к полю таблицы и вывод из ней даных
                                echo '<tr><td>' . $row->name_fabricator . '';
                                // фукция "редактирования записей" для конкретного поля
                                echo '<a href="/updater.php?upd_name_fabricator=' . $row->name_fabricator . '"><img class="btn-table" src="/img/icons/icons8-pencil-50.png" alt=""></a></td></tr>';
                            }
                            ?>
                        </td>
                    </tr>
                </table>


                <!-- вывод ссылки на ресурс производителя -->


                <table>
                    <tr>
                        <td>
                            <!-- имя столбика -->
                            <p>Ссылка производителя</p>
                            <?php
                            // поключение к базе данных
                            require('connection.php');
                            // выбор нужной таблицы
                            $query = $pdo->query('SELECT * FROM `fabricator`');
                            // цыкл который выводит даные из таблиц
                            while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                                // обращение к полю таблицы и вывод из ней даных
                                echo '<tr><td>' . $row->source_src . '';
                                // фукция "редактирования записей" для конкретного поля
                                echo '<a href="/updater.php?upd_sourse_fabricator=' . $row->source_src . '"><img class="btn-table" src="/img/icons/icons8-pencil-50.png" alt=""></a></td></tr>';
                            }
                            ?>
                        </td>
                    </tr>
                </table>

                <!-- вывод артикула лекарсва !важно - без кнопки изменения так-как идентификатор задается с помощью автоинкремента -->

                <table>
                    <tr>
                        <td>
                            <!-- имя столбика -->
                            <p>Артикул лекарства</p>
                            <?php
                            // поключение к базе данных
                            require('connection.php');
                            // цыкл который выводит даные из таблиц
                            $query = $pdo->query('SELECT * FROM `medicinal_product`');
                            // выбор нужной таблицы
                            while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                                // обращение к полю таблицы и вывод из ней даных
                                echo "<tr><td>$row->id_medicinal</td></tr>";
                            }
                            ?>
                        </td>
                    </tr>
                </table>


                <!-- вывод названия лекарства -->

                <table>
                    <tr>
                        <td>
                            <!-- имя столбика -->
                            <p>Название лекарства</p>
                            <?php
                            // поключение к базе данных
                            require('connection.php');
                            // выбор нужной таблицы
                            $query = $pdo->query('SELECT * FROM `medicinal_product`');
                            // цыкл который выводит даные из таблиц
                            while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                                // обращение к полю таблицы и вывод из ней даных
                                echo '<tr><td>' . $row->name_medicinal . '';
                                // фукция "редактирования записей" для конкретного поля
                                echo '<a href="/updater.php?upd_name_medicinal=' . $row->name_medicinal . '"><img class="btn-table" src="/img/icons/icons8-pencil-50.png" alt=""></a></td></tr>';
                            }
                            ?>
                        </td>
                    </tr>
                </table>

                <!-- вывод цены за лекарсва -->

                <table>
                    <tr>
                        <td>
                            <!-- имя столбика -->
                            <p>Цена лекарства</p>
                            <?php
                            // поключение к базе данных
                            require('connection.php');
                            // выбор нужной таблицы
                            $query = $pdo->query('SELECT * FROM `medicinal_product`');
                            // цыкл который выводит даные из таблиц
                            while ($row = $query->fetch(PDO::FETCH_OBJ)) {

                                echo '<tr><td>' . $row->price . '';
                                echo '<a href="/updater.php?upd_medicinal_price=' . $row->price . ",грн" . '"><img class="btn-table" src="/img/icons/icons8-pencil-50.png" alt=""></a></td></tr>';
                            }
                            ?>
                        </td>
                    </tr>
                </table>

                <!-- функция которая позволяет удалять записи  -->

                <table>
                    <tr>
                        <td>
                            <!-- имя столбика -->
                            <p>Удалить</p>
                            <?php
                            // поключение к базе данных
                            require('connection.php');
                            // выбор нужной таблицы из которой я брал количество выводимых столбиков
                            $query = $pdo->query('SELECT * FROM `medicinal_product`');
                            // цыкл который выводит даные из таблиц
                            while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                                // отправка даных в delate.php в котором мы удаляем идетефикаторы из таблиц "Действующие вещество"
                                //  и "Производитель" после из-за каскадого типа связей удаляются данные из "Лекаственое средство"
                                echo '<tr><td><a href="/delete.php?id1=' . $row->id_substanse_prod . '&id2=' . $row->id_fabricator_prod . '"><button style="height: 20px;">X</button></a></td></tr>';
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </details>
    </section>
    </div>


    <!-- поключение файла  -->
    <script src="JS/script.js"></script>

</body>

</html>