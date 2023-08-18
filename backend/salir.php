<?php
ob_start();
session_start();
session_cache_expire();
session_destroy();
ob_end_flush();
header('location:../index.php');
?>