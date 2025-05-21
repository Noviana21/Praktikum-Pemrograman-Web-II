<!DOCTYPE html>
<body>
    <?php
    $bintang = null;
    $gambar = "bintang.png";

    if (isset($_POST['submit'])) {
        $bintang = $_POST['jumlah'];
    } elseif (isset($_POST['tambah'])) {
        $bintang = $_POST['jumlah'] + 1;
    } elseif (isset($_POST['kurang'])) {
        $bintang = $_POST['jumlah'] - 1;
    }
    ?>

    <?php if ($bintang == null) : ?>
    <form action="" method="post">
        Jumlah bintang:
        <input type="number" name="jumlah" value="">
        <br>
        <button type="submit" name="submit">Cetak</button>
        <br><br><br><br>
        </form>
    <?php endif; ?>

    <?php if ($bintang != null) : ?>
    <p>Jumlah bintang: <?= $bintang ?></p>
    <br>
    <?php 
    for ($i = 1; $i <= $bintang; $i++) {
        echo "<img style='width:60px;' src='$gambar' alt=''>";
    }
    ?>

    <form action="" method="post">
        <input type="hidden" name="jumlah" value="<?= $bintang ?>">
        <br>
        <button type="submit" name="tambah">Tambah</button>
        <button type="submit" name="kurang">Kurang</button>
    </form>
    <?php endif; ?>
</body>
</html>