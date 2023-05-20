<?php
include_once('connection/connect.php')
?>
<!doctype html>
<html lang="en">

<head>
    <title>Maju Task 1</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<style>
    .navbar {
        background-color: transparent !important;
    }

    .nav-link .login:hover {
        color: black;
    }
</style>


<body>

    <section class="head">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/carosul1.jpg" height="620vh" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/carosul3.jpg" height="620vh" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/carosul.jpg" height="620vh" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top">
            <div class="container">
                <a class="navbar-brand" href="Index.php"><img src="images/logo-removebg-preview.png" height="70px" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <form class="d-flex">
                        <div class="input-group">
                            <input type="text" placeholder="Tacos,Dinner" class="form-control">
                            <input type="text" placeholder="Karachi Pakistan" class="form-control">
                        </div>
                        <button class="btn btn-danger" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>

                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="resturant.php">Restaurants</a>
                        </li>&nbsp;&nbsp;
                        <li class="nav-item">
                            <?php
                            if (empty($_SESSION['user_role'])) { ?>
                                <a class="nav-link text-white" href="login.php">Write a review</a>
                            <?php }

                            if (!empty($_SESSION['user_role'])) { ?>
                                <a class="nav-link text-white" href="resturant.php">Write a review</a>
                            <?php } ?>
                        </li>&nbsp;&nbsp;
                        <li class="nav-item">
                            <?php
                            if (empty($_SESSION['user_role'])) { ?>
                                <a class="nav-link login btn btn-outline-light text-white rounded" href="login.php">Login</a>
                            <?php }
                            if (!empty($_SESSION['user_role'])) { ?>
                                <p class="nav-link login btn btn-outline-light text-white rounded"><?php if (isset($_SESSION['user_role']))
                                                                                                        echo $_SESSION['first'], ' ', $_SESSION['last'];
                                                                                                } ?></p>
                        </li>
                        &nbsp;&nbsp;
                        <li class="nav-item">
                            <?php
                            if (empty($_SESSION['user_role'])) { ?>
                                <a class="nav-link text-white btn-danger rounded" href="signup.php">Sign Up</a>
                            <?php } else if (!empty($_SESSION['user_role'])) { ?>
                                <a class="nav-link text-white btn-danger rounded" href="logout.php">Logout</a>
                            <?php } ?>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>



    </section>


    <section class="body">
        <br><br>
        <h3 class="text-center">Recent Activity</h3>
        <br><br>
        <div class="container">

            <div class="row">
                <?php
                $results = mysqli_query($con, "SELECT review.*, restuarant.* FROM review INNER JOIN restuarant ON review.res_id=restuarant.ID;");
                $res = mysqli_fetch_all($results, MYSQLI_ASSOC);
                foreach ($res as $usr) : ?>
                    <div class="col-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-header d-flex align-items-center">
                                <h5 class="title"><?php echo $usr['name'] ?></h5>
                            </div>
                            <img src="<?php echo 'webimg/' . $usr['pic'] ?>" class="card-img-top" alt="Card Image">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo $usr['r_name'] ?>

                                </h5>
                                <p class="card-text"><?php echo $usr['review'] ?>.</p>

                            </div>
                        </div>
                        <br>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>


    </section>


</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>