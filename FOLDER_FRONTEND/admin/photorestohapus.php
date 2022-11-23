<?php 
 include "includes/config.php";
 if (isset($_GET['hapusresto']))
{
	$fotokode = $_GET['hapusresto'];
	$hapusresto = mysqli_query($connection, "SELECT * FROM restoran
		 WHERE fotoID = '$fotokode' ");
	

	mysqli_query($connection, "DELETE FROM restoran
		 where fotoID = '$fotokode' ");


	echo "<script>alert('DATA TELAH DIHAPUS');
	document.location='photoresto.php'</script> ";
}
?>