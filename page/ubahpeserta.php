<?php
$id=htmlspecialchars(@$_GET['id']);
$query="SELECT * FROM peserta WHERE id_peserta='$id'";
$execute=$konek->query($query);
if ($execute->num_rows > 0){
    $data=$execute->fetch_array(MYSQLI_ASSOC);
}else{
    header('location:./?page=peserta');
}
?>
<div class="panel-top panel-top-edit">
    <b><i class="fa fa-pencil-alt"></i> Ubah data</b>
</div>
<form id="form" method="POST" action="./proses/prosesubah.php">
    <input type="hidden" name="op" value="peserta">
    <input type="hidden" name="id" value="<?php echo $data['id_peserta']; ?>">
    <div class="panel-middle">
        <div class="group-input">
            <label for="peserta" >Nama peserta :</label>
            <input type="text" value="<?php echo $data['namaPeserta']; ?>" class="form-custom" required autocomplete="off" placeholder="Nama peserta" id="peserta" name="peserta">
        </div>
    </div>
    <div class="panel-bottom">
        <button type="submit" id="buttonsimpan" class="btn btn-green"><i class="fa fa-save"></i> Simpan</button>
    </div>
</form>