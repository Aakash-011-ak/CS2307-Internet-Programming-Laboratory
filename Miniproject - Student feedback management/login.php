<?php

session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    // Static login details
    if ($username == "admin" && $password == "1234") {

        $_SESSION["username"] = $username;

        header("Location: index.php");
        exit();

    } else {

        $error = "Invalid username or password";

    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Login - Student Feedback System</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<header>

    <h1>Student Feedback Management System</h1>

</header>

<div class="login-container">

    <h2>Login</h2>

    <?php if ($error != "") { ?>

        <p class="error">
            <?php echo $error; ?>
        </p>

    <?php } ?>

    <form method="POST">

        <label>Username</label>

        <input type="text"
               name="username"
               placeholder="Enter username"
               required>

        <label>Password</label>

        <input type="password"
               name="password"
               placeholder="Enter password"
               required>

        <button type="submit">
            Login
        </button>

    </form>

    <p class="login-info">
        Username: admin<br>
        Password: 1234
    </p>

</div>

</body>

</html>