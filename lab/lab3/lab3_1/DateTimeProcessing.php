<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DateTimeProcessing</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;;
        }

        .block-margin {
            margin: 16px 8px;
        }

        .container {
            display: flex;
            align-items: center;
        }

        p {
            min-width: 100px;
        }

        select {
            margin-right: 16px;
        }

        input[type="submit"],
        input[type="reset"] {
            padding: 4px;
        }
    </style>
</head>
<body>

    <p class="block-margin">Enter your name and select date and time for the appointment</p>

    <form class="block-margin" action="DateTimeProcessing.php" method="POST">
        <div class="container block-margin">
            <p>Your name:</p>
            <input type="text" name="name" id="name">
        </div>
        <div class="container block-margin">
            <p>Date:</p>
            <select name="day" id="day"></select>
            <select name="month" id="month"></select>
            <select name="year" id="year"></select>
        </div>
        <div class="container block-margin">
            <p>Time:</p>
            <select name="hour" id="hour"></select>
            <select name="minute" id="minute"></select>
            <select name="second" id="second"></select>
        </div>
        <div class="container block-margin">
            <input class="block-margin" type="submit" value="Submit">
            <input class="block-margin" type="reset" value="Reset">
        </div>
    </form>

    <script>

        let formElem = document.querySelector('form');
        
        let nameElem = document.getElementById('name');

        let dayElem = document.getElementById('day');
        let monthElem = document.getElementById('month');
        let yearElem = document.getElementById('year');

        let hourElem = document.getElementById('hour');
        let minuteElem = document.getElementById('minute');
        let secondElem = document.getElementById('second');

        let html;
        
        // render year
        html = '';
        for (let i = 2022; i <= 2050; i++) {
            html += `<option value="${i}">${i}</option>`;
        }
        yearElem.innerHTML = html;

        // render month
        html = '';
        for (let i = 1; i <= 12; i++) {
            html += `<option value="${i}">${i}</option>`;
        }
        monthElem.innerHTML = html;

        // render day function
        function renderDay() {

            let selectedDay = dayElem.value;

            let numberOfDays;
            switch (monthElem.value) {
                case "1":
                case "3":
                case "5":
                case "7":
                case "8":
                case "10":
                case "12":
                    numberOfDays = 31;
                    break;
                case "4":
                case "6":
                case "9":
                case "11":
                    numberOfDays = 30;
                    break;
                case "2":
                    let selectedYear = parseInt(yearElem.value);
                    if (selectedYear % 100 === 0) {
                        if (selectedYear % 400 === 0) {
                            numberOfDays = 29;
                        } else {
                            numberOfDays = 28;
                        }
                    } else {
                        if (selectedYear % 4 === 0) {
                            numberOfDays = 29;
                        } else {
                            numberOfDays = 28;
                        }
                    }
            }

            html = '';
            for (let i = 1; i <= numberOfDays; i++) {
                html += `<option value="${i}">${i}</option>`;
            }
            dayElem.innerHTML = html;

            if (selectedDay !== '' && selectedDay <= numberOfDays) {
                dayElem.value = selectedDay;
            } else {
                dayElem.value = '';
            }
        }

        // render day
        renderDay();

        // re-render day when month or year change
        monthElem.onchange = renderDay;
        yearElem.onchange = renderDay;

        // render hour
        html = '';
        for (let i = 0; i <= 23; i++) {
            html += `<option value="${i}">${i}</option>`;
        }
        hourElem.innerHTML = html;

        // render minute and second
        html = '';
        for (let i = 0; i <= 59; i++) {
            html += `<option value="${i}">${i}</option>`;
        }
        minuteElem.innerHTML = html;
        secondElem.innerHTML = html;

        nameElem.value = localStorage.getItem('name') === null ? nameElem.value : localStorage.getItem('name');
        dayElem.value = localStorage.getItem('day') === null ? nameElem.value : localStorage.getItem('day');
        monthElem.value = localStorage.getItem('month') === null ? nameElem.value : localStorage.getItem('month');
        yearElem.value = localStorage.getItem('year') === null ? nameElem.value : localStorage.getItem('year');
        hourElem.value = localStorage.getItem('hour') === null ? nameElem.value : localStorage.getItem('hour');
        minuteElem.value = localStorage.getItem('minute') === null ? nameElem.value : localStorage.getItem('minute');
        secondElem.value = localStorage.getItem('second') === null ? nameElem.value : localStorage.getItem('second');

        // save inputs' value when submit
        formElem.onsubmit = function (e) {
            localStorage.setItem('name', nameElem.value);
            localStorage.setItem('day', dayElem.value);
            localStorage.setItem('month', monthElem.value);
            localStorage.setItem('year', yearElem.value);
            localStorage.setItem('hour', hourElem.value);
            localStorage.setItem('minute', minuteElem.value);
            localStorage.setItem('second', secondElem.value);
        }
    </script>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $name = $_POST["name"];
            $day = $_POST["day"];
            $month = $_POST["month"];
            $year = $_POST["year"];
            $hour = $_POST["hour"];
            $minute = $_POST["minute"];
            $second = $_POST["second"];

            $hour = intval($hour);
            $hourFormat12;
            $signifier;

            $year = intval($year);
            $numberOfDays;

            if ($hour > 12) {
                $hourFormat12 = $hour - 12;
            } else {
                $hourFormat12 = $hour;
            }

            if ($hour > 11) {
                $signifier = "PM";
            } else {
                $signifier = "AM";
            }

            switch ($month) {
                case "1":
                case "3":
                case "5":
                case "7":
                case "8":
                case "10":
                case "12":
                    $numberOfDays = 31;
                    break;
                case "4":
                case "6":
                case "9":
                case "11":
                    $numberOfDays = 30;
                    break;
                case "2":
                    if ($year % 100 == 0) {
                        if ($year % 400 == 0) {
                            $numberOfDays = 29;
                        } else {
                            $numberOfDays = 28;
                        }
                    } else {
                        if ($year % 4 == 0) {
                            $numberOfDays = 29;
                        } else {
                            $numberOfDays = 28;
                        }
                    }
            }

            print "Hi $name!<br><br>";
            print "You have choose to have an appointment on
                $hour:$minute:$second, $day/$month/$year<br><br>";
            print "More information<br>";
            print "In 12 hours, the time and date is
                $hourFormat12:$minute:$second $signifier, $day/$month/$year<br>";
            print "This month has $numberOfDays days!<br>";
        }
    ?>
</body>
</html>