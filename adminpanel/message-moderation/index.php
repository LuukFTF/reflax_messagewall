<?php
//sql database
$db =  mysqli_connect(
    'localhost',
    'root',
    '',
    'reflax_messagewall');

$query = "
SELECT * 
FROM messages 
";

$result = mysqli_query($db, $query)
or die('Error '.mysqli_error($db).' with query '.$query);

$messages = [];

while($row = mysqli_fetch_assoc($result))
{
    // elke rij (dit is een album) wordt aan de array 'albums' toegevoegd.
    $messages[] = $row;
}

mysqli_close($db);

$x = '';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="/css/main.css" type="text/css" rel="stylesheet">
    <link href="/css/table.css" type="text/css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Moderation</title>
</head>
<!--header-->
<?php include '../../default/header_admin.php'; ?>

<main class="main">
    <div class="container page">
        <h1>Message Moderation</h1>

        <table>
            <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Message</th>
                <th>Email</th>
                <th>Ip Adress</th>
                <th>Blocked</th>
                <th>Validated</th>
                <th>Date Created</th>
                <th>Date Updated</th>

            </tr>
            </thead>
            <body>
            <?php foreach ($messages as $message) : $x++ ?>
                <?php $_POST['id'] = $message['id']; ?>
                <tr>
                    <td><?= $message['id'] ?></td>
                    <td><?= $message['name'] ?></td>
                    <td><?= $message['message'] ?></td>
                    <td><?= $message['email'] ?></td>
                    <td><?= $message['ip_adress'] ?></td>
                    <td><?= $message['is_blocked'] ?></td>
                    <td><?= $message['is_validated'] ?></td>
                    <td><?= $message['date_created'] ?></td>
                    <td><?= $message['date_updated'] ?></td>
                    <td><a href="<?php echo 'edit.php?id='.$message['id'] ?>">Edit</a> </td>
                    <td><a href="<?php echo 'block.php?id='.$message['id'] ?>">Block</a> </td>
                </tr>
            <?php endforeach; ?>
            </body>
        </table>
    </div>
</main>

<!--footer-->
<?php include '../../default/footer.php'; ?>

</body>
</html>


$id = '';
$message = '';
$name = '';
$email = '';
$ip_adress = '';
$is_blocked = '';
$is_validated = '';
$date_created = '';
$date_updated = '';