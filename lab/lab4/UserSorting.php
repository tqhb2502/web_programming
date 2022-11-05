<?php

    // user-defined sort function
    function user_sort($a, $b) {
        // smarts is all-important, so sort it first
        if ($b == 'smarts') {
            return 1;
        } else if ($a == 'smarts') {
            return -1;
        }
        return ($a == $b) ? 0 : (($a < $b) ? -1 : 1);
    }

    // create array
    $values = array(
        'name' => 'Buzz Lightyear',
        'email_address' => 'buzz@starcommand.gal',
        'age' => 32,
        'smarts' => 'some'
    );
    $sorted_values = $values;

    // sort with selected sort type
    if (isset($_POST['submitted'])) {
        $sort_type = $_POST['sort_type'];
        if ($sort_type == 'usort' || $sort_type == 'uksort' || $sort_type == 'uasort') {
            $sort_type($sorted_values, 'user_sort');
        } else {
            $sort_type($sorted_values);
        }
    }
?>
<style>
    .result-box {
        display: flex;
        align-items: center;
    }

    .result-box > p {
        font-size: 28px;
        margin: 0 16px;
    }
</style>
<form action="UserSorting.php" method="post">

    <p>
        <input type="radio" name="sort_type" value="sort" checked="checked"/>Standard sort<br/>
        <input type="radio" name="sort_type" value="rsort"/>Reverse sort<br/>
        <input type="radio" name="sort_type" value="usort"/>User-defined sort<br/>
        <input type="radio" name="sort_type" value="ksort"/>Key sort<br/>
        <input type="radio" name="sort_type" value="krsort"/>Reverse key sort<br/>
        <input type="radio" name="sort_type" value="uksort"/>User-defined key sort<br/>
        <input type="radio" name="sort_type" value="asort"/>Value sort<br/>
        <input type="radio" name="sort_type" value="arsort"/>Reverse value sort<br/>
        <input type="radio" name="sort_type" value="uasort"/>User-defined value sort<br/>
    </p>

    <p>
        <input type="submit" value="Sort" name="submitted"/>
    </p>

    <div class="result-box">

        <!-- before sorting -->
        <div>
            <p>
                Values unsorted:
            </p>
            <ul>
                <?php
                    foreach ($values as $key => $value) {
                        echo "<li><b>$key</b>: $value</li>";
                    }
                ?>
            </ul>
        </div>
        
        <!-- if form is not submitted yet, do not display result -->
        <?php
            if (!isset($_POST['submitted'])) {
                exit(0);
            }
        ?>

        <!-- after sorting -->
        <p>=></p>

        <div>
            <p>
                Values <?= "sorted by $sort_type" ?>:
                <!-- short echo tag -->
            </p>
            <ul>
                <?php
                    foreach ($sorted_values as $key => $value) {
                        echo "<li><b>$key</b>: $value</li>";
                    }
                ?>
            </ul>
        </div>
    </div>
</form>