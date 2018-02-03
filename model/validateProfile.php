<?php
/**
 * Created by PhpStorm.
 * User: toygan
 * Date: 2/2/18
 * Time: 7:40 PM
 */
function validEmail($email)
{
    return true;
    //return preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;
    //]*[-a-z0-9+&@#\/%=~_|]/i", $email);
}

/**
 * @param $gender
 * @return bool
 */
function validGender($gender)
{
    return isset($gender);

}

if(empty($biograpgy))
{
    $errorsProfile['biography'] = "Please enter a bio";
}


if(!validEmail($email))
{
    $errorsProfile['email'] = "Please enter a valid e-mail address";
}

if(!isset($state))
{
    $errorsProfile['state'] = "Please provide your state";
}

if(!validGender($genderLook))
{
    $errorsProfile['genderLook'] = "Please provide a binary choice of attraction ";
}
