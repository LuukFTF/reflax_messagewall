<?php
$defaultArray = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 100, 69, 11100];

$a = 'hello world';
$virtualworlds = ['Matrix', 'Simulation', 'Minecraft World', 'Coma', 'Eternity', '42', 'Universe', 'Illusion', 'Mirage'];
$name = ['LuukFTF' => 'Luuk', 'peter69' => 'Peter', 'pascal' => 'Pascal', 'bruh' => 'Bruh', 'noel' => 'Noel'];
$user = ['LuukFTF', 'peter69', 'pascal', 'bruh', 'noel'];
$age = ["Peter" => "35", "Ben" => "37", "Joe" => "43"];
$b = [["1"], ["2"]];
$c = [["1" => "A"], ["2" => "B"]];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="/css/main.css" type="text/css" rel="stylesheet">
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

<main>
    <p>
        <?php
        echo "My first PHP script!";
        ?>
    </p>

    <p><a href="week1.txt">Source Code</a></p>

    <div>
        <hr/>
        <h1> Opdracht 1.1 - Datum en tijd</h1>


        <p>
            <?php
            $nextWeek = time() + (7 * 24 * 60 * 60);
            // 7 days; 24 hours; 60 mins; 60 secs
            echo 'Now:       '. date('Y-m-d') ."</br>";
            echo 'Next Week: '. date('Y-m-d', $nextWeek)  ."</br>";
            echo date('D-d-S-W-a A-U-T')
            ?>
        </p>

        <h2><?php echo 'Het is vandaag '.date('d F Y') ?></h2>
        <p>

        </p>

        <h2><?php echo 'Het is vandaag '.date('Y-m-d') ?></h2>
        <p>

        </p>

        <h2><?php echo 'Het is nu '.date('g').' uur en '.date('i').' minuten' ?></h2>
        <p>

        </p>

        <h2><?php echo 'De exacte tijd is '.date('H:i:s:u:v e') ?></h2>
        <p>

        </p>

        <hr/>
        <h1>Opdracht 1.2</h1>

        <h2>De variabele '$a' is als volgt: <?php echo "$a" ?></h2>

        <h2>Begroeting op basis van het  moment van de dag</h2>
        <p>
            <?php echo "123 $a" ?>
        </p>

        <h2></h2>

        <h2>
            <?php
            if (date('G') < 12){
                echo "Good Morning";
            } else if (date('G') < 18) {
                echo "Good Afternoon";
            } else {
                echo "Good Evening";
            }

            echo " $name!"
            ?>
        </h2>

        <hr>
        <h1>Opdracht 1.3</h1>

        <h2>Playing around with tables:</h2>


        <h3>Test Table</h3>
        <table style="width: 100%">
            <thead>
            <tr>
                <td>Name</td>
                <td>Age</td>
                <td>Country</td>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>Luuk</td>
                <td>17</td>
                <td>The Netherlands</td>
            </tr>
            <tr>
                <td>Peter</td>
                <td>45</td>
                <td>USA</td>
            </tr>
            </tbody>
        </table>

        <h2>PHP Array Test</h2>


        <p><?php echo $defaultArray[rand(0, count($defaultArray) - 1)]; ?></p>

        <?php
        echo "<p>".$name[rand(0, count($name) - 1)]."</p>";
        echo "<p>".$user[rand(0, count($user) - 1)]."</p>";
        ?>


        <p><?php print_r($defaultArray);?></p>
        <p><?php print_r($name); ?></p>
        <p><?php print_r($user); ?></p>
        <p><?php print_r($virtualworlds); ?></p>


        <h2>HTML in PHP</h2>

        <?php
        echo "<table>";
        echo '<tr>';
        echo "<td>Name</td>";
        echo "<td>".$name[1]."</td>";
        echo "</tr>";
        echo "</table>";

        echo "<h1>test</h1>";
        ?>

        <?php
        echo "
        <h3>I broke the ".$virtualworlds[rand(0, count($virtualworlds) - 1)]."</h3>
        <P>this is a test</P>
        ";
        ?>

        <h2>PHP in HTML in PHP in HTML</h2>
        <?php
        echo "
        <?php echo <h3>I broke the other $virtualworlds[0]</h3>
        ?>
        <P>this is a test</P>
        ";
        ?>

        <h2>Actual Homework</h2>

        <p></p>
        <?php
        for ($i = 0; $i < count($defaultArray); $i++) {
            echo "<p>".$defaultArray[$i]."<p>";
        }


        $associativeArray = [
        'eerste' => 'Wijn',
        'tweede' => 'haven',
        ' ',
        99
        ];


        foreach ($name as $item => $b) {
            echo $item.$b;
            echo "<br>";
            
        }



        foreach ($age as $x => $x_value) {
            echo "Key=" . $x . ", Value=" . $x_value;
            echo "<br>";
        }

        
        

        ?>

        <p><?php print_r($associativeArray); ?></p>



    </div>
</main>




</body>
</html>




