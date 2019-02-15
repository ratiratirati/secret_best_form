<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
</head>
<body>
<?php
include ('server.php');
include ('proces.php');
?>
<div class="login_form">
    <form method="post" action="admin.php">
        <input type="text" name="username" placeholder="მომხმარებელი">
        <br>
        <input type="password" name="password" placeholder="***********">
        <br>
        <button name="login_admin">შესვლა</button>
        <div class="error">
            <?php include ('error.php');?>
        </div>
    </form>
</div>
</body>
</html>