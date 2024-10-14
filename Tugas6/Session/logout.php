<!--
Nama    : Wa Ode Zachra Chaerani
NPM     : 140810230062
Kelas   : B
-->

<?php
session_start();

session_destroy();

header("Location: login.php");
exit;
?>