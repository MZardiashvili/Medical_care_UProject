<?php 
session_start();

$id=0;
$patient_name="";
$dob="";
$gender="";
$address="";
$phoneNumber="";
$email="";
$addinfo="";
$msg = "";

$mysqli= new mysqli('localhost', 'root', '','medclinic_db') or die(mysqli_error($mysqli));

if(isset($_POST['save'])){
    $patient=$_POST['patient_name'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    $phoneNumber=$_POST['phone'];
    $email=$_POST['email'];
    $addinfo=$_POST['info'];

    $mysqli->query("INSERT INTO patients(fullname,Address,Gender,email,phonenumber,dob,info) VALUES('$patient', '$address','$gender','$email','$phoneNumber','$dob','$addinfo')")
    or die($mysqli->error);
    
    $_SESSION['message']="Record has been saved";
    $_SESSION['msg_type']="success";

}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>patients-info</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<div class="profile_info">
			<img src="../images/admin_profile.png"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="patients.php?logout='1'" style="color: red;">logout</a>
						&nbsp; <a href="create_user.php"> + add user</a>
					</small>

				<?php endif ?>
			</div>
		</div>

<div><a href="../index.php">Go To Main Page</a></div>
<div><a href="adddoctors.php">Go To Doctors Page</a></div>

	</div>

        <?php
        if(isset($_SESSION['message'])): ?>

        <div class="alert alert-<?=$_SESSION['msg_type']?>">

        <?php 
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>

</div>
<?php endif ?>
  <div class="container">     

      <div class=" justify-content-center">
      <form action="patients.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
          <div class="form-group">
          <label for="patient_name">Fullname</label>
          <input type="text" name="patient_name" class="form-control" 
           placeholder="Enter the name" required>
          </div>
          <div class="form-group">
          <label for="dob">Date Of Birth</label>
          <input type="date" name="dob" class="form-control"
            required>
            </div>
          <div class="form-group">
          <label for="gender">Gender</label>
          <select name="gender" class="form-control" required>
          <option value=""></option>
            <option value="male" >male</option>
            <option value="female">female</option>
           </select>
            </div>
            <div class="form-group">
          <label for="address">Address</label>
          <input type="text" name="address" class="form-control"
            placeholder="Enter the Address" required>
            </div>
            <div class="form-group">
          <label for="phone">Phone Number</label>
          <input type="tel" name="phone" class="form-control" class="form-control" 
         placeholder="Enter Phone Number" required>
          </div>
          <div class="form-group">
          <label for="email">Email Address</label>
          <input type="text" name="email" class="form-control"
            placeholder="Enter Email Address" required>
            </div>
            <div class="form-group">
            <label for="info">Additional information:</label>
            <textarea name="info" rows="4" cols="50" style="resize:none;" class="form-control"></textarea> 
          </div>
            <div class="modal-footer">
            
          <button class="btn btn-primary" type="submit" name="save">Add</button>

          </div>
        </form>
        </div>

        <?php
        $mysqli=new mysqli('localhost','root','','medclinic_db') or die(mysqli_error($mysqli));
        $result=$mysqli->query("SELECT * FROM patients") or die($mysqli->error);
        
        //pre_r($result);
        // pre_r($result->fetch_assoc());
        ?>

          <div class="row justify-content-center">
          <table class="table">
          <thead>
          <tr>
          <th>Full Name</th>
          <th> Date Of Birth </th>
          <th>Gender</th>
          <th>Address</th>
          <th>Phone Number</th>
          <th> Email Address </th>
          <th> Additional information:</th>
          </tr>
          </thead>
          <?php
          while($row=$result->fetch_assoc()): ?>
          <tr>
          <td><?php echo $row['fullname'] ?></td>
          <td><?php echo $row['DOB'] ?></td>
          <td><?php echo $row['Gender'] ?></td>
          <td><?php echo $row['address'] ?></td>
          <td><?php echo $row['phonenumber'] ?></td>
          <td><?php echo $row['email'] ?></td>
          <td><?php echo $row['info'] ?></td>
          </tr>
          <?php endwhile; ?>
          </table>
          
          </div>

        <?php

        function pre_r( $array ){
            echo '<pre>';
            print_r($array);
              echo '</pre';
        }

        ?>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>