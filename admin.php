<?php
require './connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Haris Wirya">
	<title>Sistem Pendukung Keputusan Pemilihan Pemenang Tender</title>
    <link rel="icon" href="asset/image/logo-lpse.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="asset/css/style.css">
    <link rel="stylesheet" type="text/css" href="asset/plugin/font-icon/css/fontawesome-all.min.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js" integrity="sha256-it5nQKHTz+34HijZJQkpNBIHsjpV8b6QzMJs9tmOBSo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-1.13.2.js"></script> 
</head>
<body>
<header>
    <img src="asset/image/logo-lpse.png" id="logo-header" style="width:300px">
</header>
<nav>
    <?php include "nav.php"; ?>
</nav>
<main>
    <div id="bg-green"></div>
    <div id="main-body">
        <?php include "page.php"; ?>
    </div>
</main>
<script src="asset/js/jquery.js" type="text/javascript"></script>
<script src="asset/js/main.js" type="text/javascript"></script>
<script type="text/javascript" src="asset/js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="asset/js/pencarian.js"></script>
</body>
</html>