<?php
include("../core/init.php");
include("../routers/user.php");

$err = '';

if (isset($_POST["submit"])) {
    $user = $_POST["username"];
    $pass = $_POST["password"];
    $repass = $_POST["repeat_password"];

    if (empty(trim($user)) or empty(trim($pass))) {
        $_SESSION['msg'] = "Tidak boleh kosong,warning";
    } else {
        if ($pass != $repass) {
            $_SESSION['msg'] = "Password tidak sama,warning";
        } else {
            if (!cek_username($user)) {
                $_SESSION['msg'] = "Nama sudah terdaftar,warning";
            } else {
                if (register_user($user, $pass)) {
                    redirect_login($user);
                } else {
                    $_SESSION['msg'] = "Gagal daftar,warning";
                }
            }
        }
    }
}

include('header.php');
?>

<body>
    <div class="container">
        <?php include("message.php"); ?>
        <form action="register.php" method="post">
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
                <label for="repeat_password" class="col-sm-2 col-form-label">Ulangi Password</label>
                <div class="col-sm-10">
                    <input required type="password" name="repeat_password" class="form-control" id="repeat_password">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col">
                    <button type="submit" name="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-address-card" aria-hidden="true"></i>
                        Register
                    </button>
                </div>
            </div>
        </form>
        <div>
            <div>
                <p>Sudah mendaftar <a href="login.php">Login disini</a></p>
            </div>
        </div>
    </div>
</body>

</html>