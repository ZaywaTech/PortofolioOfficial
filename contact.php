<?php
// Koneksi ke database
$host = "localhost"; // Sesuaikan dengan server database Anda
$user = "root";      // Sesuaikan dengan username database Anda
$password = "";      // Sesuaikan dengan password database Anda
$dbname = "portofoliozaywatc"; // Nama database

$conn = new mysqli($host, $user, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Tangkap data dari formulir
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Masukkan data ke database
    $sql = "INSERT INTO messages (name, email, phone, subject, message)
            VALUES ('$name', '$email', '$phone', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Kirim email ke admin
        $to = "zaywatc@gmail.com"; // Ganti dengan email admin
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $mailBody = "Name: $name\nEmail: $email\nPhone: $phone\nSubject: $subject\n\nMessage:\n$message";

        if (mail($to, $subject, $mailBody, $headers)) {
            echo "Message sent and saved successfully!";
        } else {
            echo "Message saved but failed to send email.";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>