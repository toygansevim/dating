<?php
/**
 * Created by PhpStorm.
 * User: Toygan Sevim
 * Date: 2018/1/25
 * Time: 14:48
 */

//define arrays
global $errors;
$errors = array();


/*VALIDATE NAMES*/

/**
 * @param $str
 * @return bool
 */
function validString($str)
{
    return !empty($str) && ctype_alpha($str);
}

if (!validString($fname)) {
    $errors['fname'] = "Please enter a first name.";
}

if (!validString($lname))
{
    $errors['lname'] = "Please enter a last name.";
}

/**
 * @param $age
 * @return bool
 */
function validAge($age)
{
    global $errors;

    //if not old enough let them know
    if (!empty($age) && $age < 18)
    {

        $errors['age'] = "You must be older than 18 to apply!";
        return false;
    }
    //valid criterias
    if (!empty($age) && is_numeric($age) && $age >= 18)
    {
        return true;
    } //invalid, pass the error message
    else
    {
        $errors['age'] = "Please enter a valid age.";
        return false;
    }

}

/**
 * checks to see that a phone phone is valid
 * @param $phone phone of the user
 * @return bool true if a valid phone
 */
function validPhone($phone)
{
    global $errors;

    //are there 11 numbers? no nothing else
    if (!empty($phone) && is_numeric($phone) && sizeof($phone) == 11)
    {
        return true;
    } else
    {
        $errors['phone'] = "Please enter a valid phone number without anything else. Ex: 1231231122";
        return false;
    }

}

/**
 * checks each selected outdoor interest against a list of valid
 * option
 * @param $outdoorActivities
 * @return bool
 */
function validOutdoor($outdoorActivities)
{
    global $f3;
    return in_array($outdoorActivities, $f3->get('outdoorActivities'));
}

/**
 * @param $indoorActivities
 * @return bool
 */
function validIndoor($indoorActivities)
{
    global $f3;
    return in_array($indoorActivities, $f3->get('indoorActivities'));
}

if (!validOutdoor($outdoorActivities))
{
    $errors['outdoorActivities'] = "Please choose a valid outdoor activity for your profile.";
}
if (!validOutdoor($indoorActivities))
{
    $errors['indoorActivities'] = "Please choose a valid indoor activities for your profile.";
}

//gender validation check
if(!isset($gender) && empty($gender))
{
    $errors['gender'] = "Please provide a gender binary selection.";
}

print_r($errors);

//$success = true;
$success = sizeof($errors) == 0;

