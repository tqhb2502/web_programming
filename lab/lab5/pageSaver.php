<?php

    include 'Page.php';

    if (isset($_POST['submitted'])) {

        $newPage = new Page();

        $newPage->page = $_POST['pageNumber'];
        $newPage->title = $_POST['title'];
        $newPage->year = $_POST['yearCreated'];
        $newPage->copyright = $_POST['copyright'];
        $newPage->addContent($_POST['content']);

        if (file_exists('myPages.json')) {
            $string = file_get_contents('myPages.json', true);
            $myPages = json_decode($string);
            array_push($myPages, $newPage);
            file_put_contents('myPages.json', json_encode($myPages));
        } else {
            $myPages = array();
            array_push($myPages, $newPage);
            file_put_contents('myPages.json', json_encode($myPages));
        }        
    }
?>

<script>
    window.history.back();
</script>