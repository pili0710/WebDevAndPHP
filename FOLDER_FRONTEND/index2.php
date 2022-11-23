<!doctype html>
<?php 
  include "includes/config.php";
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


    <title>CONTENT</title>
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
  <a class="navbar-brand" href="index.php">Back</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

     

      <li class="nav-item dropdown">
        <a class="nav-link " href="admin" >
          Dashboard
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



<!-- AKHIR SLIDER -->



<!-- MEMBUAT TAMPILAN OBYEK -->

<!-- END OBYEK -->

<!-- GALERI -->
<div class="container" style="padding-top: 40px;">
  <h1 style="text-align: center; background: #c4b5a4; padding-top: 15px; padding-bottom: 15px; font-family: 'Lucida Sans Typewriter';">Urban Legend</h1>
  <img src="images/ame3.png" style="width: 100%; height: 100%;">
  <h2 style="margin-top: 30px;">Hololive Myth </h2>
  <p style="text-align: justify;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
<br> <br>
The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
</div>

<!-- END GALERI -->
<div class="footer" style="; background: #FBF0A6; padding-top: 20px; padding-bottom: 20px; text-align: center;">
<h2>Copyright © 2020</h2>
    <h3 style="font-size: 17px;">Copyright is protected, prohibited from taking and producing for commercial purposes without permission</h3>
</div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>