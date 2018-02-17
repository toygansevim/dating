<?php
/**
 * Created by PhpStorm.
 * User: toygan
 * Date: 2/15/18
 * Time: 1:16 PM
 */

//This file checks for sanity

function exists(&$variable)
{
    return isset($variable) && !empty($variable);
}


