<?php
$id=htmlspecialchars(@$_GET['id']);
$query="SELECT * FROM user WHERE id='$id'";
$execute=$konek->query($query);
if ($execute->num_rows > 0){
    $data=$execute->fetch_array(MYSQLI_ASSOC);
}else{
    header('location:./?page=profil');
}
?>
<div class="panel-top panel-top-edit">
    <b><i class="fa fa-pencil-alt"></i> Ubah data</b>
</div>
<form id="form" method="POST" action="./proses/prosesubah.php">
    <input type="hidden" name="op" value="admin">
    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
    <div class="panel-middle">
        <div class="group-input">
            <label for="admin" >Nama admin :</label>
            <input type="text" value="<?php echo $data['nama']; ?>" class="form-custom" required autocomplete="off" placeholder="Nama admin" id="admin" name="admin">
        </div>
        <div class="group-input">
            <label for="admin" >Password :</label>
            <input type="text" value="<?php echo $data['password']; ?>" class="form-custom" required autocomplete="off" placeholder="Ubah Password" id="password" name="admin">
        </div>
        <div class="group-input">
            <label for="admin" >Ulangi Password :</label>
            <input type="text" value="<?php echo $data['password']; ?>" class="form-custom" required autocomplete="off" placeholder="Ubah Password" id="password" name="admin">
        </div>
    </div>
    <div class="panel-bottom">
        <button type="submit" id="buttonsimpan" class="btn btn-green"><i class="fa fa-save"></i> Simpan</button>
    </div>
</form>