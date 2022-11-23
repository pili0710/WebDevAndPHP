<?php 
 include "includes/config.php";
 if (isset($_GET['hapusdestinasi']))
{
	$destinasikode = $_GET['hapusdestinasi'];
	$hapusdestinasi = mysqli_query($connection, "SELECT * FROM destinasi
		 WHERE destinasiID = '$destinasikode' ");
	

	mysqli_query($connection, "DELETE FROM destinasi
		 where destinasiID = '$destinasikode' ");


	echo "<script>alert('DATA TELAH DIHAPUS');
	document.location='destinasi.php'</script> ";
}
?>