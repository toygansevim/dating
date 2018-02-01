<!--
Toygan Sevim
personal_info.html
Jan 30 / 18
This page gathers personal primary information from the user and validates the
class.
-->

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dating Site</title>
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

    <!-- Main Content Section -->
    <div class="row">
        <div class="mx-5 container p-4 border border-secondary rounded">
            <h1>Personal Information</h1>
            <hr>

            <form action="#" method="POST">
                <div class="row">

                    <!--Placed outside col-8 to lower privacy policy visually-->
                    <div class="col-12">
                        <label for="fname" class="form-label font-weight-bold mb-1">First
                            Name</label>
                    </div>

                    <!--Most inputs except phone number-->
                    <div class="col-8">

                        <?php if ($errors['fname']): ?>
                            <p class="text-danger"><?= ($errors['fname']) ?></p>
                        <?php endif; ?>
                        <!--First Name-->
                        <input class="form-control mb-2" type="text" value="<?= ($fname) ?>" name="fname"
                               id="fname"
                               minlength="1">

                        <!--Last Nae-->
                        <label for="lname" class="form-label font-weight-bold mb-1">Last
                            Name</label>
                        <input class="form-control mb-2" type="text" value="" name="lname"
                               id="lname"
                               minlength="1">

                        <!--Age-->
                        <label for="age" class="form-label font-weight-bold mb-1">Age</label>
                        <input class="form-control mb-2" type="number" value="" name="age" id="age"
                               min="18" max="101">

                        <label for="gender" class="form-label font-weight-bold mb-0">Gender</label><br>
                        <!--Male-->
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input mr-2" type="radio"
                                       name="gender" id="gender" value="">  Male
                            </label>
                        </div>

                        <!--Female-->
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input mr-2" type="radio"
                                       name="gender" value=""> Female
                            </label>
                        </div>

                    </div> <!--<div class="col-8">-->

                    <!-- Privacy Policy -->
                    <div class="col-4 pt4">
                        <div class="text-center rounded border border-secondary  px-2 py-2">
                            <strong>Note:</strong> All our information entered is protected by our
                            <span class="text-primary">privacy policy</span>. Profile information
                            can only be viewed by others with your permission.
                        </div>
                    </div> <!--div class="col-4"-->

                    <!--Phone Number-->
                    <div class="col-8">
                        <label for="phone" class="form-label font-weight-bold mb-1">Phone
                            Number</label>
                        <input class="form-control" type="text" value="" id="phone" name="phone"
                               required pattern="[0-9]{10}">
                    </div> <!--div class="col-4"-->


                    <!--Submit Button-->
                    <div class="col-4">
                        <div class="text-right">
                            <input type="submit" value="Next >" name="submit"
                                   class="btn btn-primary my-4">
                        </div>
                    </div> <!--div class="col-4"-->

                </div> <!--<div class="row">-->
            </form> <!--End form-->
        </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery.js"></script>
</div>
</body>
</html>