<?php
$db = new SQLite3('db.sqlite');

$catalogResults = $db->query('SELECT
                tvs.id AS tvs_id, tvs.name AS tvs_name, tvs.image_file_name AS tvs_image_file_name, b.name AS brands_name
                FROM tvs
                LEFT JOIN brands b ON b.id = tvs.brand_id');

$brandResults = $db->query('');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Магазин Главная</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <header>
        <nav class="navbar navbar-expand-lg bg-light mb-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="http://127.0.0.1:8080/orders.php" title="Список заказов" >Список заказов</a>
            </header>

    <div id="catalog">
        <h2>Каталог</h2>
        <div class="row  justify-content-center">
        <?php

        while ($row = $catalogResults->fetchArray(SQLITE3_ASSOC)) {
            echo "<div class='p-3 mb-3 ms-3 border col-3'>
                     <a href='http://127.0.0.1:8080/tv.php?id={$row['tvs_id']}'>{$row['brands_name']} {$row['tvs_name']}
                        <img src='http://127.0.0.1:8080/image/{$row['tvs_image_file_name']}' width='100%'>
                     </a>
                  </div>";
        }

        ?>
        </div><!-- /.row -->
    </div>

    <h2>Форма заказа</h2>
    <form action="checkout.php" method="post">

        <label for="television">Выберете модель телевизора</label>
        <select name="television_id" id="television" class="form-select" aria-label="Default select example">

            <?php

            foreach ($brands as $brand) {

                echo '<optgroup label="' . $brand['name'] . '">';

                foreach ($tvs as $row) {

                    if ($row['brandId'] !== $brand['id']) {
                        continue;
                    }

                    echo '<option value="' . $row['id'] . '">' . $brand['name']. ' ' . $row['modelName'] . ' ' . $row['price'] . '</option>';
                }

                echo '</optgroup>';
            }
            ?>
        </select>
        <br>
        <div>
            <label for="count">Количество</label>
            <input class="form-control" name="count" id="count" type="number" min="0" max="5"> <br>
        </div>
        <br>
        <div>
            <label for="count">Введите ваше имя для заказа</label>
            <input name="name" id="name" type="text" class="form-control"> <br>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Отравить</button>
        </div>

    </form>


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk"
        crossorigin="anonymous"></script>
</body>
</html>


