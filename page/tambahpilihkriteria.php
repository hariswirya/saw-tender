
<!-- judul -->
<div class="panel-top">
    <b class="text-green"><i class="fa fa-plus-circle text-green"></i> Tambah data</b>
</div>
<form id="form" action="./proses/prosestambah.php" method="POST">
    <input type="hidden" value="pilihkriteria" name="op">
    <div class="panel-middle">
        <div class="group-input">
            <label for="tender">Jenis Tender</label>
            <select class="form-custom" required name="tender" id="tender">
                <option selected disabled>--Pilih Jenis Tender--</option>
                <?php
                $query="SELECT * FROM jenis_tender";
                $execute=$konek->query($query);
                if ($execute->num_rows > 0){
                    while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                        echo "<option value=\"$data[id_jenistender]\">$data[namaTender]</option>";
                    }
                }else {
                    echo "<option value=\"\">Belum ada Jenis Tender</option>";
                }
                ?>
            </select>
        </div>
        <div class="group-input">
            <label for="tender">Jenis Kriteria</label>
            <select class="form-custom" required name="kriteria" id="kriteria">
                <option selected disabled>--Pilih Jenis Kriteria--</option>
                <?php
                $query="SELECT * FROM kriteria";
                $execute=$konek->query($query);
                if ($execute->num_rows > 0){
                    while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                        echo "<option value=\"$data[id_kriteria]\">$data[namaKriteria]</option>";
                    }
                }else {
                    echo "<option value=\"\">Belum ada Jenis Kriteria</option>";
                }
                ?>
            </select>
        </div>
            </div>
    <div class="panel-bottom">
        <button type="submit" id="buttonsimpan" class="btn btn-green"><i class="fa fa-save"></i> Simpan</button>
    </div>
</form>