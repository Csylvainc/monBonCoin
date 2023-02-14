<?php

use Models\AnnoncesModel;
use Models\UsersModel;

require_once('autoloader.php');

// Tester la méthode findAll()
// $order = "price DESC";

// $annonces = AnnoncesModel::findAll(null, "LIMIT 2");

// var_dump($annonces);

// Test de la méthode findBiId()
// $id = [2];
// $annonce = AnnoncesModel::findById($id);

// var_dump($annonce);


// Test de la méthode findByIdUser
// $idUser = [2];
// $annoncesUser = AnnoncesModel::findByUser($idUser);
// var_dump($annoncesUser);

// Test le la méthode findByIdCat()
// $idCategorie = [2];
// $annoncesCat = AnnoncesModel::findByIdCat($idCategorie);
// var_dump($annoncesCat);


// Teste de la méthode create
// $data = [1,2,"tondeuse","maximum 250m², moteur électrique", 185, "tondeuse.jpg"];
// AnnoncesModel::create($data);

// Teste de la méthode Update()
// $data = [2,"tondeuse à gazon","maximum 250m², moteur électrique", 185, "tondeuse.jpg", 4];
// AnnoncesModel::update($data);

// Teste de la méthode delete($id)

// $id = [4];
// AnnoncesModel::delete($id);

// Test de la méthode findAll() users
// var_dump(UsersModel::findAll());

// Test de la méthode findBiId() users
// $toto = [2];
// var_dump(UsersModel::findById([1]));

// Test de la méthode findByLogin() users
// $login = ["toto@t.fr"];
// var_dump(UsersModel::findBylogin($login));


// Test de la méthode findBy() users
// $user = ['password' => ['1234']];
// $user = ['idUser' => [1]];
// var_dump(UsersModel::findBy($user));

// Test de la méthode create() users
$pass = password_hash("1234", PASSWORD_DEFAULT);
// $data = ['test2@gmail.com', $pass, 'test2', 'nomTest', '66 rue de paris', 77140, 'nemours'];
// UsersModel::create($data);


// Test de la méthode update() users
// $data = ['sylvain@gmail.com', $pass, 'sylvain', 'campos', '21 av des yvris', 93160, 'Noisy le grand', 2];
// UsersModel::update($data);

// Test de la méthode delete() users
// UsersModel::delete([4]);