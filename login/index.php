<?php
//variables
$username = '';
$email = '';
$password = '';


//variable setting from POST_GET
if (isset($_POST['submit'])) {
    $ok = true;

    if (!isset($_POST['username']) || $_POST['username'] === '') {
        $ok = false;
    } else {
        $username = $_POST['username'];
    };

    if (!isset($_POST['email']) || $_POST['email'] === '') {
        $ok = false;
    } else {
        $email = $_POST['email'];
    };

    if (!isset($_POST['password']) || $_POST['password'] === '') {
        $ok = false;
    } else {
        $password = $_POST['password'];
    };


};


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="/css/main.css" type="text/css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<!--header-->
<?php include '../default/header.php'; ?>

<main class="main">
    <div class="container page">
        <h1>Login</h1>

        <form
                action=""
                method="post"
        <p>Username: <input type="text" name="username" value='<?=$username?>'></p>
        <p>E-Mail: <input type="text" name="email" value='<?=$email?>'></p>
        <p>Password: <input type="password" name="password" value='<?=$password?>'></p>
        <input type="submit" name="submit" value="Login">
        </form>
    </div>
</main>

<!--footer-->
<?php include '../default/footer.php'; ?>



</body>
</html>
