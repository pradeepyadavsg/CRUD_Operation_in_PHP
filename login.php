<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!--Latest Bootstrap CDN link-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-4">
                <div class="login_form">
                    <img src="https://cdn-icons-png.flaticon.com/128/10405/10405572.png" class="logo img-fluid imgg">
                    <form>
                        <div class="mb-3">
                            <label class="label_txt">Email</label>
                            <input type="email" class="form-control" placeholder="enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label class="label_txt">Password</label>
                            <input type="password" class="form-control" placeholder="enter your password" required>
                        </div>
                        <button type="submit" class="btn btn-primary form_btn">Login</button>
                    </form>
                    <p style="font-size: 12px; text-align: center; margin-top: 10px;">
                        <a href="forgot-password.php" style="color: #00376b;">Forgot Password</a>
                    </p>
                    <br>
                    <p>Don't have an account?<a href="form.php">Sign Up</a></p>
                </div>
            </div>
            <div class="col-sm-4">

            </div>
        </div>
    </div>
</body>
<!--jquery Library link-->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<!--Proper JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>