<!DOCTYPE html>
<head>
    <title>Praktikum 3 Soal 3</title>
</head>

<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>Batas Bawah</td>
                <td> : </td>
                <td><input type="number" name="bawah" value="<?php echo isset($_POST['bawah']) ? $_POST['bawah'] : ''; ?>"></td>
            </tr>
            <tr>
                <td>Batas Atas</td>
                <td> : </td>
                <td><input type="number" name="atas" value="<?php echo isset($_POST['atas']) ? $_POST['atas'] : ''; ?>"></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Cetak</button></td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $bawah = $_POST['bawah'];
        $atas = $_POST['atas'];
        $gambar = "bintang.png";

        do {
            if (($bawah + 7) % 5 == 0) {
                echo "<img style='width:20px;' src='$gambar' alt=''>";
            } else {
                echo " $bawah ";
            }

            $bawah++;
        } while ($bawah <= $atas);
    }
    ?>
</body>
</html>