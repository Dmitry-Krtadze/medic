<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medications</title>
    <link rel="icon" href="/img/favicon/icons8-heart-health-50.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
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







    <section>
        <details open>
            <summary>Открыть таблицы</summary>
            <div class="data__base">

                <table>
                    <tr>
                        <td>
                            <p>Артикул вещества</p>
                            <?php
                            require('connection.php');
                            $query = $pdo->query('SELECT * FROM `active_substance`');
                            while ($row = $query->fetch(PDO::FETCH_OBJ)) {

                                echo '<tr><td>' . $row->id_substance . '';
                                echo '<a href="/updater.php?upd_id_substance=' . $row->id_substance . '"><img class="btn-table" src="/img/icons/icons8-pencil-50.png" alt=""></a>';
                            }
                            ?>

                        </td>
                    </tr>
                    </td>
                    </tr>
                </table>


                <table>
                    <tr>
                        <td>
                            <p>Вещество</p>
                            <?php
                            require('connection.php');
                            $query = $pdo->query('SELECT * FROM `active_substance`');
                            while ($row = $query->fetch(PDO::FETCH_OBJ)) {

                                echo '<tr><td>' . $row->name_substance . '';
                                echo '<a href="/updater.php?upd_name_substance=' . $row->name_substance . '"><img class="btn-table" src="/img/icons/icons8-pencil-50.png" alt=""></a>';
                            }
                            ?>

                        </td>
                    </tr>

                    </td>
                    </tr>
                </table>



                <table>
                    <tr>
                        <td>
                            <p>Артикул производителя</p>
                            <?php
                            require('connection.php');
                            $query = $pdo->query('SELECT * FROM `fabricator`');
                            while ($row = $query->fetch(PDO::FETCH_OBJ)) {

                                echo '<tr><td>' . $row->id_fabricator . '';
                                echo '<a href="/updater.php?upd_id_fabricator=' . $row->id_fabricator . '"><img class="btn-table" src="/img/icons/icons8-pencil-50.png" alt=""></a>';
                            }
                            ?>

                        </td>
                    </tr>

                    </td>
                    </tr>
                </table>



                <table>
                    <tr>
                        <td>
                            <p>Производитель</p>
                            <?php
                            require('connection.php');
                            $query = $pdo->query('SELECT * FROM `fabricator`');
                            while ($row = $query->fetch(PDO::FETCH_OBJ)) {

                                echo '<tr><td>' . $row->name_fabricator . '';
                                echo '<a href="/updater.php?upd_name_fabricator=' . $row->name_fabricator . '"><img class="btn-table" src="/img/icons/icons8-pencil-50.png" alt=""></a>';
                            }
                            ?>

                        </td>
                    </tr>

                    </td>
                    </tr>
                </table>





                <table>
                    <tr>
                        <td>
                            <p>Ссылка производителя</p>
                            <?php
                            require('connection.php');
                            $query = $pdo->query('SELECT * FROM `fabricator`');
                            while ($row = $query->fetch(PDO::FETCH_OBJ)) {

                                echo '<tr><td>' . $row->source_src . '';
                                echo '<a href="/updater.php?upd_sourse_fabricator=' . $row->source_src . '"><img class="btn-table" src="/img/icons/icons8-pencil-50.png" alt=""></a>';
                            }
                            ?>

                        </td>
                    </tr>

                    </td>
                    </tr>
                </table>




                <table>
                    <tr>
                        <td>
                            <p>Артикул лекарства</p>
                            <?php
                            require('connection.php');
                            $query = $pdo->query('SELECT * FROM `medicinal_product`');
                            while ($row = $query->fetch(PDO::FETCH_OBJ)) {

                                echo "<tr><td>$row->id_medicinal</td></tr>";
                            }
                            ?>
                        </td>
                    </tr>

                    </td>
                    </tr>
                </table>




                <table>
                    <tr>
                        <td>
                            <p>Название лекарства</p>
                            <?php
                            require('connection.php');
                            $query = $pdo->query('SELECT * FROM `medicinal_product`');
                            while ($row = $query->fetch(PDO::FETCH_OBJ)) {

                                echo '<tr><td>' . $row->name_medicinal . '';
                                echo '<a href="/updater.php?upd_name_medicinal=' . $row->name_medicinal . '"><img class="btn-table" src="/img/icons/icons8-pencil-50.png" alt=""></a>';
                            }
                            ?>

                        </td>
                    </tr>

                    </td>
                    </tr>
                </table>




                <table>
                    <tr>
                        <td>
                            <p>Цена лекарства, грн</p>
                            <?php
                            require('connection.php');
                            $query = $pdo->query('SELECT * FROM `medicinal_product`');
                            while ($row = $query->fetch(PDO::FETCH_OBJ)) {

                                echo '<tr><td>' . $row->price . '';
                                echo '<a href="/updater.php?upd_medicinal_price=' . $row->price . '"><img class="btn-table" src="/img/icons/icons8-pencil-50.png" alt=""></a>';
                            }
                            ?>

                        </td>
                    </tr>

                    </td>
                    </tr>
                </table>




                <table>
                    <tr>
                        <td>
                            <p>Удалить</p>
                            <?php
                            require('connection.php');
                            $query = $pdo->query('SELECT * FROM `medicinal_product`');
                            while ($row = $query->fetch(PDO::FETCH_OBJ)) {
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



    <script src="JS/script.js"></script>

</body>

</html>