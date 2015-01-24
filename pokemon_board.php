<?php

use Poylpailin\PokemonBattle\Pokemon;
use Poylpailin\PokemonBattle\Trainer;

$em = require __DIR__ . '/bootstrap.php';



// RECUPERER LE TRAINER
    /** @var \Doctrine\ORM\EntityRepository $trainerRepo */
    $trainerRepo = $em->getRepository('Poylpailin\PokemonBattle\Trainer');

    // Récupère l'objet traineur de la base de données
    /** @var \Poylpailin\PokemonBattle\Trainer $trainer */
    $trainer = $trainerRepo->findOneBy([
        'username' => $_SESSION['username'],
    ]);

//SECTION AFFICHAGE DU POKEMON - TROUVER LE TRAINER DU POKEMON
    /** @var  \Doctrine\ORM\EntityRepository $pokemonRepo */
    $pokemonRepo = $em->getRepository('Poylpailin\PokemonBattle\Pokemon');
    $pokemon = $pokemonRepo->findOneBy([
        'trainer' => $trainer,
    ]);


//SECTION CREATION DU POKEMON
if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['type']) && !empty($_POST['type'])) {

    // CREER LE POKEMON
    /** @var Pokemon $pokemon */
    $pokemon = new Pokemon();

    // Définition des valeurs
    $pokemon
        ->setName($_POST['name'])
        ->setHP(100)
        ->SetTrainer($trainer);
            if($_POST['type'] == 'plant') {
                $pokemon->setType(Pokemon::TYPE_PLANT);
            }
            elseif($_POST['type'] == 'fire'){
                $pokemon->setType(Pokemon::TYPE_WATER);
            }
            elseif($_POST['type'] == 'water') {
                $pokemon->setType(Pokemon::TYPE_FIRE);
            }

    // récupère la valeur de $pokemon
    $em->persist($pokemon);

    // envoi dans la base de donnée
    $em->flush();

    echo 'Votre pokemon a bien ete cree!';
}

require 'views/pokemon_board.php';