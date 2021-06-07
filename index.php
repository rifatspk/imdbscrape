<?php
require_once './imdb_movies.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ImDB top Movies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="my-3"></div>
    <h3 class="container text-center">IMDb Top 250 Movie List</h3>
    <div class="my-3"></div>


    <div class="container">
        <div class="row">
            <?php foreach ($allMovies as $movie) : ?>
                <div class="col-md-2 my-3">
                    <div class="card">
                        <img src="<?php echo $movie['moviePoster'] ?>" class="card-img-top" alt="<?php echo $movie['movieName'] ?>">
                        <div class="card-body">
                            <p><strong><?php echo $movie['serialNo'] ?></strong></p>
                            <h5 class="card-title"><?php echo $movie['movieName'] ?></h5>
                            <p><strong> Year: </strong> <?php echo $movie['movieRelease'] ?></p>
                            <p> <strong> Rating: </strong> <?php echo $movie['movieRating'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>