<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/shemosvlebi.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
            <a href="adminpanel.php">უკან დაბრუნება</a>
            <a href="adminpanel.php?logout='1'">გამოსვლა</a>
        </div>
    </div>
</div>
<input class="form-control mt-5 mb-5 pt-4 pb-4" id="myInput" type="text" placeholder="ძიება..">
<form method="post" action="shemosvlebi.php">
<button name="shemosvlebiwashla" class="btn btn-danger btn-lg float-right mr-5 mb-3">წაშლა</button>
</form>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">#id</th>
        <th scope="col">#ip</th>
        <th scope="col">სახელი</th>
        <th scope="col">პროფესია</th>
        <th scope="col">ასაკი</th>
    </tr>
    </thead>
    <tbody id="myTable">
    <?php

    $sql = "SELECT * FROM shesvla WHERE profesia='პროგრამისტი' and asaki >= 18";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)){
        while ($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['ip']."</td>";
            echo "<td>".$row['saxeli']."</td>";
            echo "<td>".$row['profesia']."</td>";
            echo "<td>".$row['asaki']."</td>";
            echo "</tr>";
        }
    }

    ?>
    </tbody>
</table>
<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
</body>
</html>