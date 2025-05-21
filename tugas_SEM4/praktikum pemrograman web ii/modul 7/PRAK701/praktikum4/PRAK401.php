<!DOCTYPE html>
<head>
    <style>
        .tabel {
            border: solid 1px black;
            border-collapse: collapse;
            padding: 5px;
            text-align: center;
            margin: 10px;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>Panjang</td>
                <td> : </td>
                <td><input type="number" name="panjang" value="<?php echo isset($_POST['panjang']) ? $_POST['panjang'] : ''; ?>"></td>
            </tr>
            <tr>
                <td>Lebar</td>
                <td> : </td>
                <td><input type="number" name="lebar" value="<?php echo isset($_POST['lebar']) ? $_POST['lebar'] : ''; ?>"></td>
            </tr>
            <tr>
                <td>Nilai</td>
                <td> : </td>
                <td><input type="text" name="nilai" value="<?php echo isset($_POST['nilai']) ? $_POST['nilai'] : ''; ?>"></td>
            </tr>
            <tr></tr>
            <tr>
                <td><button type="submit" name="cetak">Cetak</button></td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST['cetak'])) {
        $panjang = (int) $_POST['panjang'];
        $lebar = (int) $_POST['lebar'];
        $nilai = $_POST['nilai'];

        $nilaimatrix = explode(" ", $_POST['nilai']);

        if ($panjang * $lebar == count($nilaimatrix)) {
            $hitung = 0;

            for ($i=0; $i < $panjang; $i++) {
                for ($j=0; $j < $lebar; $j++) { 
                    $tampil[$i][$j] = $nilaimatrix[$hitung];
                    $hitung++;
                }
            }

            echo '<table class="tabel">';
            for ($i=0; $i < $panjang; $i++) { 
                echo '<tr class="tabel">';
                for ($j=0; $j < $lebar; $j++) { 
                    echo '<td class="tabel">'.$tampil[$i][$j].'</td>';
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Panjang nilai tidak sesuai dengan ukuran matriks";
        }
    }
    ?>
</body>
</html>