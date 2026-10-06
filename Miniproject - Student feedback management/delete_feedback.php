<?php

include "db.php";

$id = $_GET['id'];

$sql = "DELETE FROM feedback WHERE id = $id";

if (mysqli_query($conn, $sql)) {

    header("Location: view_feedback.php");

} else {

    echo "Error deleting feedback";

}

?>