<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pemesan</title>
    </head>
<body>
    <h1 id="edit">Edit Data Pemesan</h1>

    <?php
    include 'connection.php'; 


    if (isset($_GET['id'])) {
        $id = $_GET['id'];

       
        $query = "SELECT * FROM contacts WHERE user_id=$id";
        $result = $conn->query($query);

        // Jika data ditemukan
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "Data tidak ditemukan.";
            exit;
        }
    } else {
        echo "ID tidak ditemukan di URL.";
        exit;
    }
    ?>

    <form method="POST" action="">
        <!-- Input tersembunyi untuk ID -->
        <input type="hidden" name="id" value="<?php echo $row['user_id']; ?>">
        
        <table>
            <tr>
                <td>Name:<input type="text" name="name" value="<?php echo $row['name']; ?>"></td>
            </tr>
            <tr>
                <td>Email: <input type="email" name="email" value="<?php echo $row['email']; ?>"></td>
            </tr>
            <tr>
                <td>Interest:
                    <select name="interest">
                    <option value="belanja" <?php if ($row['interest'] == 'belanja') echo 'selected'; ?>>Belanja</option>
                    <option value="fotografi" <?php if ($row['interest'] == 'fotografi') echo 'selected'; ?>>Fotografi</option>
                    <option value="hiking" <?php if ($row['interest'] == 'hiking') echo 'selected'; ?>>Hiking/Trekking</option>
                    <option value="wisata_kuliner" <?php if ($row['interest'] == 'wisata_kuliner') echo 'selected'; ?>>Wisata Kuliner</option>
                    </select>
                </td>
            </tr>
        </table>
        <input type="submit" value="Update Data">
    </form>

    <a href="result.php">Back</a>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // Ambil data dari form
        $user_id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $interest = $_POST['interest'];
       
        // Sanitasi data sebelum digunakan di dalam query
        $user_id = $conn->real_escape_string($id);
        $name = $conn->real_escape_string($name);
        $email = $conn->real_escape_string($email);
        $interest = $conn->real_escape_string($interest);

        // Query untuk memperbarui data
        $query_editdata = "UPDATE contacts SET 
            name='$name', 
            email='$email', 
            interest='$interest' 
            WHERE user_id=$user_id";

        // Eksekusi query
        if ($conn->query($query_editdata) === TRUE) {
            echo "Data peserta berhasil diperbarui";
        } else {
            echo "Error: " . $query_editdata . "<br>" . $conn->error;
        }
        
        // Tutup koneksi
        $conn->close();
    }
    ?>
</body>
</html>
