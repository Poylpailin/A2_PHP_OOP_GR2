<?php require __DIR__.'/header.php';
$em = require __DIR__ . '/bootstrap.php';

use Poylpailin\PokemonBattle\Pokemon;
use Poylpailin\PokemonBattle\Trainer;

    /** @var  \Doctrine\ORM\EntityRepository $pokemonRepo */
    $pokemonRepo = $em->getRepository('Poylpailin\PokemonBattle\Pokemon');
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody> <?php foreach ($pokemon as $var) {
                $tr = $var->getTrainer(); ?>

                <tr>
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
                    <td><button type="submit" class="btn btn-default"><a href="battle.php?id=<?php echo $var->getId();?>">Attaquer</a></button></td>
                </tr>

                        <?php } ?>


            </tbody>
        </table>
    </div><!-- DIV TABLEAU -->
</div>