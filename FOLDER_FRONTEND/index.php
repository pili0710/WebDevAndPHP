<?php 

  include "includes/config.php";;

	$num_per_page=05;


	if(isset($_GET["page"]))
	{
		$page=$_GET["page"];
	}
	else
	{
		$page=1;
	}

	$start_from=($page-1)*05;

	$sql="select * from destinasi limit $start_from,$num_per_page";
	$rs_result=mysqli_query($connection, $sql);


?>

<!doctype html>
<?php 
  $query = mysqli_query($connection, "SELECT * FROM area");
  $query1 = mysqli_query($connection, "SELECT * FROM destinasi");
  $query2 = mysqli_query($connection, "SELECT * FROM kategori");
  $query3 = mysqli_query($connection, "SELECT * FROM provinsi");

  

  $destinasi = mysqli_query($connection, "SELECT * 
    FROM kategori, destinasi, fotodestinasi
    WHERE kategori.kategoriID = destinasi.kategoriID
    AND destinasi.destinasiID = fotodestinasi.destinasiID");

  $sql = mysqli_query($connection, "SELECT * FROM destinasi");
  $jumlah = mysqli_num_rows($sql);

  $sql1 = mysqli_query($connection, "SELECT * FROM area");
  $jumlah1 = mysqli_num_rows($sql1);

  $sql2 = mysqli_query($connection, "SELECT * FROM provinsi");
  $jumlah2 = mysqli_num_rows($sql2);

  $sql3 = mysqli_query($connection, "SELECT * FROM employees");
  $jumlah3 = mysqli_num_rows($sql3);

  $sql4 = mysqli_query($connection, "SELECT * FROM hotel");
  $jumlah4 = mysqli_num_rows($sql4);

  $sql5 = mysqli_query($connection, "SELECT * FROM beritawisata");
  $jumlah5 = mysqli_num_rows($sql5);

  $sql6 = mysqli_query($connection, "SELECT * FROM restoran");
  $jumlah6 = mysqli_num_rows($sql6);

  $foto = mysqli_query($connection, "SELECT * FROM fotodestinasi");

  

?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <title>HOLO</title>
    <style type="text/css">
      .keterangan hr { top: 60%; left: 50%; color: white; width: 90px; height: 2px;
 background-color: white; transform: translate(-6%, -50%);}
      .more a{background: #50f0d0 ; padding: 15px; border-radius: 30px; color: black;}
      .more a:hover{color: white; background: black; transition:background 0.5s ease-in-out;}
      figure:hover img {opacity: 0.5;  top: 30%; left: 5%; right: 5%;}
    </style>
  </head>
  <body style="background: #EAE8E4;">

<!-- PEMBUAT MENU -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding-top: 10px; padding-bottom: 10px;">
  <a class="navbar-brand" href="index.php">HOLO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Talents
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

          <?php if(mysqli_num_rows($query1) > 0) { 
          while ($row = mysqli_fetch_array($query1))
            { ?>
          <a class="dropdown-item" href="index1.php"><?php echo $row["destinasinama"] ?></a>
          <?php } } ?>
        </div>

      </li>
      

      <li class="nav-item dropdown">
        <a class="nav-link " href="admin" >
          Admin
        </a>
      </li>

      <div class="contoh">
        <li class="nav-item dropdown">
        <a class="nav-link " href="kontak.html" >
          <span style="color: red;">Contact US</span>
        </a>
      </li>
      </div>
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<!-- AKHIR PEMBUAT MENU -->

<!-- SLIDER  -->

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/ame.png" alt="First slide">

      <div class="carousel-caption d-none d-md-block">
        <h1>AMELIA WATSON</h1>
        <p>Time Traveler.</p>
      </div>

    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/gura3.png" alt="Second slide">

       <div class="carousel-caption d-none d-md-block">
        <h1>Gawr Gura</h1>
        <p>Descendant of the Sea.</p>
      </div>

    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/kronii.jpg" alt="Third slide">

       <div class="carousel-caption d-none d-md-block">
        <h1>Ouro Kronii</h1>
        <p>Warden of Time.</p>
      </div>

    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- AKHIR SLIDER -->

<div class="keterangan" style="margin-bottom: 30px; background: #F8DB6E; padding-top: 30px; padding-bottom: 15px;  ">
  <h1 style="text-align: center; font-size: 60px;">HISTORY</h1>
  <hr>
  <p style="text-align: center; padding-left: 10px; padding-right: 10px; font-family: optima; font-size: 20px;">Hololive Production (<span style="color:red; font-weight: bold;">Japanese: ホロライブプロダクション</span>, Hepburn: Hororaibu Purodakushon) is a virtual YouTuber (VTuber) talent agency owned by Cover Corp. and formed in December 2019.[a] Popular VTubers managed by the agency include Inugami Korone, Shirakami Fubuki, Usada Pekora, Minato Aqua, Houshou Marine, Kiryu Coco, Akai Haato, and Gawr Gura. Unlike VTubers like Kizuna AI, talents focus on live streaming over pre-recorded videos, with regular live activities including singing, gaming, and chatting.</p>

  <div class="more" style="text-align: center; margin-top: 40px; margin-bottom: 20px;">
    <a href="https://en.wikipedia.org/wiki/Hololive_Production">LEARN MORE</a>
  </div>
</div>

<!-- MEMBUAT TAMPILAN OBYEK -->

  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <h1 style="padding-left: 20px; padding-top: 15px; padding-bottom: 15px; margin-bottom: 20px; background: #c4b5a4;">Latest News</h1>
        <?php
         if(mysqli_num_rows($destinasi) > 0) {
          while ($row2 = mysqli_fetch_array($destinasi))
            { ?>
        <div class="media" style="padding-bottom: 20px;">
          <div class="media-body">
            
            <a style="font-size: 28px; color: #915b43 ; font-family: 'Arial Black';" class="mt-0 mb-1" href="index2.php"><?php echo $row2["destinasinama"]?></a>
            <h5 style="font-family: Palatino;"><?php echo $row2["destinasialamat"] ?></h5>
            <p><?php echo $row2["kategoriketerangan"] ?></p>
           </div>
        <img class="ml-3" style="width: 200px; height: 100%;" src="images/<?php echo 
        $row2["fotofile"] ?>" alt="Gambar Tidak Ada" s>
        </div>

        <!-- Pagination -->
      <?php 
        
        $pr_query = "select * from destinasi ";
        $pr_result = mysqli_query($connection,$pr_query);
        $total_record = mysqli_num_rows($pr_result );
        
        $total_page = ceil($total_record/$num_per_page);

        if($page>1)
        {
            echo "<a href='index.php?page=".($page-1)."' class='btn btn-danger'>Previous</a>";
        }

        
        for($i=1;$i<$total_page;$i++)
        {
            echo "<a class='btn btn-primary'>$i</a>";
        }

        if($i<$page)
        {
            echo "<a href='index.php?page=".($page+1)."' class='btn btn-danger'>Next</a>";
        }
        

      ?>
<!-- END Pagination -->

      <?php } } ?>

    


      </div>
      <div class="col-sm-4">
<h1 style="padding-left: 20px; padding-top: 15px; padding-bottom: 15px; margin-bottom: 20px; background: #c4b5a4;">Archive</h1>
        <ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center ">
    <span style="color: red;">Latest News</span>
    <span class="badge badge-primary badge-pill"><?php echo $jumlah?></span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <span style="color: red;">Debut News </span>
    <span class="badge badge-primary badge-pill"><?php echo $jumlah1?></span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <span style="color: red;">Holo Gravity</span>
    <span class="badge badge-primary badge-pill"><?php echo $jumlah2?></span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <span style="color: red;">Song Release</span>
    <span class="badge badge-primary badge-pill"><?php echo $jumlah3?></span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <span style="color: red;">Talent Overview</span>
    <span class="badge badge-primary badge-pill"><?php echo $jumlah4?></span>
  </li>

</ul>

<div class="video">
  <h1 style="margin-top: 20px; padding-left: 20px; padding-top: 15px; padding-bottom: 15px; margin-bottom: 20px; background: #c4b5a4;">Video Clip</h1>
</div>

    <video width="355"  controls >
        <source src="images/video.mp4" type="video/mp4"> 
      </div>
    </div>
  </div>

<!-- END OBYEK -->

<!-- GALERI -->
<div class="container" style="padding-top: 40px;">
  <h1 style="text-align: center; background: #c4b5a4; padding-top: 15px; padding-bottom: 15px; font-family: 'Lucida Sans Typewriter';">Photos And Memories <br> <span style="font-size: 28px; font-family: Calibri;">All moments are captured by the camera so that they still remain the legacy.</span></h1>
<div class="row" style="cursor: pointer;">
<?php while ($row3 = mysqli_fetch_array($foto))
{?>
<div class="col-sm-4">
<figure class="figure">
  <img src="images/<?php echo $row3["fotofile"] ?>" class="figure-img img-fluid rounded" alt="Foto Tidak Ada">
  <figcaption style="font-weight: bold;" class="figure-caption text-right"><?php echo $row3["fotonama"] ?></figcaption>
</figure>
</div>
<?php } ?>
</div>
</div>

<!-- END GALERI -->




<div class="footer" style="; background: #FBF0A6; padding-top: 20px; padding-bottom: 20px; text-align: center;">
<h2>Copyright © 2021</h2>
    <h3 style="font-size: 17px;">Copyright is protected, prohibited from taking and producing for commercial purposes without permission</h3>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>