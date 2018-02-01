


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
    <link rel="stylesheet" href="styles/styles.css">
<body>
<div class="container mx-auto px-0 ">

    <!--Navbar-->
    <nav class="navbar navbar-light border border-left-0 border-right-0 border-top-0 mb-2">
        <h1 class="navbar-brand mb-0">My Dating Website</h1>
    </nav>

    <div class="container">
        <div class="card mx-auto" id="main">
            <div class="card-block">
                <h2>Profile</h2>
                <hr>
                <form action="../dating/interests" method="post">
                    <div class="row h-100">
                        <div class="col-md-6 justify-content-start" id="formInfo">
                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input type="email" class="form-control" name="inputEmail" id="inputEmail" aria-describedby="email" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label for="inputState">State</label>
                                <select class="form-control" name="inputState" id="inputState">
                                    <option value="WASHINGTON">WASHINGTON</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Seeking</label>
                                <br>
                                <div class="container" id="genderGroup">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="seeking" id="male" value="male">
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline" id="femaleGroup">
                                        <input class="form-check-input" type="radio" name="seeking" id="female" value="female">
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputBiography">Biography</label>
                                <textarea class="form-control" name="inputBiography" id="inputBiography" rows="7"></textarea>
                            </div>
                            <div class="d-flex align-items-end justify-content-end w-100">
                                <button class="btn btn-primary" name="submit" id="submit">Next &gt;</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
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