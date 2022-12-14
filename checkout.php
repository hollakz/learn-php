<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Заказ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        .container {
            width: 800px;
        }
        div.thx {
            text-align:  center;
        }
    </style>
</head>
<body>
<div class="container">
    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="http://127.0.0.1:8080/" title="Главная">Главная</a>
                <a class="navbar-brand" href="http://127.0.0.1:8080/orders.php" title="Список заказов">Список заказов</a>
</div>
    </header>

<?php
$orderRow = "{$_POST['name']};{$_POST['count']};{$_POST['television_id']};" . PHP_EOL;
file_put_contents('orders.csv', $orderRow, FILE_APPEND);
?>
    <div class="alert alert-primary thx mt-5" role="alert">
        Спасибо за ваш заказ!
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>

<!--//-->
<!--// file_put_contents('db.txt', $formDataStr);-->
<!--//-->
<!--//-->
<!--// по результатам отправки формы должна появляться стркоа в файле-->
