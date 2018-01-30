<?php
/**
 * Created by PhpStorm.
 * User: Jason
 * Date: 2018/1/25
 * Time: 14:48
 */

$errors = array();

/**
 * @param $color
 * @return boolean
 */
function validColor($color)
{
    global $f3;
    return in_array($color, $f3->get('colors'));
}

/**
 * @param $str
 * @return bool
 */
function validString($str)
{
    return !empty($str) && ctype_alpha($str);
}


if (!validColor($color)) {
    $errors['color'] = "Please enter a valid color.";
}

if (!validString($name)) {
    $errors['name'] = "Please enter a valid name.";
}

if (!validString($type)) {
    $errors['type'] = "Please enter a valid type.";
}

//$success = true;
$success = sizeof($errors) == 0;