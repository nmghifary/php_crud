<?php
include("../core/init.php");

$query = "SELECT * FROM list_kategori;";
$sql = mysqli_query($conn, $query);

$no = 0;
$id_kategori = "";
$kategori = "";

if (isset($_GET['ubah'])) {
    $id_kategori = $_GET['ubah'];

    $queryKategori = "SELECT * FROM list_kategori WHERE id_kategori = '$id_kategori';";
    $sqlKategori = mysqli_query($conn, $queryKategori);

    $resultKategori = mysqli_fetch_assoc($sqlKategori);

    $kategori = $resultKategori['nama_kategori'];
}

include("header.php");
?>

<div class="container">
    <!-- Judul -->
    <h1 class="mt-3">Kategori</h1>
    <!-- form -->
    <form method="POST" action="../controllers/kategori.php">
        <input type="hidden" value="<?php echo $id_kategori; ?>" name="id_kategori">
        <div class="mb-3 row">
            <label for="nama_kategori" class="col-sm-2 col-form-label">Nama Kategori</label>
            <div class="col-sm-10">
                <input required type="text" name="nama_kategori" class="form-control" id="nama_kategori" value="<?php echo $kategori; ?>">
            </div>
        </div>
        <div class="mb-3">
        <?php
        if (isset($_GET['ubah'])) {
        ?>
            <button type="submit" name="aksi" value="edit" class="btn btn-primary btn-sm">
                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                Simpan Perubahan
            </button>
            <a href="kategori.php" type="button" class="btn btn-danger btn-sm">
                <i class="fa fa-reply" aria-hidden="true"></i>
                Batalkan perubahan
            </a>
        <?php
        } else {
        ?>
            <button type="submit" name="aksi" value="add" class="btn btn-primary btn-sm">
                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                Tambah Data
            </button>
            <a href="../index.php" type="button" class="btn btn-danger btn-sm">
                <i class="fa fa-reply" aria-hidden="true"></i>
                Kembali
            </a>
        <?php } ?>
        </div>
        <?php
        include ("message.php");
        ?>
    </form>
    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>
                        <center>No.</center>
                    </th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($result = mysqli_fetch_assoc($sql)) {
                ?>
                    <tr>
                        <td>
                            <center><?php echo ++$no ?>.</center>
                        </td>
                        <td>
                            <?php echo $result["nama_kategori"]; ?>
                        </td>
                        <td>
                            <a href="kategori.php?ubah=<?php echo $result["id_kategori"]; ?>" type="button" class="btn btn-success btn-sm">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Edit Data
                            </a>
                            <a href="../controllers/kategori.php?hapus=<?php echo $result["id_kategori"]; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Hapus data')">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                                Hapus Data
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
<?php
include("footer.php")
?>
</html>