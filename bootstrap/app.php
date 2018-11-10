<?php

include 'vendor/autoload.php';

class_alias('Sketch\Http\Route', 'Route');
class_alias('Sketch\Http\Request', 'Request');
class_alias('Sketch\Database\Model', 'Model');

function assign($key, $value)
{
    Sketch\View\Tpl::assign($key, $value);
}

function render($view)
{
    Sketch\View\Tpl::render("View/$view");
}


include 'config/Model.php';
include 'config/View.php';
include 'app/app.php';