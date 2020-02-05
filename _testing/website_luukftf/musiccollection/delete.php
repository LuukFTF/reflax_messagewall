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