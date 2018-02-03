

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
                <form action="#" method="post">
                    <div class="row h-100">
                        <div class="col-md-6 justify-content-start">
                            <div class="form-group">

                                <label for="email" class="font-weight-bold">Email</label>
                                <?php if ($errorsProfileProfile['email']): ?>
                                    <p class="text-danger"><?= ($errorsProfile['email']) ?></p>
                                <?php endif; ?>
                                <input type="email" class="form-control" name="email"
                                       id="email" aria-describedby="email"
                                       placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label for="state" class="font-weight-bold">State</label>
                                <?php if ($errorsProfile['state']): ?>
                                    <p class="text-danger"><?= ($errorsProfile['state']) ?></p>
                                <?php endif; ?>

                                <select class="form-control mb-0"
                                        name="state" id="state">
                                    <option value="WASHINGTON">WASHINGTON</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="genderLook"
                                       class="form-label font-weight-bold mb-0">Gender</label><br>
                                <?php if ($errorsProfile['genderLook']): ?>
                                    <p class="text-danger"><?= ($errorsProfile['genderLook']) ?></p>
                                <?php endif; ?>
                                <!--Male-->
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input mr-2" type="radio"
                                               name="genderLook" id="genderLook" value="male"
                                        <?php if ($genderLook == 'male'): ?>checked<?php endif; ?>
                                        >Male
                                    </label>
                                </div>

                                <!--Female-->
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input mr-2" type="radio"
                                               name="genderLook" value="female"
                                        <?php if ($genderLook == 'female'): ?>checked<?php endif; ?>
                                        > Female
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="biography"
                                       class="font-weight-bold">Biography</label>
                                <?php if ($errorsProfile['biography']): ?>
                                    <p class="text-danger"><?= ($errorsProfile['biography']) ?></p>
                                <?php endif; ?>
                                <textarea class="form-control" name="biography"
                                          id="biography" rows="7"></textarea>
                            </div>
                            <div class="d-flex align-items-end justify-content-end w-100">
                                <button class="btn btn-primary" name="submit" id="submit">Next &gt;
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