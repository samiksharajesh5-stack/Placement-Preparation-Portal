<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "db.php";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']); // make sure DB has md5 passwords

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $row['id'];
        $_SESSION['role'] = $row['role'];

        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Placement Portal Login</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        /* Full-width top logo/banner */
        .top-logo {
            width: 100%;
            display: block;
            object-fit: cover;
        }

        /* Login form container */
        .login-container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
        }

        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        button {
            padding: 10px 25px;
            background-color: #2c3e50;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 10px;
        }

        button:hover {
            background-color: #1f2a36;
        }

        a {
            display: block;
            margin-top: 15px;
            color: #2980b9;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>



<!-- Login Form -->
<div class="login-container">
    <h2> PLACEMENT PREPARATION PORTAL</h2>

    <?php
    if (isset($error)) {
        echo "<div class='error'>$error</div>";
    }
    ?>

    <form method="post">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit" name="login">Login</button>
    </form>

    <a href="register.php">Register</a>
</div>

</body>
</html>
