<!DOCTYPE html>
<head>
    <style>
        .merah {
            color: red;
        }
        .hijau {
            color: green;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        Tinggi: <input type="number" name="tinggi" value="<?php echo isset($_POST['tinggi']) ? $_POST['tinggi'] : ''; ?>">
        <br>
        Alamat Gambar: <input type="text" name="gambar" value="<?php echo isset($_POST['gambar']) ? $_POST['gambar'] : ''; ?>">
        <br>
        <button type="submit" name="submit">Cetak</button>
        <br><br>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $tinggi = $_POST['tinggi'];
        $gambar = $_POST['gambar'];
        $baris = 0;

        while ($baris < $tinggi) {
            $spasi = 0;

            while ($spasi < $baris) {
                echo "<img style='width:25px; opacity:0;' src='$gambar' alt=''>";
                $spasi++;
            }

            $gambarIsi = $tinggi - $baris;
            
            while ($gambarIsi > 0) {
                echo "<img style='width:25px;' src='$gambar' alt=''>";
                $gambarIsi--;
            }

            echo "<br>";
            $baris++;
        }
    }
    ?>
</body>
</html>