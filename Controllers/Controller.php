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

    // Pour tester
    // public function test(){
    //     $this->render('test', [
    //         'title' => 'page de test'
    //     ]);
    // }
}





