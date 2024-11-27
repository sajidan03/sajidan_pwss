<?php
session_start();
// session_abort();
// unset($_SESSION['nama']);
session_destroy();
header("location:index.php");
?>