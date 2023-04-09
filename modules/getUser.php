<?php

function getUser():array
{
    global $pdo;
    try {
        $user = $pdo->prepare('select * FROM user')->fetchAll(PDO::FETCH_CLASS, 'User');
        return  $user;


    } catch (PDOException $e){
        die('error'. $e->getMessage());
    }

}
