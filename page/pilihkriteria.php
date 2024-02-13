<?php
require './connect.php';
?>
<!-- judul -->
<div class="panel">
    <div class="panel-middle" id="judul">
        <img src="asset/image/bobot.svg">
        <div id="judul-text">
            <h2 class="text-green">Pilih Kriteria</h2>
            Halamanan Administrator Pilih Kriteria
        </div>
    </div>
</div>
<!-- judul -->
<div class="row">
    <div class="col-4">
        <div class="panel">
            <?php
            if (@htmlspecialchars($_GET['aksi'])=='ubah'){
                include 'ubahpilihkriteria.php';
            }elseif (@htmlspecialchars($_GET['aksi'])=='lihat'){
                include 'lihatpilihkriteria.php';
            }else{
                include 'tambahpilihkriteria.php';
            }
            ?>
        </div>
    </div>
    <div class="col-8">
        <div class="panel">
        <div class="panel-top">
                <b style="float: left" class="text-green">Daftar Pilih Kriteria</b>
                <div style="float:right;width: 250px;">
                    <select class="form-custom" name="pilih" id="pilihKriteria">
                        <option value="">Semua Jenis Tender</option>;
                        <?php
                        $query="SELECT*FROM jenis_tender";
                        $execute=$konek->query($query);
                        if ($execute->num_rows > 0){
                            while ($data=$execute->fetch_array(MYSQLI_ASSOC)){
                           if ($pilih==$data[id_jenistender]) {
                                $selected="selected";
                            }else{
                                $selected=null;
                            }
                                echo "<option $selected value=$data[id_jenistender]>$data[namaTender]</option>";
                            }
                        }else{
                            echo '<option disabled value="">Tidak ada data</option>';
                        }
                        ?>
                    </select>
                </div>
                <div style="clear: both;"></div>
            </div>
            <div class="panel-middle">
                <div class="table-responsive">
                    <table>
                        <thead><tr><th>No</th><th>Nama Tender</th><th>Nama Kriteria</th><th>Aksi</th></tr></thead>
                        <tbody id="isiKriteria"></tbody>
                    </table>
                </div>
            </div>
            <div class="panel-bottom"></div>
        </div>
    </div>
</div>