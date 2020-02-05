<?php
//sql database
$db =  mysqli_connect(
    'localhost',
    'root',
    '',
    'reservation_system');

$query = "
SELECT * 
FROM customer_data 
";

$result = mysqli_query($db, $query)
or die('Error '.mysqli_error($db).' with query '.$query);

$users = [];

while($row = mysqli_fetch_assoc($result))
{
    // elke rij (dit is een album) wordt aan de array 'albums' toegevoegd.
    $users[] = $row;
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
<!--header-->
<?php include '../header.php'; ?>

<h1></h1>

<main class="main">
    <h2><a href="create.php">Create</a></h2>

    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Customer ID</th>
            <th>Username</th>
            <th>E-Mail</th>
            <th>Password</th>
            <th>Role</th>
            <th>Auth Level</th>
            <th>Name</th>
            <th>Last Name</th>
            <th>Phone Number</th>
            <th>Birthdate</th>
            <th>Date Created</th>
            <th>Date Update</th>
            <th>Last Online</th>
        </tr>
        </thead>
        <body>
        <?php foreach ($users as $user) : $x++ ?>
            <?php $_POST['id'] = $user['id']; ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['customer_id'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['password'] ?></td>
                <td><?= $user['role'] ?></td>
                <td><?= $user['auth_level'] ?></td>
                <td><?= $user['name'] ?></td>
                <td><?= $user['last_name'] ?></td>
                <td><?= $user['phone_number'] ?></td>
                <td><?= $user['birthdate'] ?></td>
                <td><?= $user['date_created'] ?></td>
                <td><?= $user['date_updated'] ?></td>
                <td><?= $user['last_online'] ?></td>
                <td><a href="<?php echo 'account.php?id='.$user['id'] ?>">Account</a> </td>
                <td><a href="<?php echo 'edit.php?id='.$user['id'] ?>">Edit</a> </td>
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
