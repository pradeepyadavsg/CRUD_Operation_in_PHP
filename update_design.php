<?php include("connection.php");
        $id = $_GET['id'];

        $query = "SELECT*FROM FORM where id ='$id'";
        $data = mysqli_query($conn,$query);
        //$total = mysqli_num_rows($data);
        $result = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update Form</title>
	<!--Latest Bootstrap CDN link-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
	<!--jquery Library link-->
	<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!--Proper JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/js/latest/js.min.js"></script>
<script src="jquery.js"></script>
</head>
<body>
	<div class="container my-4">
		<h1>Update Form</h1>
		<form action="#" method="POST">
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" id="name" value="<?php echo $result['name']; ?>" name="name" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" id="email" value="<?php echo $result['email']; ?>" name="email" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" id="password" value="<?php echo $result['password']; ?>" name="password" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="phone">Phone No:</label>
				<input type="tel" id="phone" value="<?php echo $result['phone']; ?>" name="phone" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="country">Country:</label>
				<select id="country" name="country" class="form-control" required>
					<option value="">Select Country</option>
					
               <?php
					$query=mysqli_query($conn,"select*from country");
					while($row=mysqli_fetch_array($query)){

						?>
						<option value="<?php echo $row['id']; ?>"><?php echo $row['country']; ?> </option>
						
						<?php
					}
					
					?>

				</select>
			</div>
			<div class="form-group">
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
				<textarea id="address" name="address" class="form-control" required><?php echo $result['address'];?></textarea>
			</div>
			<div class="form-group">
				<label for="gender">Gender:</label>
				<select id="gender" name="gender" class="form-control" required>
					<option value="">Select Gender</option>
					<option value="Male"
                     <?php 
                     
                     if($result['gender'] == 'Male'){

                        echo "selected";
                     } 
                     
                     ?>
                     >
                     Male</option>
					<option value="Female"
                    <?php 
                     
                     if($result['gender'] == 'Female'){

                        echo "selected";
                     } 
                     
                     ?>
                     >Female</option>
					<option value="Other"
                    <?php 
                     
                     if($result['gender'] == 'Other'){

                        echo "selected";
                     } 
                     
                     ?>
                     >Other</option>
				</select>
			</div>
			<div class="form-group">
                        <label for="education">Education Qualification:</label>
                        <select class="form-control" id="education" name="education" required>
                            <option value="">Select Qualification</option>
                            <option value="10th"
                            <?php 
                     
                     if($result['qualification'] == '10th'){

                        echo "selected";
                     } 
                     
                     ?>
                     >10th</option>
                            <option value="12th"
                            <?php 
                     
                     if($result['qualification'] == '12th'){

                        echo "selected";
                     } 
                     
                     ?>
                     >12th</option>
                            <option value="UG"
                            <?php 
                     
                     if($result['qualification'] == 'UG'){

                        echo "selected";
                     } 
                     
                     ?>
                     >UG</option>
                            <option value="PG"
                            <?php 
                     
                     if($result['qualification'] == 'PG'){

                        echo "selected";
                     } 
                     
                     ?>
                     >PG</option>
                        </select>
                    </div>
			<input type="submit" value="Update" class="btn btn-primary" name="update">
		</form>
	</div>
</body>
</html>

<?php
	if($_POST['update']){
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
		

		$query = "UPDATE form set name='$name',email='$email',password='$password',phone='$phone',country='$country',state='$state',city='$city',address='$address',gender='$gender',qualification='$education' WHERE id='$id'";

		$data = mysqli_query($conn,$query);
		if($data){
			echo "<script>alert('Record Updated')</script>";

			?>
				<meta http-equiv = "refresh" content = "0; url = http://localhost/crud/display.php" />

			<?php
		}
		else{
			echo "<script>alert('Failed')</script>";
		}
	}
?>