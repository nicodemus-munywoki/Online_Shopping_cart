<?php
    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'myshop');
   
    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $pass=$_POST['pass'];
         
        $sql = "SELECT * FROM `customer` WHERE Email='".$email."
		' AND Password='".$pass."' limit 1";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) != 1){
            echo "login success...";
            header('location:Home.php');
            exit();
        }
        else{
            echo "you have entered incorect password";
            exit();
        }
    }
    else{
        echo "unrecognised user";
        exit();
    }
?>