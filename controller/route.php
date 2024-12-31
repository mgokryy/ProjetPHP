<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'accueil';

switch ($page) {
    case 'inscription':
        include_once 'controller/UsersController.php';
        $users = new UsersController();
        $users->getFormInscription();
        break;

    case 'inscription_action':
        include_once 'controller/UsersController.php';
        $users = new UsersController();
        $users->inscription();
        break;

    case 'connexion':
        include_once 'controller/UsersController.php';
        $users = new UsersController();
        $users->getFormConnexion();
        break;

    case 'connexion_action':
        include_once 'controller/UsersController.php';
        $users = new UsersController();
        $users->connexion();
        break;

    case 'deconnexion':
        session_start();
        session_destroy();
        header("Location: index.php?page=accueil");
        exit();

    case 'accueil':
        include 'view/accueil.php';
        break;

    case 'choose_category':
        include_once 'controller/GameController.php';
        $game = new GameController();
        $game->chooseCategory();
        break;

    case 'start_game':
        include_once 'controller/GameController.php';
        $game = new GameController();
        $game->startGame();
        break;

    case 'jeu':
        include_once 'controller/GameController.php';
        $game = new GameController();
        $game->loadQuestion(); 
        include 'view/jeu.php';
        break;

    case 'jeu_answer':
        include_once 'controller/GameController.php';
        $game = new GameController();
        $game->handleAnswer();
        break;

    case 'jeu_action':
        include_once 'controller/GameController.php';
        $game = new GameController();
        $game->handleAnswer();
        break;

    case 'jeu_result':
        include 'view/jeu_result.php';
        break;

    case 'regles':
        include 'view/regles.php';
        break;

    default:
        include 'view/404.php';
        break;
}
