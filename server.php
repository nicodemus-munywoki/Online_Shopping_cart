<?php
    header('location:Login.html');
    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'myshop');
    $fname = $_POST['Fname'];
    $sname = $_POST['Sname'];
    $phone = $_POST['phone'];
    $location = $_POST['Location'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $nic = "select * from customer where UserId= 'NULL'";
    $result = mysqli_query($con, $nic);
    $num = mysqli_num_rows($result);
    if($num == 1){
    	echo "USERNAME ALREADY EXISTS";
    }
    else{
	    $reg = "INSERT INTO `customer`(`Userid`, `Firstname`, `Surname`, `Phone`, 
		`Location`, `Gender`, `Email`, `Password`) 
		VALUES (NULL, '$fname', '$sname', '$phone', '$location', 
		'$gender', '$email', '$pass')";
	    mysqli_query($con, $reg);
        echo "REGISTRATION SUCCESS...";
        
    } 
?>