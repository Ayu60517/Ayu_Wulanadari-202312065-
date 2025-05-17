<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $hp = $_POST['hp'];
    $gender = $_POST['gender'];

    $stmt = $conn->prepare("INSERT INTO tamu (nama, email, hp, gender) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nama, $email, $hp, $gender);

    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Gagal menyimpan data!";
    }
    $stmt->close();
}
?>
