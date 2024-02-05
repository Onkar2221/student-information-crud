<?php
error_reporting(0);
include('connection.php');

$conn = mysqli_connect($servername, $username, $password, $dbname);


// code for insert data into database

if (isset($_POST['submit'])) {
    $stid = $_POST['stid'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $addharno = $_POST['addharno'];
    $addharphoto = $_FILES['addharphoto']['name'];
    $panno = $_POST['panno'];
    $panphoto = $_FILES['panphoto']['name'];


    move_uploaded_file($_FILES["addharphoto"]["tmp_name"], "./Student-images/" . $_FILES["addharphoto"]["name"]);

    move_uploaded_file($_FILES["panphoto"]["tmp_name"], "./Student-images/" . $_FILES["panphoto"]["name"]);

    $sql = "INSERT INTO `exam-form`( `studid`, `name`, `mobile`, `address`, `acn`, `acp`, `pan`, `pcp`) VALUES ('$stid','$name','$mobile','$address','$addharno','$addharphoto','$panno','$panphoto')";
    echo $sql;
    $result = mysqli_query($conn, $sql);
    echo $result;
    if ($result) {
        header("location: index.php");
    } else {
        die("Error in updating record : " . mysqli_error($conn));
    }
}
?>
<!-- INSERT INTO `exam-form`(`id`, `studid`, `name`, `mobile`, `address`, `acn`, `acp`, `pan`, `pcp`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]') -->