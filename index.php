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
ini_set("display_errors", 1);

//define fat free
require_once('vendor/autoload.php');

//create an instance of the base class
$f3 = Base::instance();

//define a default rote to render home.html
$f3->route('GET /', function ()
{

    $view = new View; //could be template too, ask
    echo $view->render('pages/home.html');

});

//activities
$f3->set("outdoorActivities", array("hiking", "biking", "swimming", "collecting", "walking", "climbing"));
$f3->set('indoorActivities', array("tv", "movies", "cooking", "board games", "puzzles", "reading",
                                   "playing cards", "video games"));


//Define a default route
$f3->route('GET|POST /pages/@pageName', function ($f3, $params)
{

    require('model/validate.php');

    //should i be checking the post here or not?

    //should I not have switch statements?

    switch ($params['pageName'])
    {
        case 'personal' :

            //should i be checking these here or below or above?
            if (isset($_POST['submit']))
            {
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $age = $_POST['age'];
                $gender = $_POST['gender'];
                $phone = $_POST['phone'];

                include('model/validate.php');

                $f3->set('fname', $fname);
                $f3->set('lname', $lname);
                $f3->set('age', $age);
                $f3->set('gender', $gender);
                $f3->set('phone', $phone);

            }


            //include the validation


            echo Template::instance()->render('pages/personal_info.html');
            break;

        case 'profile' :
            echo Template::instance()->render('pages/profile.php');
            break;

        case 'interests':
            echo Template::instance()->render('pages/Interests.php');
            break;

        case 'results':
            echo Template::instance()->render('pages/results.php');
            /*
                        if(isset($_POST['submit']))
                        {
                            //define variables
                            $color = $_POST['pet-color'];
                            $name = $_POST['pet-name'];
                            $type = $_POST['pet-type'];

                            include('model/validate.php');

                            $f3->set('color', $color);
                            $f3->set('name', $name);
                            $f3->set('type', $type);
                            $f3->set('errors', $errors);
                            $f3->set('success', $success);
                        }*/
            break;

        default:
            $f3->error(404);
    }
});

///fatfree enable error reporting
$f3->set('DEBUG', 3); // highest is 3 lowest 0;

//run fat free
$f3->run();

