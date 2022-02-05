<?php
try{
    $connection=new PDO('mysql:dbname=itidb;host=localhost','root','2898');
}
catch(PDOException $exception){
    echo $exception->getMessage();
}
