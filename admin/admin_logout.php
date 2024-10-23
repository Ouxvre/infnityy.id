<?php
session_start();
session_destroy();
header('Location: admin_login.php'); // Arahkan kembali ke halaman login
exit();
?>