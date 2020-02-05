<?php

$host       = "localhost";
$database   = "reservation_system";
$user       = "root";
$password   = "";

$db = mysqli_connect($host, $user, $password, $database)
or die("Error: " . mysqli_connect_error());;



//variables
$id = '';
$customer_id = '';
$username = '';
$email = '';
$password = '';
$role = '';
$auth_level = '';
$name = '';
$last_name = '';
$phone_number = '';
$birthdate = '';
$woonplaats = '';
$date_created = '';
$date_updated = '';
$last_online = '';

$tc = '';

//variable setting from POST_GET
if (isset($_POST['submit'])) {
    $ok = true;

    if (!isset($_POST['customer_id']) || $_POST['customer_id'] === '') {
        $ok = false;
    } else {
        $customer_id = $_POST['customer_id'];
    };
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
    if (!isset($_POST['role']) || $_POST['role'] === '') {
        $ok = false;
    } else {
        $role = $_POST['role'];
    };
    if (!isset($_POST['auth_level']) || $_POST['auth_level'] === '') {
        $ok = false;
    } else {
        $auth_level = $_POST['auth_level'];
    };
    if (!isset($_POST['name']) || $_POST['name'] === '') {
        $ok = false;
    } else {
        $name = $_POST['name'];
    };
    if (!isset($_POST['last_name']) || $_POST['last_name'] === '') {
        $ok = false;
    } else {
        $last_name = $_POST['last_name'];
    };
    if (!isset($_POST['phone_number']) || $_POST['phone_number'] === '') {
        $ok = false;
    } else {
        $phone_number = $_POST['phone_number'];
    };
    if (!isset($_POST['birthdate']) || $_POST['birthdate'] === '') {
        $ok = false;
    } else {
        $birthdate = $_POST['birthdate'];
    };
    if (!isset($_POST['date_created']) || $_POST['date_created'] === '') {
        $ok = false;
    } else {
        $date_created = $_POST['date_created'];
    };
    if (!isset($_POST['date_updated']) || $_POST['date_updated'] === '') {
        $ok = false;
    } else {
        $date_updated = $_POST['date_updated'];
    };
    if (!isset($_POST['last_name']) || $_POST['last_name'] === '') {
        $ok = false;
    } else {
        $last_name = $_POST['last_name'];
    };
    if (!isset($_POST['woonplaats']) || $_POST['woonplaats'] === '') {
        $ok = false;
    } else {
        $woonplaats = $_POST['woonplaats'];
    };
    if (!isset($_POST['last_online']) || $_POST['last_online'] === '') {
        $ok = false;
    } else {
        $last_online = $_POST['last_online'];
    };
    if (!isset($_POST['tc']) || $_POST['tc'] === '') {
        $ok = false;
    } else {
        $tc = $_POST['tc'];
    };
}


if (isset($_POST['submit'])) {

    if (empty($errors)) {
        $query = "
            INSERT INTO customer_data (username, email, password, phone_number, name, last_name, birthdate, woonplaats)
            VALUES ('$username', '$email', '$password', $phone_number, '$name', '$last_name', '$birthdate', '$woonplaats')";

        $result = mysqli_query($db, $query)
        or die('Error: ' . $query);
    }

    if ($result) {
        echo 'Added Successfully!';
        exit;
    } else {
        $errors[] = 'Oepsie Woopsie Database Qwerie: ' . mysqli_error($db);
    }

    mysqli_close($db);
}
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

    <h1>Account Register Page</h1>

    <form
            action=""
            method="post"
    <p>Username: <input type="text" name="username" value='<?=$username?>'></p>
    <p>Password: <input type="password" name="password" value='<?=$password?>'></p>
    <p>E-Mail: <input type="text" name="email" value='<?=$email?>'></p>
    <p>Name: <input type="text" name="name" value='<?=$name?>'></p>
    <p>Last Name: <input type="text" name="last_name" value='<?=$last_name?>'></p>
    <p>Phone Number: <input type="text" name="phone_number" value='<?=$phone_number?>'></p>
    <p>Birthdate: <input type="date" name="birthdate" value='<?=$birthdate?>'></p>
    <p>Woonplaats: <input type="text" name="woonplaats" value='<?=$woonplaats?>'></p>
    <p><input type="checkbox" name="tc" value="ok" value='<?=$tc?>'> I accept the terms &amp; conditions </p>
    <input type="submit" name="submit" value="Register">
    </form>


</main>


</body>
</html>