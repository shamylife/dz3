<?php

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[1];

?>

<!doctype html>
<html lang="ru-RU">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Home Work #3</title>
    <meta content="viewport" width="1000"/>

    <link rel="stylesheet" href="../../assets/css/normalize.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">

    <script src="../../assets/js/modernizr-custom.js"></script>

</head>
<body>
<div class="wrapper">
    <div class="navbar navbar-default">
        <div class="container">
            <a href="/" class="navbar-brand">Cloud.TXT</a>
            <ul class="nav navbar-nav">
                <li <?= ($first_part == "") ? 'class="active"' : 'class=""' ?>>
                    <a href="/">Home</a>
                </li>
                <li <?= ($first_part == "add") ? 'class="active"' : 'class=""' ?>>
                    <a href="/add/">Add NEW</a>
                </li>
                <li <?= ($first_part == "upload") ? 'class="active"' : 'class=""' ?>>
                    <a href="/upload/">Upload</a>
                </li>
            </ul>
        </div>
    </div><!-- /navbar -->

    <div class="content-wrapper">
        <div class="container">

            <?php include 'application/views/' . $content_view; ?>

        </div><!-- /container -->
    </div><!-- /content-wrapper -->
</div><!-- /wrapper -->

<!--Scripts-->
<script src="../../assets/js/jquery-1.12.4.min.js"></script>
<script src="../../assets/js/bootstrap.min.js"></script>
<script src="../../assets/js/main.js"></script>

</body>
</html>