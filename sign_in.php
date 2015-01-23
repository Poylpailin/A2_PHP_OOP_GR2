<?php require __DIR__.'/header.php';

use Poylpailin\PokemonBattle\Trainer;
$em = require __DIR__ . '/bootstrap.php';


if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {

    /** @var \Doctrine\ORM\EntityRepository $trainerRepo */
    $trainerRepo = $em->getRepository('Poylpailin\PokemonBattle\Trainer');

    // Récupère l'objet traineur de la base de données
    /** @var Poylpailin\PokemonBattle\Trainer $trainer */
    $trainer = $trainerRepo->findOneBy([
        'username' => $_POST['username'],
        'password' => $_POST['password']
    ]);

    if(is_object($trainer)){
        $_SESSION['status'] = 'connected';
        // RECUPERER DES ELEMENTS DANS UN OBJET
        $_SESSION['username'] = $trainer->getUsername();

        echo 'Vous etes bien connecte' ;
    }

    else{
        echo 'Invalide';
    }

}

require 'views/sign_in.php';


