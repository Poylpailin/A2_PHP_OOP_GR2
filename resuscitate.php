<?php
require __DIR__.'/header.php';
require __DIR__.'/vendor/autoload.php';

$em = require __DIR__ . '/bootstrap.php';

use Poylpailin\PokemonBattle\Pokemon;
use Poylpailin\PokemonBattle\Trainer;

// RECUPERE L'ID DU POKEMON
/** @var  \Doctrine\ORM\EntityRepository $pokemonRepo */
$pokemonRepo = $em->getRepository('Poylpailin\PokemonBattle\Pokemon');

/** @var $pokemonOpponent */
$pokemon = $pokemonRepo->find($_GET['id']);



$timeResuscitate = time();
$lastResuscitate = $pokemon->getResuscitate();

if ($timeResuscitate < $lastResuscitate + 60 * 60 * 24) {
    echo 'Vous avez déjà ressuscité votre Pokemon aujourd\'hui ! Revenez demain.';
}

else {
    $pokemon->setHp(100);
    $pokemon->setResuscitate($timeResuscitate);

    $em->persist($pokemon);
    $em->flush();

    echo "Votre pokemon est de nouveau en forme ! ";
}

echo "<a href='index.php'><br />Retour au dashboard</a>";
