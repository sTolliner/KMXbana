<!doctype html>
<?php 
$id = $_POST['id'];
$resetvalid = 1;
$resetcode = rand(10000, 99999);
mysqli_query($link,("UPDATE accounts SET resetcode = '$resetcode', resetvalid = '$resetvalid' WHERE id LIKE '$id'"))or die("<script> alert('cannot update DB'); window.location.href = 'index.html';</script>"); 
$stmt = $link->prepare('SELECT mail, fname, lname FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->bind_result($mail, $fname, $lname);
$stmt->fetch();
$stmt->close();
$message = 'Din kod för återställning är:' . $resetcode;
mail($mail, 'Återställning av lösenord för KMX', $message)
	
?><script> alert('Återställningskod genererad'); window.location.href = 'index.html';</script>