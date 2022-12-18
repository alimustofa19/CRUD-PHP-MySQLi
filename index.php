<?php 
include 'koneksi.php';
$sql = "SELECT * FROM  produk INNER JOIN buku ON produk.id_produk=buku.id_produk";
$query = mysqli_query($koneksi, $sql);
?>
<html>
    <head>
        <title>Book Store</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="dashboard.php">Beranda</a></li>
                <li><a href="tambah.php">Tambahkan Data</a></li>
            </ul>
        </nav>
        <h2>List Buku</h2>
        <table>
            <thead>
                <tr>
                    <th colspan="5">Nama Produk</th>
                    <th colspan="5">Jenis Produk</th>
                    <th colspan="5">Nama Buku</th>
                    <th colspan="5">Penulis</th>
                    <th colspan="5">Penerbit</th>
                    <th colspan="5">Harga</th>
                    <th colspan="5">Kelola</th>
                </tr>
            </thead>
        <?php 
        while ($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td colspan="5"><?php echo $data['nama_produk']?></td>
                <td colspan="5"><?php echo $data['jenis_produk']?></td>
                <td colspan="5"><?php echo $data['nama_buku']?></td>
                <td colspan="5"><?php echo $data['penulis']?></td>
                <td colspan="5"><?php echo $data['penerbit']?></td>
                <td colspan="5"><?php echo $data['harga']?></td>
                <td colspan="5"><a href="edit.php?id=<?= $data['id_produk']?>">Edit</a> | <a href="hapus.php?id=<?= $data['id_produk']?>">Hapus</a></td>
            </tr>
            <?php
        }
        ?>
        </table>
    </body>
</html>