<?php

use Models\AnnoncesModel;

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
AnnoncesModel::update($data);

// Teste de la méthode delete($id)

// $id = [4];
// AnnoncesModel::delete($id);
