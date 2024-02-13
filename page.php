<?php
$page=htmlspecialchars(@$_GET['page']);
switch ($page){
    case null:
        include 'page/beranda.php';
        break;
    case 'beranda':
        include 'page/beranda.php';
        break;
    case 'profil':
        include 'page/profil.php';
        break;
    case 'user':
        include 'page/user.php';
        break;
    case 'tender':
        include 'page/tender.php';
        break;
    case 'peserta':
        include 'page/peserta.php';
        break;
    case 'petunjuk':
        include 'page/petunjuk.php';
        break;
    case 'admin':
        include 'page/admin.php';
        break;
    case 'kriteria':
        include 'page/kriteria.php';
        break;
    case 'subkriteria':
        include 'page/subkriteria.php';
        break;
    case 'pilihkriteria':
        include 'page/pilihkriteria.php';
        break;
    case 'bobot':
        include 'page/bobot.php';
        break;
    case 'penilaian':
        include 'page/nilai.php';
        break;
    case 'hasil':
        include 'page/hasil.php';
        break;
    case 'riwayat':
        include 'page/riwayat.php';
        break;
    case 'tambahbobot':
        include 'page/tambahbobot.php';
        break;
    case 'user':
        include 'page/user.php';
        break;
    default:
        include 'page/404.php';
}