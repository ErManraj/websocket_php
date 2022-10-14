<?php 
session_start(); 
ob_start();

include_once('db_connect.php');

$now = time(); // Checking the time now when home page starts.

// echo $_SESSION["loggedin_id"];echo "<br>";
// echo $_SESSION['expire'];echo "<br>";
// echo $_SESSION["loggedin_token"];echo "<br>";
// echo $now;echo "<br>";
// echo $res=checkstate($conn,$_SESSION["loggedin_id"],$_SESSION["loggedin_token"]);

if(empty($_SESSION["loggedin_id"]) || empty($_SESSION["loggedin_token"]))// || (checkstate($conn,$_SESSION["loggedin_id"],$_SESSION["loggedin_token"])==0)
{
    session_unset(); 
    session_destroy();
    header('location:../login.php');
}
else if($now > $_SESSION['expire']) 
{
    session_unset(); 
    session_destroy();
    header('location:../login.php');
}
if($_SESSION["lang"]==0)
{
     $lang_type="english";
}
else
{
    $lang_type="arabic";
}
?>