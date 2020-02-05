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
FROM reservations 
WHERE id=$id
";

$result = mysqli_query($dbConnection, $query)
or die('Error in query: '.$query);

$reservation =  mysqli_fetch_assoc($result);


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