<?php
/**
 * Created by PhpStorm.
 * User: Toygan Sevim
 * Date: 1/29/18
 * Time: 4:02 PM
 *
 * This is the profile php file that allows the user to enter their
 * email - bio - state - seek options
 */

session_start();

echo "1";

error_reporting(E_ALL);
ini_set("display_errors", TRUE);

echo print_r($_POST);

//check post values and if there are values assign to session
if (isset($_POST['submit']) && !empty($_POST['fname'])
    && !empty($_POST['lname']) && !empty($_POST['age'])
    && !empty($_POST['gender']) && !empty($_POST['phone']))
{
    $_SESSION['fname'] = $_POST['fname'];
    $_SESSION['lname'] = $_POST['lname'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['phone'] = $_POST['phone'];
}
?>


<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Profile PAGE</title>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
          crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/styles.css">
<body>
<div class="container mx-auto px-0 ">

    <!--Navbar-->
    <nav class="navbar navbar-light border border-left-0 border-right-0 border-top-0 mb-2">
        <h1 class="navbar-brand mb-0">My Dating Website</h1>
    </nav>

    <div class="container">
        <div class="card mx-5 pt-5 px-4" id="main">
            <div class="card-block">
                <h2>Profile</h2>
                <hr>
                <form action="./interests" method="post">
                    <div class="row h-100">
                        <div class="col-md-6 justify-content-start" id="formInfo">
                            <div class="form-group">
                                <label for="inputEmail" class="font-weight-bold">Email</label>
                                <input type="email" class="form-control" name="inputEmail"
                                       id="inputEmail" aria-describedby="email"
                                       placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label for="inputState" class="font-weight-bold">State</label>
                                <select class="form-control mb-0"
                                        name="inputState" id="inputState">
                                    <option value="WASHINGTON">WASHINGTON</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gender"
                                       class="form-label font-weight-bold mb-0">Gender</label><br>
                                <check if="{{@errors['gender'] }}">
                                    <p class="text-danger">{{@errors['gender']}}</p>
                                </check>
                                <!--Male-->
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input mr-2" type="radio"
                                               name="gender" id="gender" value=""
                                        <check if="{{@gender == @gender}}">checked</check>
                                        >Male
                                    </label>
                                </div>

                                <!--Female-->
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input mr-2" type="radio"
                                               name="gender" value=""
                                        <check if="{{@gender == @gender}}">checked</check>
                                        > Female
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputBiography"
                                       class="font-weight-bold ">Biography</label>
                                <textarea class="form-control" name="inputBiography"
                                          id="inputBiography" rows="7"></textarea>
                            </div>
                            <div class="d-flex align-items-end justify-content-end w-100">
                                <button class="btn btn-primary" name="submit" id="submit">Next
                                    &gt;
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery.js"></script>

</body>
</html>