<?php
// ?id=1
if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('location: index.php');
}

//variables
$id_customer = '';
$email = '';
$massage_type = '';
$date = '';
$begin_time = '';
$ending_time = '';
$status = '';
$message_customer = '';
$message_moderator = '';
$date_created = '';
$date_updated = '';

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
FROM reservations 
WHERE id=$id
";

$result = mysqli_query($dbConnection, $query)
or die('Error in query: '.$query);

$reservation =  mysqli_fetch_assoc($result);





//variable setting from POST_GET
if (isset($_POST['submit'])) {
    $ok = true;

    if (!isset($_POST['id_customer']) || $_POST['id_customer'] === '') {
        $ok = false;
    } else {
        $id_customer = $_POST['id_customer'];
    };
    if (!isset($_POST['email']) || $_POST['email'] === '') {
        $ok = false;
    } else {
        $email = $_POST['email'];
    };
    if (!isset($_POST['massage_type']) || $_POST['massage_type'] === '') {
        $ok = false;
    } else {
        $massage_type = $_POST['massage_type'];
    };
    if (!isset($_POST['date']) || $_POST['date'] === '') {
        $ok = false;
    } else {
        $date = $_POST['date'];
    };
    if (!isset($_POST['begin_time']) || $_POST['begin_time'] === '') {
        $ok = false;
    } else {
        $begin_time = $_POST['begin_time'];
    };
    if (!isset($_POST['ending_time']) || $_POST['ending_time'] === '') {
        $ok = false;
    } else {
        $ending_time = $_POST['ending_time'];
    };
    if (!isset($_POST['status']) || $_POST['status'] === '') {
        $ok = false;
    } else {
        $status = $_POST['status'];
    };
    if (!isset($_POST['message_customer']) || $_POST['message_customer'] === '') {
        $ok = false;
    } else {
        $message_customer = $_POST['message_customer'];
    };
    if (!isset($_POST['message_moderator']) || $_POST['message_moderator'] === '') {
        $ok = false;
    } else {
        $message_moderator = $_POST['message_moderator'];
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
        $query2 = "UPDATE reservations
                  SET id_customer = $id_customer, email = '$email', massage_type = $massage_type, date = '$date', begin_time = '$begin_time', ending_time = '$ending_time', status = $status, message_customer = '$message_customer', message_moderator = '$message_moderator', date_created = '$date_created', date_updated = '$date_updated'
                  WHERE id = '$id'
                  ";

        $result2 = mysqli_query($dbConnection, $query2)o
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
<header class="header">
    <nav>
        <ul class="menu">
            <h1 class="logo">LuukFTF</h1>
            <li class="menu-item"><a href="/home.html">Home</a></li>
            <li class="menu-item"><a class="linkto" href="#">About</a></li>
            <li class="menu-item"><a href="/social.html">Social Links</a></li>
            <li class="menu-item"><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">News</a></li>
            <li class="menu-item"><a id="contact" href="#">Contact</a></li>
            <li class="menu-item"><a href="/sandbox.php">Sandbox</a></li>
            <li class="menu-item"><a href="/blog">Blog</a></li>
            <li class="menu-item"><a href="/test.html">Test</a></li>
            <li class="menu-item"><a href="/test.html">Test</a></li>
            <li class="menu-item"><a href="/test.html">Test</a></li>
        </ul>
    </nav>
</header>

<main class="main">
    <form
            action=""
            method="post"
    <p>Customer ID: <input type="text" name="id_customer" value='<?=htmlspecialchars($reservation['id_customer'], ENT_QUOTES)?>'</p>
    <p>E-Mail: <input type="text" name="email" value='<?=htmlspecialchars($reservation['email'], ENT_QUOTES)?>'></p>
    <p>Massage type: <input type="text" name="massage_type" value='<?=htmlspecialchars($reservation['massage_type'], ENT_QUOTES)?>'></p>
    <p>Date: <input type="text" name="date" value='<?=htmlspecialchars($reservation['date'], ENT_QUOTES)?>'></p>
    <p>Begin Time: <input type="time" name="begin_time" value='<?=htmlspecialchars($reservation['begin_time'], ENT_QUOTES)?>'></p>
    <p>Ending Time: <input type="time" name="ending_time" value='<?=htmlspecialchars($reservation['ending_time'], ENT_QUOTES)?>'></p>
    <p>Status: <input type="text" name="status" value='<?=htmlspecialchars($reservation['status'], ENT_QUOTES)?>'></p>
    <p>Customer Message: <textarea name="message_customer"><?=htmlspecialchars($reservation['message_customer'], ENT_QUOTES)?></textarea></p>
    <p>Moderator Message: <textarea name="message_moderator"><?=htmlspecialchars($reservation['message_moderator'], ENT_QUOTES)?></textarea></p>
    <p>Date Updated: <input type="text" name="date_created" value='<?=htmlspecialchars($reservation['date_created'], ENT_QUOTES)?>'></p>
    <p>Date Updated: <input type="text" name="date_updated" value='<?=htmlspecialchars($reservation['date_updated'], ENT_QUOTES)?>'></p>
    <p><input type="checkbox" name="tc" value="ok" value='<?=htmlspecialchars($tc, ENT_QUOTES)?>'> I accept the terms &amp; conditions </p>
    <input type="submit" name="submit" value="Add Track">
    </form>

    <div class="container">
        <?php printf('
            <p>id<p/>
            <h2>%s</h2>
            <p>Customer ID</p>
            <h2>%s</h2>
            <p>E-Mail</p>
            <h2>%s</h2>
            <p>Massage Type</p>
            <h2>%s</h2>
            <p>Date</p>
            <h2>%s</h2>
            <p>Begin Time</p>
            <h2>%s</h2>
            <p>Ending Time</p>
            <h2>%s</h2>
            <p>Status</p>
            <h2>%s</h2>
            <p>Customer Message</p>
            <h2>%s</h2>
            <p>Moderator Message</p>
            <h2>%s</h2>
            <p>Date Created</p>
            <h2>%s</h2>
            <p>Date Update</p>
            <h2>%s</h2>
            ',
            $id,
            htmlspecialchars($reservation['id_customer'], ENT_QUOTES),
            htmlspecialchars($reservation['email'], ENT_QUOTES),
            htmlspecialchars($reservation['massage_type'],ENT_QUOTES),
            htmlspecialchars($reservation['date'], ENT_QUOTES),
            htmlspecialchars($reservation['begin_time'], ENT_QUOTES),
            htmlspecialchars($reservation['ending_time'], ENT_QUOTES),
            htmlspecialchars($reservation['status'], ENT_QUOTES),
            htmlspecialchars($reservation['message_customer'], ENT_QUOTES),
            htmlspecialchars($reservation['message_moderator'], ENT_QUOTES),
            htmlspecialchars($reservation['date_created'], ENT_QUOTES),
            htmlspecialchars($reservation['date_updated'], ENT_QUOTES)

        ); ?>
    </div>



</main>

</body>
</html>