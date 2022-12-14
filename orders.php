<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Список заказов</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        .container {
            width: 800px;
        }
    </style>
</head>
<body>
<div class="container">
    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="http://127.0.0.1:8080/" title="Главная">Главная</a>
            </div>
            </header>


    <div class="p-3 mb-2 bg-dark text-white mt-3 mb-3">Список заказов</div>

    <?php
    $rows = file('orders.csv', FILE_SKIP_EMPTY_LINES);

    if(empty($rows)) {
        echo '<div class="alert alert-info">Заказов нет.</div>';
    } else {
        echo "<table class='table'><tbody>";
        foreach ($rows as $row) {
            $data = str_getcsv($row, ';');
            echo "<tr>
                        <td class='table-success'>{$data['0']}</td>
                        <td class='table-danger'>{$data['1']}</td>
                        <td class='table-dark'>{$data['2']}</td>
            </tr>";

        /*foreach($rows as $row) {
            //we have one line in $line variable
            $data = str_getcsv($row, ';');
            echo "<p>Имя: {$data[0]}, количество: {$data[1]}, артикул: {$data[2]} ";*/
        }
        echo "</table></tbody>";
       }

    ?>

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