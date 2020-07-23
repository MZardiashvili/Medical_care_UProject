<?php

//session_start();

$id=0;
$update=false;
$doctor_name="";
$gender="";
$address="";
$phoneNumber="";
$salary="";
$msg = "";

$mysqli= new mysqli('localhost', 'root', '','medclinic_db') or die(mysqli_error($mysqli));

if(isset($_POST['save'])){
    $doctor_name=$_POST['doctor_name'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    $phoneNumber=$_POST['phone'];
    $salary=$_POST['salary'];
        // Get image name
        $image = $_FILES['image']['name'];
  
        // image file directory
        $target = "images/".basename($image);
        // execute query
        //mysqli_query($db, $sql);
  
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
        }

   // $result = mysqli_query($db, "SELECT * FROM images");

    $mysqli->query("INSERT INTO doctors(image ,doctor_name,Gender,Address,phonenumber,salary) VALUES('$image', '$doctor_name','$gender','$address','$phoneNumber','$salary')")
    or die($mysqli->error);
    
    $_SESSION['message']="Record has been saved";
    $_SESSION['msg_type']="success";

    header('location: addDoctors.php');
}

if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $mysqli->query("DELETE FROM doctors WHERE Doctor_id='$id'") or die(mysqli_error($mysqli));
    $_SESSION['message']="Record has been deleted";
    $_SESSION['msg_type']="danger";

    header('location: addDoctors.php');

}

if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $update=true;
    $result=$mysqli->query("SELECT * FROM doctors WHERE Doctor_id='$id'") or die($mysqli->error());
    if(count($result)==1){
        $row=$result->fetch_array();
        $doctor_name=$row['doctor_name'];
        $gender=$row['Gender'];
        $address=$row['Address'];
        $phoneNumber=$row['phonenumber'];
        $salary=$row['salary'];
    }

}

if(isset($_POST['update'])){
    $id=$_POST['id'];
    $doctor_name=$_POST['doctor_name'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    $phoneNumber=$_POST['phone'];
    $salary=$_POST['salary'];

    $mysqli->query("UPDATE doctors SET doctor_name='$doctor_name', Gender='$gender', Address='$address', phonenumber='$phoneNumber', salary='$salary' WHERE doctor_id='$id'") or die($mysqli->error());
    
    $_SESSION['message']="Record has been updated";
    $_SESSION['msg_type']="warning";

    header('location: addDoctors.php');
}
