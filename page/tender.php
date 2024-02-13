<!-- judul -->
<div class="panel">
    <div class="panel-middle" id="judul">
        <img src="asset/image/barang.svg">
        <div id="judul-text">
            <h2 class="text-green">Tender</h2>
            Halamanan Administrator Tender
        </div>
    </div>
</div>
<!-- judul -->
<div class="row">
    <div class="col-4">
        <div class="panel">
            <?php
            if (@htmlspecialchars($_GET['aksi'])=='ubah'){
                include 'ubahtender.php';
            }else{
                include 'tambahtender.php';
            }
            ?>
        </div>
    </div>
    <div class="col-8">
        <div class="panel">
        <div class="panel-top">
                <b class="text-green">Daftar Tender</b>
            </div>
            <div class="panel-middle">
                <div class="table-responsive">
                    <table>
                        <thead><tr><th>No</th><th>Nama</th><th>Satuan Kerja</th><th>Tahun Pembuatan</th><th>Aksi</th></tr></thead>
                        <tbody>
                        <?php
                        $query="SELECT * FROM jenis_tender ORDER BY id_jenistender DESC";
                        $execute=$konek->query($query);
                        if ($execute->num_rows > 0){
                            $no=1;
                            while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                                echo"
                                <tr id='data'>
                                    <td>$no</td>
                                    <td>$data[namaTender]</td>
                                    <td>$data[satuan_kerja]</td>
                                    <td>$data[tahun_pembuatan]</td>
                                    <td>
                                    <div class='norebuttom'>
                                    <a class=\"btn btn-light-green\" href='./?page=tender&aksi=ubah&id=".$data['id_jenistender']."'><i class='fa fa-pencil-alt'></i></a>
                                    <a class=\"btn btn-yellow\" data-a=".$data['namaTender']." id='hapus' href='./proses/proseshapus.php/?op=tender&id=".$data['id_jenistender']."'><i class='fa fa-trash-alt'></i></a></td>
                                </div></tr>";
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