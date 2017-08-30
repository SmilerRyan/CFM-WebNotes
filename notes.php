<?php
SESSION_START();
echo "<a href='/'>Home</a> - <a href='notes.php'>Notes</a> - <a href='cpass.php'>password</a><hr><br>";


if (!ISSET($_SESSION['allowed'])) {echo "You are not logged in...";exit();}

if ($_SESSION['allowed'] == false) {echo "You do not have permission to add notes. (You have not logged in)";} else {
?>
<form action="" method="POST">
<textarea id="note" name="note"><?php if(file_exists("private/".$_SESSION['name'].".txt")) {echo file_get_contents("private/".$_SESSION['name'].".txt");}?></textarea>
<br><input type="submit"></input></form>
<?php
}

if ($_SESSION['allowed'] = true & ISSET($_POST['note'])) {file_put_contents("private/".$_SESSION['name'].".txt", $_POST['note']);}
?>
