<?php
require '../connect.php';
require '../class/crud.php';
if ($_SERVER['REQUEST_METHOD']=='GET') {
    $id=@$_GET['id'];
    $op=@$_GET['op'];
}else if ($_SERVER['REQUEST_METHOD']=='POST'){
    $id=@$_POST['id'];
    $op=@$_POST['op'];
}
$crud=new crud();
switch ($op){
    case 'tender':
        $query="DELETE FROM jenis_tender WHERE id_jenistender='$id'";
        $crud->delete($query,$konek);
        break;
    case 'peserta':
        $query="DELETE FROM peserta WHERE id_peserta='$id'";
        $crud->delete($query,$konek);
        break;
    case 'kriteria':
        $query="DELETE FROM kriteria WHERE id_kriteria='$id'";
        $crud->delete($query,$konek);
        break;
    case 'subkriteria':
        $query="DELETE FROM nilai_kriteria WHERE id_nilaikriteria='$id'";
        $crud->delete($query,$konek);
        break;
    case 'kriteria':
        $query="DELETE FROM kriteria WHERE id_kriteria='$id'";
        $crud->delete($query,$konek);
        break;
    case 'pilih_kriteria':
        $query="DELETE FROM pilih_kriteria WHERE id_pilihkriteria='$id'";
        $crud->delete($query,$konek);
        break;
    case 'bobot':
        $query="DELETE FROM bobot_kriteria WHERE id_jenistender='$id'";
        $crud->delete($query,$konek);
        break;
    case 'nilai':
        $query="DELETE FROM nilai_peserta WHERE id_peserta='$id'";
        $crud->delete($query,$konek);
        break;
    case 'user':
        $query="DELETE FROM user WHERE id='$id'";
        $crud->delete($query,$konek);
        break;
}