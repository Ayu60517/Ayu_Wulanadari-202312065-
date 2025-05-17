<?php
include 'db.php';

// cek kalau ada yang mau dihapus
if (isset($_GET['hapus'])) {
    $id = (int) $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM tamu WHERE id = $id");
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Buku Tamu</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        /* biar gak terlalu polos */
        body { font-family: sans-serif; background: #f5f5f5; }
        .box {
            width: 500px;
            margin: 40px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
        }
        input, select, button {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #bbb;
            padding: 8px;
        }
        th {
            background: #eee;
        }
        a.hapus {
            color: red;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="box">
        <h2>Buku Tamu</h2>
        <form method="post" action="proses.php">
            <input type="text" name="nama" placeholder="Nama lengkap..." required>
            <input type="email" name="email" placeholder="Email aktif..." required>
            <input type="text" name="hp" placeholder="Nomor HP" required>
            <select name="gender" required>
                <option value="">-- pilih jenis kelamin --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <button type="submit">Simpan</button>
        </form>

        <h3>Data Tamu</h3>
        <table>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Gender</th>
                <th>Opsi</th>
            </tr>
            <?php
            $data = mysqli_query($conn, "SELECT * FROM tamu ORDER BY id DESC");
            while ($row = mysqli_fetch_assoc($data)) {
                echo "<tr>
                    <td>".$row['nama']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['hp']."</td>
                    <td>".$row['gender']."</td>
                    <td><a href='?hapus=".$row['id']."' class='hapus' onclick=\"return confirm('Yakin mau hapus?')\">hapus</a></td>
                </tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
