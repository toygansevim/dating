<?php
/**
 * Created by PhpStorm.
 * User: Toygan Sevim
 * Date: 2018/1/25
 * Time: 14:48
 */

//define arrays
$errors = array();

$outdoorActivities = $f3->get('outdoorActivities');
$indoorActivities = $f3->get('indoorActivities');

/**
 * @param $str
 * @return bool
 */
function validString($str)
{
    return !empty($str) && ctype_alpha($str) && !is_numeric($str);
}

/**
 * @param $gender
 * @return bool
 */
function validGender($gender)
{
    return isset($gender);

}

/**
 * @param $age
 * @return bool
 */
function validAge($age)
{

    if (!empty($age) && is_numeric($age) && $age >= 18)
    {
        return true;
    }
    return false;
}

/**
 * checks to see that a phone phone is valid
 * @param $phone phone of the user
 * @return bool true if a valid phone
 */
function validPhone($phone)
{
    //are there 11 numbers? no nothing else
    if (!empty($phone) && is_numeric($phone))
    {
        return true;
    } else
    {
        return false;
    }
}

/**
 * checks each selected outdoor interest against a list of valid
 * option
 * @param $outdoorActivities
 * @return bool
 */
function validOutdoor($outdoorActivities, $chosenOutdoorActivities)
{
    if (empty($chosenOutdoorActivities))
    {
        return false;
    }
    foreach ($chosenOutdoorActivities as $chosenOutdoorActivity)
    {
        if (!in_array($chosenOutdoorActivity, $outdoorActivities)) return false;
    }
    return true;
}

/**
 * @param $indoorActivities
 * @return bool
 */
function validIndoor($indoorActivities, $chosenIndoorActivities)
{
    if (empty($chosenIndoorActivities))
    {
        return false;
    }
    foreach ($chosenIndoorActivities as $chosenIndoorActivity)
    {
        if (!in_array($chosenIndoorActivity, $indoorActivities)) return false;
    }
    return true;
}


/**
 * Premium Member selection validation
 */

function isMember($member)
{
    return isset($member) && !empty($member);
}


//checking name values
if (!validString($fname))
{
    $errors['fname'] = "Please enter a first name.";
}

if (!validString($lname))
{
    $errors['lname'] = "Please enter a last name.";
}

if (!validOutdoor($outdoorActivities, $chosenOutdoorActivities))
{
    $errors['outdoorActivities'] = "Please choose a valid outdoor activity for your profile.";
}
if (!validIndoor($indoorActivities, $chosenIndoorActivities))
{
    $errors['indoorActivities'] = "Please choose a valid indoor activities for your profile.";
}
if (!validPhone($phone))
{
    $errors['phone'] = "Please enter a valid phone number without anything else. Ex: 1231231122";
}

if (!validAge($age))
{
    $errors['age'] = "You must have a valid and eligible age to date.";
}
//gender validation check
if (!validGender($gender))
{
    $errors['gender'] = "Please provide a gender binary selection.";
}
$success = sizeof($errors) == 0;


//extra Error reporting if ever needed

/*ini_set('display_errors',0);
// Deprecated directives
@ini_set('magic_quotes_gpc',0);
@ini_set('register_globals',0);
// Abort on startup error
// Intercept errors/exceptions; PHP5.3-compatible
error_reporting(E_ALL|E_STRICT);
//$f3=$this;
set_exception_handler(
    function($obj) use($f3) {
        $f3->error(500,$obj->getmessage(),$obj->gettrace());
    }
);
set_error_handler(
    function($code,$text) use($f3)
    {
        if (error_reporting())
        {
                       $f3->error(500,$text);
            //echo "NOPE"}
        }
    });*/

