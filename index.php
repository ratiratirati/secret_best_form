<html>
<head>
<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
</head>
<body>
<?php
include ('server.php');
include ('proces.php');
?>
<div class="form_box">
    <form method="post" action="index.php">
        <input type="text" name="saxeli" placeholder="სახელი">
        <br>
        <input type="text" name="profesia" placeholder="პროფესია">
        <br>
        <input type="text" name="asaki" placeholder="ასაკი">
        <br>
        <input type="password" name="code" placeholder="კოდი: XXXXXX">
        <br>
        <button name="login">სისტემაში შესვლა</button>
        <div class="error">
            <?php include ('error.php')?>
        </div>
    </form>
</div>
</body>
</html>