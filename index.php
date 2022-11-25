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
        <ul class="header-top">
            <li><a href="http://127.0.0.1:8080/orders.php" title="Список заказов">Список заказов</a></li>
        </ul>
    </header>

    <form action="checkout.php" method="post">

        <label for="television">Выберете модель телевизора</label>
        <select name="television_id" id="television" class="form-select" aria-label="Default select example">

            <?php
            $television = [
                'Samsung' => [
                    [
                        'id' => 1, // будет отправвлено в форме
                        'model' => 'QE65QN900A',
                        'diagonal' => 42,
                        'color' => 'white'
                    ],
                    [
                        'id' => 2,
                        'model' => 'QE65QN900B',
                        'diagonal' => 50,
                        'color' => 'white'
                    ]
                ],
                'LG' => [
                    [
                        'id' => 3,
                        'model' => 'LM55HD',
                        'diagonal' => 55,
                        'color' => 'black'
                    ],
                    [
                        'id' => 4,
                        'model' => 'LM65HD',
                        'diagonal' => 65,
                        'color' => 'white'
                    ]
                ],
                'Sony' => [
                    [
                        'id' => 5,
                        'model' => 'QXR-65A95K',
                        'diagonal' => 65,
                        'color' => 'silver'
                    ],
                    [
                        'id' => 6,
                        'model' => 'QXR-75A95K',
                        'diagonal' => 75,
                        'color' => 'black'
                    ]
                ],
            ];


            //echo $television['Samsung']['model'];
            foreach ($television as $brand => $array) {

                echo '<optgroup label="' . $brand . '">';

                foreach ($array as $value) {
                    echo '<option value="' . $value['id'] . '">' . $brand . ' ' . $value['model'] . ' ' . $value['color'] . '</option>';
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


