<?php

include("Config.php");
session_start();

$uname = $_REQUEST["uname"];
$pass = $_REQUEST["pass"];

$sql = "SELECT * FROM login WHERE UserName = '".$uname."' and Password = '".$pass."'";
$result = mysqli_query($con,$sql);
$data = mysqli_fetch_assoc($result);
$count =  mysqli_num_rows($result);

if($count > 0){
    if($data["UT"] == "Admin"){
        $_SESSION["ID"] = $data["UT"];
        $_SESSION["UN"] = $data["UserName"];
        echo "Admin.html";
    }else if($data["UT"] == "Employee"){
        $_SESSION["ID"] = $data["UT"];
        $_SESSION["UN"] = $data["UserName"];
        echo "Employee.html";
    }
}else{
    echo "Failure";
}
?>