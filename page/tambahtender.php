<div class="panel-top">
    <b class="text-green"><i class="fa fa-plus-circle text-green"></i> Tambah data</b>
</div>
<form id="form" method="POST" action="./proses/prosestambah.php">
    <input type="hidden" name="op" value="tender">
    <div class="panel-middle">
        <div class="group-input">
            <label for="tender" >Nama Tender :</label>
            <input type="text" class="form-custom" required autocomplete="off" placeholder="Nama Tender" id="tender" name="tender">
        </div>
        <div class="group-input">
            <label for="tender" >Kode RUP :</label>
            <input type="text" class="form-custom" required autocomplete="off" placeholder="Kode RUP" id="kode_rup" name="kode_rup">
        </div>
        <div class="group-input">
            <label for="tender" >Satuan Kerja :</label>
            <input type="text" class="form-custom" required autocomplete="off" placeholder="Satuan Kerja" id="satuan_kerja" name="satuan_kerja">
        </div>
        <div class="group-input">
            <label for="tender" >Jenis Pengadaan :</label>
            <input type="text" class="form-custom" required autocomplete="off" placeholder="Jenis Pengadaan" id="jenis_pengadaan" name="jenis_pengadaan">
        </div>
        <div class="group-input">
            <label for="tender" >Nilai HPS :</label>
            <input type="text" class="form-custom" required autocomplete="off" placeholder="Nilai HPS" id="nilai_hps" name="nilai_hps">
        </div>
        <div class="group-input">
            <label for="tender" >Tahun Pembuatan :</label>
            <input type="text" class="form-custom" required autocomplete="off" placeholder="Tahun Pembuatan" id="tahun_pembuatan" name="tahun_pembuatan">
        </div>
    </div>
    <div class="panel-bottom">
        <button type="submit" id="buttonsimpan" class="btn btn-green"><i class="fa fa-save"></i> Simpan</button>
    </div>
</form>