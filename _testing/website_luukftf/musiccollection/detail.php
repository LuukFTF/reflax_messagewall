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