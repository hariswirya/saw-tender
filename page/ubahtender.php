<?php
$id=htmlspecialchars(@$_GET['id']);
$query="SELECT id_jenistender, namaTender, kode_rup, satuan_kerja, jenis_pengadaan, nilai_hps, tahun_pembuatan FROM jenis_tender WHERE id_jenistender='$id'";
$execute=$konek->query($query);
if ($execute->num_rows > 0){
    $data=$execute->fetch_array(MYSQLI_ASSOC);
}else{
    header('location:./?page=tender');
}
?>
<div class="panel-top panel-top-edit">
    <b><i class="fa fa-pencil-alt"></i> Ubah data</b>
</div>
<form id="form" method="POST" action="./proses/prosesubah.php">
    <input type="hidden" name="op" value="tender">
    <input type="hidden" name="id" value="<?php echo $data['id_jenistender']; ?>">
    <div class="panel-middle">
        <div class="group-input">
            <label for="tender" >Nama Tender :</label>
            <input type="text" value="<?php echo $data['namaTender']; ?>" class="form-custom" required autocomplete="off" placeholder="Nama Tender" id="tender" name="tender">
        </div>
        <div class="group-input">
            <label for="tender" >Kode RUP :</label>
            <input type="text" value="<?php echo $data['kode_rup']; ?>" class="form-custom" required autocomplete="off" placeholder="Kode RUP" id="kode_rup" name="kode_rup">
        </div>
        <div class="group-input">
            <label for="tender" >Satuan Kerja :</label>
            <input type="text" value="<?php echo $data['satuan_kerja']; ?>" class="form-custom" required autocomplete="off" placeholder="Satuan Kerja" id="satuan_kerja" name="satuan_kerja">
        </div>
        <div class="group-input">
            <label for="tender" >Jenis Pengadaan :</label>
            <input type="text" value="<?php echo $data['jenis_pengadaan']; ?>" class="form-custom" required autocomplete="off" placeholder="Jenis Pengadaan" id="jenis_pengadaan" name="jenis_pengadaan">
        </div>
        <div class="group-input">
            <label for="tender" >Nilai HPS :</label>
            <input type="text" value="<?php echo $data['nilai_hps']; ?>" class="form-custom" required autocomplete="off" placeholder="Nilai HPS" id="nilai_hps" name="nilai_hps">
        </div>
        <div class="group-input">
            <label for="tender" >Tahun Pembuatan :</label>
            <input type="text" value="<?php echo $data['tahun_pembuatan']; ?>" class="form-custom" required autocomplete="off" placeholder="Tahun Pembuatan" id="tahun_pembuatan" name="tahun_pembuatan">
        </div>
    </div>
    <div class="panel-bottom">
        <button type="submit" id="buttonsimpan" class="btn btn-green"><i class="fa fa-save"></i> Simpan</button>
    </div>
</form>