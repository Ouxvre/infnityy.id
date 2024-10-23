<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php'); // Arahkan ke halaman login jika belum login
    exit();
}