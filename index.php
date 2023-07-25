<?php
include("core/init.php");
include("routers/user.php");

if (!isset($_SESSION["user"])) {
    header("Location: views/login.php");
}

$query = "SELECT * FROM list_buku;";
$sql = mysqli_query($conn, $query);

$no = 0;

include("views/header.php");
include("views/title.php");
?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#dt').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf'
            ]
        });
    });
</script>
<div class="container">
    <div class="mb-3">
        <a href="views/buku.php" type="button" class="btn btn-primary">
            <i class="fa fa-plus" aria-hidden="true"></i>
            Tambah Data
        </a>
        <?php
        if (cek_admin($_SESSION['user'])) {
        ?>
            <a href="views/kategori.php" type="button" class="btn btn-secondary">
                <i class="fa fa-plus" aria-hidden="true"></i>
                Tambah Kategori
            </a>
        <?php } ?>
        <a href="views/filter.php" type="button" class="btn btn-tertiary">
            <i class="fa fa-filter" aria-hidden="true"></i>
            Filter kategori buku
        </a>
    </div>
    <?php
    include("views/message.php");
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
                            <img src="assets/images/<?php echo $result["cover_buku"]; ?>" style="width: 150px;">
                        </td>
                        <td>
                            <?php
                            if ($result["file_buku"] != "") {
                            ?>
                                <a href="assets/pdf/<?php echo $result["file_buku"]; ?>" download="" class="btn btn-sm btn-warning">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                    Download buku
                                </a>
                            <?php
                            }
                            ?>
                            <a href="views/buku.php?ubah=<?php echo $result["id_buku"]; ?>" type="button" class="btn btn-success btn-sm">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Edit Data
                            </a>
                            <?php if (cek_admin($_SESSION['user']) or $_SESSION['user'] == $result['owner']) { ?>
                                <a href="controllers/buku.php?hapus=<?php echo $result["id_buku"]; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Hapus data')">
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
</div>
</body>
<?php
include("views/footer.php")
?>

</html>