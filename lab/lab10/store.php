<?php
    session_start();
    $games = $_SESSION["games"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Huy Store</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h2>DANH SÁCH TRÒ CHƠI</h2>
    <form action="cart.php" method="POST">
        <table>
            <tr>
                <th>Tên</th>
                <th>Thể loại</th>
                <th>Giá(VNĐ)</th>
                <th>Mua</th>
            </tr>
            <?php
                for ($i = 0; $i < count($games); $i++) {
                    echo "<tr>";
                    echo "<td>", $games[$i]["name"], "</td>";
                    echo "<td>", $games[$i]["tags"], "</td>";
                    echo "<td>", $games[$i]["price"], "</td>";
                    if ($games[$i]['in-cart']) {
                        echo "<td><input type=\"checkbox\" name=\"put_in_cart[]\" value=\"$i\" 
                            checked=\"checked\" disabled=\"disabled\"></td>";
                    } else {
                        echo "<td><input type=\"checkbox\" name=\"put_in_cart[]\" value=\"$i\"></td>";
                    }
                    echo "</tr>";
                }
            ?>
        </table>
        <br>
        <input type="submit" name="store_submit" value="Thêm vào giỏ hàng">
    </form>
</body>
</html>
