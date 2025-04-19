<!DOCTYPE html>
<body>
    <form action="" method="post">
        <input type="text" name="kata" value="<?php echo isset($_POST['kata']) ? $_POST['kata'] : ''; ?>">
        <button type="submit" name="submit">Submit</button>
        <br><br>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $kata = $_POST['kata'];
        $pisah = str_split($kata);

        foreach ($pisah as $huruf) {
            for ($i = 0; $i < count($pisah); $i++) {
                if ($i == 0) {
                    echo strtoupper($huruf);
                } else {
                    echo strtolower($huruf);
                }
            }
        }
    }
    ?>
</body>
</html>