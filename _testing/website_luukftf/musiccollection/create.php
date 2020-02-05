<?php

$host       = "localhost";
$database   = "musiccolletion";
$user       = "root";
$password   = "";

$db = mysqli_connect($host, $user, $password, $database)
or die("Error: " . mysqli_connect_error());;



//variables
$artist = '';
$track = '';
$album_name = '';
$year = '';
$views = '';
$length = '';
$comments = '';
$tc = '';

$ok = '';

//variable setting from POST_GET
if (isset($_POST['submit'])) {
    $ok = true;

    if (!isset($_POST['artist']) || $_POST['artist'] === '') {
        $ok = false;
    } else {
        $artist = $_POST['artist'];
    };
    if (!isset($_POST['track']) || $_POST['track'] === '') {
        $ok = false;
    } else {
        $track = $_POST['track'];
    };
    if (!isset($_POST['album_name']) || $_POST['album_name'] === '') {
        $ok = false;
    } else {
        $album_name = $_POST['album_name'];
    };
    if (!isset($_POST['year']) || $_POST['year'] === '') {
        $ok = false;
    } else {
        $year = $_POST['year'];
    };
    if (!isset($_POST['views']) || $_POST['views'] === '') {
        $ok = false;
    } else {
        $views = $_POST['views'];
    };
    if (!isset($_POST['length']) || $_POST['length'] === '') {
        $ok = false;
    } else {
        $length = $_POST['length'];
    };
    if (!isset($_POST['comments']) || $_POST['comments'] === '') {
        $ok = false;
    } else {
        $comments = $_POST['comments'];
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
            INSERT INTO albums (artist, track, album_name, year, views, length, comments)
            VALUES ('$artist', '$track', '$album_name', $year, $views, $length, '$comments')";

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
    <title>LuukFTF's Website</title>
</head>
<body>
<!--header-->
<?php include '../header.php'; ?>


<main class="main">
    <form
        action=""
        method="post"
        <p>Artist: <input type="text" name="artist" value='<?=htmlspecialchars($artist, ENT_QUOTES)?>'</p>
        <p>Track: <input type="text" name="track" value='<?=htmlspecialchars($track, ENT_QUOTES)?>'></p>
        <p>Album: <input type="text" name="album_name" value='<?=htmlspecialchars($album_name, ENT_QUOTES)?>'></p>
        <p>Year Released: <input type="text" name="year" value='<?=htmlspecialchars($year, ENT_QUOTES)?>'></p>
        <p>Spotify Plays: <input type="text" name="views" value='<?=htmlspecialchars($views, ENT_QUOTES)?>'></p>
        <p>Length: <input type="text" name="length" value='<?=htmlspecialchars($length, ENT_QUOTES)?>'></p>
        <p>Comments: <textarea name="comments"><?=htmlspecialchars($comments, ENT_QUOTES)?></textarea></p>
        <p><input type="checkbox" name="tc" value="ok" value='<?=htmlspecialchars($tc, ENT_QUOTES)?>'> I accept the terms &amp; conditions </p>
        <input type="submit" name="submit" value="Add Track">
    </form>

    <div class="container">
        <?php
        if ($ok === true) {
            printf('
            <p>Artist</p>
            <h2>%s</h2>
            <p>Track</p>
            <h2>%s</h2>
            <p>Album</p>
            <h2>%s</h2>
            <p>Year</p>
            <h2>%s</h2>
            <p>Spotify Plays</p>
            <h2>%s Plays</h2>
            <p>Length</p>
            <h2>%s Minutes</h2>
            <p>Comments</p>
            <h2>%s</h2>
            <p>Terms and Conditions</p>
            <h2>%s</h2>
            ',
            htmlspecialchars($artist, ENT_QUOTES),
            htmlspecialchars($track, ENT_QUOTES),
            htmlspecialchars($album_name, ENT_QUOTES),
            htmlspecialchars($year, ENT_QUOTES),
            htmlspecialchars($views, ENT_QUOTES), htmlspecialchars($length, ENT_QUOTES),
            htmlspecialchars($comments, ENT_QUOTES),
            htmlspecialchars($tc, ENT_QUOTES)
        );}
        ?>
    </div>

</main>


</body>
</html>