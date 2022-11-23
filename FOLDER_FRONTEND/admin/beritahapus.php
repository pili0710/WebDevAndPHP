<?php 
 include "includes/config.php";
 if (isset($_GET['hapusberita']))
{
	$beritakode = $_GET['hapusberita'];
	$hapusberita = mysqli_query($connection, "SELECT * FROM beritawisata
		 WHERE beritaID = '$beritakode' ");
	

	mysqli_query($connection, "DELETE FROM beritawisata
		 where beritaID = '$beritakode' ");


	echo "<script>alert('DATA TELAH DIHAPUS');
	document.location='berita.php'</script> ";
}
?>