<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Area Wisata</title>
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<?php
  ob_start();
  session_start();
  if(!isset($_SESSION['emailuser']))
  header("location:login.php"); 
  ?>

  <?php include "header.php"?>

<?php 
    include "includes/config.php";
    if(isset($_POST["batal"]))
    {
      header("location:area.php");
    }

    if(isset($_POST['ubah']))
    {
      $kodefoto = $_POST['inputkode'];
      $namafoto = $_POST['inputnama'];
      $wilayaharea = $_POST['inputwilayah'];
      $keteranganarea = $_POST['inputketerangan'];
      $kodeprovinsi= $_POST['kodeprovinsi'];

    	$nama = $_FILES['file']['name'];
    	$file_tmp = $_FILES["file"]["tmp_name"];

      if(empty($nama))
      {
        mysqli_query($connection, "UPDATE area SET areanama='$namafoto', provinsiID='$kodeprovinsi' WHERE areaID = '$kodefoto'");
        header("location:area.php");
      } 

    }
    $dataarea = mysqli_query($connection, "select * from area");

    $kodearea = $_GET["ubaharea"];
    $editarea = mysqli_query($connection, "SELECT * FROM area WHERE areaID = '$kodearea'");
    $rowedit = mysqli_fetch_array($editarea);

    $editprovinsi = mysqli_query($connection, "SELECT * FROM provinsi, area WHERE areaID = '$kodearea' and provinsi.provinsiID = area.provinsiID");
    $rowedit2 = mysqli_fetch_array($editprovinsi);
?>

<body>
  
  <div class="row">
  <div class="col-sm-1"></div>

  <div class="col-sm-10">
  	<div class="jumbotron jumbotron-fluid">
  		<div class="container">
  			<h1 class="display-4">Edit Area Wisata</h1>
  		</div>
  	</div>

  	<form method="POST" enctype="multipart/form-data">
        <div class="form-group row">
        	<label for="kodefoto" class="col-sm-2 col-form-label">Kode Area</label>
        	<div class="col-sm-10">
        		<input type="text" class="form-control" id="kodefoto" name="inputkode" value="<?php echo $rowedit["areaID"]?>" readonly>
        	</div>
        </div>

        <div class="form-group row">
        	<label for="namafoto" class="col-sm-2 col-form-label">Nama Area</label>
        	<div class="col-sm-10">
        		<input type="text" class="form-control" id="namafoto" name="inputnama" value="<?php echo $rowedit["areanama"]?>">
        	</div>
        </div>

        <div class="form-group row">
        	<label for="wilayaharea" class="col-sm-2 col-form-label">Wilayah Area</label>
        	<div class="col-sm-10">
        		<input type="text" class="form-control" id="wilayaharea" name="inputwilayah" value="<?php echo $rowedit["areawilayah"]?>">
        	</div>
        </div>

         <div class="form-group row">
        	<label for="keteranganarea" class="col-sm-2 col-form-label">Keterangan Area</label>
        	<div class="col-sm-10">
        		<input type="text" class="form-control" id="keteranganarea" name="inputketerangan\" value="<?php echo $rowedit["areaketerangan"]?>">
        	</div>
        </div>

         <div class="form-group row">
        	<label for="namaprovinsi" class="col-sm-2 col-form-label">Nama Provinsi</label>
        	<div class="col-sm-10">
        		<select class="form-control" id="namaprovinsi" name="kodeprovinsi">
              <option value="<?php echo $rowedit["provinsiID"]?>"><?php echo $rowedit['provinsiID']?> <?php echo $rowedit2['areanama']?></option>
        			<?php while($row = mysqli_fetch_array($dataarea)){ ?>
        				<option value="<?php echo $row["areaID"]?>">
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
        		<input type="submit" name="ubah" class="btn btn-primary" value="ubah">
        		<input type="submit" name="batal" class="btn btn-secondary" value="batal">
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
				<h1 class="display-4">Daftar Area Wisata</h1>
			</div>
		</div>
	
    
    <table class="table table-hover table-success">
    	<thead class="thead-dark">
    		<tr>
    			<th>No</th>
    			<th>Kode </th>
    			<th>nNama  Area</th>
           		<th>Wilayah Area</th>
    			<th>Keterangan Area</th>
    			<th>pKode Provinsi</th>
    			<th colspan="2" style="text-align: center">Action</th>
    		</tr>
    	</thead>
    	
    	<tbody>
    		<?php $query = mysqli_query($connection, "select * from area");
    		$nomor = 1;
    		while ($row = mysqli_fetch_array($query))
              { ?>
                 <tr>
                     <td><?php echo $nomor;?></td>
                     <td><?php echo $row['areaID'];?></td>
                     <td><?php echo $row['areanama'];?></td>
                     <td><?php echo $row['areawilayah'];?></td>
                     <td><?php echo $row['areaketerangan'];?></td>
                     <td><?php echo $row['provinsiID'];?></td>
                     <td>
                     	<a href="areaubah.php  ?ubaharea=<?php echo $row['areaID']?>" class="btn btn-success btn-sm" title="EDIT">
                     	<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
  </svg>	
                     	</a>
                     </td>

                     <td>
                        <a href="areahapus.php  ?hapusarea=<?php echo $row['areaID']?>" class="btn btn-danger btn-sm" title="EDIT">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
  </svg>
                        </a>
                     </td>

                 </tr>
                 <?php $nomor = $nomor + 1;?>
                 <?php } ?>
    	</tbody>

    </table>
    </div>

	<div class="col-sm-1"></div>

</div>

</body>
   <script type="text/javascript" src="js/bootstrap.min.js" ></script>
   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<?php 
mysqli_close($connection);
ob_end_flush();
?>

</html>