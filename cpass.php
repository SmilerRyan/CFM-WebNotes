<?php
SESSION_START();
echo "<a href='/'>Home</a> - <a href='notes.php'>Notes</a> - <a href='cpass.php'>password</a><hr><br>";


if (!ISSET($_SESSION['allowed'])) {echo "You are not logged in...";exit();}

if ($_SESSION['allowed'] == true) {?>
<form action="" method="POST">
<textarea id="note" name="note"><?php if(file_exists("private/".$_SESSION['name'].".txt")) {echo file_get_contents("private/".$_SESSION['name'].".txt");}?></textarea>
<br><input type="submit"></input></form>
<?php
} else {
	file_put_contents("private/".$_SESSION['name'], md5($_POST['note']));
	echo "Password changed! Please remember it! (We can NOT see or recover your password!)";
}
?>