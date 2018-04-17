<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
require_once(__DIR__ . '/public/index.php');

$em = $app['orm.em'];
return ConsoleRunner::createHelperSet($em);
