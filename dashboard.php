<?php
session_start();
include 'db.php';

// Redirect to login if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* General reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f6f8;
            color: #333;
        }

        /* Header */
        .dashboard-header {
            background-color: #2c3e50;
            color: white;
            padding: 30px 0;
            text-align: center;
            position: relative;
        }

        .dashboard-header h1 {
            font-size: 2em;
            margin-bottom: 15px;
        }

        .logout-btn {
            display: inline-block;
            padding: 10px 25px;
            font-size: 16px;
            color: #2c3e50;
            background-color: #ecf0f1;
            border: 2px solid #2c3e50;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #2c3e50;
            color: #fff;
        }

        /* Menu cards */
        .dashboard-menu {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin: 40px auto;
            max-width: 1000px;
            flex-wrap: wrap;
        }

        .menu-card {
            background-color: #fff;
            padding: 30px 20px;
            width: 250px;
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.15);
        }

        .menu-card img {
            width: 60px;
            margin-bottom: 15px;
        }

        .menu-card a {
            display: block;
            text-decoration: none;
            color: #2c3e50;
            font-weight: bold;
            font-size: 18px;
            margin-top: 10px;
            transition: color 0.3s ease;
        }

        .menu-card a:hover {
            color: #2980b9;
        }

        @media(max-width: 768px) {
            .dashboard-menu {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>

<div class="dashboard-header">
    <h1>Student Dashboard</h1>
    <a href="logout.php" class="logout-btn">Logout</a>
</div>

<div class="dashboard-menu">
    <div class="menu-card">
        📚 <br>
        <a href="planner.php">Daily Study Planner</a>
    </div>

    <div class="menu-card">
         📘<br>
        <a href="resource.php"> Placement Resources</a>

    </div>

    <div class="menu-card">
           📄 <br>
        <a href="resume.php">Upload Resume</a>
    </div>
</div>

</body>
</html>
