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
$keterangan=@$_POST['keterangan'];
$bobot=@$_POST['bobot'];
switch ($op){
    case 'user':
        $query="UPDATE user SET password='$password' WHERE id='$id'";
        $crud->update($query,$konek,'./?page=user');
        break;
    case 'tender':
        $cek="SELECT namaTender FROM jenis_tender WHERE namaTender='$tender'";
        $query="UPDATE jenis_tender SET namaTender='$tender', kode_rup='$kode_rup', satuan_kerja='$satuan_kerja', jenis_pengadaan='$jenis_pengadaan', nilai_hps='$nilai_hps', tahun_pembuatan='$tahun_pembuatan' WHERE id_jenistender='$id'";
        $crud->multiUpdate($cek,$query,$konek,'./?page=tender');
        break;
    case 'peserta':
        $query="UPDATE peserta SET namaPeserta='$peserta' WHERE id_peserta='$id'";
        $crud->update($query,$konek,'./?page=peserta');
        break;
    case 'kriteria':
        $cek="SELECT namaKriteria FROM kriteria WHERE namaKriteria='$kriteria'";
        $query="UPDATE kriteria SET namaKriteria='$kriteria',sifat='$sifat' WHERE id_kriteria='$id';";
        $crud->multiUpdate($cek,$query,$konek,'./?page=kriteria');
        break;
    case 'subkriteria':
        $cek="SELECT id_nilaikriteria FROM nilai_kriteria WHERE (id_kriteria='$kriteria' AND nilai ='$nilai') OR (id_kriteria='$kriteria' AND keterangan = '$keterangan')";
        $query="UPDATE nilai_kriteria SET id_kriteria='$kriteria',nilai='$nilai',keterangan='$keterangan' WHERE id_nilaikriteria='$id'";
        $crud->multiUpdate($cek,$query,$konek,'./?page=subkriteria');
        break;
    case 'bobot':
        $query=null;
        for ($i=0;$i<count($id);$i++){
            $query.="UPDATE bobot_kriteria SET bobot='$bobot[$i]' WHERE id_bobotkriteria='$id[$i]';";
        }
        $crud->update($query,$konek,'./?page=bobot');
    break;
    case 'nilai':
        $query=null;
        for ($i=0;$i<count($id);$i++){
            $query.="UPDATE nilai_peserta SET id_nilaikriteria='$nilai[$i]' WHERE id_nilaipeserta='$id[$i]';";
        }
        $crud->update($query,$konek,'./?page=penilaian');
    break;
}