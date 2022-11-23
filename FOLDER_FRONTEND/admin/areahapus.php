<?php 
 include "includes/config.php";
 if (isset($_GET['hapusarea']))
{
	$areakode = $_GET['hapusarea'];
	$hapusarea = mysqli_query($connection, "SELECT * FROM area
		 WHERE areaID = '$areakode' ");
	

	mysqli_query($connection, "DELETE FROM area
		 where areaID = '$areakode' ");


	echo "<script>alert('DATA TELAH DIHAPUS');
	document.location='area.php'</script> ";
}
?>