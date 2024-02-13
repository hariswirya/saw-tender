<?php
require 'connect.php';
?>
<div class="panel">
    <div class="panel-middle" id="judul">
    <img src="asset/image/sub-kriteria.svg">
        <div id="judul-text">
            <h2 class="text-green">User</h2>
            Halamanan Administrator User
        </div>
    </div>
</div>
<!-- judul -->
<div>
    <div>
        <div class="panel">
            <div class="panel-top">
                <b class="text-green">Profil User</b>
            </div>
            <div class="panel-middle">
                <div class="table-responsive">
                    <table>
                        <thead><tr><th>No</th><th>Nama</th><th>Username</th><th>Aksi</th></tr></thead>
                        <tbody>
                        <?php
                        $username = $_SESSION['user'];
                        $query="SELECT * FROM user where username = '$username'";
                        $execute=$konek->query($query);
                        if ($execute->num_rows > 0){
                            $no=1;
                            while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                                echo"
                                <tr id='data'>
                                    <td>$no</td>
                                    <td>$data[nama]</td>
                                    <td>$data[username]</td>
                                    <td>
                                    <div class='norebuttom'>
                                    <a class=\"btn btn-light-green\" href='./?page=user&aksi=ubah&id=".$data['id']."'><i class='fa fa-pencil-alt'></i></a>
                                    </div></td>
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
            <?php
            if (@htmlspecialchars($_GET['aksi'])=='ubah'){
                include 'ubahuser.php';
            }else{
            }
            ?>
        </div>
    </div>
        </div>
    </div>
</div>