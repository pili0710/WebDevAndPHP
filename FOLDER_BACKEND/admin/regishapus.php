<?php 
 include "includes/config.php";
 if (isset($_GET['hapusregis']))
{
	$regiskode = $_GET['hapusregis'];
	$hapusregis = mysqli_query($connection, "SELECT * FROM registrasi
		 WHERE regisID = '$regiskode' ");
	

	mysqli_query($connection, "DELETE FROM registrasi
		 where regisID = '$regiskode' ");


	echo "<script>alert('DATA TELAH DIHAPUS');
	document.location='regis.php'</script> ";
}
?>