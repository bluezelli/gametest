<?php

function checkLogin():string
{
    global $pdo;
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    if(!empty($username) && !empty($password)){
        $sql = 'SELECT * FROM `user` WHERE `username` = :u AND `password` = :p';
        $sth = $pdo->prepare($sql);
        $sth->bindParam(':u', $username);
        $sth->bindParam(':p', $password);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'User');
        $sth->execute();
        $user = $sth->fetch();
        if($user !== false){
            $_SESSION['user'] = $user;
            if($_SESSION['user']->role === "ADMIN"){
                return "ADMIN";
            } else {
                return "MEMBER";
            }
        }
        return "FAILURE";
    }  return "INCOMPLETE";
}
       
