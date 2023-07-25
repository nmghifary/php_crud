<?php
if (isset($_SESSION['msg'])) {
    $split = explode(",", $_SESSION['msg']);
?>
    <div class="alert alert-<?php echo $split[1]; ?> alert-dismissible fade show" role="alert">
        <strong><?php echo $split[0]; ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    unset($_SESSION['msg']);
}
?>