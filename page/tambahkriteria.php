<div class="panel-top">
    <b class="text-green"><i class="fa fa-plus-circle text-green"></i> Tambah data</b>
</div>
<form id="form" method="POST" action="./proses/prosestambah.php">
    <input type="hidden" name="op" value="kriteria">
    <div class="panel-middle">
        <div class="group-input">
            <label for="kriteria" >Nama Kriteria :</label>
            <input type="text" class="form-custom" required autocomplete="off" placeholder="Nama kriteria" id="kriteria" name="kriteria">
        </div>
        <div class="group-input">
            <label for="sifat" >Sifat Kriteria :</label>
            <select class="form-custom" required id="sifat" name="sifat">
                <option selected disabled>-- Pilih Sifat Kriteria --</option>
                <option value="Benefit">Manfaat</option>
                <option value="Cost">Biaya</option>
            </select>
        </div>
        <label for="catatan" ><b>Catatan!</b><br>Sifat <b>Manfaat</b> jika semakin besar nilai semakin baik
        <br>Sifat<b> Biaya</b> jika semakin kecil nilai semakin baik</label>
    </div>
    <div class="panel-bottom">
        <button type="submit" id="buttonsimpan" class="btn btn-green"><i class="fa fa-save"></i> Simpan</button>
    </div>
</form>