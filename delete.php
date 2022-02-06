<?php
if(isset($_GET["id"])&&!empty($_GET['id'])){
    require "connection.php";
    $id=$_GET['id'];
    $query=$connection->prepare("DELETE FROM users WHERE id=?");
    $query->execute([$id]);
    header("Location: index.php");
}else{
    header("Location: index.php");
}