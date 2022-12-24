<?php
    session_start();
    $total_price = $_SESSION['total_price'];
    echo "<h1>Cảm ơn bạn đã mua hàng tại cửa hàng chúng tôi!</h1>";
    echo "<h3>Bạn đã thanh toán thành công $total_price VNĐ.</h3>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
</head>
<body>
    <form action="index.php" method="GET">
        <input type="submit" value="Trang chủ">
    </form>
</body>
</html>
