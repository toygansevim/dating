

<!--Toygan Sevim
    Home.html
    This is the main page of my dating site that allows users to join and the default route of the site
    Jan 17 / 2018
-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Dating Page</title>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css"
          integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy"
          crossorigin="anonymous">

    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>

<!--Navbar-->
<nav class="navbar navbar-light border border-left-0 border-right-0 border-top-0 mb-2">
    <h1 class="navbar-brand mb-0">My Dating Website</h1>
</nav>
<div class="container">
    <div class="card mx-auto" id="main">
        <div class="card-block mx-4 my-3">
            <div class="row">
                <div class="col-md-6 justify-content-start ">

                    <table class="table table-bordered">
                        <tbody>
                        <tr class="">
                            <td>Name: <?= (exists($fname) ? $fname : '') ?> </td>
                        </tr>
                        <tr>
                            <td>Gender: <?= (exists($gender) ? $gender : '') ?></td>
                        </tr>
                        <tr>
                            <td>Age: <?= (exists($age) ? $age : '') ?></td>
                        </tr>
                        <tr>
                            <td>Phone: <?= (exists($phone) ? $phone : '') ?></td>
                        </tr>
                        <tr>
                            <td>Email: <?= (exists($email) ? $email : '') ?></td>
                        </tr>
                        <tr>
                            <td>State: <?= (exists($state) ? $state : '') ?></td>
                        </tr>
                        <tr>
                            <td>Seeking: <?= (exists($genderLook) ? $genderLook : '') ?></td>
                        </tr>
                        <tr>
                            <?php if ($selectedMember == 'selectedMember'): ?>
                                
                                    <td>Interests:
                                        <?php foreach (($combineActivities?:[]) as $value): ?><?= ($value)."
" ?>
                                        <?php endforeach; ?>
                                    </td>
                                
                            <?php endif; ?>

                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">

                    <img src="../images/dateBio.jpeg" alt="account image" id="userImage">

                    <div class="container justify-content-center text-center">
                        <h3>Biography</h3>
                        <p>
                            <?= (exists($biography) ? $biography : '')."
" ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="d-flex mx-auto justify-content-center">
                <button class="btn btn-primary">Contact Me!</button>
            </div>
        </div>
    </div>
</div>

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