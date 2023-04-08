<?php

require '../modules/categories.php';
require '../modules/gamelist.php';
require '../modules/database.php';

session_start();
$request = $_SERVER('REQUEST_URL');
$params = explode('/', $request);
$title = "GameOne";
$titleSuffix = "";

    switch ($params[1]) {

        case 'categories':
            $titleSuffix = ' | Categories';
            include_once "../templates/home.php";
            break;

        case '1':
        case '2':
        case '3':
        case '4':
        case '5':
        case '6':
            $titleSuffix = ' | Platformer';
            $games = getGamelist();
            include_once '../templates/gameList.php';
            break;

        case "Super%20Mario%20Bros":
        case "Need%20for%20Speed":
        case "Mario%20Kart":
        case "Crash%20Team%20Racing":
        case "Elden%20Ring":
        case "Dying%20Light":

            $titleSuffix = ' | GameDetails';

    }