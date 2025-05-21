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
        </style>
    </head>
    <body>
        <?php
        $samsung= array("Samsung Galaxy S22", "Samsung Galaxy S22+", "Samsung Galaxy A03", "Samsung Galaxy Xcover 5");
        ?>
        <table border="1">
            <tr>
                <th>Daftar Smartphone Samsung</th>
            </tr>

            <?php foreach ($samsung as $item): ?>

            <tr>
                <td> <?= $item; ?> </td>
            </tr>

            <?php endforeach; ?>
        </table>
    </body>
</html>