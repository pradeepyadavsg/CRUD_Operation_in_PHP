<?php include("connection.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration Form</title>
	<!--Latest Bootstrap CDN link-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
	<!--jquery Library link-->
	<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<!--Proper JS-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/js/latest/js.min.js"></script>
	<script src="jquery.js"></script>
	<link rel="stylesheet" href="style.css" class="text/css">
</head>

<body>
	<div class="row">
		<?php
		if (isset($_POST['register'])) {
			extract($_POST);
			if (strlen($name) < 3) {
				//min
				$error[] = 'Please enter first name using 3 characters atleast';
			}
			if (strlen($name) > 20) {
				//max
				$error[] = 'Please enter first name using 20 characters max';
			}
			if (!preg_match("/^[A-Za-z_]*[A-Za-z]+[A-Za-z_]*$/", $name)) {
				$error[] = 'Please enter valid name';
			}
			$sql = "select *from form where (email='$email');";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				$error[] = 'Email already exists';
			}
		}
		?>
		<div class="col-sm-4">
			<?php
			if (isset($error)) {
				foreach ($error as $error) {
					echo '<p class="errmsg">&#x26A0;' . $error . '</p>';
				}
			}
			?>
		</div>
		<div class="col-sm-4">
			<?php if (isset($done)) {
			?>
				<div class="successmsg"><span style="font-size: 100px;">&#9989</span>
					<br>You have successfully <br> <a href="login.php" style="color: #fff;"> Lofin here</a>
				</div>
			<?php } else { ?>
				<div class="signup_form">
					<img src="https://cdn-icons-png.flaticon.com/128/6081/6081304.png" class="logo img-fluid imgg">
					<form action="#" method="POST">
						<div class="form-group">
							<label for="name">Name:</label>
							<input type="text" id="name" name="name" class="form-control" value="<?php if (isset($error)) {
																										echo $name;
																									} ?>" required>
						</div>
						<div class="form-group">
							<label for="email">Email:</label>
							<input type="email" id="email" name="email" class="form-control" value="<?php if (isset($error)) {
																										echo $email;
																									} ?>" required>
						</div>
						<div class="form-group">
							<label for="password">Password:</label>
							<input type="password" id="password" name="password" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="phone">Phone No:</label>
							<input type="tel" id="phone" name="phone" class="form-control" value="<?php if (isset($error)) {
																										echo $phone;
																									} ?>" required>
						</div>
						<div class="form-group">
							<label for="country">Country:</label>
							<select id="country" name="country" class="form-control" required>
								<option value="">Select Country</option>
								<?php
								$query = mysqli_query($conn, "select*from country");
								while ($row = mysqli_fetch_array($query)) {
								?>
									<option value="<?php echo $row['id']; ?>"><?php echo $row['country']; ?> </option>
								<?php
								}
								?>
							</select>
						</div>
						<div class="form-group ">
							<label for="state">State:</label>
							<select id="state" name="state" class="form-control" required>
								<option value="">Select State</option>
							</select>
						</div>
						<div class="form-group">
							<label for="city">City:</label>
							<select id="city" name="city" class="form-control" required>
								<option value="">Select City</option>
							</select>
						</div>
						<div class="form-group">
							<label for="address">Address:</label>
							<textarea id="address" name="address" class="form-control" value="<?php if (isset($error)) {
																									echo $address;
																								} ?>" required></textarea>
						</div>
						<div class="form-group">
							<label for="gender">Gender:</label>
							<select id="gender" name="gender" class="form-control" required>
								<option value="">Select Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								<option value="Other">Other</option>
							</select>
						</div>
						<div class="form-group">
							<label for="education">Education Qualification:</label>
							<select class="form-control" id="education" name="education" required>
								<option value="">Select Qualification</option>
								<option value="10th">10th</option>
								<option value="12th">12th</option>
								<option value="UG">UG</option>
								<option value="PG">PG</option>
							</select>
						</div>
						<input type="submit" value="Register" class="btn btn-primary form_btn" name="register">
						<p>Have an account? <a href="login.php">Log In</a></p>
					<?php } ?>
					</form>
				</div>
		</div>
		<div class="col-sm-4">
		</div>
	</div>
</body>

</html>
<?php
if ($_POST['register']) {
	$name     = $_POST['name'];
	$email    = $_POST['email'];
	$password = $_POST['password'];
	$phone    = $_POST['phone'];
	$country  = $_POST['country'];
	$state    = $_POST['state'];
	$city     = $_POST['city'];
	$address  = $_POST['address'];
	$gender   = $_POST['gender'];
	$education = $_POST['education'];

	$query = "INSERT INTO form (name,email,password,phone,country,state,city,address,gender,qualification) 
		values ('$name','$email','$password','$phone','$country','$state','$city','$address','$gender','$education')";


	if ($query) {
		$done = 2;
	}
	$data = mysqli_query($conn, $query);
	if ($data) {
		echo "<script>alert('Record Inserted Into Database')</script>";
	} else {
		echo "Failed";
	}
}
?>