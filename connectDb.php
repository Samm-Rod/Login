<?php
$db_name = '';
$db_host = '';
$db_user = '';
$db_password = '';

try{
    $pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host,$db_user,$db_password);
}catch(PDOException $e){
    echo"Erro no banco de dados ".$e->getMessage();
}catch(Exception $e){
    echo"Erro genérico ".$e->getMessage();
}

?>