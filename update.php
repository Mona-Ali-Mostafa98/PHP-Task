<?php
// var_dump($_GET);

require "connection.php";
if(isset($_GET['full_name'])&&isset($_GET['username'])&&isset($_GET['password'])&&isset($_GET['confirmPassword'])&&isset($_GET['email'])&&isset($_GET['birth_date'])&&isset($_GET['city'])){
    if(!empty($full_name)&&!empty($username)&&!empty($password)&&!empty($confirmPassword)&&!empty($email)&&!empty($birth_date)&&!empty($city)){
        require "connection.php";
        $id=$_GET['id'];
        $full_name=$_GET['full_name'];
        $username=$_GET['username'];
        $password=$_GET['password'];
        $confirmPassword=$_GET['confirmPassword'];
        $email=$_GET['email'];
        $birth_date=$_GET['birth_date'];
        $city=$_GET['city'];
        
        $query=$connection->prepare("UPDATE users SET full_name=?,username=?,password=?,email=?,birth_date=?,city=? WHERE id=?");
        $query->execute([$full_name,$username,$password,$email,$birth_date,$city]);
        header("Location: index.php");
    }

}else{
    header("Location: index.php");
}
?>