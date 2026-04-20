<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Placement Resources</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Header -->
<div class="resource-header">
    <h1>📘 Placement Training Resources</h1>
    <p>Learn | Practice | Get Placed</p>
</div>

<!-- Video Section -->
<div class="resource-container">

    <div class="video-card">
        <iframe src="https://www.youtube.com/embed/BBpAmxU_NQo" allowfullscreen></iframe>
        <h3>Aptitude Training – Basics</h3>
        <p>Learn quantitative aptitude concepts for placements.</p>
    </div>

    <div class="video-card">
        <iframe src="https://www.youtube.com/embed/5_5oE5lgrhw" allowfullscreen></iframe>
        <h3>Technical Interview Preparation</h3>
        <p>Most asked technical interview questions explained.</p>
    </div>

    <div class="video-card">
        <iframe src="https://www.youtube.com/embed/sf6ZOBmzhGQ" allowfullscreen></iframe>
        <h3>HR Interview Tips</h3>
        <p>How to crack HR interviews confidently.</p>
    </div>

    <div class="video-card">
        <iframe src="https://www.youtube.com/embed/kqtD5dpn9C8" allowfullscreen></iframe>
        <h3>Resume Building</h3>
        <p>Create a professional resume for placements.</p>
    </div>

</div>

<!-- Footer -->
<div class="resource-footer">
    <a href="dashboard.php">⬅ Back to Dashboard</a>
</div>

</body>
</html>
