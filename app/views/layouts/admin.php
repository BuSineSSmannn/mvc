<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= \fw\core\base\View::getMeta() ?>

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
    <h1>Adminka</h1>

        <ul class="nav nav-pills nav-fill">
            <li class="nav-item"><a href="/" >Home</a></li>
            <li class="nav-item"><a href="/page/about">About</a></li>
            <li class="nav-item"><a href="/admin">Admin</a></li>
        </ul>

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