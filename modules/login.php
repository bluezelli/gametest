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
       function isAdmin():bool
       {
           if(isset($_SESSION['user'])&&!empty($_SESSION['user']))
           {
               $user=$_SESSION['user'];
               if ($user->role === "Admin")
               {
                   return true;
               }
               else
               {
                   return false;
               }
           }
           return false;

       }
       function isMember():bool
       {

           if(isset($_SESSION['user'])&&!empty($_SESSION['user']))
           {
               $user=$_SESSION['user'];
               if ($user->role === "Member")
               {
                   return true;
               }
               else
               {
                   return false;
               }
           }
           return false;
       
       }
