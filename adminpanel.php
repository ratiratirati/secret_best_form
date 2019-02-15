<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/adminpanel.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
</head>
<body>
<?php
include ('server.php');
include ('proces.php');

if(empty($_SESSION['username'])){
    header('location:admin.php');
}

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location:admin.php');
}
?>
<div class="header">
    <div class="dropdown">
        <button class="dropbtn"><?php echo $_SESSION['username'];?></button>
        <div class="dropdown-content">
            <a href="shemosvlebi.php">შემოსვლები</a>
            <a href="adminpanel.php?logout='1'">გამოსვლა</a>
        </div>
    </div>
</div>
</body>
</html>