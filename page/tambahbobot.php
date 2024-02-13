
<!-- judul -->
<div class="panel-top">
    <b class="text-green"><i class="fa fa-plus-circle text-green"></i> Tambah data</b>
</div>
<form id="form" action="./proses/prosestambah.php" method="POST">
    <input type="hidden" value="bobot" name="op">
    <div class="panel-middle">
        <div class="group-input">
            <label for="tender">Nama Tender</label>
            <select class="form-custom" required name="tender" id="tender">
                <option selected disabled>--Pilih Nama Tender--</option>
                <?php
                $query="SELECT * FROM jenis_tender";
                $execute=$konek->query($query);
                if ($execute->num_rows > 0){
                    while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                    if ($pilih==$data[id_jenistender]) {
                            $selected="selected";
                        }else{
                            $selected=null;
                        }
                        echo "<option value=\"$data[id_jenistender]\">$data[namaTender]</option>";
                    }
                }else {
                    echo "<option value=\"\">Belum ada Jenis Tender</option>";
                }
                ?>
            </select>
        </div>
        <?php
        $query="SELECT * FROM kriteria";
        $execute=$konek->query($query);
        if ($execute->num_rows > 0){
            while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                echo "<div class=\"group-input\">
                        <label for=\"$data[namaKriteria]\">$data[namaKriteria]</label>
                        <input type='hidden' value=$data[id_kriteria] name='kriteria[]'>
                            <input class=\"form-custom\" type=\"text\" autocomplete=\"off\" required name=\"bobot[]\" id=\"$data[namaKriteria]\" placeholder=\"Nilai 1 - 10\">
                      </div>
                ";
            }
        }
        ?>
        <label for="catatan"> <b>Catatan!</b><br>Masukkan rentang nilai 1 sampai 10</label>
    </div>
    <div class="panel-bottom">
        <button type="submit" id="buttonsimpan" class="btn btn-green"><i class="fa fa-save"></i> Simpan</button>
    </div> 
</form>