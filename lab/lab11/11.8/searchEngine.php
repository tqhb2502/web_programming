<?php
    $products = array(
        "LAPTOP DELL INSPIRON 5620 (N5620-I5P165W11SLU) (I5 1240P/16GB RAM/512GB SSD/16.0 INCH)",
        "LAPTOP ACER ASPIRE 5 A514-55-5954 (NX.K5BSV.001) (I5 1235U/8GB RAM/512GB SSD/14.0 INCH)",
        "LAPTOP LG GRAM 14ZD90Q-G.AX31A5 (I3-1220P/8GB RAM/256GB SSD/14.0 INCH)",
        "LAPTOP HP PAVILION 15-EG2063TU (6K791PA) (I3 1215U/8GB RAM/256GB SSD/15.6 INCH)",
        "LAPTOP ASUS VIVOBOOK F415EA-AS31 (I3 1115G4/4GB RAM/128GB SSD/14 INCH)",
        "TABLET SAMSUNG GALAXY TAB A8 (T295) (32GB/8 INCH/WIFI/4G/ANDROID)",
        "TABLET APPLE IPAD GEN 9 10.2 (MK2K3ZA/A) (64GB/WIFI/10.2 INCH)",
        "TABLET LENOVO TAB M10 TB-X606X (ZA5V0362VN) (P22T 2.3GHZ/4GB/64GB/10.3 INCH)",
        "IPHONE 12 128GB GREEN (MGJF3VN/A)",
        "ASUS ROG PHONE 6 S8+ G1/12/256 BLACK (AI2201-1A005WW)",
        "IPHONE 13 PRO MAX 256GB GOLD (MLLD3VN/A)",
        "IPHONE 14 PLUS 128GB RED"
    );

    if (isset($_GET["product-name"]) && $_GET["product-name"] !== "") {
        $productName = $_GET["product-name"];
        foreach($products as $product) {
            if (stripos($product, $productName) !== false) {
                echo "$product<br>";
            }
        }
    }
?>