<!DOCTYPE html>
<head>
    <title>PRAK402</title>
    <style>
        table, tr, td, th {
            border: solid 1px black;
            border-collapse: collapse;
            padding: 8px;
        }

        table{
            width: 600px;
            margin: auto;
        }

        th{
            background-color: #ffc0cb;
            text-align: left;
        }
    </style>
</head>
<body>
    <?php
    $array = [
        ["nama" => "Andi", "nim" => "2101001", "uts" => 87, "uas" => 65],
        ["nama" => "Budi", "nim" => "2101002", "uts" => 76, "uas" => 79],
        ["nama" => "Tono", "nim" => "2101003", "uts" => 50, "uas" => 41],
        ["nama" => "Jessica", "nim" => "2101004", "uts" => 60, "uas" => 75]
    ];

    for ($i = 0; $i < count($array); $i++) {
        $array[$i]['nilai_akhir'] = (($array[$i]['uts'] * 0.4) + ($array[$i]['uas']) * 0.6);

        if ($array[$i]["nilai_akhir"] >= 80) {
            $array[$i]['huruf'] = 'A';
        } elseif ($array[$i]['nilai_akhir'] > 70) {
            $array[$i]['huruf'] = 'B';
        } elseif ($array[$i]['nilai_akhir'] > 60) {
            $array[$i]['huruf'] = 'C';
        } elseif ($array[$i]['nilai_akhir'] > 50) {
            $array[$i]['huruf'] = 'D';
        } else {
            $array[$i]['huruf'] = 'E';
        }
    }
    ?>

    <table>
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Akhir</th>
            <th>Huruf</th>
        </tr>
        <?php foreach ($array as $data) : ?>
        <tr>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['nim'] ?></td>
            <td><?= $data['uts'] ?></td>
            <td><?= $data['uas'] ?></td>
            <td><?= $data['nilai_akhir'] ?></td>
            <td><?= $data['huruf'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>