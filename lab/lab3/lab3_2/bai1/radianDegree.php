<?php

    const PI = 3.14;

    function radianToDegree($radian) {
        $degree = $radian * 180 / PI;
        return round($degree, 2);
    }

    function degreeToRadian($degree) {
        $radian = $degree * PI / 180;
        return round($radian, 2);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radian vs. Degree</title>
</head>
<body>

    <form action="radianDegree.php" method="POST">

        <input type="radio" name="choice" id="radian" value="radian" checked>
        <label for="radian">Radian</label>
        <input type="text" name="radian">

        <input type="radio" name="choice" id="degree" value="degree">
        <label for="degree">Degree</label>
        <input type="text" name="degree" disabled>

        <input type="submit" value="Submit">
    </form>

    <script>

        let radianRadio = document.querySelector('#radian');
        let degreeRadio = document.querySelector('#degree');

        let radianTextInput = document.querySelector('input[name="radian"]');
        let degreeTextInput = document.querySelector('input[name="degree"]');

        radianRadio.onchange = function () {
            degreeTextInput.toggleAttribute('disabled', true);
            radianTextInput.toggleAttribute('disabled', false);
        };

        degreeRadio.onchange = function () {
            degreeTextInput.toggleAttribute('disabled', false);
            radianTextInput.toggleAttribute('disabled', true);
        };
    </script>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (array_key_exists('radian', $_POST)) {
                $radian = $_POST["radian"];
                echo "Result: ", radianToDegree($radian), " deg";
            }
            if (array_key_exists('degree', $_POST)) {
                $degree = $_POST["degree"];
                echo "Result: ", degreeToRadian($degree), " rad";
            }
        }
    ?>
</body>
</html>