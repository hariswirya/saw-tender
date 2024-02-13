<div class="panel-top">
    <b class="text-green"><i class="fa fa-plus-circle text-green"></i> Tambah data</b>
</div>
<form id="form" method="POST" action="./proses/prosestambah.php">
    <input type="hidden" name="op" value="peserta">
    <div class="panel-middle">
        <div class="group-input">
            <label for="peserta" >Nama Peserta :</label>
            <input type="text" class="form-custom" required autocomplete="off" placeholder="Nama Peserta" id="peserta" name="peserta">
        </div>
    </div>
    <div class="panel-bottom">
        <button type="submit" id="buttonsimpan" class="btn btn-green"><i class="fa fa-save"></i> Simpan</button>
    </div>
</form>