<?php
$page=htmlspecialchars(@$_GET['page']);
switch ($page){
    case null:
        include 'page/beranda-super.php';
        break;
    case 'beranda':
        include 'page/beranda-super.php';
        break;
    case 'user':
        include 'page/user.php';
        break;
    default:
        include 'page/404.php';
}