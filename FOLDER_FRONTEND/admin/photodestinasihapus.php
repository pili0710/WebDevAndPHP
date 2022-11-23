<?php 
 include "includes/config.php";
 if (isset($_GET['hapusfoto']))
{
	$fotokode = $_GET['hapusfoto'];
	$hapusfoto = mysqli_query($connection, "SELECT * FROM fotodestinasi
		 WHERE fotoID = '$fotokode' ");
	

	mysqli_query($connection, "DELETE FROM fotodestinasi
		 where fotoID = '$fotokode' ");


	echo "<script>alert('DATA TELAH DIHAPUS');
	document.location='photodestinasi.php'</script> ";
}
?>