<?php

// autoloader de composer.json
// Pour précharger les classes de manière automatique
require __DIR__.'/vendor/autoload.php';

// Importer la classe SetUp et EntityManager dans le namespace actuel
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;


// Connaître le chemin vers les entities
// définition d'un chemin avec un tableau avec toutes les entités
$paths = [
    "src",
];

// En ligne ou non
$isDevMode = true;

// the connection configuration
$dbParams = require __DIR__.'/config/config.php';

// Appel de la classe SetUp qu'on appelle ici "use Doctrine\ORM\Tools\Setup;"
// :: -> Accéder à quelque chsoe de statique (public static function) dans la classe SetUp, pour ça qu'on ne fait jamais de New Setup
// Va anlyser toutes les classes et va créer un mapping.

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

// création de l'entity manager
// Grâce aux annotations récupéré juste au dessus, permet de créer/modifier/supprimer
return $entityManager = EntityManager::create($dbParams, $config);

// DRY don't Repeat Yourself
