<?php
// ?id=1
if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('location: index.php');
}

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
$result = '';


//sql database

if(!isset($_GET['id'])) {
    echo 'SQL ERROR NO ID IN URL';
}

$dbConnection =  mysqli_connect(
    'localhost',
    'root',
    '',
    'musiccolletion');

$id = $_GET['id'];

$query = "
SELECT * 
FROM albums 
WHERE id=$id
";

$result = mysqli_query($dbConnection, $query)
or die('Error in query: '.$query);

$album =  mysqli_fetch_assoc($result);









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


$result2 = '';
$query2 = '';

if (isset($_POST['submit'])) {

    if (empty($errors)) {
        $query2 = "UPDATE albums
                  SET artist = '$artist', track = '$track', album_name = '$album_name', year = '$year', length = '$length', comments = '$comments'
                  WHERE id = '$id'";

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
    <p>Artist: <input type="text" name="artist" value='<?=htmlspecialchars($album['artist'], ENT_QUOTES)?>'</p>
    <p>Track: <input type="text" name="track" value='<?=htmlspecialchars($album['track'], ENT_QUOTES)?>'></p>
    <p>Album: <input type="text" name="album_name" value='<?=htmlspecialchars($album['album_name'], ENT_QUOTES)?>'></p>
    <p>Year Released: <input type="text" name="year" value='<?=htmlspecialchars($album['year'], ENT_QUOTES)?>'></p>
    <p>Spotify Plays: <input type="text" name="views" value='<?=htmlspecialchars($album['views'], ENT_QUOTES)?>'></p>
    <p>Length: <input type="text" name="length" value='<?=htmlspecialchars($album['length'], ENT_QUOTES)?>'></p>
    <p>Comments: <textarea name="comments"><?=htmlspecialchars($album['comments'], ENT_QUOTES)?></textarea></p>
    <p><input type="checkbox" name="tc" value="ok" value='<?=htmlspecialchars($album['date_created'], ENT_QUOTES)?>'> I accept the terms &amp; conditions </p>
    <input type="submit" name="submit" value="Change Track">
    </form>


    <div class="container">
        <?php printf('
            <p>id<p/>
            <h2>%s</h2>
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
            <p>Date Created</p>
            <h2>%s</h2>
            ',
            $id,
            htmlspecialchars($album['artist'], ENT_QUOTES),
            htmlspecialchars($album['track'], ENT_QUOTES),
            htmlspecialchars($album['album_name'], ENT_QUOTES),
            htmlspecialchars($album['year'], ENT_QUOTES),
            htmlspecialchars($album['views'], ENT_QUOTES),
            htmlspecialchars($album['length'], ENT_QUOTES),
            htmlspecialchars($album['date_created'], ENT_QUOTES)
        ); ?>
    </div>




</main>


</body>
</html>