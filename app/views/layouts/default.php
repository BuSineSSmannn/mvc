<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= \vendor\core\base\View::getMeta() ?>

    <link href="/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    [endif]-->
</head>
<body>
<div class="container">
    <h1>Hello, world!</h1>

    <?php if (!empty($menu)) : ?>
        <ul class="nav nav-pills nav-fill">
            <?php foreach ($menu as $item): ?>
                <li class="nav-item">
                    <a class="nav-link"
                       href="category/<?= $item['id'] ?>"><?= $item['title'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?= $content ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="/bootstrap/dist/js/bootstrap.min.js"></script>
<?php
foreach ($scripts as $script) {
    echo $script;
}
?>
</body>
</html>