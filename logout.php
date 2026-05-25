<?php
session_start();
session_destroy();
header("Location: /blood-bank/sign-in.php");
exit();
?>
