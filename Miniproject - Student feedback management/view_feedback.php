<?php

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

include "db.php";

$sql = "SELECT * FROM feedback ORDER BY id DESC";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>

    <title>View Feedback</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<header>

    <h1>Submitted Feedback</h1>

</header>

<nav>

    <a href="index.php">Home</a>

    <a href="feedback.php">Give Feedback</a>

    <a href="view_feedback.php">View Feedback</a>

</nav>

<div class="table-container">

<h2>Feedback Records</h2>

<table>

<tr>

    <th>ID</th>
    <th>Student Name</th>
    <th>Register No</th>
    <th>Course</th>
    <th>Rating</th>
    <th>Comments</th>
    <th>Date</th>
    <th>Action</th>

</tr>

<?php

while ($row = mysqli_fetch_assoc($result)) {

?>

<tr>

    <td><?php echo $row['id']; ?></td>

    <td><?php echo $row['student_name']; ?></td>

    <td><?php echo $row['register_no']; ?></td>

    <td><?php echo $row['course']; ?></td>

    <td><?php echo $row['rating']; ?>/5</td>

    <td><?php echo $row['comments']; ?></td>

    <td><?php echo $row['submitted_at']; ?></td>

    <td>

        <a href="delete_feedback.php?id=<?php echo $row['id']; ?>"
           onclick="return confirm('Delete this feedback?')">

           Delete

        </a>

    </td>

</tr>

<?php

}

?>

</table>

</div>

</body>

</html>