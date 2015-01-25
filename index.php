<?php
require __DIR__.'/header.php';

// SI TRAINER EST CONNECTE
if ($_SESSION ==  TRUE){

    echo "Bonjour ".$_SESSION['username'].'<br />';
    require 'pokemon_board.php';

}else{
     echo '<div id="index">Merci de vous connecter</div>';
     require 'views/sign_in.php';
} ?>