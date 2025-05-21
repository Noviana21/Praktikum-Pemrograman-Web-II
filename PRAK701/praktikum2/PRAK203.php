<!DOCTYPE html>
<body>
    <form action="" method="post">
        Nilai: <input type="number" name="nilai" value="<?php echo isset($_POST['nilai']) ? $_POST['nilai'] : ''; ?>">
        <br>
        Dari: 
        <br>
        <input type="radio" name="dari" value="celcius" <?php if (isset($_POST["dari"]) and $_POST["dari"] == "celcius") echo "checked";?>>Celcius<br>
        <input type="radio" name="dari" value="fahrenheit" <?php if (isset($_POST["dari"]) and $_POST["dari"] == "fahrenheit") echo "checked";?>>Fahrenheit<br>
        <input type="radio" name="dari" value="reamur" <?php if (isset($_POST["dari"]) and $_POST["dari"] == "reamur") echo "checked";?>>Reamur<br>
        <input type="radio" name="dari" value="kelvin" <?php if (isset($_POST["dari"]) and $_POST["dari"] == "kelvin") echo "checked";?>>Kelvin<br>
        Ke: <br>
        <input type="radio" name="ke" value="celcius" <?php if (isset($_POST["ke"]) and $_POST["ke"] == "celcius") echo "checked";?>>Celcius<br>
        <input type="radio" name="ke" value="fahrenheit" <?php if (isset($_POST["ke"]) and $_POST["ke"] == "fahrenheit") echo "checked";?>>Fahrenheit<br>
        <input type="radio" name="ke" value="reamur" <?php if (isset($_POST["ke"]) and $_POST["ke"] == "reamur") echo "checked";?>>Reamur<br>
        <input type="radio" name="ke" value="kelvin" <?php if (isset($_POST["ke"]) and $_POST["ke"] == "kelvin") echo "checked";?>>Kelvin<br>
        <button type="submit" name="submit">Konversi</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        if (!empty($_POST["dari"]) && !empty($_POST["ke"])) {
            $nilai = $_POST['nilai'];

            $celciustofahrenheit = (9 / 5) * $nilai + 32;
            $celciustoreamur = (4 / 5) * $nilai;
            $celciustokelvin = $nilai + 273.15;

            $fahrenheittocelcius = (5 / 9) * ($nilai - 32);
            $fahrenheittoreamur = (4 / 9) * ($nilai - 32);
            $fahrenheittokelvin = ($nilai - 32) + 273.15;

            $reamurtocelcius = (5 / 4) * $nilai;
            $reamurtokelvin = (5 / 4) * $nilai + 273.15;
            $reamurtfahrenheit = (9 / 4) * $nilai + 32;

            $kelvintocelcius = $nilai - 273.15;
            $kelvintofahrenheit = (9 / 5) * ($nilai - 273.15) + 32;
            $kelvintoreamur = (4 / 5) * ($nilai - 273.15);
            $kelvintoreamur = (4 / 5) * ($nilai - 273.15);

            echo "<h1>Hasil Konversi: </h1>";
            if ($_POST["dari"] == "celcius" && $_POST["ke"] == "celcius") {
                echo "$nilai Celcius &degC";
            } elseif ($_POST["dari"] == "celcius" && $_POST["ke"] == "fahrenheit") {
                echo $celciustofahrenheit . " &degF";
            } elseif ($_POST["dari"] == "celcius" && $_POST["ke"] == "reamur") {
                echo $celciustoreamur . " &degR";
            } elseif ($_POST["dari"] == "celcius" && $_POST["ke"] == "kelvin") {
                echo $celciustokelvin . " K";
            } elseif ($_POST["dari"] == "fahrenheit" && $_POST["ke"] == "celcius") {
                echo $fahrenheittocelcius . " &degC";
            } elseif ($_POST["dari"] == "fahrenheit" && $_POST["ke"] == "fahrenheit") {
                echo "$nilai &degF";
            } elseif ($_POST["dari"] == "fahrenheit" && $_POST["ke"] == "reamur") {
                echo $fahrenheittoreamur . " &degR";
            } elseif ($_POST["dari"] == "fahrenheit" && $_POST["ke"] == "kelvin") {
                echo $fahrenheittokelvin . " K";
            } elseif ($_POST["dari"] == "reamur" && $_POST["ke"] == "celcius") {
                echo $reamurtocelcius . " &degC";
            } elseif ($_POST["dari"] == "reamur" && $_POST["ke"] == "fahrenheit") {
                echo $reamurtfahrenheit . " &degF";
            } elseif ($_POST["dari"] == "reamur" && $_POST["ke"] == "reamur") {
                echo "$nilai &degR";
            } elseif ($_POST["dari"] == "reamur" && $_POST["ke"] == "kelvin") {
                echo $reamurtokelvin . " K";
            } elseif ($_POST["dari"] == "kelvin" && $_POST["ke"] == "celcius") {
                echo $kelvintocelcius . "&degC";
            } elseif ($_POST["dari"] == "kelvin" && $_POST["ke"] == "fahrenheit") {
                echo $kelvintofahrenheit . "&degF";
            } elseif ($_POST["dari"] == "kelvin" && $_POST["ke"] == "reamur") {
                echo $kelvintoreamur . "&degR";
            } elseif ($_POST["dari"] == "kelvin" && $_POST["ke"] == "kelvin") {
                echo "$nilai K";
            }
        } else {
            echo "<h1>Silahkan pilih suhu yang ingin dikonversi</h1>";
        }
    }
    ?>
</body>
</html>