<ul id="hasil_pencarian">
<?php
include_once "connect.php";

if(isset($_POST['dicari'])){
	$input_pencarian = mysqli_real_escape_string($konek, $_POST['dicari']);
	if(strlen($input_pencarian) > 0) {
		$query_pencarian = mysqli_query($konek, "SELECT * FROM jenis_tender WHERE namaTender LIKE '%" . $input_pencarian . "%' ORDER BY id_jenistender LIMIT 6");
		if($query_pencarian) {
			while($hasil_pencarian = mysqli_fetch_array($query_pencarian)) {
				 echo "<option value=\"$hasil_pencarian[id_jenistender]\">$hasil_pencarian[namaTender]</option>";
			}
		}
		else{
			echo 'ERROR: Ada kesalahan pada query pencarian.';
		}
	}
}
?>
</ul>