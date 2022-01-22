<?php 
//Hello This is my first installer project for jquery

try {
    $db = new PDO("mysql:host=localhost;dbname=myroadmap", "root", "");
} catch ( PDOException $e ){
    print $e->getMessage();
}
?>