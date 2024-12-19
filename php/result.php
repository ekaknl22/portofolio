<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pemesan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form id="daftar">
    <table border="1" id="data">
        <h1>Daftar Pemesan</h1>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>Interest</th>
            <th>Option</th>
        </tr>
    </form>

        <?php 
        include 'connection.php';
        $no = 1;
        $data = mysqli_query($conn,"select * from contacts");
        if (!$data) {
            die("Query error: " . mysqli_error($conn)); 
        }
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['name']; ?></td>
				<td><?php echo $d['email']; ?></td>
				<td><?php echo $d['interest']; ?></td>
				<td>
					<a href="edit.php?id=<?php echo $d['user_id']; ?>" id="edit">EDIT</a>
					<a href="delete.php?id=<?php echo $d['user_id']; ?>" id="delete">DELETE</a>
				</td>
			</tr>
			<?php 
		}
        
		?>
    </table>
    <a href="add.php">+ TAMBAH PEMESAN</a>
</body>
</html>
