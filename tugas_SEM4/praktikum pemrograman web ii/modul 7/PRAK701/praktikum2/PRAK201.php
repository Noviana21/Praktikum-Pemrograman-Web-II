<!DOCTYPE html> 
<body>
    <form action="" method="post">
        Nama: 1 <input type="text" name="nama1"><br>
        Nama: 2 <input type="text" name="nama2"><br>
        Nama: 3 <input type="text" name="nama3"><br>

        <button type="submit" name="Urut">Urutkan</button>
    </form>

    <?php
        if (isset($_POST['Urut'])) {
            $test = [$_POST['nama1'], $_POST['nama2'], $_POST['nama3']];
            sort($test);
            foreach ($test as $nama) {
                echo "$nama <br>";
            }
        }
    ?>
</body>
</html>