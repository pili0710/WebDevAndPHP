<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Berita Wisata</title>
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
      header("location:berita.php");
    }

    if(isset($_POST['ubah']))
    {
     $kodeberita = $_POST['inputkode'];
    $beritajudul = $_POST['inputjudul'];
    $beritatipe = $_POST['inputtipe'];
    $beritaisi = $_POST['inputisi'];
    $kodearea = $_POST['kodearea'];
      $nama = $_FILES['file']['name'];
      $file_tmp = $_FILES["file"]["tmp_name"];

      if(empty($nama))
      {
        mysqli_query($connection, "UPDATE beritawisata SET judulberita='$beritajudul', tipeberita= '$beritatipe', isiberita ='$beritaisi', areaID='$kodearea' WHERE beritaID = '$kodeberita'");
        header("location:berita.php");
      } 

    }
    $dataarea = mysqli_query($connection, "select * from area");

    $kodeberita = $_GET["ubahberita"];
    $editberita = mysqli_query($connection, "SELECT * FROM beritawisata WHERE beritaID = '$kodeberita'");
    $rowedit = mysqli_fetch_array($editberita);

    $editarea = mysqli_query($connection, "SELECT * FROM area, beritawisata WHERE beritaID = '$kodeberita' and area.areaID = beritawisata.areaID");
    $rowedit2 = mysqli_fetch_array($editarea);
   
?>

<body>
  
  <div class="row">
  <div class="col-sm-1"></div>

  <div class="col-sm-10">
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Edit Berita Wisata</h1>
      </div>
    </div>

    <form method="POST" enctype="multipart/form-data">
        <div class="form-group row">
          <label for="kodeberita" class="col-sm-2 col-form-label">Kode Berita</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="kodeberita" name="inputkode" value="<?php echo $rowedit["beritaID"]?>" readonly>
          </div>
        </div>

        <div class="form-group row">
          <label for="beritajudul" class="col-sm-2 col-form-label">Judul Berita</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="beritajudul" name="inputjudul" value="<?php echo $rowedit["judulberita"]?>">
          </div>
        </div>

        <div class="form-group row">
          <label for="beritatipe" class="col-sm-2 col-form-label">Tipe Berita</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="beritatipe" name="inputtipe" value="<?php echo $rowedit["tipeberita"]?>">
          </div>
        </div>

        <div class="form-group row">
          <label for="beritaisi" class="col-sm-2 col-form-label">Isi Berita</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="beritaisi" name="inputisi" value="<?php echo $rowedit["isiberita"]?>">
          </div>
        </div>

         <div class="form-group row">
        <label for="namaarea" class="col-sm-2 col-form-label">Kode Area</label>
        <div class="col-sm-10">
          <select class="form-control" id="namaarea" name="kodearea">
            <?php while($row = mysqli_fetch_array($dataarea)) 
            { ?>
              <option value="<?php echo $row["areaID"]?>">
                <?php echo $row["areaID"]?>
                <?php echo $row["areanama"]?>         
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
        <h1 class="display-4">Daftar Berita Wisata</h1>
      </div>
    </div>
  
    
    <table class="table table-hover table-success">
      <thead class="thead-dark">
        <tr>
          <th>No</th>
          <th>Kode </th>
          <th>Judul Berita</th>
          <th>Tipe Berita</th>
          <th>Isi Berita</th>
          <th>Kode Area</th>
          <th colspan="2" style="text-align: center">Action</th>
        </tr>
      </thead>
      
      <tbody>
        <?php $query = mysqli_query($connection, "select * from beritawisata");
        $nomor = 1;
        while ($row = mysqli_fetch_array($query))
              { ?>
                 <tr>
                     <td><?php echo $nomor;?></td>
                     <td><?php echo $row['beritaID'];?></td>
                     <td><?php echo $row['judulberita'];?></td>
                     <td><?php echo $row['tipeberita'];?></td>
                     <td><?php echo $row['isiberita'];?></td>
                     <td><?php echo $row['areaID'];?></td>
                     <td>
                      <a href="beritaubah.php  ?ubahberita=<?php echo $row['beritaID']?>" class="btn btn-success btn-sm" title="EDIT">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
  </svg>  
                      </a>
                     </td>

                     <td>
                        <a href="beritahapus.php  ?hapusberita=<?php echo $row['beritaID']?>" class="btn btn-danger btn-sm" title="DELETE">
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