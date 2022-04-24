<?php
session_start() ;
include_once '../fonction/connection.php';
header("Access-Control-Allow-Origin: *");   
if(isset($_POST))
{
    if($_POST["type"] == "signup")
    {
        $sql = "INSERT INTO `user`(`name`, `email`, `password`) VALUES (?, ?, ?)";
        $modal->setRecord($sql, [$_POST["username"], $_POST["email"], $_POST["password"]]);
        echo "created";
    } 
    else if ($_POST["type"] == "login") 
    {
        $name = $_POST["username"];
        $password = $_POST["password"];
        $sql = "SELECT * FROM `user` WHERE name = ? AND password = ?";
        $user = $modal->getOne($sql, [$name,$password]);
        if(!empty($user))
        {
            $_SESSION["idU"] = $user["id"];
            echo "logged";
        }
        else
        {
            echo "unlogged";
        }
        
    }
    else if ($_POST["type"] == "logout")
    {
        session_destroy();
    }
}
