<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

function debug($str) 
{
    print_r($str);
	exit;
}