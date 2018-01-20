<?php
/**
 * Created by PhpStorm.
 * User: toygan sevim
 * Date: 1/17/18
 * Time: 9:47 PM
 * This is the index page that starts fat free and defines a default route to our home.html page
 */

//error reporting
error_reporting(E_ALL);
ini_set("display_errors",1);

//define fat free
require_once ('vendor/autoload.php');

//create an instance of the base class
$f3 = Base::instance();

//define a default rote to render home.html
$f3->route('GET /', function (){

    $view = new View; //could be template too, ask
    echo $view->render('pages/home.html');

});

///fatfree enable error reporting
$f3->set('DEBUG',3); // highest is 3 lowest 0;

//run fat free
$f3->run();

