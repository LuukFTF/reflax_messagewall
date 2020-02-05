<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

//Get email from session
$email = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="/css/main.css" type="text/css" rel="stylesheet">
    <link href="music_collection.css" type="text/css" rel="stylesheet">
    <title>Account Register Page</title>
</head>
<body>
<!--header-->
<?php include '../header.php'; ?>


<main class="main">
    <p>U bent ingelogd als <b><?= $email; ?></b></p>
    <a href="logout.php">Uitloggen</a>
</main>

</body>
</html>
