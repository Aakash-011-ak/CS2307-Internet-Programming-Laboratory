<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Student Feedback Management System</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<header>

    <h1>Student Feedback Management System</h1>

    <p>Welcome, <?php echo $_SESSION["username"]; ?></p>

</header>

<nav>

    <a href="index.php">Home</a>

    <a href="feedback.php">Give Feedback</a>

    <a href="view_feedback.php">View Feedback</a>

    <a href="logout.php">Logout</a>

</nav>

<div class="container">

    <h2>Welcome to Feedback Portal</h2>

    <p>
        Students can submit their feedback about
        courses and teaching.
    </p>

    <a class="button" href="feedback.php">
        Give Feedback
    </a>

</div>

</body>

</html>