<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Pastikan Anda mengarahkan ke autoload.php dari Composer
require 'config/koneksi.php'; // Koneksi ke database

$mail = new PHPMailer(true);

try {
    // Konfigurasi SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Ganti dengan host SMTP Anda
    $mail->SMTPAuth = true;
    $mail->Username = 'infnityy.id@gmail.com'; // Ganti dengan email Anda
    $mail->Password = 'infnityy'; // Ganti dengan password Anda
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enkripsi TLS
    $mail->Port = 587; // Port untuk TLS

    // Mengambil semua email dari database
    $stmt = $pdo->query("SELECT email FROM users"); // Ganti 'users' dengan nama tabel Anda
    $emails = $stmt->fetchAll(PDO::FETCH_COLUMN); // Mengambil semua email sebagai array

    // Mengirim email ke setiap alamat
    foreach ($emails as $recipient) {
        // Pengaturan email
        $mail->setFrom('infnityy@gmail.com', 'Your Name'); // Ganti dengan nama pengirim
        $mail->addAddress($recipient); // Menambahkan alamat penerima

        // Konten email
        $mail->isHTML(true); // Mengatur email dalam format HTML
        $mail->Subject = 'Promo Menarik untuk Anda!';
        $mail->Body    = '<h1>Diskon Spesial!</h1><p>Gunakan kode <strong>DISKON20</strong> untuk mendapatkan diskon 20%!</p>';
        $mail->AltBody = 'Diskon Spesial! Gunakan kode DISKON20 untuk mendapatkan diskon 20%!';

        // Kirim email
        $mail->send();

        // Menghapus penerima setelah mengirim email
        $mail->clearAddresses();
    }

    echo 'Email telah dikirim ke semua pengguna!';
} catch (Exception $e) {
    echo "Email tidak dapat dikirim. Kesalahan: {$mail->ErrorInfo}";
}
?>