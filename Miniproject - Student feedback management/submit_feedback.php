<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: feedback.php");
    exit();
}

$name = trim($_POST['student_name']);
$register_no = trim($_POST['register_no']);
$course = trim($_POST['course']);
$rating = $_POST['rating'];
$comments = trim($_POST['comments']);

$errors = [];

// Student name validation
if (strlen($name) < 3 || strlen($name) > 50) {
    $errors[] = "Student name must be 3 to 50 characters.";
}

if (!preg_match("/^[A-Za-z ]+$/", $name)) {
    $errors[] = "Student name can contain only letters and spaces.";
}

// Register number validation
if (!preg_match("/^[A-Za-z0-9-]{5,20}$/", $register_no)) {
    $errors[] = "Invalid register number.";
}

// Course validation
if (strlen($course) < 2 || strlen($course) > 100) {
    $errors[] = "Course name must be 2 to 100 characters.";
}

// Rating validation
if (!filter_var($rating, FILTER_VALIDATE_INT) ||
    $rating < 1 ||
    $rating > 5) {

    $errors[] = "Rating must be between 1 and 5.";
}

// Comments validation
if (strlen($comments) < 10) {
    $errors[] = "Comments must contain at least 10 characters.";
}

if (strlen($comments) > 500) {
    $errors[] = "Comments cannot exceed 500 characters.";
}


// Display errors
if (!empty($errors)) {

    echo "<h2>Validation Errors</h2>";

    foreach ($errors as $error) {
        echo "<p>" . htmlspecialchars($error) . "</p>";
    }

    echo "<a href='feedback.php'>Go Back</a>";

    exit();
}


// Secure database insertion
$stmt = mysqli_prepare(
    $conn,
    "INSERT INTO feedback
    (student_name, register_no, course, rating, comments)
    VALUES (?, ?, ?, ?, ?)"
);

mysqli_stmt_bind_param(
    $stmt,
    "sssis",
    $name,
    $register_no,
    $course,
    $rating,
    $comments
);


if (mysqli_stmt_execute($stmt)) {

    echo "
    <!DOCTYPE html>

    <html>

    <head>

        <title>Success</title>

        <link rel='stylesheet'
              href='css/style.css'>

    </head>

    <body>

        <div class='message'>

            <h2>Feedback Submitted Successfully!</h2>

            <p>Thank you for your valuable feedback.</p>

            <a class='button'
               href='feedback.php'>
               Submit Another Feedback
            </a>

            <a class='button'
               href='index.php'>
               Go Home
            </a>

        </div>

    </body>

    </html>
    ";

} else {

    echo "Error submitting feedback.";

}

mysqli_stmt_close($stmt);

?>