<?php
require 'connect.php';
$user=@$_POST['username'];
$nama=@$_POST['nama'];
$pass=@$_POST['password'];
$level=@$_POST['level'];
if (empty($user)){
    $result="Username tidak boleh kosong";
}elseif (empty($pass)){
    $result="Password Tidak boleh kosong";
}elseif (empty($username) && empty($pass)){
    $result="Username dan password tidak boleh kosong";
}else{
    $query="SELECT*FROM user WHERE username='$user'";
    $execute=$konek->query($query);
    if ($execute->num_rows > 0){
        $data=$execute->fetch_array(MYSQLI_ASSOC);
        if (password_verify($pass,$data['password'])){
            session_start();
            if($data['level']=="Admin"){
                $_SESSION['user']=$data['username'];
                $_SESSION['nama']=$data['nama'];
                $_SESSION['pass']=$data['password'];
                $_SESSION['level'] = "Admin";
                //header('location:./index.php');
                $result='success';
            }else{
                $_SESSION['user']=$data['username'];
                $_SESSION['nama']=$data['nama'];
                $_SESSION['pass']=$data['password'];
                $_SESSION['level'] = "Super";
                header('location:index-super.php');
                $result='success';
            }  
        }else{
            $result="Username dan Password tidak cocok";
        }
    }else{
        $result="Username tidak terdaftar";
    }
}
echo json_encode($result);