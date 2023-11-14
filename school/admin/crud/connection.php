<?php

try{
$connection = new PDO("mysql:dbname=sdfrr;host=localhost",'root','');
echo "connection done";
} catch(PDOException $ex){
    echo $ex-> getMessage();
}

?>