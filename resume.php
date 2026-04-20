<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$uid = $_SESSION['user_id'];

if (isset($_POST['upload'])) {
    if ($_FILES['resume']['name'] != "") {

        $file_name = time() . "_" . basename($_FILES['resume']['name']);
        $target = "uploads/" . $file_name;

        move_uploaded_file($_FILES['resume']['tmp_name'], $target);

        mysqli_query($conn, "INSERT INTO resumes(user_id, file_path) VALUES ('$uid','$target')");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Resume</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="resume-container">

    <h2>📄 Upload Your Resume</h2>

    <form method="post" enctype="multipart/form-data" class="upload-box">
        <input type="file" name="resume" required>
        <button type="submit" name="upload">Upload Resume</button>
    </form>

    <h3>Your Uploaded Resumes</h3>

    <div class="resume-list">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM resumes WHERE user_id='$uid'");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<a href='{$row['file_path']}' target='_blank'>📄 View Resume</a>";
            }
        } else {
            echo "<p>No resume uploaded yet.</p>";
        }
        ?>
    </div>

    <a href="dashboard.php" class="back-btn">⬅ Back to Dashboard</a>

</div>

</body>
</html>
