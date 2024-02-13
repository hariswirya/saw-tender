<?php
session_start();
require 'connect.php';
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="shortcut icon" href="../img/favicon.png"/>
	<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">

	<style>
		body{
			background-image: url(../img/body.jpg);
			background-repeat: repeat;
			background-attachment: fixed;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="content">
			<h2>Profile</h2>
			<hr />

			<?php
			$username = $_SESSION['user']; // mengambil username dari session yang login
            $query="SELECT*FROM user WHERE username='$username'";
            $execute=$konek->query($query);
            if ($execute->num_rows > 0){
            }else{
                $data=$execute->fetch_array(MYSQLI_ASSOC); 
			}
			?>
			<!-- bagian ini digunakan untuk menampilkan data profile -->
			<table class="table table-striped table-condensed">
				<tr>
					<th>Username</th>
					<td><?php echo $data['username']; ?></td>
				</tr>
								<tr>
					<th>Password</th>
					<td><?php echo $data['password']; ?></td>
				</tr>
				<tr>
					<th width="20%">Nama</th>
					<td><?php echo $data['nama']; ?></td>
				</tr>
				<tr>
					<th>Level</th>
					<td><?php echo $data['level']; ?></td>
				</tr>
			</table>

			<a href="update.php?id=<?php echo $id;?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Profile</a>
		</div> <!-- /.content -->
	</div> <!-- /.container -->
