<div class="panel-top">
    <b class="text-green"><i class="fa fa-plus-circle text-green"></i> Tambah data</b>
</div>
<form id="form" method="POST" action="./proses/prosestambah.php">
    <input type="hidden" name="op" value="user">
    <div class="panel-middle">
        <div class="group-input">
            <label for="user" >Nama User :</label>
            <input type="text" class="form-custom" required autocomplete="off" placeholder="Nama User" id="nama" name="nama">
        </div>
        <div class="group-input">
            <label for="user" >Username :</label>
            <input type="text" class="form-custom" required autocomplete="off" placeholder="Username" id="username" name="username">
        </div>
        <div class="group-input">
            <label for="user" >Password :</label>
            <input type="text" class="form-custom" required autocomplete="off" placeholder="Password" id="password" name="password">
        </div>
        <div class="group-input">
            <label for="user" >Level :</label>
            <select class="form-custom" required id="level" name="level">
                <option selected disabled>-- Pilih Level User --</option>
                <option value="Admin">Admin</option>
                <option value="Super">Super</option>
            </select>
        </div>
    </div>
    <div class="panel-bottom">
        <button type="submit" id="buttonsimpan" class="btn btn-green"><i class="fa fa-save"></i> Simpan</button>
    </div>
</form>