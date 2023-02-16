<?php
namespace Controllers;

class Controller{
    // Création du render
    public static function render($views, $data= []){
        // On utilise "extract()" pour créer autant de variables que de clé dans le tableau $data*
        extract($data);

        // On commence à mettre en mémoire tampon
        ob_start();

        // on appel la bonne vue
        require_once ROOT . '/Views/' . $views . '.php';

        $content = ob_get_clean();

        // On appel le layout principale
        require_once ROOT . '/Views/layout.php';
    }

    // Méthode pour sécuriser les saisies formulaire

    public static function security() {
        if(!empty($_POST)){
            foreach ($_POST as $key => $value) {
                $_POST[$key] = htmlspecialchars(trim($value));
            }
        }
    }

    // Pour tester
    // public function test(){
    //     $this->render('test', [
    //         'title' => 'page de test'
    //     ]);
    // }
}





