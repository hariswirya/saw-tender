<?php
require './connect.php';
?>
<!-- judul -->
<div class="panel">
    <div class="panel-middle" id="judul">
    <img src="asset/image/sub-kriteria.svg">
        <div id="judul-text">
            <h2 class="text-green">Riwayat</h2>
            Halamanan Administrator Riwayat Tender
        </div>
    </div>
</div>
<!-- judul -->
<div>

        <div class="panel">
        <div class="panel-top">
                <b style="float: left" class="text-green">Daftar Riwayat Tender</b>
                <div style="clear: both;"></div>
            </div>
            <div class="panel-middle">
                <div class="table-responsive">
                    <table>
                        <thead><tr><th>No</th><th>Nama Tender</th><th>Nama Peserta</th><th>Nilai</th></tr></thead>
                        <tbody>
                        <?php
                        $query="SELECT id_hasil, id_peserta, id_jenistender, namaPeserta, namaTender, hasil
                        FROM hasil INNER JOIN jenis_tender USING (id_jenistender) INNER JOIN peserta USING (id_peserta)
                        WHERE hasil.id_jenistender= jenis_tender.id_jenistender ORDER BY id_jenistender ASC";
                        $execute=$konek->query($query);
                        if ($execute->num_rows > 0){
                            $no=1;
                            while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                                echo"
                                <tr id='data'>
                                    <td>$no</td>
                                    <td>$data[namaTender]</td>
                                    <td>$data[namaPeserta]</td>
                                    <td>$data[hasil]</td>
                                </tr>";
                                $no++;
                            }
                        }else{
                            echo "<tr><td  class='text-center text-green' colspan='3'>Kosong</td></tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-bottom"></div>
        </div>
    </div>
</div>