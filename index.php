<?php
ERROR_REPORTING(0);
SESSION_START();

echo "<a href='/'>Home</a> - <a href='notes.php'>Notes</a> - <a href='cpass.php'>password</a><hr><br>";

if (ISSET($_GET['logout'])) {SESSION_DESTROY();echo "You have logged out.";exit();}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$file = "private/" . $_POST['name'];

if (file_exists($file)) {
	if( md5($_POST['password']) == file_get_contents($file) ) {$_SESSION['allowed'] = true;$_SESSION['name'] = $_POST['name'];echo "Success!<meta http-equiv='refresh' content='0'>";}else{echo "not correct";session_destroy();}
} else {
	file_put_contents($file, md5($_POST['password']));
	echo "<b>Your account was created succesfully!</b>";
	$_SESSION['allowed'] = true;
	$_SESSION['name'] = $_POST['name'];
}

}

else {
	

if ($_SESSION['allowed'] == true){
	echo "Hello, " . $_SESSION['name'] . "! Click <a href='?logout'>here</a> to log out.";
} else {
	echo '<form action="" method="post"><input id="name" name="name"><input id="password" name="password"><input type="submit"></input></form>';
}

}
?>