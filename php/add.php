<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pemesan</title>
</head>
<body>
    <h1>Tambahkan Data Pemesan</h1>
    <?php
    // Sertakan file koneksi ke database
    include 'connection.php';

    // Cek apakah form disubmit
    if (isset($_POST['submit'])) {
        // Ambil data dari form
        $name = $_POST['name'];
        $email = $_POST['email'];
        $interest = $_POST['interest'];

        // Query untuk menambahkan data ke tabel register
        $query_insertdata = "INSERT INTO contacts (name, email, interest) 
                             VALUES ('$name', '$email', '$interest')";

        // Eksekusi query
        if ($conn->query($query_insertdata) === TRUE) {
            echo "Data peserta berhasil ditambahkan.";
        } else {
            echo "Error: " . $query_insertdata . "<br>" . $conn->error;
        }
        
        // Tutup koneksi
        $conn->close();
    }
    ?>
    <!-- Form untuk menambahkan data peserta -->
    <form method="POST" action="">
        <table>
            <tr>
                <td>Name:
                <input type="text" name="name" required></td>
            </tr>
            <tr>
                <td>Email:
                <input type="email" name="email" required></td>
            </tr>
            <tr>
            <td>Interest:
                    <select name="interest" required>
                    <option value="belanja">Belanja</option>
                    <option value="fotografi">Fotografi</option>
                    <option value="hiking">Hiking/Trekking</option>
                    <option value="wisata_kuliner">Wisata Kuliner</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Add"></td>
            </tr>
        </table>
    </form>
    <a href="result.php">Back</a><br>
    
</body>
</html>
