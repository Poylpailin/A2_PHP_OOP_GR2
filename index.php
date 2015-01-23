<?php
require __DIR__.'/header.php';
require __DIR__.'/vendor/autoload.php';

if ($_SESSION ==  TRUE){

    echo $_SESSION['username'];

    require 'views/pokemon_board.php';

}else{
  echo 'Merci de vous connecter';
}

?>