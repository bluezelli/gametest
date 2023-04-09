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
        case 'login':
//bij de login case check je of er is ingevult met de isset/post methode en dan haal je de login functies in login module op zodat je de return values kan gebruiken als referentie in de cases en templates aan de juiste referenties te kopelen
            $titleSuffix = ' | Login';
            if (isset($_POST['login'])) {
                $result = checkLogin();

                switch ($result) {
                    case 'ADMIN':
                        header("Location: /admin/home");
                        $categories = getCategories();
                        break;
                    case 'MEMBER':
                        header("Location: /member/home");
                        $categories = getCategories();
                        break;
                    case 'FAILURE':
                        $_SESSION['message'] = "Username of wachtwoord niet correct ingevuld!";
                        include_once "../templates/login.php";
                        break;
                    case 'INCOMPLETE':
                        $_SESSION['message'] = "Niet volledig ingevuld!";
                        include_once "../templates/login.php";
                        break;
                }
            } else {
                include_once "../templates/login.php";
            }
            break;

        case 'registreren':
            $titleSuffix = ' | Registreren';
            if(isset($_POST['registreren'])){
                $result = makeRegistration();
                switch ($result){
                    case 'SUCCES':
                        header("Location: /member/home");
                        $categories = getCategories();
                        break;

                    case 'incomplete':
                        $_SESSION['message'] = 'niet volledig ingevult';
                        include_once "../templates/register.php";
                        break;s


                    case 'EXISTS':
                        $_SESSION['message'] = 'gebruiker bestaat al';
                        iinclude_once ("../templates/register.php");
                        break;

                }
            }



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
            $detailGame = getDetailGames();
            $userReview = getUser();
            $postReview = getReview();
            include_once ('../templates/gameDetail.php');

    }