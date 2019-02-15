<?php

if(isset($_POST['login_admin'])){
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    if(empty($username)){
        array_push($errors,'მომხმარებლის ველი ცარიელია');
    }

    if(empty($password)){
        array_push($errors,'პაროლის ველი ცარიელია');
    }

    if(count($errors) == 0 ){
        $password = md5($password);
        $sql = "SELECT * FROM admin WHERE username='$username' and password='$password'";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)){
            $_SESSION['username'] = $username;
            header('location:adminpanel.php');
        }else{
            array_push($errors,'მომხმარებლის სახელი ან პაროლი არასწორია');
        }
    }


}


function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

if(isset($_POST['login'])){
    $saxeli = $_POST['saxeli'];
    $profesia = $_POST['profesia'];
    $asaki = $_POST['asaki'];
    $code = $_POST['code'];
    $ip = get_client_ip();
    $_SESSION['saxeli'] = $saxeli;
    $_SESSION['asaki'] = $asaki;
    if(empty($saxeli)){
        array_push($errors,'სახელის ველი ცარიელია');
    }

    if(empty($profesia)){
        array_push($errors,'პროფესიის ველი ცარიელია');
    }

    if(empty($asaki)){
        array_push($errors,'ასაკის ველი ცარიელია');
    }

    if(empty($code)){
        array_push($errors,'კოდის ველი ცარიელია');
    }

    if (count($errors) == 0 ){

    $sql = "INSERT INTO shesvla (ip,saxeli,profesia,asaki) VALUES ('$ip','$saxeli','$profesia','$asaki')";

    if(mysqli_query($con,$sql)){

    if($profesia == 'პროგრამისტი' and $asaki >= 18 and $code == 251999){
        header('location:home.php');
    }

    if($profesia != 'პროგრამისტი'){
        array_push($errors,'თქვენთვის შესვლა დაუშვებელია სისტემაში პროფესიის გამო !!!');
    }

    if($asaki < 18){
        array_push($errors,'თქვენთვის შესვლა დაუშვებელია სისტემაში ასაკის გამო !!!');
    }

    if($code != 251999){
        array_push($errors,'თქვენთვის შესვლა დაუშვებელია სისტემაში კოდი არასწორია !!!');
    }


    }

    }
}

if(isset($_POST['shemosvlebiwashla'])){
    $sql = "DELETE FROM shesvla";
    mysqli_query($con,$sql);
}
?>