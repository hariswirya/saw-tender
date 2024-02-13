<?php
require 'connect.php'; //Include file koneksi
$term = trim(strip_tags($_GET['term'])); // Menerima kiriman data dari inputan pengguna

$query="SELECT * FROM jenis_tender WHERE namaTender LIKE '%$term%' ORDER BY namaTender ASC"; // query sql untuk menampilkan data mahasiswa dengan operator LIKE

$hasil=mysqli_query($konek,$query); //Query dieksekusi

//Disajikan dengan menggunakan perulangan
while ($row = mysqli_fetch_array($hasil)) {
    $data[] = $row['namaTender'];
}
//Nilainya disimpan dalam bentuk json
echo json_encode($data);
?>