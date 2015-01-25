<?php require __DIR__.'/header.php';
$em = require __DIR__ . '/bootstrap.php';

use Poylpailin\PokemonBattle\Pokemon;
use Poylpailin\PokemonBattle\Trainer;

// RECUPERE LE TRAINER DE L'ATTAQUANT
/** @var \Doctrine\ORM\EntityRepository $trainerRepo */
$trainerRepo = $em->getRepository('Poylpailin\PokemonBattle\Trainer');
$trainer = $trainerRepo->findOneBy([
    'username' => $_SESSION['username']
]);

// RECUPERE LE POKEMON DU TRAINER
/** @var  \Doctrine\ORM\EntityRepository $pokemonRepo */
$pokemonRepo = $em->getRepository('Poylpailin\PokemonBattle\Pokemon');
$pokemon = $pokemonRepo->findOneBy([
    'trainer' => $trainer
]);

// RECUPERE LE POKEMON OPPOSANT AVEC L'ID
/** @var  \Doctrine\ORM\EntityRepository $pokemonRepo */
$pokemonRepoOpponent = $em->getRepository('Poylpailin\PokemonBattle\Pokemon');
$pokemonOpponent = $pokemonRepoOpponent->find($_GET['id']);

// RECUPERE HP DU POKEMON
$hp = $pokemonOpponent->getHp();

// TEST DES CONDITIONS
if (($pokemon->getType() == Pokemon::TYPE_FIRE) && ($pokemonOpponent->getType() == Pokemon::TYPE_PLANT) OR
    ($pokemon->getType() == Pokemon::TYPE_PLANT) && ($pokemonOpponent->getType() == Pokemon::TYPE_WATER) OR
    ($pokemon->getType() == Pokemon::TYPE_WATER) && ($pokemonOpponent->getType() == Pokemon::TYPE_FIRE))
{
    $newHp = $hp - rand(15, 30);
}

elseif (($pokemon->getType() == Pokemon::TYPE_FIRE) && ($pokemonOpponent->getType() == Pokemon::TYPE_WATER) OR
    ($pokemon->getType() == Pokemon::TYPE_WATER) && ($pokemonOpponent->getType() == Pokemon::TYPE_PLANT) OR
    ($pokemon->getType() == Pokemon::TYPE_PLANT) && ($pokemonOpponent->getType() == Pokemon::TYPE_FIRE))
{
    $newHp = $hp - rand(5, 10);
}
else
    $newHp = $hp - rand(10, 20);

// Pas de HP en dessous de 0 !
if ($newHp < 0) {
    $newHp = 0;
}

// RECUPERATION ET ENVOI A LA BASE
$pokemonOpponent->setHp($newHp);
$em->flush(); ?>

<div id="pokemon_opponent">
    <p>Votre assaut a fait des dégats !</p>
    Le pokemon <?php echo $pokemonOpponent->getName(); ?> a maintenant <?php echo $newHp; ?> HP !
    Revenez maintenant dans 6H pour pouvoir attaquer un autre pokemon.
    <a href="index.php">Retour à l'index</a>
</div>