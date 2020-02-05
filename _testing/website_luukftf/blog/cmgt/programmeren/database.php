<?php

//sql database

if(!isset($_GET['id'])) echo 'Er is geen id opgegeven in de url.';

$dbConnection =  mysqli_connect(
    'localhost',
    'root',
    '',
    'musiccolletion');

$id = $_GET['id'];

$query = "
SELECT artist, track FROM albums WHERE id=$id
";

$result = mysqli_query($dbConnection, $query)
or die('Error in query: '.$query);

$album =  mysqli_fetch_assoc($result);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detailpagina</title>
</head>
<body>
<h2>Details - <?= $album['track']?></h2>
<ul>
    <li>Titel - <?= $album['track'] ?></li>
    <li>Artiest - <?= $album['artist'] ?></li>
</ul>
</body>
</html>

