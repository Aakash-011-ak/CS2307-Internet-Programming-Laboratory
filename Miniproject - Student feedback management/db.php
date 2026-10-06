<?php

$conn = mysqli_connect("localhost", "root", "", "student_feedback");

if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

?>