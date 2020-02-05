<?php
session_start();

require_once 'dbconnection.php';

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM customer_data
        WHERE email = '$email'";

    $result = mysqli_query($db, $query)
    or die('Error '.mysqli_error($db).' with query '.$query);

    $users = $result;

//    mysqli_fetch_assoc($result)
//    {
//        $user[] = $result;
//    }



    if(password_verify($password, $user['password'])){

    } else {
        $error = "Niet de goede gebruikersnaam en of wachtwoord";
    }



//    if (empty($email || $password)) {
//        $error = "Vul alle gegevens in";
//    } elseif ($email != "test" || $password != "test") {
//        $error = "Niet de goede gebruikersnaam en of wachtwoord";
//    }

    if (!isset($error)) {
        $_SESSION['login'] = $email;
    }
}

if (isset($_SESSION['login'])) {
    header("Location: loggedin.php");
    exit;
}



$username = '';
$email = '';
$password = '';

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

    <h1>Login Page</h1>

    <form
        action=""
        method="post"
    <p>Username: <input type="text" name="username" value='<?=$username?>'></p>
    <p>E-Mail: <input type="text" name="email" value='<?=$email?>'></p>
    <p>Password: <input type="password" name="password" value='<?=$password?>'></p>
    <input type="submit" name="submit" value="Register">
    </form>


</main>


</body>
</html>