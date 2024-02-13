<?php
require 'connect.php';
require 'class/crud.php';
$cookiePilih=@$_COOKIE['pilih'];
if ($_SERVER['REQUEST_METHOD']=='GET') {
  $id=@$_GET['id'];
  $op=@$_GET['op'];
}else if ($_SERVER['REQUEST_METHOD']=='POST'){
  $id=@$_POST['id'];
  $op=@$_POST['op'];
}
$crud=new crud();
//$cookiePilih=null;
if (isset($cookiePilih) && !empty($cookiePilih)){
/***************awal set variabel************/

echo "<form id=\"form\" action=\"./proses/prosestambah.php\" method=\"POST\">
<input type=\"hidden\" value=\"bobot\" name=\"op\">";

$query="SELECT * from kriteria";
$execute=$konek->query($query);
if ($execute->num_rows > 0){
    while($data=$execute->fetch_array(MYSQLI_ASSOC)){
        echo "<div class=\"group-input\">
                <label for=\"$data[namaKriteria]\">$data[namaKriteria]</label>
                <input type='hidden' value=$data[id_kriteria] name='kriteria[]'>
                    <input class=\"form-custom\" type=\"text\" autocomplete=\"off\" required name=\"bobot[]\" id=\"$data[namaKriteria]\" placeholder=\"Nilai $data[namaKriteria]\">
              </div>
              </div>
        ";

      }
    }
    echo "<br>";
    echo "<div class=\"panel-bottom\">
    <button type=\"submit\" id=\"buttonsimpan\" class=\"btn btn-green\"><i class=\"fa fa-save\"></i> Simpan</button>
    <button type=\"reset\" id=\"buttonreset\" class=\"btn btn-second\">Reset</button>
</div>";
}