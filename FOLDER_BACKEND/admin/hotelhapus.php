<?php 
 include "includes/config.php";
 if (isset($_GET['hapushotel']))
{
	$hotelkode = $_GET['hapushotel'];
	$hapushotel = mysqli_query($connection, "SELECT * FROM hotel
		 WHERE hotelID = '$hotelkode' ");
	

	mysqli_query($connection, "DELETE FROM hotel
		 where hotelID = '$hotelkode' ");


	echo "<script>alert('DATA TELAH DIHAPUS');
	document.location='hotel.php'</script> ";
}
?>