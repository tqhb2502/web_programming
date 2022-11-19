<html>

<head>
    <?php require_once('db_login.php'); ?>
    <title>
        <?php
            // print the window title and the topmost body heading
            $doc_title = 'Category Administration';
            echo "$doc_title\n";
        ?>
    </title>
</head>

<body>
    <h1>
        <?= "$doc_title\n"; ?>
    </h1>
    <?php
        if (isset($_REQUEST['submit'])) {
            // add category record input section
            // extract values from $_REQUEST
            $Cat_ID = $_REQUEST['Cat_ID'];
            $Cat_Title = $_REQUEST['Cat_Title'];
            $Cat_Desc = $_REQUEST['Cat_Desc'];
            // determine the length of each input field
            $len_cat_id = strlen($_REQUEST['Cat_ID']);
            $len_cat_tl = strlen($_REQUEST['Cat_Title']);
            $len_cat_de = strlen($_REQUEST['Cat_Desc']);
            // validate and insert if the form script has been
            // called by the Add Category button
            if (($len_cat_id > 0) and ($len_cat_tl > 0) and ($len_cat_de > 0)) {
                $sql = "insert into categories (category_id, title, description)";
                $sql .= " values ('$Cat_ID', '$Cat_Title', '$Cat_Desc')";
                $result = $db->query($sql);
                $db->commit();
            } else {
                echo "<p>Please make sure all fields are filled in ";
                echo "and try again.</p>\n";
            }
        }
        // list categories reporting section
        // query all records in the table after any
        // insertion that may have occurred above
        $sql = "select * from categories";
        $result = $db->query($sql);
    ?>
    <form method="POST" action="category_admin.php">
        <table>
            <tr>
                <th style="background-color: #eeeeee;">Cat ID</th>
                <th style="background-color: #eeeeee;">Title</th>
                <th style="background-color: #eeeeee;">Description</th>
            </tr>
            <?php
            // display any records fetched from the database
            // plus an input line for a new category
            while ($row = mysqli_fetch_row($result)) {
                echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>\n";
            }
            ?>
            <tr>
                <td><input type="text" name="Cat_ID" size="15" maxlength="10" /></td>
                <td><input type="text" name="Cat_Title" size="40" maxlength="128" /></td>
                <td><input type="text" name="Cat_Desc" size="45" maxlength="255" /></td>
            </tr>
        </table>
        <input type="submit" name="submit" value="Add Category" />
    </form>
</body>
</html>