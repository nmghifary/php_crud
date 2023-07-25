<?php
include("../core/init.php");
include("../routers/user.php");

$err = '';

if (isset($_SESSION['user'])) {
    header('location: ../index.php');
}

if (isset($_POST["submit"])) {
    $user = $_POST["username"];
    $pass = $_POST["password"];

    if (empty(trim($user)) or empty(trim($pass))) {
        $_SESSION['msg'] = "Tidak boleh kosong,warning";
    } else {
        if (!cek_username($user)) {
            if (cek_data($user, $pass)) {
                redirect_login($user);
            }
            $_SESSION['msg'] = "Gagal login,warning";
        } else {
            $_SESSION['msg'] = "Nama tidak tersedia,warning";
        }
    }
}

include("header.php");
include("title.php");
?>

<body>
    <div class="container">
        <?php include ("message.php"); ?>
        <form action="login.php" method="post">
            <div class="mb-3 mt-1 row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input required type="text" name="username" class="form-control" id="username">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input required type="password" name="password" class="form-control" id="password">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col">
                    <button type="submit" name="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                        Log in
                    </button>
                </div>
            </div>
        </form>
        <div>
            <div>
                <p>Belum punya akun <a href="register.php">Register disini</a></p>
            </div>
        </div>
    </div>
</body>

</html>