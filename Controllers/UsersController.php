<?php

namespace Controllers;

use Models\UsersModel;

class UsersController extends Controller
{
    // Création d'un nouvel utilisateur

    public static function inscription()
    {

        // Traitement du formulaires
        $errMsg = '';
        // Regxex du mot de passe (juste minimum 8 caractère)
        $pattern = '/^.{8,}$/';
        // var_dump($_POST);
        if (
            !empty($_POST) &&
            !empty($_POST['login']) &&
            !empty($_POST['firstName']) &&
            !empty($_POST['lastName']) &&
            !empty($_POST['adress']) &&
            !empty($_POST['cp']) &&
            !empty($_POST['city']) &&
            !empty($_POST['password']) &&
            ($_POST['password'] == $_POST['confirm'])
        ) {

            if (!filter_var($_POST['login'], FILTER_VALIDATE_EMAIL)) {
                $errMsg = "Merci de saisir un email valide<br>";
            }
            if (!preg_match($pattern, $_POST['password'])) {
                $errMsg .= "Merci de saisir un mot de passe correct";
            }
            if(!$errMsg){
                // tout est ok
                $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
                // On vérifie que l'email ne soit pas deja en BDD
                $login = [$_POST['login']];
                $testLogin = UsersModel::findByLogin($login);
                if($testLogin){
                    $errMsg = "Vous avez déjà un compte";
                }else{
                    // On enregistre en BDD
                    // On sécurise les données
                    self::security();
                    $data = [$_POST['login'],
                            $pass,
                            $_POST['firstName'],
                            $_POST['lastName'],
                            $_POST['adress'],
                            $_POST['cp'],
                            $_POST['city']];
                    UsersModel::create($data);
                    $_SESSION['message'] = "Votre compte est crée, vous pouvez vous connecter";
                    header('Location: ' . SITEBASE);
                }
            }

        } elseif (!empty($_POST)) {
            $errMsg = "Merci de remplir tous les champs du formulaire et de vérifier que vos mots de passe concordent";
        }
        self::render('users/inscription', [
            'title' => 'Inscription',
            'errMsg' => $errMsg
        ]);
    }
}
