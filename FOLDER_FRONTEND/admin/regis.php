<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>REGISTRASI</title>

  <?php
  ob_start();
  session_start();
  if(!isset($_SESSION['emailuser']))
  header("location:login.php"); 
  ?>

  <?php include "header.php"?>

<div class="container-fluid">
<div class="card shadow mb-4">
<html lang="en">
 <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registrasi Form</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 </head>
 <?php
	include "includes/config.php";
	if (isset($_POST['Simpan'])) 
	{
		$koderegis = $_POST['inputkode'];
		$namaawal = $_POST['inputawal'];
		$namaakhir = $_POST['inputakhir'];
		$emailregis = $_POST['inputemail'];
		$passregis = $_POST['inputpass'];
		mysqli_query($connection, "insert into registrasi value ('$koderegis','$namaawal','$namaakhir','$emailregis','$passregis') ");
			header("location:regis.php");	
	}
	$dataregis = mysqli_query($connection, "select * from registrasi");
 ?>
 <body>
 <div class="row">
 <div class="col-sm-1"></div>
 <div class="col-sm-10">
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Input Data Registrasi</h1>
		</div>
	</div>
		<form method="POST" enctype="multipart/form-data">
			<div class="form-group row">
				<label for="koderegis" class="col-sm-2 col-form-label">Kode Registrasi</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="koderegis" name="inputkode" placeholder="Kode Registrasi" maxlength="4" >
				</div>				
			</div>
			<div class="form-group row">
				<label for="namaawal" class="col-sm-2 col-form-label">Nama Pertama</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="namaawal" name="inputawal" placeholder="Nama Awal" required="">
				</div>				
			</div>
			<div class="form-group row">
				<label for="namaakhir" class="col-sm-2 col-form-label">Nama Akhir</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="namaakhir" name="inputakhir" placeholder="Nama Akhir" required="">
				</div>				
			</div>	
			<div class="form-group row">
				<label for="emailregis" class="col-sm-2 col-form-label">Email Regis</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="emailregis" name="inputemail" placeholder="Email Admin" required="">
				</div>				
			</div>	
			<div class="form-group row">
				<label for="passregis" class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="passregis" name="inputpass" placeholder="Password Admin" required="">
				</div>				
			</div>	

			<div class="form-group row">
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<input type="submit" name="Simpan" class="btn btn-primary" value="Simpan">
					<input type="submit" name="Batal" class="btn btn-secondary" value="Batal">
				</div>
			</div>
		</form>
 </div>
 <div class="col-sm-1"></div>
 </div>
 <div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class="display-4">Daftar Registrasi</h1>
			</div>			
		</div>		
 <table class="table table-hover table-danger">
	<thead class="thead-dark">
		<tr>
			<th>No</th>
			<th>Kode Registasi</th>
			<th>Nama Awal</th>
			<th>Nama Akhir</th>
			<th>Email</th>
			<th>Password</th>
			<th colspan="2" style="text-align: center">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $query = mysqli_query($connection, "select * from registrasi");
		$nomor = 1;
		while ($row = mysqli_fetch_array($query))
		{ ?>
			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $row['regisID']; ?></td>
				<td><?php echo $row['firstname']; ?></td>
				<td><?php echo $row['lastname']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['password']; ?></td>
				<td>
					<a href="regisubah.php?ubahregis=<?php echo $row ['regisID']?>" class="btn btn-success btn-sm" title="EDIT" >
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  		<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  		<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
		</svg>
					</a>
				</td>
				<td>
					<a href="regishapus.php?hapusregis=<?php echo $row ['regisID']?>" class="btn btn-danger btn-sm" title="DELETE" >
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
 </svg>
					</a>
				</td>
			</tr>
			<?php $nomor = $nomor + 1; ?>	
		<?php } ?>
		 ?>
	</tbody>
 </table>
 </div>
	<div class="col-sm-1"></div>

 </div>
 </body>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

	</div>
	</div> <!-- penutup container fluid-->
	<?php include "footer.php"; ?>
	<?php 
	mysqli_close($connection);
	ob_end_flush();
	?>

 </html>