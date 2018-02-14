<?php
/**
 * Created by PhpStorm.
 * User: Toygan sevim
 * Date: 1/17/18
 * Time: 9:47 PM
 * This is the index page that starts fat free and defines a default route to our home.html page
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);

//define fat free
require_once('vendor/autoload.php');

session_start();


//create an instance of the base class
$f3 = Base::instance();

//define a default rote to render home.html
$f3->route('GET /', function ()
{

    $view = new View; //could be template too, ask
    echo $view->render('pages/home.html');
});

//activities
$f3->set("outdoorActivities", array("hiking", "biking", "swimming",
                                    "collecting",
                                    "walking", "climbing"));
$f3->set("indoorActivities", array("tv", "movies", "cooking", "board games", "puzzles", "reading",
                                   "playing cards", "video games"));

//Define a default route
$f3->route('GET|POST /pages/@pageName', function ($f3, $params)
{
    //should i be checking the post here or not?

    //should I not have switch statements?
    $primeMember = new PremiumMember("", "", "", "", "", "", "");

    switch ($params['pageName'])
    {
        case 'personal' :
            //if it is a post method request
            if ($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                if (isset($_POST['submit']))
                {
                    //echo print_r($_POST);
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $age = $_POST['age'];
                    $gender = $_POST['gender'];
                    $phone = $_POST['phone'];

                    $_SESSION['member'] = $_POST['member'];

                    if (isset($_POST['member']) && !empty($_POST['member']))
                    {
                        $primeMember->setFname($fname);
                        $primeMember->setLname($lname);
                        $primeMember->setAge($age);
                        $primeMember->setPhone($phone);
                        $primeMember->setGender($gender);

                        $_SESSION['primeMember'] = $primeMember;


                    } else
                    {
                        //create a not prime member account
                        $member = new Member($fname, $lname, $age, $gender, $phone);
                        $_SESSION['memberUser'] = $member;
                    }

                    include('model/validate.php');

                    $f3->set('member', $_SESSION['member']);
                    $f3->set('errors', $errors);
                    $f3->set('success', $success);

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

                        $f3->reroute('./profile');
                    }

                }

            } else if ($_SERVER['REQUEST_METHOD'] === 'GET')
            {
                echo Template::instance()->render("pages/personal_info.html");
            }
            break;

        case 'profile':
            if ($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                if (isset($_POST['submit']))
                {
                    $email = $_POST['email'];
                    $state = $_POST['state'];
                    $genderLook = $_POST['genderLook'];
                    $biography = $_POST['biography'];

                    include('model/validateProfile.php');

                    $f3->set('errorsProfile', $errorsProfile);

                    if (sizeof($errorsProfile) > 0)
                    {
                        $f3->set('email', $email);
                        $f3->set('state', $state);
                        $f3->set('genderLook', $genderLook);
                        $f3->set('biography', $biography);

                        echo Template::instance()->render("pages/profile.php");
                    } else
                    {
                        $_SESSION['email'] = $email;
                        $_SESSION['state'] = $state;
                        $_SESSION['genderLook'] = $genderLook;
                        $_SESSION['biography'] = $biography;

                        if (isset($_SESSION['member']) && !empty($_SESSION['member']))
                        {
                            $f3->reroute('./interests');
                        } else
                        {
                            $f3->reroute('./results');
                        }
                    }
                }
            } else if ($_SERVER['REQUEST_METHOD'] === 'GET')
            {
                echo Template::instance()->render('pages/profile.php');
            }
            break;

        default:
            $f3->error(404);
    }
});

/*
$f3->route('GET|POST /pages/profile',
    function ($f3)
    {

    }

);*/

//define a default rote to render home.html

$f3->route('GET|POST /pages/interests', function ($f3)
{

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        if (isset($_POST['submit']))
        {
            $chosenOutdoorActivities = $_POST['outdoorActivities'];
            $chosenIndoorActivities = $_POST['indoorActivities'];

            include('model/validate.php');

            $f3->set('errors', $errors);
            $f3->set('success', $success);

            if (isset($errors['indoorActivities']) || isset($errors['outdoorActivities']))
            {
                $f3->set('chosenIndoorActivities', $chosenIndoorActivities);
                $f3->set('chosenOutdoorActivities', $chosenOutdoorActivities);

                echo Template::instance()->render('pages/Interests.php');
            } else
            {

                //INSANTIATE THE OBJECT AGAIN FROM SESSION AND ASSIGN VALUES
                $primeMember = $_SESSION['primeMember'];
                $primeMember->setIndoorActivities($chosenIndoorActivities);
                $primeMember->setOutdoorActivities($chosenOutdoorActivities);

                $_SESSION['indoorActivities'] = $chosenIndoorActivities;
                $_SESSION['outdoorActivities'] = $chosenOutdoorActivities;

                //set it back to the session var
                $_SESSION['primeMember'] = $primeMember;

                $f3->reroute('./results');
            }
        }
    } else if ($_SERVER['REQUEST_METHOD'] === 'GET')
    {
        echo Template::instance()->render('pages/Interests.php');
    }
});

//define a default rote to render home.html
$f3->route('GET|POST /pages/results', function ($f3)
{
    $primeMember = $_SESSION['primeMember'];

    echo "<pre>" . print_r($primeMember) . "</pre>";

    if (isset($_SESSION) && !empty($_SESSION))
    {
        $f3->set('fname', $_SESSION['fname']);
        $f3->set('lname', $_SESSION['lname']);
        $f3->set('gender', $_SESSION['gender']);
        $f3->set('age', $_SESSION['age']);
        $f3->set('phone', $_SESSION['phone']);
        $f3->set('email', $_SESSION['email']);
        $f3->set('state', $_SESSION['state']);
        $f3->set('biography', $_SESSION['biography']);
        $f3->set('genderLook', $_SESSION['genderLook']);
        $f3->set('outdoorActivities', $_SESSION['outdoorActivities']);
        $f3->set('indoorActivities', $_SESSION['indoorActivities']);

        $combineActivities = array_merge($_SESSION['outdoorActivities'], $_SESSION['indoorActivities']);

        $f3->set('combineActivities', $combineActivities);

    }
    echo Template::instance()->render("pages/results.php");

});

///fatfree enable error reporting
$f3->set('DEBUG', 3); // highest is 3 lowest 0;

//run fat free
$f3->run();