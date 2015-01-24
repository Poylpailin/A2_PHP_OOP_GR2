<?php require __DIR__.'/header.php';
$em = require __DIR__ . '/bootstrap.php';

use Poylpailin\PokemonBattle\Pokemon;
use Poylpailin\PokemonBattle\Trainer;


// RECUPERE TOUS LES POKEMON DE LA BASE DE DONNEES
// SAUF SOI MEME

    /** @var  \Doctrine\ORM\EntityRepository $pokemonRepo */
    $pokemonRepo = $em->getRepository('Poylpailin\PokemonBattle\Pokemon');

    /** @var \Doctrine\ORM\EntityRepository $trainerRepo */
    $trainerRepo = $em->getRepository('Poylpailin\PokemonBattle\Trainer');
    $trainer = $trainerRepo->findOneBy([
        'username' => $_SESSION['username'],
    ]);

    /** @var \Poylpailin\PokemonBattle\Pokemon $pokemon */
    $pokemon = $pokemonRepo->findAll(); ?>


<div class="container">
    <div id="tableau">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>HP</th>
                </tr>
            </thead>
            <tbody> <?php foreach ($pokemon as $var) {
                $tr = $var->getTrainer(); ?>

                <tr>
                    <!-- NOM -->
                    <td>
                        <?php echo $var->getName(); ?>
                    </td>
                    <!-- TYPE -->
                    <td>
                        <?php
                           if ($var->getType() == "0")
                               echo "Water";
                           elseif ($var->getType() == "1")
                               echo "Fire";
                           elseif ($var->getType() == "2")
                               echo "Plant";
                        ?>
                    </td>

                    <!-- HP -->
                    <td><?php echo $var->getHp(); ?></td>
                </tr>

                        <?php } ?>
            </tbody>
        </table>
    </div><!-- DIV TABLEAU -->
</div>

?>

