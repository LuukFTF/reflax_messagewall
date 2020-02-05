<?php
//sql database
$db =  mysqli_connect(
    'localhost',
    'root',
    '',
    'musiccolletion');

$query = "
SELECT * 
FROM albums 
";

$result = mysqli_query($db, $query)
or die('Error '.mysqli_error($db).' with query '.$query);

$albums = [];

while($row = mysqli_fetch_assoc($result))
{
    // elke rij (dit is een album) wordt aan de array 'albums' toegevoegd.
    $albums[] = $row;
}

mysqli_close($db);

$x = '';
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

<h1></h1>

<main class="main">
    <h2><a href="create.php">Create</a></h2>

    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Artist</th>
            <th>Track</th>
            <th>Album</th>
            <th>Year</th>
            <th>Spotify Plays</th>
            <th>Length</th>
            <th>Detail</th>
        </tr>
        </thead>
        <body>
        <?php foreach ($albums as $album) : $x++ ?>
            <?php $_POST['id'] = $album['id']; ?>
            <tr>
                <td><?= $album['id'] ?></td>
                <td><?= $album['artist'] ?></td>
                <td><?= $album['track'] ?></td>
                <td><?= $album['album_name'] ?></td>
                <td><?= $album['year'] ?></td>
                <td><?= $album['views'] ?></td>
                <td><?= $album['length'] ?></td>
                <td><a href="<?php echo 'detail.php?id='.$album['id'] ?>">Details</a> </td>
                <td><a href="<?php echo 'edit.php?id='.$album['id'] ?>">Edit</a> </td>
            </tr>

        <?php endforeach; ?>
        </body>
        <tfoot>
        <tr>
            <td colspan="7">&copy; My Music Collection</td>
        </tr>
        </tfoot>
    </table>

</main>

</body>
</html>
