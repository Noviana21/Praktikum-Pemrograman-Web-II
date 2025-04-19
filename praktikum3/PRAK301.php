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
        Jumlah Peserta: <input type="number" name="jumlah" value="<?php echo isset($_POST['jumlah']) ? $_POST['jumlah'] : ''; ?>">
        <br>
        <button type="submit" name="submit">Cetak</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $tebak = $_POST['jumlah'];
        $x = 1;

        while ($x <= $tebak) {
            if ($x % 2 == 0) {
                echo "<h2 class='hijau'>Peserta ke-$x</h2>";
            } else {
                echo "<h2 class='merah'>Peserta ke-$x</h2>";
            }

            $x++;
        }
    }
    ?>
</body>
</html>