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
    <link href="../css/wall.css" type="text/css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Wall</title>
</head>


<main>
    <div class="parent-main">
        <?php foreach ($messages as $message) : $x++ ?>
            <?php $_POST['id'] = $message['id']; ?>
                <div class="item">
                <h1>Name</h1>
                <?= $message['name'] ?>
                <h1>Message</h1>
                <?= $message['message'] ?>
                </div>
        <?php endforeach; ?>
    </div>
</main>






<!--footer-->
<?php //include '../default/footer2.php'; ?>

</body>
</html>
