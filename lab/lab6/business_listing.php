<html>

<head>
    <?php require_once('db_login.php'); ?>
    <title>
        <?php
            $doc_title = 'Business Listings';
            echo "$doc_title\n";
        ?>
    </title>
</head>

<body>
    <h1>
        <?= $doc_title ?>
    </h1>
    <?php
        $pick_message = 'Click on a category to find business listings:';
    ?>
    <table border=0>
        <tr>

            <td valign="top">
                <table border=5>
                    <tr>
                        <td class="picklist"><strong><?= $pick_message ?></strong></td>
                    </tr>
                    <p>
                        <?php
                            // build the scrolling pick list for the categories
                            $sql = "SELECT * FROM categories";
                            $result = $db->query($sql);
                            while ($row = mysqli_fetch_row($result)) {
                                echo '<tr><td class="formlabel">';
                                echo "<a href=\"{$_SERVER['PHP_SELF']}?cat_id=$row[0]\">";
                                echo "$row[1]</a></td></tr>\n";
                            }
                        ?>
                    </p>
                </table>
            </td>

            <td valign="top">
                <table border=1>
                    <?php
                        if (isset($_GET['cat_id'])) {
                            $cat_id = $_GET['cat_id'];
                            $sql = "SELECT * FROM businesses b, biz_categories bc WHERE";
                            $sql .= " category_id = '$cat_id'";
                            $sql .= " AND b.business_id = bc.business_id";
                            $result = $db->query($sql);
                            while ($row = mysqli_fetch_row($result)) {
                                echo "<tr>\n";
                                for ($i = 0; $i < count($row); $i++) {
                                    echo "<td style=\"min-width: 64px;\">$row[$i]</td>\n";
                                }
                                echo "</tr>\n";
                            }
                        }
                    ?>
                </table>
            </td>

        </tr>
    </table>
</body>

</html>