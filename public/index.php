<?php

$loader= require '../vendor/autoload.php';
$loader->register();

\Core\Boot::boot()->run();