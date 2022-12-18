<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
        <body>
        <nav>
            <ul>
                <li><a href="dashboard.php">Beranda</a></li>
                <li><a href="index.php">List Buku</a></li>
            </ul>
        </nav>
        <h2>Form Tambah Data Buku</h2>
            <form action="" method="POST">
                <table>
                    <tr>
                        <td>Nama Produk</td>
                        <td>:</td>
                        <td><input type="text" name="nama_produk"></td>
                    </tr>
                    <tr>
                        <td>Jenis Produk</td>
                        <td>:</td>
                        <td><input type="text" name="jenis_produk"></td>
                    </tr>
                    <tr>
                        <td>Nama Buku</td>
                        <td>:</td>
                        <td><input type="text" name="nama_buku"></td>
                        </tr>
                    <tr>
                        <td>Penulis</td>
                        <td>:</td>
                        <td><input type="text" name="penulis"></td>
                    </tr>
                    <tr>
                        <td>Penerbit</td>
                        <td>:</td>
                        <td><input type="text" name="penerbit"></td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td>:</td>
                        <td><input type="text" name="harga"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <button type="submit"  class="submit" name="simpan">Simpan</button>
                            &ensp;<button type="reset" class="reset" name="reset">Batal</button>
                        </td>
                    </tr>
                </table>
            </form>
        </body>
    </html>
<?php 
include 'koneksi.php';
if ($_POST){
    $sql = "INSERT INTO produk (nama_produk, jenis_produk, harga) VALUES ('{$_POST['nama_produk']}', '{$_POST['jenis_produk']}', '{$_POST['harga']}')";
    $query = mysqli_query($koneksi, $sql);
    $sql = "SELECT max(id_produk) AS last_id FROM produk LIMIT 1";
    $query = mysqli_query($koneksi, $sql);

    $data = mysqli_fetch_array($query);
    $last_id = $data['last_id'];
    $sql = "INSERT INTO buku (id_produk, nama_buku, penulis, penerbit) VALUES ('$last_id', '{$_POST['nama_buku']}', '{$_POST['penulis']}', '{$_POST['penerbit']}')";
    $query = mysqli_query($koneksi, $sql);

    if ($query){
        echo "Data Berhasil Disimpan";
        header('Location: index.php');
    }
}
?>