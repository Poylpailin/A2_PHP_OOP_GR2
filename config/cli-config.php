<?php

// Création de l'entity manager
/** @var \Doctrine\ORM\EntityManager $entityManager */
$entityManager = require __DIR__.'/../bootstrap.php';

use \Doctrine\ORM\Tools\Console\ConsoleRunner;

return ConsoleRunner::createHelperSet($entityManager);

