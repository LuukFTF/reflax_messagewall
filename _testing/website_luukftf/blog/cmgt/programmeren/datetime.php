


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="/css/main.css" type="text/css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <li class="menu-item"><a href="/u">Users</a></li>
            <li class="menu-item"><a href="/test.html">Test</a></li>
            <li class="menu-item"><a href="/test.html">Test</a></li>
        </ul>
    </nav>
</header>
<main class="main">
    <div class="container page">
        <?php
        $currentDate = date('Y-m-d');
        $currentDateMD = date('m-d');
        $currentTime = date('H:i');
        $currentDateTime = date('Y-m-d H:i');
        $birthdayYear = '2001';
        $birthdayMD = '12-10';
        $birthday = "$birthdayYear-$birthdayMD";
        $birthdayUnix = strtotime("$birthday");
        ?>


        <h1><?php
        echo date('Y-m-d H:i');
        ?></h1>

        <h1><?php
        echo date('Y-m-d H:i', time() - (60 * 60 * 24 * 7));
        ?></h1>

        <h1><?php
        echo (strtotime("2000-08-12") - strtotime("2000-02-05")) / 60 / 60 / 24;
        ?></h1>

        <h1><?php

        echo date('Y-m-d', "$birthdayUnix")."</br>";
        ?></h1>

        <h1><?php
        echo (strtotime("1970-$birthdayMD") - strtotime("1970-$currentDateMD")) / 60 / 60 / 24;
        ?></h1>



        </br>
        <?php
        echo strtotime("now")."</br>";
        echo strtotime("$birthday")."</br>";
        echo strtotime("+1 day")."</br>";
        echo date('Y-m-d H:i',1000000000)."</br>";
        echo strtotime("2001-08-23")."</br>";
        echo ((1000000000 - strtotime("2001-08-23")) / 60 / 60 / 24)."</br>";
        ?>
        </br>
        <?php
        $nextWeek = time() + (7 * 24 * 60 * 60);
        // 7 days; 24 hours; 60 mins; 60 secs
        echo 'Now:       '. date('Y-m-d') ."</br>";
        echo 'Next Week: '. date('Y-m-d', $nextWeek)  ."</br>";
        echo date('D-d-S-W-a A-U-T')
        ?> </br>
        <?php echo 'Het is vandaag '.date('d F Y', 1578844905) ?> </br>
        <?php echo 'Het is vandaag '.date('Y-m-d') ?> </br>
        <?php echo 'Het is nu '.date('g').' uur en '.date('i').' minuten' ?> </br>
        <?php echo 'De exacte tijd is '.date('H:i:s:u:v e') ?> </br>

        <p>Toon de datum van vandaag in een webpagina met het format "31-12-19 10:00"</p>
        <p>Toon de datum als hierboven, maar dan 1 week eerder</p>
        <p>Toon het verschil in dagen tussen 5 februari en 12 augustus.</p>
        <p>Toon het aantal nachten slapen tot je volgende verjaardag</p>

    </div>
</main>
<footer class="footer">

</footer>
</body>
</html>

