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
<div class="siaxle">
    <form method="post" action="adminpanel.php">
        <input type="text" name="xasiati" placeholder="როგორ ხასიათზე ხართ?">
        <br>
        <button name="gamoqveyneba">გამოქვეყნება</button>
        <br>
        <button name="siaxliswashla">წაშლა</button>
        <div class="gamoqveynebulia">
        <?php
            $sql = "SELECT COUNT(id) AS list FROM xasiatze";
            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result)){
                $row = mysqli_fetch_assoc($result);
                echo 'გამოქვეყნებულია: ( '.$row['list'].' )';
            }
        ?>
        </div>
    </form>
</div>
</body>
</html>