<!DOCTYPE html> 
<head>
    <style>
        .merah {
            color: red;
        }

        h1 {
            font-size: 30px;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>Nama</td>
                <td> : </td>
                <td>
                <input type="text" name="nama" value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : ''; ?>">
                    <span class="merah">
                         * 
                        <?php
                            if (isset($_POST['submit'])) {
                                if (empty($_POST['nama'])) {
                                    echo "nama tidak boleh kosong";
                                }
                            }
                        ?>
                        </span> 
                </td>
            </tr>
            <tr>
                <td>NIM</td>
                <td> : </td>
                <td>
                <input type="text" name="nim" value="<?php echo isset($_POST['nim']) ? $_POST['nim'] : ''; ?>">
                     <span class="merah">
                         * 
                        <?php
                            if (isset($_POST['submit'])) {
                                if (empty($_POST['nim'])) {
                                    echo "nim tidak boleh kosong";
                                }
                            }
                        ?>
                        </span> 
                </td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td> : </td>
                <td>
                     <span class="merah">
                        * 
                        <?php
                        if (isset($_POST['submit'])) {
                            if (empty($_POST['gender'])) {
                                echo "jenis kelamin tidak boleh kosong";
                            }
                        }
                        ?>
                     </span>
                </td>
            </tr>
            <tr>
                <td><input type="radio" name="gender" value="Laki-Laki" <?php if (isset($_POST['gender']) && $_POST['gender'] == 'Laki-Laki') echo 'checked'; ?>>Laki-Laki</td>
            </tr>
            <tr>
                <td><input type="radio" name="gender" value="Perempuan" <?php if (isset($_POST['gender']) && $_POST['gender'] == 'Perempuan') echo 'checked'; ?>>Perempuan</td>
            </tr>
        </table>

        <button type="submit" name="submit">Submit</button>
    </form>

    <?php
    if (isset($_POST['submit']) && !empty($_POST['nama']) && !empty($_POST['nim']) && !empty($_POST['gender'])) {
        echo "<h1>Output</h1>";
        echo $_POST['nama'] . "<br>";
        echo $_POST['nim'] . "<br>";
        echo $_POST['gender'] . "<br>";
    }
    ?>
</body>
</html>