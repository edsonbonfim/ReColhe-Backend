<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS, POST');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');

session_start();

function dd($dump)
{
	echo "<pre>";
	var_dump($dump);
	die();
}

function flash($key)
{
    if (!isset($_SESSION['flash'][$key])) {
        $message = $_SESSION['flash'][$key];
    }

    unset($_SESSION['flash'][$key]);

    return $message ?? '';
}

function exception_handler($exception)
{
    die("{$exception->getMessage()} in {$exception->getFile()} on line {$exception->getLine()}");
}

set_exception_handler('exception_handler');

chdir(dirname(__DIR__));

include getcwd() . '/bootstrap/app.php';
