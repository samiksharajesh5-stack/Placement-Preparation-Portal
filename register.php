<?php
include "db.php";

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $role = "student";

    mysqli_query($conn, "INSERT INTO users(name,email,password,role)
                          VALUES('$name','$email','$password','$role')");

    header("Location: index.php");
}
?>
<link rel="stylesheet" href="css/style.css">

<h2>Student Registration</h2>

<form method="post">
    <input type="text" name="name" placeholder="Name" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button name="register">Register</button>
</form>
