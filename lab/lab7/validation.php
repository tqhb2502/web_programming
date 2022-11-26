<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation Center</title>
</head>
<body>
    <h1>Validation Center</h1> <br>
    <h3>Input email, url or phone number to validate!</h3> <br>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        Email: <input type="text" name="email"> <br><br>
        URL: <input type="text" name="url"> <br><br>
        Phone number: <input type="text" name="phone"> <br><br>
        <input type="submit" value="Validate"> <br><br>
    </form>
</body>
</html>
<?php
    $emailRegex = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
    $httpUrlRegex = "/^https?:\\/\\/(?:www\\.)?[-a-zA-Z0-9@:%._\\+~#=]{1,256}\\.[a-zA-Z0-9()]{1,6}\\b(?:[-a-zA-Z0-9()@:%_\\+.~#?&\\/=]*)$/";
    $nonHttpUrlRegex = "/^[-a-zA-Z0-9@:%._\\+~#=]{1,256}\\.[a-zA-Z0-9()]{1,6}\\b(?:[-a-zA-Z0-9()@:%_\\+.~#?&\\/=]*)$/";
    $phoneNumberRegex = "/0[3|5|7|8|9][0-9]{8}\b/";
    if (isset($_POST['email']) && strlen($_POST['email'])) {
        $email = $_POST['email'];
        if (preg_match($emailRegex, $email)) {
            echo "<p style=\"color: blue;\">$email is a valid email address!<p>";
        } else {
            echo "<p style=\"color: red;\">$email is an invalid email address!<p>";
        }
    }
    if (isset($_POST['url']) && strlen($_POST['url'])) {
        $url = $_POST['url'];
        if (preg_match($httpUrlRegex, $url) || preg_match($nonHttpUrlRegex, $url)) {
            echo "<p style=\"color: blue;\">$url is a valid url!<p>";
        } else {
            echo "<p style=\"color: red;\">$url is an invalid url!<p>";
        }
    }
    if (isset($_POST['phone']) && strlen($_POST['phone'])) {
        $phone = $_POST['phone'];
        if (preg_match($phoneNumberRegex, $phone)) {
            echo "<p style=\"color: blue;\">$phone is a valid phone number!<p>";
        } else {
            echo "<p style=\"color: red;\">$phone is an invalid phone number!<p>";
        }
    }
?>