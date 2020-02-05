<?php
// ?id=1
if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('location: index.php');
}

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

$ok = '';
$tc = '';
$reservation = '';

//sql database

if(!isset($_GET['id'])) {
    echo 'SQL ERROR NO ID IN URL';
}

$dbConnection =  mysqli_connect(
    'localhost',
    'root',
    '',
    'reservation_system');

$id = $_GET['id'];

$query = "
SELECT * 
FROM customer_data 
WHERE id=$id
";

$result = mysqli_query($dbConnection, $query)
or die('Error in query: '.$query);

$user =  mysqli_fetch_assoc($result);




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


$result2 = '';
$query2 = '';

if (isset($_POST['submit'])) {

    if (empty($errors)) {
        $query2 = "UPDATE customer_data
                  SET customer_id = $customer_id, username = '$username', email = '$email', password = '$password', role = '$role', auth_level = '$auth_level', name = '$name', last_name = '$last_name', phone_number = '$phone_number', birthdate = '$birthdate', woonplaats = '$woonplaats', date_created = '$date_created', date_updated = '$date_updated', last_online = '$last_online'
                  WHERE id = '$id'
                  ";

        $result2 = mysqli_query($dbConnection, $query2)
        or die('Error: ' . $query2);
    }

    if ($result2) {
        echo 'Updated Successfully!';
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
    <title>LuukFTF's Website</title>
</head>
<body>
<!--header-->
<?php include '../header.php'; ?>

<main class="main">
    <form
        action=""
        method="post"
    <p>Customer ID: <input type="text" name="customer_id" value='<?=htmlspecialchars($user['customer_id'], ENT_QUOTES)?>'</p>
    <p>User: <input type="text" name="username" value='<?=htmlspecialchars($user['username'], ENT_QUOTES)?>'></p>
    <p>E-Email: <input type="text" name="email" value='<?=htmlspecialchars($user['email'], ENT_QUOTES)?>'></p>
    <p>Password: <input type="password" name="password" value='<?=htmlspecialchars($user['password'], ENT_QUOTES)?>'></p>
    <p>Role: <input type="text" name="role" value='<?=htmlspecialchars($user['role'], ENT_QUOTES)?>'></p>
    <p>Auth Level: <input type="text" name="auth_level" value='<?=htmlspecialchars($user['auth_level'], ENT_QUOTES)?>'></p>
    <p>Phone Number: <input type="text" name="phone_number" value='<?=htmlspecialchars($user['phone_number'], ENT_QUOTES)?>'></p>
    <p>Name: <input type="text" name="name" value='<?=htmlspecialchars($user['name'], ENT_QUOTES)?>'></p>
    <p>Last Name: <input type="text" name="last_name" value='<?=htmlspecialchars($user['last_name'], ENT_QUOTES)?>'></p>
    <p>Birthdate: <input type="date" name="birthdate" value='<?=htmlspecialchars($user['birthdate'], ENT_QUOTES)?>'></p>
    <p>Woonplaats: <input type="text" name="woonplaats" value='<?=htmlspecialchars($user['woonplaats'], ENT_QUOTES)?>'></p>
    <p>Date Created: <input type="text" name="date_created" value='<?=htmlspecialchars($user['date_created'], ENT_QUOTES)?>'></p>
    <p>Date Updated: <input type="text" name="date_updated" value='<?=htmlspecialchars($user['date_updated'], ENT_QUOTES)?>'></p>
    <p>Last Online: <input type="text" name="last_online" value='<?=htmlspecialchars($user['last_online'], ENT_QUOTES)?>'></p>
    <p><input type="checkbox" name="tc" value="ok" value='<?=htmlspecialchars($tc, ENT_QUOTES)?>'> I accept the terms &amp; conditions </p>
    <input type="submit" name="submit" value="Apply Changes">
    </form>

    <div class="container">
        <?php printf('
            <p>id<p/>
            <h2>%s</h2>
            <p>Customer ID</p>
            <h2>%s</h2>
            <p>Username</p>
            <h2>%s</h2>
            <p>E-Mail</p>
            <h2>%s</h2>
            <p>Password</p>
            <h2>%s</h2>
            <p>Role</p>
            <h2>%s</h2>
            <p>Auth Level</p>
            <h2>%s</h2>
            <p>Name</p>
            <h2>%s</h2>
            <p>Lastname</p>
            <h2>%s</h2>
            <p>Phonenumber</p>
            <h2>%s</h2>
            <p>Birthdate</p>
            <h2>%s</h2>
            <p>Date Created</p>
            <h2>%s</h2>
            <p>Date Update</p>
            <h2>%s</h2>
            <p>Last Online</p>
            <h2>%s</h2>
            ',
            $id,
            htmlspecialchars($user['customer_id'], ENT_QUOTES),
            htmlspecialchars($user['username'],ENT_QUOTES),
            htmlspecialchars($user['email'], ENT_QUOTES),
            htmlspecialchars($user['password'], ENT_QUOTES),
            htmlspecialchars($user['role'], ENT_QUOTES),
            htmlspecialchars($user['auth_level'], ENT_QUOTES),
            htmlspecialchars($user['name'], ENT_QUOTES),
            htmlspecialchars($user['last_name'], ENT_QUOTES),
            htmlspecialchars($user['phone_number'], ENT_QUOTES),
            htmlspecialchars($user['birthdate'], ENT_QUOTES),
            htmlspecialchars($user['date_created'], ENT_QUOTES),
            htmlspecialchars($user['date_updated'], ENT_QUOTES),
            htmlspecialchars($user['last_online'], ENT_QUOTES)
        ); ?>
    </div>



</main>

</body>
</html>