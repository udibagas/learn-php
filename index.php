<?php
session_start();
$username = @$_POST['username'];
$password = @$_POST['password'];

$validUser = 'admin';
$validPassword = 'admin123';
$message = "Selamat Datang";

// berhasil login
if ($username == $validUser && $password == $validPassword) {
  $_SESSION['username'] = $username;
  setcookie('username', $username, time() + 60);
}

$message .= " " . @$_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    form {
      width: 500px;
      margin: 100px auto 0;
    }

    .form-row {
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <form action="" method="post">
    <h1><?= $message; ?></h1>
    <div class="form-row">
      <label for="username">Username</label> <br>
      <input type="text" placeholder="Username" id="username" name="username">
    </div>

    <div class="form-row">
      <label for="password">Password</label> <br>
      <input type="password" placeholder="Password" id="password" name="password">
    </div>

    <div class="form-row">
      <button type="submit">LOGIN</button>
    </div>

    <h3><?= $_COOKIE['PHPSESSID'] ?></h3>

  </form>
</body>

</html>