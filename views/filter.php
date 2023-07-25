<?php
include("../core/init.php");
include("../routers/user.php");

$queryKategori = "SELECT * FROM list_kategori";
$sqlKategori = mysqli_query($conn, $queryKategori);

if (isset($_POST['aksi'])) {
    $kategori = $_POST['kategori'];

    $query = "SELECT * FROM list_buku WHERE kategori='$kategori';";
    $sql = mysqli_query($conn, $query);
}

include("header.php");
?>

<div class="container">
    <!-- Judul -->
    <h1 class="mt-3">Kategori</h1>
    <!-- form -->
    <form method="POST" action="filter.php">
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
            <div class="mt-3 mb-3 row">
                <div class="col">
                    <button type="submit" name="aksi" value="filter" class="btn btn-primary btn-sm">
                        <i class="fa fa-filter" aria-hidden="true"></i>
                        Filter
                    </button>
                    <a href="../index.php" type="button" class="btn btn-danger btn-sm">
                        <i class="fa fa-reply" aria-hidden="true"></i>
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </form>
    <?php
    if (isset($_POST['aksi'])) {
        $no = 0;
    ?>
        <!-- Table -->
        <div class="table-responsive">
            <table id="dt" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>
                            <center>No.</center>
                        </th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Cover</th>
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
                                <?php echo $result["judul_buku"]; ?>
                            </td>
                            <td>
                                <?php echo $result["kategori"]; ?>
                            </td>
                            <td>
                                <?php echo $result["jumlah_buku"]; ?>
                            </td>
                            <td>
                                <img src="../assets/images/<?php echo $result["cover_buku"]; ?>" style="width: 150px;">
                            </td>
                            <td>
                                <?php
                                if ($result["file_buku"] != "") {
                                ?>
                                    <a href="../assets/pdf/<?php echo $result["file_buku"]; ?>" download="" class="btn btn-sm btn-warning">
                                        <i class="fa fa-download" aria-hidden="true"></i>
                                        Download buku
                                    </a>
                                <?php
                                }
                                ?>
                                <a href="buku.php?ubah=<?php echo $result["id_buku"]; ?>" type="button" class="btn btn-success btn-sm">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    Edit Data
                                </a>
                                <?php if (cek_admin($_SESSION['user']) or $_SESSION['user'] == $result['owner']) { ?>
                                    <a href="../controllers/buku.php?hapus=<?php echo $result["id_buku"]; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Hapus data')">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                        Hapus Data
                                    </a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>
</div>
</body>
<?php
include("footer.php")
?>

</html>