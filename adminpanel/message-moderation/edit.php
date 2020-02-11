<?php
// ?id=1
if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
$id = $_GET['id'];
} else {
header('location: index.php');
}

//variables
$id = '';
$message = '';
$name = '';
$email = '';
$ip_adress = '';
$is_blocked = '';
$is_validated = '';
$date_created = '';
$date_updated = '';

$ok = '';
$tc = '';
$message = '';

$reservation = '';

//sql database

if(!isset($_GET['id'])) {
    echo 'SQL ERROR NO ID IN URL';
}

$dbConnection =  mysqli_connect(
    'localhost',
    'root',
    '',
    'reflax_messagewall');

$id = $_GET['id'];

$query = "
SELECT * 
FROM messages 
WHERE id=$id
";

$result = mysqli_query($dbConnection, $query)
or die('Error in query: '.$query);

$message =  mysqli_fetch_assoc($result);



//variable setting from POST_GET
if (isset($_POST['submit'])) {
    $ok = true;

    if (!isset($_POST['id']) || $_POST['id'] === '') {
        $ok = false;
    } else {
        $id = $_POST['id'];
    };

    if (!isset($_POST['message']) || $_POST['message'] === '') {
        $ok = false;
    } else {
        $message = $_POST['message'];
    };

    if (!isset($_POST['name']) || $_POST['name'] === '') {
        $ok = false;
    } else {
        $name = $_POST['name'];
    };

    if (!isset($_POST['email']) || $_POST['email'] === '') {
        $ok = false;
    } else {
        $email = $_POST['email'];
    };

    if (!isset($_POST['ip_adress']) || $_POST['ip_adress'] === '') {
        $ok = false;
    } else {
        $ip_adress = $_POST['ip_adressi'];
    };

    if (!isset($_POST['is_blocked']) || $_POST['is_blocked'] === '') {
        $ok = false;
    } else {
        $is_blocked = $_POST['is_blocked'];
    };

    if (!isset($_POST['id_customer']) || $_POST['id_customer'] === '') {
        $ok = false;
    } else {
        $is_validated = $_POST['id_customer'];
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

}



$result2 = '';
$query2 = '';

if (isset($_POST['submit'])) {

    if (empty($errors)) {
        $query2 = "UPDATE messages
                  SET id_customer = $id_customer, email = '$email', massage_type = $massage_type, date = '$date', begin_time = '$begin_time', ending_time = '$ending_time', status = $status, message_customer = '$message_customer', message_moderator = '$message_moderator', date_created = '$date_created', date_updated = '$date_updated'
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
<?php include '../../default/header_admin.php'; ?>

<main class="main">
    <form
        action=""
        method="post"
    <p>id: <input type="text" name="id_customer" value='<?=htmlspecialchars($message['id'], ENT_QUOTES)?>'</p>
    <p>Message: <textarea name="message_customer"><?=htmlspecialchars($message['message'], ENT_QUOTES)?></textarea></p>
    <p>Email: <input type="text" name="massage_type" value='<?=htmlspecialchars($message['email'], ENT_QUOTES)?>'></p>
    <p>Ip Adress: <input type="text" name="date" value='<?=htmlspecialchars($message['ip_adress'], ENT_QUOTES)?>'></p>
    <p>Blocked: <input type="text" name="status" value='<?=htmlspecialchars($message['is_blocked'], ENT_QUOTES)?>'></p>
    <p>Validated: <input type="text" name="status" value='<?=htmlspecialchars($message['is_validated'], ENT_QUOTES)?>'></p>
    <p>Date Created: <input type="text" name="status" value='<?=htmlspecialchars($message['date_created'], ENT_QUOTES)?>'></p>
    <p>Date Updated: <input type="text" name="status" value='<?=htmlspecialchars($message['date_updated'], ENT_QUOTES)?>'></p>
    <input type="submit" name="submit" value="Update">
    </form>

    <div class="container">
        <?php printf('
            <p>id<p/>
            <h2>%s</h2>
            <p>id<p/>
            <h2>%s</h2>
            <p>message</p>
            <h2>%s</h2>
            <p>Email</p>
            <h2>%s</h2>
            <p>Ip Adress</p>
            <h2>%s</h2>
            <p>Blocked</p>
            <h2>%s</h2>
            <p>Validated</p>
            <h2>%s</h2>
            <p>Date Created</p>
            <h2>%s</h2>
            <p>Date Updated</p>
            <h2>%s</h2>
            ',
            $id,
            htmlspecialchars($message['id'], ENT_QUOTES),
            htmlspecialchars($message['message'], ENT_QUOTES),
            htmlspecialchars($message['email'], ENT_QUOTES),
            htmlspecialchars($message['ip_adress'], ENT_QUOTES),
            htmlspecialchars($message['is_blocked'], ENT_QUOTES),
            htmlspecialchars($message['is_validated'], ENT_QUOTES),
            htmlspecialchars($message['date_created'], ENT_QUOTES),
            htmlspecialchars($message['date_updated'], ENT_QUOTES)

        ); ?>
    </div>



</main>

<!--footer-->
<?php include '../../default/footer.php'; ?>

</body>
</html>
