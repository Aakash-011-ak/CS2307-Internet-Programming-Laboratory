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
    <title>Give Feedback</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>

<body>

<header>
    <h1>Student Feedback</h1>
</header>

<nav>
    <a href="index.php">Home</a>
    <a href="feedback.php">Give Feedback</a>
    <a href="view_feedback.php">View Feedback</a>
</nav>

<div class="form-container">

    <h2>Feedback Form</h2>

    <form action="submit_feedback.php"
          method="POST"
          onsubmit="return validateForm()">

   <label>Student Name</label>

<input type="text"
       name="student_name"
       id="student_name"
       minlength="3"
       maxlength="50"
       pattern="[A-Za-z ]+"
       placeholder="Enter your name"
       required>


<label>Register Number</label>

<input type="text"
       name="register_no"
       id="register_no"
       minlength="5"
       maxlength="20"
       pattern="[A-Za-z0-9-]+"
       placeholder="Example: 24CSE001"
       required>


<label>Course Name</label>

<input type="text"
       name="course"
       id="course"
       minlength="2"
       maxlength="100"
       placeholder="Enter course name"
       required>


<label>Rating</label>

<select name="rating" id="rating" required>

    <option value="">Select Rating</option>
    <option value="5">5 - Excellent</option>
    <option value="4">4 - Very Good</option>
    <option value="3">3 - Good</option>
    <option value="2">2 - Average</option>
    <option value="1">1 - Poor</option>

</select>


<label>Comments</label>

<textarea name="comments"
          id="comments"
          minlength="10"
          maxlength="500"
          placeholder="Enter your feedback (10-500 characters)"
          required></textarea>

<button type="submit">
    Submit Feedback
</button>

    </form>

</div>

</body>
</html>