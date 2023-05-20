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

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a class="navbar-brand" href="Index.php"><img src="images/logo-removebg-preview.png" height="70px" alt=""></a>
    </nav>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-6 text-center mt-5">
                <h5>Log in To Yelp</h5>
                <p>New To Yelp? <span>&nbsp;<a href="#" style="text-decoration: none;">Sign Up</a></span></p>
                <small>By continuing, you agree to Yelp’s Terms of Service and <br> <span>acknowledge Yelp’s Privacy Policy.</span></small>
                <p><span>
                        <hr>
                    </span></p>
                <form method="post" style="width: 300px; margin: 0 auto;">
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <input type="email" name="mail" class="form-control" required placeholder="Email">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <input type="password" name="password" class="form-control" required placeholder="Password">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <br>
                        <div class="col-sm-12">
                            <input type="submit" name="submit" class="form-control btn btn-danger" value="Log in">
                        </div>
                    </div>
                </form>
                <small class="ms-auto">New to yelp?&nbsp;<a href="signup.php">Sign Up</a></small>

            </div>


            <div class="col-6 d-flex justify-content-center">
                <img src="images/login.png" class="img-fluid" alt="">
            </div>

        </div>
    </div>


</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<?php
if (isset($_POST['submit'])) {
    $mail = $_POST['mail'];
    $pass = $_POST['password'];
    $row =  mysqli_query($con, "SELECT * FROM user WHERE mail = '$mail' and password = '$pass' ");
    if (mysqli_num_rows($row) > 0) {
        $data = mysqli_fetch_assoc($row);
        $_SESSION['user_id'] = $data['ID'];
        $_SESSION['first'] = $data['first_name'];
        $_SESSION['last'] = $data['last_name'];
        $_SESSION['mail'] = $data['mail'];
        $_SESSION['user_role'] = $data['user_role'];
         header("Location: index.php");

    } else {
?>
        <script type="text/javascript">
            alert('Wrong Password'); 
        </script>";
<?php
    }
}
?>