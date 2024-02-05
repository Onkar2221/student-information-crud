<?php
error_reporting(0);
include('connection.php');





// echo "in delete page";

if (isset($_POST['data-delete'])) {

    $id = $_POST['delete-id'];

    $sql = "DELETE FROM `exam-form` WHERE `id`='$id'";

    // echo $sql;
    $result = mysqli_query($conn, $sql);
    // echo $result;

    if ($result) {
        echo "Data delete successfully";
        header("location:index.php");
    } else {
        echo "Data is not delete successfully";
        header("location:index.php");
    }

}


























?>