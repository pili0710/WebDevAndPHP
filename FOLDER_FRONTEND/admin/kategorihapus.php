<?php 
 include "includes/config.php";
 if (isset($_GET['hapuskategori']))
{
	$kategorikode = $_GET['hapuskategori'];
	$hapuskategori = mysqli_query($connection, "SELECT * FROM kategori
		 WHERE kategoriID = '$kategorikode' ");
	

	mysqli_query($connection, "DELETE FROM kategori
		 where kategoriID = '$kategorikode' ");


	echo "<script>alert('DATA TELAH DIHAPUS');
	document.location='kategori.php'</script> ";
}
?>