<?php
ob_start();

try{

    $con = new PDO("mysql:dbname=VideoTube;host=localhost","root","");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

}catch (PDOExcception $e) {
    echo "Connection failed " . $e.getMessage();
}

?>