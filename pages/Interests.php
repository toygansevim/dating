<?php
session_start();

/**
 * Created by PhpStorm.
 * User:Toygan Sevim
 * Date: 1/29/18
 * Time: 4:03 PM
 *
 * This is a interests file that allow's the user to view the option's of
 * activities and choose their favorites*/

error_reporting(E_ALL);
ini_set("display_errors", TRUE);

echo print_r($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personal Interests Page</title>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css"
          integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy"
          crossorigin="anonymous">

    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>

<!--main container-->
<div class="container mx-auto px-0 ">

    <!--Navbar-->
    <nav class="navbar navbar-light border border-left-0 border-right-0 border-top-0 mb-2">
        <h1 class="navbar-brand mb-0">My Dating Website</h1>
    </nav>

    <!-- Main Content Section -->
    <div class="row">
        <div class="mx-5 container p-4 border border-secondary rounded">
            <!--            Heading-->
            <h1>Interests</h1>
            <hr>
            <form action="#" method="post">


                <!--Next button-->
                <div class="col-12">
                    <div class="text-right">
                        <input type="submit" value="Next >" name="submit"
                               class="btn btn-primary">
                    </div>
                </div>
                <!--div FOR FORM GROUPS -->
            </form>
            <!--End form-->
        </div>
    </div>
    <!--    END ROW-->

    <!--Bootstrap cdn's-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"
            integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4"
            crossorigin="anonymous"></script>
</body>
</html>