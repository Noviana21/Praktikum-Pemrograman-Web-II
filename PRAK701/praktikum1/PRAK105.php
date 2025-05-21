<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Daftar Smartphone Samsung</title>
        <style>
            tabel {
                font-family: sans-serif;
                color: #232323;
            }
            table, th, td {
                margin: auto;
                border: 1.5px solid;
            }
            th {
                background-color: red;
                padding: 7px 0;
            }
            h1 {
                font-size: 25px;
            }
        </style>
    </head>
    <body>
        <?php
        $samsung= array(
            "S22" => "Samsung Galaxy S22", 
            "S22+" => "Samsung Galaxy S22+", 
            "A03" => "Samsung Galaxy A03", 
            "Xc5" => "Samsung Galaxy Xcover 5"
        );
        ?>
        <table border="1">
            <tr>
                <th>
                    <h1>Daftar Smartphone Samsung</h1>
                </th>
            </tr>
            <tr>
                <td> <?= $samsung["S22"]; ?> </td>
            </tr>
            <tr>
                <td> <?= $samsung["S22+"]; ?> </td>
            </tr>
            <tr>
                <td> <?= $samsung["A03"]; ?> </td>
            </tr>
            <tr>
                <td> <?= $samsung["Xc5"]; ?> </td>
            </tr>
        </table>
    </body>
</html>