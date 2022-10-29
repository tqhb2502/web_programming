<?php

    function displayInLetter($strDate) {
        $date = strtotime($strDate);
        return date("l, F d, Y", $date);
    }

    function getDateDiff($strDate1, $strDate2) {
        $date1 = date_create($strDate1);
        $date2 = date_create($strDate2);
        return date_diff($date1, $date2)->days;
    }

    function getAge($strDoB) {
        $dob = strtotime($strDoB);
        $now = time();
        if (date("md", $dob) < date("md", $now)) {
            $age = intval(date("Y")) - intval(date("Y", $dob));
        } else {
            $age = intval(date("Y")) - intval(date("Y", $dob)) - 1;
        }
        return $age;
    }

    function getDiffYear($strDate1, $strDate2) {
        $date1 = date_create($strDate1);
        $date2 = date_create($strDate2);
        return date_diff($date1, $date2)->y;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DateTimeFunction</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            width: 250px;
        }

        .child {
            margin-left: 16px;
        }

        input[type="submit"] {
            margin-left: 60px;
        }
    </style>
</head>
<body>

    <form action="DateTimeFunction.php" method="POST">
        <label>First person</label>
        <label class="child" for="person1stName">Name</label>
        <input class="child" type="text" name="person1stName" id="person1stName">
        <label class="child" for="person1stDoB">DoB</label>
        <input class="child" type="date" name="person1stDoB" id="person1stDoB">
        <br>
        <label>Second person</label>
        <label class="child" for="person2ndName">Name</label>
        <input class="child" type="text" name="person2ndName" id="person2ndName">
        <label class="child" for="person2ndDoB">DoB</label>
        <input class="child" type="date" name="person2ndDoB" id="person2ndDoB">
        <br>
        <div>
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </div>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $person1stName = $_POST["person1stName"];
            $person1stDoB = $_POST["person1stDoB"];
            $person2ndName = $_POST["person2ndName"];
            $person2ndDoB = $_POST["person2ndDoB"];

            echo "<br>";
            echo "First person birthday: ", displayInLetter($person1stDoB), "<br>";
            echo "Second person birthday: ", displayInLetter($person2ndDoB), "<br>";
            echo "Difference: ", getDateDiff($person1stDoB, $person2ndDoB), " day(s)<br>";
            echo "First person age: ", getAge($person1stDoB), "<br>";
            echo "Second person age: ", getAge($person2ndDoB), "<br>";
            echo "Difference: ", getDiffYear($person1stDoB, $person2ndDoB), " year(s)<br>";
        }
    ?>
</body>
</html>