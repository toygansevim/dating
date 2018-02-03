<?php
/**
 * Created by PhpStorm.
 * User: Toygan sevim
 * Date: 1/17/18
 * Time: 9:47 PM
 * This is the index page that starts fat free and defines a default route to our home.html page
 */

session_start();
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
    //should i be checking the post here or not?

    //should I not have switch statements?

    switch ($params['pageName'])
    {
        case 'personal' :
            //if it is a post method request
            if ($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                if (isset($_POST['submit']))
                {
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $age = $_POST['age'];
                    $gender = $_POST['gender'];
                    $phone = $_POST['phone'];


                    include('model/validate.php');


                    $f3->set('errors', $errors);
                    $f3->set('success', $success);

                    //include('model/validate.php');

                    if (sizeof($errors) > 2)
                    {
                        $f3->set('fname', $fname);
                        $f3->set('lname', $lname);
                        $f3->set('age', $age);
                        $f3->set('gender', $gender);
                        $f3->set('phone', $phone);

                        echo Template::instance()->render('pages/personal_info.html');

                    } else
                    {
                        $_SESSION['fname'] = $_POST['fname'];
                        $_SESSION['lname'] = $lname;
                        $_SESSION['age'] = $age;
                        $_SESSION['gender'] = $gender;
                        $_SESSION['phone'] = $phone;

                        $f3->reroute('/pages/profile');

                    }

                }

            } else if ($_SERVER['REQUEST_METHOD'] === 'GET')
            {
                echo Template::instance()->render("pages/personal_info.html");
            }
            break;


        case 'interests':
            echo Template::instance()->render('pages/Interests.php');
            break;

        default:
            $f3->error(404);
    }
});


$f3->route('GET|POST /pages/profile',
    function ($f3)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            if (isset($_POST['submit']))
            {
                $email = $_POST['email'];
                $state = $_POST['state'];
                $genderLook = $_POST['$genderLook'];
                $biography = $_POST['biography'];

                $f3->set('errorsProfile', $errorsProfile);

                include('model/validateProfile.php');

                echo print_r($errorsProfile);
                echo sizeof($errorsProfile);
                if (sizeof($errorsProfile) > 2)
                {
                    $f3->set('email', $email);
                    $f3->set('state', $state);
                    $f3->set('genderLook', $genderLook);
                    $f3->set('biography', $biography);
                } else
                {
                    $_SESSION['email'] = $email;
                    $_SESSION['state'] = $state;
                    $_SESSION['genderLook'] = $genderLook;
                    $_SESSION['biography'] = $biography;

                    $f3->reroute('/pages/interests');
                }
            }
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET')
        {
            echo Template::instance()->render('pages/profile.php');
        }
    }

);
//define a default rote to render home.html

//define a default rote to render home.html
$f3->route('GET|POST /pages/results', function ($f3)
{
    echo print_r($_SESSION);

    error_reporting(E_ALL);
    ini_set("display_errors", TRUE);
    if (!empty($_SESSION))
    {
        $fname = $_SESSION['fname'];
        $_SESSION['gender'] = $gender;
        $_SESSION['age'] = $age;
        $_SESSION['phone'] = $phone;
        $_SESSION['email'] = $email;
        $_SESSION['state'] = $state;
        $_SESSION['genderLook'] = $genderLook;
    }

    // echo print_r($_SESSION);
    echo Template::instance()->render("pages/results.php");

});

///fatfree enable error reporting
$f3->set('DEBUG', 3); // highest is 3 lowest 0;

//run fat free
$f3->run();