<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
</head>
<body>
<?php
include ('server.php');
include ('proces.php');

if(empty($_SESSION['saxeli'])){
    header('location:index.php');
}

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['saxeli']);
    header('location:index.php');
}
?>
<div class="header">
    <div class="dropdown">
        <button class="dropbtn"><?php echo $_SESSION['saxeli'] .' '.$_SESSION['asaki'].' წლის';?></button>
        <div class="dropdown-content">
            <a href="home.php?logout='1'">გამოსვლა</a>
        </div>
    </div>
</div>
</body>
</html>