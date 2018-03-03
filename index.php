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
//Connect to the database

$DBobject = new databaseFunctions();
$conn = $DBobject->connect();

///fatfree enable error reporting
$f3->set('DEBUG', 3); // highest is 3 lowest 0;

//activities
$outdoorActivities = array("hiking", "biking", "swimming",
                           "collecting",
                           "walking", "climbing");
$indoorActivities = array("tv", "movies", "cooking", "board games", "puzzles", "reading",
                          "playing cards", "video games");

$f3->set('outdoorActivities', $outdoorActivities);
$f3->set('indoorActivities', $indoorActivities);

//define a default rote to render home.html
$f3->route('GET /', function ()
{
    $view = new View; //could be template too, ask
    echo $view->render('pages/home.html');
});

//Define a default route
$f3->route('GET|POST /pages/@pageName', function ($f3, $params)
{
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

                    //this is the value coming that user wants to be a prime member
                    $_SESSION['selectedMember'] = $_POST['selectedMember'];

                    //if selected above user becomes a prime member
                    if (isset($_POST['selectedMember']) && !empty($_POST['selectedMember']))
                    {
                        $primeMember = new PremiumMember($fname, $lname, $age, $gender, $phone, "",
                            "");
                        $_SESSION['primeMember'] = $primeMember;

                    } else
                    {
                        //create a not prime member account
                        $member = new Member($fname, $lname, $age, $gender, $phone);
                        $_SESSION['memberUser'] = $member;
                    }

                    include 'model/validate.php';

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
                        $_SESSION['fname'] = $fname;
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
                    if (isset($_SESSION['selectedMember']))
                    {
                        $member = $_SESSION['primeMember'];
                    } else
                    {
                        $member = $_SESSION['memberUser'];
                    }

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

                        //set values
                        $member->setEmail($email);
                        $member->setState($state);
                        $member->setSeeking($genderLook);
                        $member->setBio($biography);


                        if (isset($_SESSION['selectedMember']) && !empty($_SESSION['selectedMember']))
                        {
                            $_SESSION['primeMember'] = $member;
                            $f3->reroute('./interests');
                        } else
                        {
                            $_SESSION['memberUser'] = $member;
                            $f3->reroute('./results');
                        }
                    }
                }
            } else if ($_SERVER['REQUEST_METHOD'] === 'GET')
            {
                echo Template::instance()->render('pages/profile.php');
            }

            break;
        case 'interests':
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
            break;
        default:
            $f3->error(404);
    }
});

//define a default rote to render home.html
$f3->route('GET|POST /pages/results', function ($f3)
{
    global $DBobject;
    include "model/sanityCheck.php";

    if (isset($_SESSION['selectedMember']))
    {
        $memberUser = $_SESSION['primeMember'];
        $userPrime = true;
        $f3->set('selectedMember', 'selectedMember');
    } else
    {
        $userPrime = false;
        $memberUser = $_SESSION['memberUser'];

    }
    $f3->set('userPrime', $userPrime);

    if (isset($_SESSION['indoorActivities']) && isset($_SESSION['outdoorActivities']) &&
        $_SESSION['selectedMember'])
    {
        $combineActivities = array_merge($_SESSION['outdoorActivities'], $_SESSION['indoorActivities']);
        $f3->set('combineActivities', $combineActivities);

    }
    $fname = exists($memberUser->getFname()) ? $memberUser->getFname() : $_SESSION['fname'];
    $lname = exists($memberUser->getLname()) ? $memberUser->getLname() : $_SESSION['lname'];
    $age = exists($memberUser->getAge()) ? $memberUser->getAge() : $_SESSION['age'];
    $gender = exists($memberUser->getGender()) ? $memberUser->getGender() : $_SESSION['gender'];
    $seek = exists($memberUser->getSeeking()) ? $memberUser->getSeeking() : $_SESSION['genderLook'];
    $phone = exists($memberUser->getPhone()) ? $memberUser->getPhone() : $_SESSION['phone'];
    $email = exists($memberUser->getEmail()) ? $memberUser->getEmail() : $_SESSION['email'];
    $state = exists($memberUser->getState()) ? $memberUser->getState() : $_SESSION['state'];
    $bio = exists($memberUser->getBio()) ? $memberUser->getBio() : $_SESSION['biography'];

    $genderInitial = strtoupper(substr($gender, 0, 1));
    $seekInitial = strtoupper(substr($seek, 0, 1));
    $stateTag = strtoupper(substr($state, 0, 2));

    $DBobject->addAccount($fname, $lname, $genderInitial, $seekInitial,
        $email, $age, $phone, implode(",", $combineActivities),
        $bio, $userPrime, $stateTag, NULL);

    echo "<pre>";
    print_r($memberUser);
    echo "</pre>";


    echo Template::instance()->render("pages/results.php");

});

$f3->route('GET|POST /pages/admin', function ($f3, $params)
{

    global $DBobject;

    $members = $DBobject->displayMembers();

    $f3->set('members', $members);

    echo Template::instance()->render('pages/admin.html');

});


//run fat free
$f3->run();