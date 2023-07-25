<?php

function register_user($user, $pass)
{
    global $conn;

    $user = escape($user);
    $pass = escape($pass);

    $pass = password_hash($pass, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, password) VALUES ('$user', '$pass')";

    if (mysqli_query($conn, $query)) {
        return true;
    } else {
        return false;
    }
}
function cek_username($user)
{
    global $conn;

    $user = escape($user);

    $query = "SELECT * FROM users WHERE username = '$user'";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        if (mysqli_num_rows($sql) == 0) {
            return true;
        } else {
            return false;
        }
    }
}
function cek_data($user, $pass)
{
    global $conn;

    $user = escape($user);
    $pass = escape($pass);

    $query = "SELECT password FROM users WHERE username = '$user'";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);
    $hash = $result['password'];
    $cekPass = password_verify($pass, $hash);

    if ($cekPass) {
        return true;
    } else {
        return false;
    }
}
function escape($data)
{
    global $conn;

    $data = mysqli_real_escape_string($conn, $data);
    return $data;
}
function redirect_login($user)
{
    $_SESSION['user'] = $user;
    header('location: ../index.php');
}
function flash_message($msg)
{
    // if(isset($_SESSION('msg')))
    echo $msg;
    unset($msg);
}
function cek_admin($user)
{
    global $conn;

    $user = escape($user);

    $query = "SELECT role FROM users WHERE username = '$user';";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql)['role'];

    if ($result == 1){
        return true;
    } else {
        return false;
    }
}
