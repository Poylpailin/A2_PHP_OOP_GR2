<?php
require __DIR__.'/header.php';
require __DIR__.'/vendor/autoload.php';

if ($_SESSION ==  TRUE){

    echo "Bonjour ".$_SESSION['username'].'<br />';

    require 'pokemon_board.php';

}else{
  echo '<div id="index">Merci de vous connecter</div>';
    require 'views/sign_in.php';
}

?>