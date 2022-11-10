<!doctype html>
<?php 
$id = $_POST['id'];
$resetvalid = 0;
$resetcode = $_POST['resetcode'];
$password = $_POST['password'];
$hashedpassword = password_hash($password, PASSWORD_DEFAULT);

$stmt = $link->prepare('SELECT resetcode, resetvalid FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->bind_result($accountresetcode, $accountresetvalid);
$stmt->fetch();
$stmt->close();
if( $resetcode == $accountresetcode and $accountresetvalid == 1){
mysqli_query($link,("UPDATE accounts SET password = '$hashedpassword', resetvalid = '$resetvalid' WHERE id LIKE '$id'"))or die("<script> alert('cannot update DB'); window.location.href = 'index.html';</script>"); }?><script> alert('Lösenord återställt'); window.location.href = 'index.html';</script>