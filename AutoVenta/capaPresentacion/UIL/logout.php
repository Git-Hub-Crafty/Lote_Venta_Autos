<?php 
session_start();
session_destroy();

echo "<script>location.href = '../UI/login.php';</script>";