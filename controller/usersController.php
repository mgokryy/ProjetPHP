<?php
include_once 'model/usersModel.php';

class UsersController
{

    private $model;

    public function __construct()
    {
        $this->model = new UsersModel;
    }


    public function getFormInscription()
    {
        include 'view/inscription.php';
    }

    public function inscription()
    {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            if ($this->model->inscription($username, $password)) {
                echo "Inscription OK";
                header("Location: index.php?page=connexion");
                exit();
            } else {
                echo "Erreur d'inscription";
                $this->getFormInscription();
            }
        } else {
            $this->getFormInscription();
        }
    }

    public function getFormConnexion()
    {
        include 'view/connexion.php';
    }

    public function connexion()
    {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $user = $this->model->getUserByUsername($username);

            if ($user && password_verify($_POST['password'], $user['password'])) {
                $_SESSION["username"] = $user["username"];
                echo "Connexion réussie !";
                header("Location: index.php?page=choose_category");
                exit();
            } else {
                echo "Erreur de connexion.";
                $this->getFormConnexion();
            }
        } else {
            $this->getFormConnexion();
        }
    }
}