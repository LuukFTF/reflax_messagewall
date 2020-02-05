<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/main.css" type="text/css" rel="stylesheet">
    <title>LuukFTF's Sandbox</title>
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

<h1>HTML Test Code below:</h1>

<h1>Header 1</h1>
<h2>Header 2</h2>
<h3>Header 3</h3>
<h4>Header 4</h4>
<h5>Header 5</h5>
<h6>Header 6</h6>
<h7>Header 7</h7>
<h10>Header 10</h10>
<h100>Header 100</h100>
<h1000>Header 1000</h1000>

<p>hello <br>Next line <br> jo</p>
<p>JO</p>


<p>Hello <em>wow</em> this is <b>cool</b></p>

<p><button>Click me</button></p>
<p>Test <mark>mark</mark> </p>

<ul>
    <li>Coffee</li>
    <ul>
        <li>Black</li>
        <li>House</li>
        <ul>
            <li>Normal</li>
            <li>Christmas</li>
        </ul>
        <li>Cappuccino</li>
    </ul>
    <li>Tea</li>
    <li>Milk</li>
    <li>Sugar</li>
</ul>

<ol>
    <li>Coffee</li>
    <ul>
        <li>luuk's</li>
        <ol>Black</ol>
        <ol>Normal</ol>
        <li>peter's</li>
        <ol>Cappuccino</ol>
        <ol>Normal</ol>
    </ul>
    <li>Tea</li>
    <li>Milk</li>
    <li>Salt</li>
</ol>

<h1>PHP Test Code below:</h1>

<p><?php
    echo "My first PHP script!";
?></p>


<p><?php
    echo 'Hello World!';
?></p>

<input type="checkbox" name="test" value="on">
<p></p>
<input type="radio" name="group" value="option1">1
<input type="radio" name="group" value="option2">2
<p></p>
<select name="list">
    <option value="item1">one</option>
    <option value="item2">two</option>
    <option value="item2">three</option>
</select>
<p></p>
<select multiple name="list[]">
    <option value="item1">one</option>
    <option value="item2">two</option>
    <option value="item2">three</option>
</select>

<p></p>

<?php
if (isset($_POST['searchterm'])) {
    echo htmlspecialchars($_POST['searchterm'], ENT_QUOTES);
}
?>


<form
    action=""
    method="post">
    Username: <input type="text" name="name">
    Password: <input type="password" value="password">

</form>


</body>
</html>






