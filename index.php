<?php
/**
 * Created by PhpStorm.
 * User: Toygan sevim
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

//Define a default route
$f3->route('GET /pages/@pageName', function ($f3, $params)
{
    switch ($params['pageName'])
    {
        case 'personal' :
            echo Template::instance()->render('pages/personal_info.html');
            break;

        case 'profile' :
            echo Template::instance()->render('pages/profile.php');
            break;

        case 'interest':
            echo Template::instance()->render('pages/Interests.php');
            break;

        case 'results':
            echo Template::instance()->render('pages/results.php');
            break;

        default:
            $f3->error(404);
    }
});

///fatfree enable error reporting
$f3->set('DEBUG',3); // highest is 3 lowest 0;

//run fat free
$f3->run();

