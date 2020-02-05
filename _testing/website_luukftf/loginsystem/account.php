<?php
// ?id=1
if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('location: index.php');
}


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


?>

<!DOCTYPE html>
<html lang="en"
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