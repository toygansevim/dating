<?php
/**
 * Created by PhpStorm.
 * User: Toygan Sevim
 * Date: 2018/1/25
 * Time: 14:48
 */

//define arrays
$errors = array();

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

//checking name values
if (!validString($fname))
{
    $errors['fname'] = "Please enter a first name.";
}

if (!validString($lname))
{
    $errors['lname'] = "Please enter a last name.";
}

if (!validOutdoor($outdoorActivities))
{
    $errors['outdoorActivities'] = "Please choose a valid outdoor activity for your profile.";
}
if (!validOutdoor($indoorActivities))
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

echo print_r($errors);
//$success = true;
$success = sizeof($errors) == 0;

