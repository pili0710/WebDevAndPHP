<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WISATA</title>

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
	<title>Area Wisata</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 </head>
 <?php
	include "includes/config.php";
	if (isset($_POST['Simpan'])) 
	{
		$kodefoto = $_POST['inputkode'];
		$namafoto = $_POST['inputnama'];
		$wilayaharea = $_POST['inputarea'];
		$ketarea = $_POST['inputket'];
		$kodedestinasi = $_POST['kodedestinasi'];
		mysqli_query($connection, "insert into area value ('$kodefoto','$namafoto','$wilayaharea','$ketarea','$kodedestinasi') ");
			header("location:area.php");	
	}
	$datadestinasi = mysqli_query($connection, "select * from provinsi");
 ?>
 <body>
 <div class="row">
 <div class="col-sm-1"></div>
 <div class="col-sm-10">
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Input AREA</h1>
		</div>
	</div>
		<form method="POST" enctype="multipart/form-data">
			<div class="form-group row">
				<label for="kodefoto" class="col-sm-2 col-form-label">Kode Area</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="kodefoto" name="inputkode" placeholder="Kode Area" maxlength="4" >
				</div>				
			</div>
			<div class="form-group row">
				<label for="namafoto" class="col-sm-2 col-form-label">Nama Area</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="namafoto" name="inputnama" placeholder="Nama Area" required="">
				</div>				
			</div>
			<div class="form-group row">
				<label for="wilayaharea" class="col-sm-2 col-form-label">Wilayah Area</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="wilayaharea" name="inputarea" placeholder="Wilayah area" required="">
				</div>				
			</div>
			<div class="form-group row">
				<label for="ketarea" class="col-sm-2 col-form-label">Keterangan Area</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="ketarea" name="inputket" placeholder="Keterangan Area">
				</div>				
			</div>
			<div class="form-group row">
				<label for="namadestinasi" class="col-sm-2 col-form-label">Kode Provinsi</label>
				<div class="col-sm-10">
					<select class="form-control" id="namadestinasi" name="kodedestinasi">
						<?php while($row = mysqli_fetch_array($datadestinasi)) 
						{ ?>
							<option value="<?php echo $row["provinsiID"]?>">
								<?php echo $row["provinsiID"]?>
								<?php echo $row["provinsinama"]?>					
							</option>
						<?php } ?>
					</select>					
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
				<h1 class="display-4">Daftar Area</h1>
			</div>			
		</div>		

		<form method="POST">
                        <div class="form-group row mb-2">
                            <label for="search" class="col-sm-3">Nama Area</label>
                            <div class="col-sm-6">
                                <input type="text" name="search" class="form-control" id="search" value="<?php if(isset($_POST['search'])) { echo $_POST['search']; }?>" placeholder="Cari Nama Area">
                            </div>
                            <input type="submit" name="kirim" class="col-sm-1 btn btn-info" value="Cari">
                        </div>
                    </form>

 <table class="table table-hover table-success">
	<thead class="thead-dark">
		<tr>
			<th>No</th>
			<th>Kode Area</th>
			<th>Nama Area</th>
			<th>Wilayah Area</th>
			<th>Keterangan Area</th>
			<th>Kode Provinsi</th>
			<th colspan="2" style="text-align: center">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $query = mysqli_query($connection, "select * from area");
		$nomor = 1;
		while ($row = mysqli_fetch_array($query))
		{ ?>
			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $row['areaID']; ?></td>
				<td><?php echo $row['areanama']; ?></td>
				<td><?php echo $row['areawilayah']; ?></td>
				<td><?php echo $row['areaketerangan']; ?></td>
				<td><?php echo $row['provinsiID']; ?></td>
				<td>
					<a href="areaubah.php?ubaharea=<?php echo $row ['areaID']?>" class="btn btn-success btn-sm" title="EDIT" >
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  		<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  		<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
		</svg>
					</a>
				</td>
				<td>
					<a href="areahapus.php?hapusarea=<?php echo $row ['areaID']?>" class="btn btn-danger btn-sm" title="DELETE" >
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