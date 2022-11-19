<html>

<head>
    <?php require_once('db_login.php'); ?>
    <title>
        <?php
            $doc_title = 'Business Registration';
            echo "$doc_title\n";
        ?>
    </title>
</head>

<body>
    <h1>
        <?= $doc_title ?>
    </h1>
    <?php

        // init variables
        $Biz_Name = '';
        $Biz_Address = '';
        $Biz_City = '';
        $Biz_Telephone = '';
        $Biz_URL = '';
        $Biz_Categories = array();
        $pick_message = 'Click on one, or control-click on<BR>multiple categories:';

        if (isset($_REQUEST['submit'])) {

            $pick_message = 'Selected category values<br />are highlighted:';

            // fetch query parameters
            $Biz_Name = $_REQUEST['Biz_Name'];
            $Biz_Address = $_REQUEST['Biz_Address'];
            $Biz_City = $_REQUEST['Biz_City'];
            $Biz_Telephone = $_REQUEST['Biz_Telephone'];
            $Biz_URL = $_REQUEST['Biz_URL'];
            $Biz_Categories = $_REQUEST['Biz_Categories'];   

            // add new business
            $sql = 'INSERT INTO businesses (name, address, city, telephone, url) ';
            $sql .= 'VALUES (?, ?, ?, ?, ?)';

            $query = $db->prepare($sql);
            $query->bind_param('sssss', $Biz_Name, $Biz_Address, $Biz_City, $Biz_Telephone, $Biz_URL);
            $query->execute();
            
            $biz_id = $db->insert_id;
            $db->commit();

            echo '<p class="message">Record inserted as shown below.</p>';
        }
    ?>
    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
        <table>
            <tr>
                <td class="picklist">
                    <?= $pick_message ?>
                    <p>
                        <select name="Biz_Categories[]" size="4" multiple="multiple">
                            <?php
                            // build the scrolling pick list for the categories
                                $sql = "SELECT * FROM categories";
                                $result = $db->query($sql);
                                while ($row = mysqli_fetch_row($result)) {
                                    if (isset($_REQUEST['submit'])) {
                                        $selected = false;
                                        // if this category was selected, add a new biz_categories row
                                        if (in_array($row[1], $Biz_Categories)) {
                                            $sql = 'INSERT INTO biz_categories ';
                                            $sql .= '(business_id, category_id) ';
                                            $sql .= 'VALUES (?, ?)';
                                            $query = $db->prepare($sql);
                                            $query->bind_param('ss', $biz_id, $row[0]);
                                            $query->execute();
                                            $db->commit();
                                            echo "<option selected=\"selected\">$row[1]</option>\n";
                                            $selected = true;
                                        }
                                        if ($selected == false) {
                                            echo "<option>$row[1]</option>\n";
                                        }
                                    } else {
                                        echo "<option>$row[1]</option>\n";
                                    }
                                }
                            ?>
                        </select>
                    </p>
                </td>
                <td class="picklist">
                    <table>
                        <tr>
                            <td class="FormLabel">Business Name:</td>
                            <td><input type="text" name="Biz_Name" size="40" maxlength="255" value="<?= $Biz_Name ?>" /></td>
                        </tr>
                        <tr>
                            <td class="FormLabel">Address:</td>
                            <td><input type="text" name="Biz_Address" size="40" maxlength="255" value="<?= $Biz_Address ?>" /></td>
                        </tr>
                        <tr>
                            <td class="FormLabel">City:</td>
                            <td><input type="text" name="Biz_City" size="40" maxlength="128" value="<?= $Biz_City ?>" /></td>
                        </tr>
                        <tr>
                            <td class="FormLabel">Telephone:</td>
                            <td><input type="text" name="Biz_Telephone" size="40" maxlength="64" value="<?= $Biz_Telephone ?>" /></td>
                        </tr>
                        <tr>
                            <td class="FormLabel">URL:</TD>
                            <td><input type="text" name="Biz_URL" size="40" maxlength="255" value="<?= $Biz_URL ?>" /></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <p>
            <input type="hidden" name="add_record" value="1" />
            <?php
                // display the submit button on new forms; link to a fresh registration
                // page on confirmations
                if (isset($_REQUEST['submit'])) {
                    echo '<p><a href="', $_SERVER['PHP_SELF'], '">Add Another Business</a></p>';
                } else {
                    echo '<input type="submit" name="submit" value="Add Business" />';
                }
            ?>
        </p>
</body>
</html>