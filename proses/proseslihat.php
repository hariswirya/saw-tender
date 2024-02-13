<?php
require '../connect.php';
require '../class/crud.php';
if ($_SERVER['REQUEST_METHOD']=='GET') {
    $id=@$_GET['id'];
    $op=@$_GET['op'];
}else if ($_SERVER['REQUEST_METHOD']=='POST'){
    $id=@$_POST['id'];
    $op=@$_POST['op'];
}
$crud=new crud();
switch ($op){
    case 'subkriteria':
    if (!empty($id)) {
        $where="WHERE nilai_kriteria.id_kriteria='$id'";
    }else{
        $where=null;
    }
    $query="SELECT id_nilaikriteria,nilai,keterangan,namaKriteria,id_kriteria FROM nilai_kriteria INNER JOIN kriteria USING (id_kriteria) $where ORDER BY id_kriteria,nilai ASC";
    $execute=$konek ->query($query);
    if ($execute->num_rows > 0){
        $no=1;
        while($data=$execute->fetch_array(MYSQLI_ASSOC)){
            echo"
            <tr id='data'>
                <td>$no</td>
                <td>".$data['namaKriteria']."</td>
                <td>".$data['nilai']."</td>
                <td>".$data['keterangan']."</td>
                <td><div class='norebuttom'>
                <a class=\"btn btn-light-green\" href='./?page=subkriteria&aksi=ubah&id=".$data['id_nilaikriteria']."'><i class='fa fa-pencil-alt'></i></a>
                <a class=\"btn btn-yellow\" data-a=\"nilai $data[nilai] dalam $data[namaKriteria]\" id='hapus' href='./proses/proseshapus.php/?op=subkriteria&id=".$data['id_nilaikriteria']."'><i class='fa fa-trash-alt'</a></td></div>
            </tr>";
            $no++;
        }
    }else{
        echo "<tr><td  class='text-center text-green' colspan='4'><b>Kosong</b></td></tr>";
    }
        break;
    case 'subkriteria':
    if (!empty($id)) {
        $where="WHERE nilai_kriteria.id_kriteria='$id'";
    }else{
        $where=null;
    }
    $query="SELECT id_nilaikriteria,nilai,keterangan,namaKriteria,id_kriteria FROM nilai_kriteria 
    INNER JOIN kriteria USING (id_kriteria) $where 
    ORDER BY id_kriteria,nilai ASC";
    $execute=$konek ->query($query);
    if ($execute->num_rows > 0){
        $no=1;
        while($data=$execute->fetch_array(MYSQLI_ASSOC)){
            echo"
            <tr id='data'>
                <td>$no</td>
                <td>".$data['namaKriteria']."</td>
                <td>".$data['nilai']."</td>
                <td>".$data['keterangan']."</td>
                <td><div class='norebuttom'>
                <a class=\"btn btn-light-green\" href='./?page=subkriteria&aksi=ubah&id=".$data['id_nilaikriteria']."'><i class='fa fa-pencil-alt'></i></a>
                <a class=\"btn btn-yellow\" data-a=\"nilai $data[nilai] dalam $data[namaKriteria]\" id='hapus' href='./proses/proseshapus.php/?op=subkriteria&id=".$data['id_nilaikriteria']."'><i class='fa fa-trash-alt'</a></td></div>
            </tr>";
            $no++;
        }
    }else{
        echo "<tr><td  class='text-center text-green' colspan='4'><b>Kosong</b></td></tr>";
    }
        break;
    case 'pilihkriteria':
            if (!empty($id)) {
                $where="WHERE pilih_kriteria.id_jenistender='$id'";
            }else{
                $where=null;
            }
            $query="SELECT id_pilihkriteria, id_kriteria, id_jenistender, namaKriteria, namaTender
            FROM pilih_kriteria INNER JOIN jenis_tender USING (id_jenistender) INNER JOIN kriteria USING (id_kriteria)
            $where ORDER BY id_jenistender ASC";
            $execute=$konek ->query($query);
            if ($execute->num_rows > 0){
                $no=1;
                while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                    echo"
                    <tr id='data'>
                        <td>$no</td>
                        <td>$data[namaTender]</td>
                        <td>$data[namaKriteria]</td>
                        <td><div class='norebuttom'>
                        <a class=\"btn btn-light-green\" href='./?page=pilihkriteria&aksi=ubah&id=".$data['id_pilihkriteria']."'><i class='fa fa-pencil-alt'></i></a>
                        <a class=\"btn btn-yellow\" data-a=\".$data[namaTender] - $data[namaKriteria]\" id='hapus' href='./proses/proseshapus.php/?op=pilihkriteria&id=".$data['id_pilihkriteria']."'><i class='fa fa-trash-alt'</a></td></div>
                    </tr>";
                    $no++;
                }
            }else{
                echo "<tr><td  class='text-center text-green' colspan='4'><b>Kosong</b></td></tr>";
            }
                break;
        case 'lihatdetail':
                    if (!empty($id)) {
                        $where="WHERE hasil.id_jenistender='$id'";
                    }else{
                        $where=null;
                    }
                    $query="SELECT id_hasil, id_peserta, id_jenistender, namaPeserta, namaTender, hasil
                    FROM hasil INNER JOIN jenis_tender USING (id_jenistender) INNER JOIN peserta USING (id_peserta)
                    $where ORDER BY id_jenistender ASC";
                    $execute=$konek ->query($query);
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
                        echo "<tr><td  class='text-center text-green' colspan='4'><b>Kosong</b></td></tr>";
                    }
                        break;
    case 'nilai':
        if (!empty($id)) {
            $where="WHERE nilai_peserta.id_jenistender='$id'";
        }else{
            $where=null;
        }
        $query="SELECT id_nilaipeserta,id_peserta,peserta.namaPeserta AS namaPeserta,
        jenis_tender.id_jenistender AS id_jenistender,
        jenis_tender.namaTender AS namaTender FROM nilai_peserta 
        INNER JOIN peserta USING(id_peserta) INNER JOIN jenis_tender USING (id_jenistender) 
        $where GROUP BY id_peserta ORDER BY id_jenistender,id_peserta ASC";
        $execute=$konek->query($query);
        if ($execute->num_rows > 0){
            $no=1;
            while($data=$execute->fetch_array(MYSQLI_ASSOC)){
               echo"
                <tr id='data'>
                    <td>$no</td>
                    <td>$data[namaTender]</td>
                    <td>$data[namaPeserta]</td>
                    <td>
                    <div class='norebuttom'>
                    <a class=\"btn btn-green\" href=\"./?page=penilaian&aksi=lihat&a=$data[id_peserta]&b=$data[id_jenistender]\"><i class='fa fa-eye'></i></a>
                </div></tr>";
                $no++;
            }
        }else{
            echo "<tr><td  class='text-center text-green' colspan='4'><b>Kosong</b></td></tr>";
        }
        break;

        case 'tender':
            if (!empty($id)) {
                $where="WHERE jenis_tender.id_jenistender='$id'";
            }else{
                $where=null;
            }
            $query="SELECT * FROM jenis_tender 
            $where GROUP BY id_jenistender ORDER BY id_jenistender ASC";
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
                        <a class=\"btn btn-green\" href=\"./?page=penilaian&aksi=lihat&a=$data[id_peserta]&b=$data[id_jenistender]\"><i class='fa fa-eye'></i></a>
                        <a class=\"btn btn-yellow\" data-a=\".$data[namaTender]\" id='hapus' href='./proses/proseshapus.php/?op=tender&id=".$data['id_jenistender']."'><i class='fa fa-trash-alt'></i></a></td>
                    </div></tr>";
                    $no++;
                }
            }else{
                echo "<tr><td  class='text-center text-green' colspan='4'><b>Kosong</b></td></tr>";
            }
            break;
}