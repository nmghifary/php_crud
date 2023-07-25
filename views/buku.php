<?php
include("../core/init.php");

$id_buku = "";
$judul = "";
$jumlah = "";

$queryKategori = "SELECT * FROM list_kategori";
$sqlKategori = mysqli_query($conn, $queryKategori);

if (isset($_GET['ubah'])) {
    $id_buku = $_GET['ubah'];

    $query = "SELECT * FROM list_buku WHERE id_buku = '$id_buku';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $judul = $result['judul_buku'];
    $kategori = $result['kategori'];
    $jumlah = $result['jumlah_buku'];
}
include("header.php");
?>

<div class="container">
    <form method="POST" action="../controllers/buku.php" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $id_buku; ?>" name="id_buku">
        <div class="mb-3 row">
            <label for="judul_buku" class="col-sm-2 col-form-label">Judul Buku</label>
            <div class="col-sm-10">
                <input required type="text" name="judul_buku" class="form-control" id="judul_buku" value="<?php echo $judul; ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kategori" class="col-sm-2 col-form-label">Kategori Buku</label>
            <div class="col-sm-10">
                <select required id="kategori" name="kategori" class="form-select" aria-label="Default select example">
                    <option selected>Kategori</option>
                    <?php
                    while ($resultKategori = mysqli_fetch_assoc($sqlKategori)) {
                        $kategori = $resultKategori["nama_kategori"]
                    ?>
                        <option value=<?php echo $kategori ?>><?php echo $kategori ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jumlah_buku" class="col-sm-2 col-form-label">Jumlah Buku</label>
            <div class="col-sm-10">
                <input required type="text" name="jumlah_buku" class="form-control" id="jumlah_buku" value="<?php echo $jumlah; ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="cover_buku" class="col-sm-2 col-form-label">Cover Buku</label>
            <div class="col-sm-10">
                <input <?php if (!isset($_GET['ubah'])) {
                            echo "required";
                        } ?> class="form-control" name="cover_buku" type="file" id="formCover" accept="image/*">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="file_buku" class="col-sm-2 col-form-label">File</label>
            <div class="col-sm-10">
                <input class="form-control" name="file_buku" type="file" id="formFile" accept="application/pdf, application/vnd.ms-excel">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <?php
                if (isset($_GET['ubah'])) {
                ?>
                    <button type="submit" name="aksi" value="edit" class="btn btn-primary btn-sm">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i>
                        Simpan Perubahan
                    </button>
                <?php
                } else {
                ?>
                    <button type="submit" name="aksi" value="add" class="btn btn-primary btn-sm">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i>
                        Tambah Data
                    </button>
                <?php
                }
                ?>
                <a href="../index.php" type="button" class="btn btn-danger btn-sm">
                    <i class="fa fa-reply" aria-hidden="true"></i>
                    Batal
                </a>
            </div>
        </div>
    </form>
</div>
</body>
<?php
include("footer.php")
?>
</html>