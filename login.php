<?php
    session_start();

    if(!isset($_SESSION["login"]))
    {
        header("Location: datamahasiswa.php");
        exit;
    }

    require 'function.php';
    $error = false;

    if(isset($_POST["login"]))
    {

        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "SELECT * FROM user WHERE username='$username'";

        $result = mysqli_query($koneksi, $query);

        $user = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result) > 0)
        {
            if(password_verify($password, $user["password"]))
            {
                $_SESSION["login"] = $user["id"];
                header("Location: datamahasiswa.php");
                exit;
            }
        }

        $error = true;

    }
?>










<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <style>
        body {
            background: linear-gradient(135deg, #27d6dfff, #046ef9ff);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.1);
            border: none;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 500px;
        }

        .card h2 {
            font-weight: bold;
            color: #fff;
        }

        .form-label {
            color: #ffffffff;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.2);
            border: 1px solid #ccc;
            color: #fff;
        }

        .form-control::placeholder {
            color: #ddd;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.3);
            border-color: #ffffff;
            color: #fff;
        }

        .btn-custom {
            background: linear-gradient(45deg, #10fff3ff, #2555f6ff);
            color: white;
            font-weight: bold;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            filter: brightness(1.1);
            transform: scale(1.02);
        }

        .custom-alert {
            background-color: rgba(255, 0, 0, 0.1);
            border: 1px solid rgba(255, 0, 0, 0.3);
            color: #fff;
            padding: 12px 20px;
            border-radius: 10px;
            backdrop-filter: blur(8px);
            box-shadow: 0 0 10px rgba(255, 0, 0, 0.3);
            font-weight: 500;
            transition: all 0.3s ease-in-out;
        }

    </style>
</head>
<body>

    <div class="card p-4">
        <h2 class="text-center mb-4">Login Akun</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password">
            </div>

            <?php if($error) : ?>
                <div class="custom-alert text-center mb-3">
                    <strong>Login gagal!</strong><br>Username atau password salah.
                </div>
            <?php endif; ?>

            <button type="submit" name="login" class="btn btn-custom w-100">Login</button>
        </form>
    </div>

    <script

    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">

    </script>

</body>
</html>