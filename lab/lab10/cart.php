<?php
    session_start();

    $games = $_SESSION["games"];
    $total_price = 0;

    if (isset($_POST["store_submit"]) && isset($_POST["put_in_cart"])) {
        $put_in_cart = $_POST["put_in_cart"];
        for ($i = 0; $i < count($put_in_cart); $i++) {
            $game_id = intval($put_in_cart[$i]);
            $games[$game_id]["in-cart"] = true;
        }
    }

    if (isset($_POST["delete_submit"]) && isset($_POST["out_of_cart"])) {
        $out_of_cart = $_POST["out_of_cart"];
        for ($i = 0; $i < count($out_of_cart); $i++) {
            $game_id = intval($out_of_cart[$i]);
            $games[$game_id]["in-cart"] = false;
        }
    }

    $_SESSION['games'] = $games;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h2>GIỎ HÀNG CỦA BẠN</h2>
    <!-- form xóa sản phẩm khỏi giỏ hàng -->
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <table>
            <tr>
                <th>Tên</th>
                <th>Thể loại</th>
                <th>Giá(VNĐ)</th>
                <th>Xóa</th>
            </tr>
            <?php
                for ($i = 0; $i < count($games); $i++) {
                    if ($games[$i]['in-cart']) {
                        $total_price += $games[$i]['price'];
                        echo "<tr>";
                        echo "<td>", $games[$i]["name"], "</td>";
                        echo "<td>", $games[$i]["tags"], "</td>";
                        echo "<td>", $games[$i]["price"], "</td>";
                        echo "<td><input type=\"checkbox\" name=\"out_of_cart[]\" value=\"$i\"></td>";
                        echo "</tr>";
                    }
                }
            ?>
        </table>
        <h3>Tổng tiền: <?= $total_price ?> VNĐ</h3>
        <?php $_SESSION['total_price'] = $total_price ?>
        <input type="submit" name="delete_submit" value="Xóa khỏi giỏ hàng">
    </form>
    <br>
    <!-- form quay lại cửa hàng để tiếp tục mua hàng -->
    <form action="store.php" method="GET">
        <input type="submit" name="continue_submit" value="Tiếp tục mua hàng">
    </form>
    <br>
    <!-- form thanh toán -->
    <form action="checkout.php" method="GET">
        <input type="submit" name="checkout_submit" value="Thanh toán">
    </form>
</body>
</html>
