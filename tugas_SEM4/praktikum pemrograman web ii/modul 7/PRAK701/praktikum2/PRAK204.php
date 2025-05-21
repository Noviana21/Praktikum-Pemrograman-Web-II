<!DOCTYPE html>
<body>
    <form action="" method="post">
        Nilai: <input type="number" name="nilai" value="<?php echo isset($_POST['nilai']) ? $_POST['nilai'] : ''; ?>">
        <button type="submit" name="submit">Konversi</button>
    </form>
    
    <?php
    if (isset($_POST['submit'])) {
        echo "<h1>";

        if (empty($_POST["nilai"]) || !empty($_POST["nilai"])) {
            echo "Hasil: ";
        }

        if ($_POST["nilai"] == 0) {
            echo "Nol";
        } elseif ($_POST["nilai"] > 0 && $_POST["nilai"] < 10) {
            echo "Satuan";
        } elseif ($_POST["nilai"] >= 11 && $_POST["nilai"] <= 19) {
            echo "Belasan";
        } elseif ($_POST["nilai"] > 19 && $_POST["nilai"] < 100) {
            echo "Puluhan";
        } elseif ($_POST["nilai"] >= 100 && $_POST["nilai"] < 1000) {
            echo "Ratusan";
        } elseif ($_POST["nilai"] >= 1000 && $_POST["nilai"] < 10000) {
            echo "Ribuan";
        } elseif ($_POST["nilai"] >= 10000 && $_POST["nilai"] < 100000) {
            echo "Puluhan Ribu";
        } elseif ($_POST["nilai"] >= 100000 && $_POST["nilai"] < 1000000) {
            echo "Ratusan Ribu";
        } elseif ($_POST["nilai"] >= 1000000) {
            echo "Satu juta atau lebih";
        } else {
            echo "Bilangan negatif";
        }

        echo "</h1>";
    }
    ?>
</body>
</html>