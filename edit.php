<?php 
include 'koneksi.php';

$id = (int) $_GET['id'];
$sql = "SELECT * FROM produk INNER JOIN buku ON produk.id_produk=buku.id_produk WHERE produk.id_produk='$id'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
?>

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
        <h2>Form Edit Data Buku</h2>
            <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $data['id_produk'] ?>">
                <table>
                    <tr>
                        <td>Nama Produk</td>
                        <td>:</td>
                        <td><input type="text" name="nama_produk" value="<?= $data['nama_produk'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Jenis Produk</td>
                        <td>:</td>
                        <td><input type="text" name="jenis_produk" value="<?= $data['jenis_produk'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Nama Buku</td>
                        <td>:</td>
                        <td><input type="text" name="nama_buku" value="<?= $data['nama_buku'] ?>"></td>
                        </tr>
                    <tr>
                        <td>Penulis</td>
                        <td>:</td>
                        <td><input type="text" name="penulis" value="<?= $data['penulis'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Penerbit</td>
                        <td>:</td>
                        <td><input type="text" name="penerbit" value="<?= $data['penerbit'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td>:</td>
                        <td><input type="text" name="harga" value="<?= $data['harga'] ?>"></td>
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
if ($_POST){
    $sql = "UPDATE produk SET nama_produk='{$_POST['nama_produk']}}',
                                jenis_produk='{$_POST['jenis_produk']}',
                                harga='{$_POST['harga']}'
                                WHERE id_produk='{$_POST['id']}'";
    $query = mysqli_query($koneksi, $sql);
    $sql = "UPDATE buku SET nama_buku='{$_POST['nama_buku']}',
                            penulis='{$_POST['penulis']}',
                            penerbit='{$_POST['penerbit']}' WHERE id_produk='{$_POST['id']}'";
    $query = mysqli_query($koneksi, $sql);
    if ($query){
        echo "DATA Berhasil Diubah";
        header('Location: index.php');
    }
}
?>