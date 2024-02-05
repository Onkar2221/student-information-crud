<?php
session_start();
include('connection.php');


if (isset($_POST['submit'])) {

    // echo "stid :" . $_POST['stid'];
    $id = $_POST['edit-form'];
    $stid = $_POST['stid'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $addharno = $_POST['addharno'];
    $addharphoto = $_FILES['addharphoto']['name'];
    $panno = $_POST['panno'];
    $panphoto = $_FILES['panphoto']['name'];


    if (($addharphoto != NULL) && ($panphoto != NULL)) {

        move_uploaded_file($_FILES["addharphoto"]["tmp_name"], "./Student-images/" . $_FILES["addharphoto"]["name"]);

        move_uploaded_file($_FILES["panphoto"]["tmp_name"], "./Student-images/" . $_FILES["panphoto"]["name"]);

        //Update query With Taking Both IMG
        $sql = "UPDATE `exam-form` SET `studid`='$stid',`name`='$name',`mobile`='$mobile',`address`='$address',`acn`='$addharno',`acp`='$addharphoto',`pan`='$panno',`pcp`='$panphoto' WHERE `id`='$id'";

        echo $sql;

        $result = mysqli_query($conn, $sql);
        // header('Location:index.php');

    } else if (($addharphoto == NULL) && ($panphoto == NULL)) {

        //Update querywithout taking Both IMG
        $sql = "UPDATE `exam-form` SET `studid`='$stid',`name`='$name',`mobile`='$mobile',`address`='$address',`acn`='$addharno',`pan`='$panno' WHERE `id`='$id'";

        echo $sql;

        $result = mysqli_query($conn, $sql);
    }
    header('Location:index.php');


    if (($addharphoto != NULL) && ($panphoto == NULL)) {

        //for IMG 1
        move_uploaded_file($_FILES["addharphoto"]["tmp_name"], "./Student-images/" . $_FILES["addharphoto"]["name"]);

        //Update query Without taking IMG 2
        $sql = "UPDATE `exam-form` SET `studid`='$stid',`name`='$name',`mobile`='$mobile',`address`='$address',`acn`='$addharno',`acp`='$addharphoto',`pan`='$panno' WHERE `id`='$id'";

        echo $sql;

        $result = mysqli_query($conn, $sql);
    } else if (($addharphoto == NULL) && ($panphoto != NULL)) {


        //for IMG 2
        move_uploaded_file($_FILES["panphoto"]["tmp_name"], "./Student-images/" . $_FILES["panphoto"]["name"]);

        //Update query Without taking IMG 1
        $sql = "UPDATE `exam-form` SET `studid`='$stid',`name`='$name',`mobile`='$mobile',`address`='$address',`acn`='$addharno',`pan`='$panno',`pcp`='$panphoto' WHERE `id`='$id'";


        echo $sql;

        $result = mysqli_query($conn, $sql);

    }
    header('Location:index.php');

}
?>