

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
            <form action="./results" method="POST">
                <!-- INDOOR INTERESTS-->
                <div class="form-group">
                    <label>Indoor Interests</label>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="tv">
                                <label class="form-check-label" for="tv">
                                    tv
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=""
                                       id="puzzles">
                                <label class="form-check-label" for="puzzles">
                                    puzzles
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=""
                                       id="movies">
                                <label class="form-check-label" for="movies">
                                    movies
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=""
                                       id="reading">
                                <label class="form-check-label" for="reading">
                                    reading
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=""
                                       id="cooking">
                                <label class="form-check-label" for="cooking">
                                    cooking
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=""
                                       id="playingCards">
                                <label class="form-check-label" for="playingCards">
                                    playing cards
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=""
                                       id="boardGames">
                                <label class="form-check-label" for="boardGames">
                                    board games
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=""
                                       id="videoGames">
                                <label class="form-check-label" for="video games">
                                    video games
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!--OutDOOR INTERESTS-->
                <div class="form-group">
                    <label>Out-door Interests</label>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=""
                                       id="hiking">
                                <label class="form-check-label" for="hiking">
                                    hiking
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=""
                                       id="walking">
                                <label class="form-check-label" for="walking">
                                    walking
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=""
                                       id="biking">
                                <label class="form-check-label" for="biking">
                                    biking
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=""
                                       id="climbing">
                                <label class="form-check-label" for="climbing">
                                    climbing
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=""
                                       id="swimming">
                                <label class="form-check-label" for="swimming">
                                    swimming
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=""
                                       id="collecting">
                                <label class="form-check-label" for="collecting">
                                    collecting
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

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