<?php session_start(); ?>
<?php include 'conn.php';?> 
<?php 
$stmt = $link->prepare('SELECT club, memcard, cc, fname, lname, payment, paymethod, checkintime, regnr FROM checkedin WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($club, $memcard, $cc, $fname, $lname, $payment, $paymethod, $checkintime, $regnr);
$stmt->fetch();
$stmt->close();

$eventids = array();
	$idquery = mysqli_query($link,("SELECT * FROM `archive` order by eventid asc"));
	while($idrow = mysqli_fetch_assoc($idquery)){
		$eventids[] = (int)$idrow['eventid'];
	}  
	if (!empty($eventids)){
		$eventid = max($eventids) + 1;
	}
	 
	else {
		$eventid = 1;
	}

$id = $_SESSION['id'];

$checkouttime = date("H:i l d/m Y ");
$sql = "INSERT INTO archive (eventid, id, fname, lname, cc, club, memcard, payment, paymethod, checkintime, checkouttime, regnr) VALUES 

('$eventid', '$id', '$fname', '$lname', '$cc', '$club', '$memcard', '$payment', '$paymethod', '$checkintime', '$checkouttime', '$regnr')"; 

mysqli_query($link, $sql) or die ("Uppdateringen misslyckades"); 

echo "<script> alert ('Din närvaro har arkiverats!');</script>" ;


$stmt = $link->prepare('DELETE FROM checkedin WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->close();

if ($link->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $link->error;
	header('Location: main.html');
} ?>
<script>window.location.href = 'main.html';</script>