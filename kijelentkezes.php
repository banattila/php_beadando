<?php
session_start();
$_SESSION = array();
if (isset($_COOKIE)){
    setcookie(session_name(), session_id(), time() - 3600, "/");
}
session_destroy();
header("Location: bejelentkezes.php?uzenet=logout");
?>
