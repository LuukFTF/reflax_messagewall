<?php
//variables
$name = '';
$email = '';
$message = '';
$tc = '';

//variable setting from POST_GET
if (isset($_POST['submit'])) {
    $ok = true;

    if (!isset($_POST['name']) || $_POST['name'] === '') {
        $ok = false;
    } else {
        $name = $_POST['name'];
    };

    if (!isset($_POST['email']) || $_POST['email'] === '') {
        $ok = false;
    } else {
        $email = $_POST['email'];
    };

    if (!isset($_POST['message']) || $_POST['message'] === '') {
        $ok = false;
    } else {
        $message = $_POST['message'];
    };

    if (!isset($_POST['tc']) || $_POST['tc'] === '') {
        $ok = false;
    } else {
        $tc = $_POST['tc'];
    };

};

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="/css/main.css" type="text/css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Re-flax Create Message</title>
</head>

<!--header-->
<?php include '../default/header.php'; ?>

<main class="main">
    <div class="container page">
        <h1>Create Message</h1>
        <form
            action=""
            method="post">
            <p>Name: <input type="text" name="name" value='<?=htmlspecialchars($name, ENT_QUOTES)?>'</p>
            <p>E-mail: <input type="text" name="email" value='<?=htmlspecialchars($email, ENT_QUOTES)?>'></p>
            <p>Message: <textarea name="message"><?=htmlspecialchars($message, ENT_QUOTES)?></textarea></p>
            <p><input type="checkbox" name="tc" value='<?=htmlspecialchars($tc, ENT_QUOTES)?>'> I accept the terms &amp; conditions </p>
            <input type="submit" name="submit" value="Send Message">
        </form>
    </div>
</main>

<!--footer-->
<?php include '../default/footer.php'; ?>

</body>
</html>
