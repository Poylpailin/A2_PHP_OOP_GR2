<!-- SI LE TRAINER N'A PAS DE POKEMON -->
<?php if($pokemon == null){?>

<form method="post" action="">
<input type="text" name="name" id="name" placeholder="name" />

<br />

<input type="radio" name="type" value="plant">Plant<br />
<input type="radio" name="type" value="water">Water<br />
<input type="radio" name="type" value="fire">Fire<br />

<input type="submit" value="Valider" />
</form>

<!-- SI LE TRAINER A UN POKEMON -->
<?php
    }else{

    /** @var \Poylpailin\PokemonBattle\Pokemon $pokemon */
    echo "Nom du pokemon : ".$pokemon->getName()."<br />HP : ".
    $pokemon->getHP()."<br /><a href='opponents.php'>ATTACK POKEMON</a>";


} ?>