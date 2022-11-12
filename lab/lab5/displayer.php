<?php

    include 'Page.php';

    $string = file_get_contents('myPages.json', true);
    $myPages = json_decode($string);
    $index = intval($_POST['index'], 10);

    $page = new Page();
    $page->page = $myPages[$index]->page;
    $page->title = $myPages[$index]->title;
    $page->year = $myPages[$index]->year;
    $page->copyright = $myPages[$index]->copyright;
    $page->addContent($myPages[$index]->content);
    $page->addHeader();
    $page->addFooter();
?>
<style>
    .nav {
        display: flex;
        justify-content: space-between;
    }
    .nav button {
        height: 50%;
    }
    .nav button a {
        text-decoration: none;
        color: black;
    }
</style>
<div class="nav">
    <form action="displayer.php" method="POST">
        <input
            type="hidden"
            name="index"
            value="<?= $index === 0 ? count($myPages) - 1 : $index - 1 ?>">
        <input type="submit" value="Previous Page">
    </form>
    <button>
        <a href="form.php">Go Back</a>
    </button>
    <form action="displayer.php" method="POST">
        <input
            type="hidden"
            name="index"
            value="<?= $index === count($myPages) - 1 ? 0 : $index + 1 ?>">
        <input type="submit" value="Next Page">
    </form>
</div>
<head>
    <title><?= $page->title ?></title>
</head>
<body>
    <header><?= $page->header ?></header>
    <div><?= $page->content ?></div>
    <footer><?= $page->footer ?></footer>
</body>