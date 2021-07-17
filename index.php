<?php

require __DIR__ . '/application/core/debug.php'; 
require __DIR__ . '/application/config/config.php';
require __DIR__ . '/application/config/autoload.php';


(new application\core\Router)->run();

