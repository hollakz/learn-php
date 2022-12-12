<?php

$brands = [
    [
        'id' => 1,
        'name' => 'Samsung'
    ],
    [
        'id' => 2,
        'name' => 'LG'
    ],
    [
        'id' => 3,
        'name' => 'Sony'
    ]
];

$tvs = [
    [
        'id' => 1,
        'brandId' => 1,
        'modelName' => 'QE65QN900A',
        'price' => 50001,
        'image' => '<img src="image/samsung.jpg" width="100%">'
    ],
    [
        'id' => 2,
        'brandId' => 1,
        'modelName' => 'QE65QN900B',
        'price' => 50002,
        'image' => '<img src="image/samsung.jpg" width="100%">'
    ],
    [
        'id' => 3,
        'brandId' => 2,
        'modelName' => 'LM55HD',
        'price' => 50003,
        'image' => '<img src="image/samsung.jpg" width="100%">'
    ],
    [
        'id' => 4,
        'brandId' => 2,
        'modelName' => 'LM65HD',
        'price' => 50004,
        'image' => '<img src="image/samsung.jpg" width="100%">'
    ],
    [
        'id' => 5,
        'brandId' => 3,
        'modelName' => 'QXR-65A95K',
        'price' => 50005,
        'image' => '<img src="image/samsung.jpg" width="100%">'
    ],
    [
        'id' => 6,
        'brandId' => 3,
        'modelName' => 'QXR-75A95K',
        'price' => 50006,
        'image' => '<img src="image/samsung.jpg" width="100%">'
    ]
];

function findBrandById($brandId, $brands): ?array
{
    // найти в массиве брендов нужный по id и вернуть его
    foreach ($brands as $brand) {
        if($brandId === $brand['id']) {
            return $brand;
        }
    }

    return null;
}



// try to connect to sqlite db abd fetch some data
$db = new SQLite3('db.sqlite');
$results = $db->query('SELECT * FROM tvs');
while ($tv = $results->fetchArray(SQLITE3_ASSOC)) {
    echo "{$tv['name']}";
}
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

        foreach ($tvs as $tv) {
            $brand = findBrandById($tv['brandId'], $brands);
            echo "<div class='p-3 mb-3 ms-3 border col-3'><a href='http://127.0.0.1:8080/tv.php?id={$tv['id']}'>{$brand['name']} {$tv['modelName']} {$tv['image']}</a></div>";
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

                foreach ($tvs as $tv) {

                    if ($tv['brandId'] !== $brand['id']) {
                        continue;
                    }

                    echo '<option value="' . $tv['id'] . '">' . $brand['name']. ' ' . $tv['modelName'] . ' ' . $tv['price'] . '</option>';
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


