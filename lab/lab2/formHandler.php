<?php
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $fullname = $_POST["fullname"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $hobbies = $_POST["hobbies"];
    $hometown = $_POST["hometown"];
    $selfIntro = $_POST["self-intro"];
    $selfIntro = nl2br($selfIntro);
    echo "Đăng ký thành công tài khoản:<br>";
    echo "1. Username: $username<br>";
    echo "2. Password: $password<br>";
    echo "3. Email: $email<br>";
    echo "4. Fullname: $fullname<br>";
    echo "5. Date of birth: $dob<br>";
    echo "6. Gender: $gender<br>";
    echo "7. Hobby: ";
    foreach ($hobbies as $hobby) {
        echo "$hobby ";
    }
    echo "<br>";
    echo "8. Hometown: $hometown<br>";
    echo "9. Self introduction:<br>$selfIntro<br>";
?>