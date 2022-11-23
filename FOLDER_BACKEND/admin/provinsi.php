<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROVINSI</title>
</head>
<?php
    ob_start();
    session_start();
    if(!isset($_SESSION['emailuser']))
        header("location:login.php");
?>
    <?php include "header.php";?>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <?php
                include "includes/config.php";

                if(isset($_POST['Simpan']))
                {
                    if (isset($_REQUEST['inputid']))
                    {
                    $provinsiID = $_REQUEST['inputid'];
                    }

                    if(!empty($provinsiID))
                    {
                    $provinsiID = $_REQUEST['inputid'];
                    }
                    else {
                    ?> <h1>Anda harus isi datanya</h1> <?php
                    die ('Anda harus masukin datanya');
                    }
                    $provinsiid = $_POST['inputid'];
                    $provinsinama = $_POST['inputnama'];
                    $provinsitglberdiri = $_POST['inputtgl'];

                    mysqli_query($connection, "insert into provinsi values ('$provinsiid', '$provinsinama', '$provinsitglberdiri')");
                    header("location:provinsi.php");
                }
            ?>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <h1 class="display-4">Input Provinsi Wisata</h1>
                        </div>
                    </div><!--Penutup Jumbotron-->
                    <form method="POST">
                        <div class="form-group row">
                            <label for="idprovinsi" class="col-sm-2 col-form-label">ID</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="inputid" id="idprovinsi" placeholder="ID Provinsi" maxlength="2" required=""> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="namaprovinsi" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="inputnama" id="namaprovinsi" placeholder="Nama Provinsi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Berdiri</label>
                            <div class="col-sm-10">
                            <input type="date" class="form-control" name="inputtgl" id="tanggal" placeholder="Tanggal Berdiri">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2"> 
                            </div>
                            <div class="col-sm-10">
                                <input type="submit" class="btn btn-primary" value="Simpan" name="Simpan"> 
                                <input type="reset" class="btn btn-secondary"value= "Batal" name="Batal"> 
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
                            <h1 class="display-4">Daftar Provinsi Wisata</h1>
                        </div>
                    </div><!--Penutup Jumbotron-->

                    <form method="POST">
                        <div class="form-group row mb-2">
                            <label for="search" class="col-sm-3">Nama Provinsi</label>
                            <div class="col-sm-6">
                                <input type="text" name="search" class="form-control" id="search" value="<?php if(isset($_POST['search'])) { echo $_POST['search']; }?>" placeholder="Cari Nama Provinsi">
                            </div>
                            <input type="submit" name="kirim" class="col-sm-1 btn btn-info" value="Cari">
                        </div>
                    </form>
                    
                    <table class="table table-hover table-success">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama Provinsi</th>
                                <th>Tanggal Berdiri Provinsi</th>
                                <th colspan="2" style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if(isset($_POST["kirim"])) {
                                    $search = $_POST['search'];
                                    $query = mysqli_query($connection, "select * from provinsi 
                                    where provinsinama like '%".$search."%'
                                    ");
                                }else{
                                    $query = mysqli_query($connection, "select * from provinsi");
                                }

                                $number = 1;
                                while ($row = mysqli_fetch_array($query)) { ?>
                                    <tr>
                                        <td><?php echo $number; ?></td>
                                        <td><?php echo $row['provinsiID']; ?></td>
                                        <td><?php echo $row['provinsinama']; ?></td>
                                        <td><?php echo $row['provinsitglberdiri']; ?></td>
                                        <!--icon edit dan delete-->
                                        <td>
                                            <a href="provinsiedit.php?ubah=<?php echo $row["provinsiID"] ?>" class="btn btn-success btn-mb" title="EDIT">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="provinsidelete.php?hapus=<?php echo $row["provinsiID"] ?>" class="btn btn-danger btn-mb" title="DELETE">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/></svg>
                                            </a>
                                        </td>
                                        <!---->
                                    </tr>
                                    <?php $number = $number + 1;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-1"></div>
            </div>
            <script type="text/javascript" src="js/bootstrap.min.js"></script>
            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        </div>
    </div>
<?php include "footer.php";?>
<?php
    mysqli_close($connection);
    ob_end_flush();
?>
</html>