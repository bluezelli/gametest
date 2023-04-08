<?php

function getDetailGames():array
{
    $request = $_REQUEST['REQUIST_URL'];
    $params = explode('/' , $request);
    $chosenGame = urldecode($params[1]);
    global $pdo;
    try {
        $detailGame= $pdo->query('SELECT * FROM game WHERE name = "' . $chosenGame . '"')->fetchAll(PDO::FETCH_CLASS, 'game');
        return $detailGame;
    } catch (PDOException $e){
        die("error: " . $e->getMessage());
    }

}
