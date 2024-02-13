<?php
require '../connect.php';
require '../class/crud.php';
$crud=new crud($konek);

if ($_SERVER['REQUEST_METHOD']=='GET') {
    $id=@$_GET['id'];
    $op=@$_GET['op'];
}else if ($_SERVER['REQUEST_METHOD']=='POST'){
    $id=@$_POST['id'];
    $op=@$_POST['op'];
}
$nama=@$_POST['nama'];
$username=@$_POST['username'];
$level=@$_POST['level'];
$password=password_hash(@$_POST['password'], PASSWORD_DEFAULT); 
$tender=@$_POST['tender'];
$kode_rup=@$_POST['kode_rup'];
$satuan_kerja=@$_POST['satuan_kerja'];
$jenis_pengadaan=@$_POST['jenis_pengadaan'];
$nilai_hps=@$_POST['nilai_hps'];
$tahun_pembuatan=@$_POST['tahun_pembuatan'];
$peserta=@$_POST['peserta'];
$kriteria=@$_POST['kriteria'];
$sifat=@$_POST['sifat'];
$nilai=@$_POST['nilai'];
$pilihkriteria=@$_POST['pilihkriteria'];
$keterangan=@$_POST['keterangan'];
$bobot=@$_POST['bobot'];
switch ($op){
    case 'user'://tambah data tender
        $query="INSERT INTO user (nama, username, password, level) VALUES ('$nama', '$username', '$password', '$level')";
        $crud->addData($query,$konek);
    break;
    case 'tender'://tambah data tender
        $cek="SELECT namaTender FROM jenis_tender WHERE namaTender='$tender'";
        $query=null;
        $query="INSERT INTO jenis_tender (namaTender, kode_rup, satuan_kerja, jenis_pengadaan, nilai_hps, tahun_pembuatan) VALUES ('$tender', '$kode_rup', '$satuan_kerja', '$jenis_pengadaan', '$nilai_hps', '$tahun_pembuatan')";
        $crud->multiaddData($cek,$query,$konek);
    break;
    case 'peserta': //tambah data peserta
        $query="INSERT INTO peserta (namaPeserta) VALUES ('$peserta')";
        $crud->addData($query,$konek);
    break;
    case 'kriteria'://tambah data kriteria
        $cek="SELECT namaKriteria FROM kriteria WHERE namaKriteria='$kriteria'";
        $query=null;
        $query="INSERT INTO kriteria (namaKriteria,sifat) VALUES ('$kriteria','$sifat')";
        $crud->multiAddData($cek,$query,$konek);
    break;
    case 'subkriteria'://tambah data sub kriteria
        $cek="SELECT id_nilaikriteria FROM nilai_kriteria WHERE (id_kriteria='$kriteria' AND nilai ='$nilai') OR (id_kriteria='$kriteria' AND keterangan = '$keterangan')";
        $query=null;
        $query.="INSERT INTO nilai_kriteria (id_kriteria,nilai,keterangan) VALUES ('$kriteria','$nilai','$keterangan');";
        $crud->multiAddData($cek,$query,$konek);
    break;
    case 'bobot'://tambah data bobot
        $cek="SELECT id_bobotkriteria, bobot FROM bobot_kriteria WHERE id_jenistender='$tender'";
        $cek2="SELECT SUM(id_bobotkriteria) as total_bobot FROM bobot_kriteria WHERE id_jenistender='$tender'";
        $total_bobot = mysqli_fetch_array($cek2);
        $query=null;
        $normalisasi = $bobot['bobot']/$total_bobot['total_bobot'];
        for ($i=0;$i<count($kriteria);$i++){
            $query.="INSERT INTO bobot_kriteria (id_jenistender,id_kriteria,bobot) VALUES ('$tender','$kriteria[$i]','$bobot[$i]');";
        }
        $crud->multiAddData($normalisasi,$query,$konek);
    break;
    case 'nilai'://tambah data nilai
        $cek="SELECT id_peserta, id_jenistender FROM nilai_peserta WHERE id_peserta='$peserta' AND id_jenistender ='$tender'";
        $query=null;
        for ($i=0;$i<count($nilai);$i++){
            $query.="INSERT INTO nilai_peserta (id_peserta,id_jenistender,id_kriteria,id_nilaikriteria) VALUES ('$peserta','$tender','$kriteria[$i]','$nilai[$i]');";
        }
        $crud->multiAddData($cek,$query,$konek);
    break;
}