<!DOCTYPE html>
<head>
    <title>PRAK403</title>
    <style>
        table, tr, td, th {
            border: solid 1px black;
            border-collapse: collapse;
            padding: 5px;
        }
        table{
            width: 700px;
            margin: auto;
        }

        th{
            background-color: #90d5ff;
            text-align: left;
        }
    </style>
</head>
<body>
    <?php
    $array = [
        ["nomor" => 1, "nama" => "Ridho", "matkul" => [
            ["nama_matkul" => "Pemrograman I", "sks" => 2],
            ["nama_matkul" => "Praktikum Pemrograman I", "sks" => 1],
            ["nama_matkul" => "Pengantar Lingkungan Lahan Basah", "sks" => 2],
            ["nama_matkul" => "Arsitektur Komputer", "sks" => 3]
        ]],
        ["nomor" => 2, "nama" => "Ratna", "matkul" => [
            ["nama_matkul" => "Basis Data I", "sks" => 2],
            ["nama_matkul" => "Praktikum Basis Data I", "sks" => 1],
            ["nama_matkul" => "Kalkulus", "sks" => 3]
        ]],
        ["nomor" => 3, "nama" => "Tono", "matkul" => [
            ["nama_matkul" => "Rekayasa Perangkat Lunak", "sks" => 3],
            ["nama_matkul" => "Analisis dan Perancangan Sistem", "sks" => 3],
            ["nama_matkul" => "Komputasi Awan", "sks" => 3],
            ["nama_matkul" => "Kecerdasan Bisnis", "sks" => 3]
        ]]
        ];

        for ($i = 0; $i < count($array); $i++) {
            $total_sks = 0;
            foreach ($array[$i]['matkul'] as $matkul) {
                $total_sks += $matkul['sks'];
            }
            $array[$i]['total_sks'] = $total_sks;

            if ($array[$i]["total_sks"] < 7) {
                $array[$i]["keterangan"] = "Revisi KRS";
            } else {
                $array[$i]["keterangan"] = "Tidak Revisi";
            }
        }
    ?>

    <table>
        <tr>
            <th>Nomor</th>
            <th>Nama</th>
            <th>Mata Kuliah diambil</th>
            <th>SKS</th>
            <th>Total SKS</th>
            <th>Keterangan</th>
        </tr>
        <?php foreach ($array as $data) : ?>
            <?php $rowspan = count($data['matkul']); ?>

            <?php foreach ($data['matkul'] as $key => $matkul) : ?>
                <tr>
                    <?php if ($key == 0) : ?>
                        <td rowspan="<?= $rowspan ?>"><?= $data['nomor'] ?></td>
                        <td rowspan="<?= $rowspan ?>"><?= $data['nama'] ?></td>
                    <?php endif; ?>

                    <td><?= $matkul['nama_matkul'] ?></td>
                    <td><?= $matkul['sks'] ?></td>

                    <?php if ($key == 0) : ?>
                        <td rowspan="<?= $rowspan ?>"><?= $data['total_sks'] ?></td>
                        <td rowspan="<?= $rowspan ?>" style="background-color: <?= ($data['keterangan'] == 'Tidak Revisi') ? '#4aa02c' : 'red'; ?>">
                            <?= $data['keterangan'] ?>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>