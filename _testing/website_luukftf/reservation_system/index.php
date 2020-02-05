<?php
//sql database
$db =  mysqli_connect(
    'localhost',
    'root',
    '',
    'reservation_system');

$query = "
SELECT * 
FROM reservations 
";

$result = mysqli_query($db, $query)
or die('Error '.mysqli_error($db).' with query '.$query);

$reservations = [];

while($row = mysqli_fetch_assoc($result))
{
    // elke rij (dit is een album) wordt aan de array 'albums' toegevoegd.
    $reservations[] = $row;
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
<?php include '../header.php'; ?>

<h1></h1>

<main class="main">
    <h2><a href="create.php">Create</a></h2>

    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Customer ID</th>
            <th>E-Mail</th>
            <th>Massage Type</th>
            <th>Date</th>
            <th>Begin Time</th>
            <th>Ending Time</th>
            <th>Status</th>
            <th>Customer Message</th>
            <th>Moderator Message</th>
            <th>Date Created</th>
            <th>Date Update</th>
        </tr>
        </thead>
        <body>
        <?php foreach ($reservations as $reservation) : $x++ ?>
            <?php $_POST['id'] = $reservation['id']; ?>
            <tr>
                <td><?= $reservation['id'] ?></td>
                <td><?= $reservation['id_customer'] ?></td>
                <td><?= $reservation['email'] ?></td>
                <td><?= $reservation['massage_type'] ?></td>
                <td><?= $reservation['date'] ?></td>
                <td><?= $reservation['begin_time'] ?></td>
                <td><?= $reservation['ending_time'] ?></td>
                <td><?= $reservation['status'] ?></td>
                <td><?= $reservation['message_customer'] ?></td>
                <td><?= $reservation['message_moderator'] ?></td>
                <td><?= $reservation['date_created'] ?></td>
                <td><?= $reservation['date_updated'] ?></td>
                <td><a href="<?php echo 'detail.php?id='.$reservation['id'] ?>">Details</a> </td>
                <td><a href="<?php echo 'edit.php?id='.$reservation['id'] ?>">Edit</a> </td>
            </tr>

        <?php endforeach; ?>
        </body>
        <tfoot>
        <tr>
            <td colspan="7"></td>
        </tr>
        </tfoot>
    </table>

</main>

</body>
</html>
