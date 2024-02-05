<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

    <?php
    session_start();
    include('connection.php');


    if (isset($_POST['data-edit'])) {

        $id = $_POST['edit-id'];

        // when we click on "Edit Button" then I want to see my previously data
        # so I will fetch the previous values from table where id=$id and display it in form fields -->
    
        $query = "SELECT * FROM `exam-form` WHERE id='$id'";
        echo $query;
        $result = mysqli_query($conn, $query);

        // The foreach loop though iterates over an array of elements, the execution is simplified and finishes the loop in less time comparatively.
    
        // foreach ($result as $row) {
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {

                ?>
                <div class="container mt-5">
                    <h2 class="text-center"><i><u>Please update and Submit :</u></i></h2>
                    <form action="update.php" method="post" enctype="multipart/form-data" class="mt-5">
                        <input type="text" name="edit-form" value="<?php echo $row['id'] ?>">

                        <div>
                            <label class="form-lable">Student ID:</label>
                            <input type="text" id="studid" readpnly placeholder="Enter Student ID Here..." class="form-control"
                                name="stid"  autocomplete="off" value="<?php echo $row['studid'] ?>" />
                        </div>
                        <div>
                            <label class="form-lable">Name:</label>
                            <input type="text" id="nameid" placeholder="Enter Name Here..." class="form-control" autocomplete="off"
                                name="name"  value="<?php echo $row['name'] ?>" />
                        </div>
                        <div>
                            <label class="form-lable">Mobile:</label>
                            <input type="number" id="mobileid" placeholder="Enter Mobile number Here..." class="form-control"
                                name="mobile"  autocomplete="off" value="<?php echo $row['mobile'] ?>" />
                        </div>
                        <div>
                            <label class="form-lable">Address:</label>
                            <input type="text" id="addressid" placeholder="Enter address Here..." class="form-control"
                                name="address"  autocomplete="off" value="<?php echo $row['address'] ?>" />
                        </div>
                        <div>
                            <label class="form-lable">Addhar Card Number:</label>
                            <input type="number" id="addharid" placeholder="Enter addhar card number Here..." class="form-control"
                                name="addharno"  autocomplete="off" value="<?php echo $row['acn'] ?>" />
                        </div>
                        <div>
                            <label class="form-lable">Addhar Card Photo:</label>
                            <input type="file" id="addharid" class="form-control" name="addharphoto"
                                value="<?php echo $row['acp'] ?>"  />
                        </div>
                        <div>
                            <label class="form-lable">PAN Card Number:</label>
                            <input type="text" id="panid" placeholder="Enter PAN card number Here..." class="form-control"
                                value="<?php echo $row['pan'] ?>" name="panno"  autocomplete="off" />
                        </div>
                        <div>
                            <label class="form-lable">PAN Card Photo:</label>
                            <input type="file" id="panid" class="form-control" name="panphoto" value="<?php echo $row['pcp'] ?>"
                                 />
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary mt-3 mb-4" name="submit" type="submit" id="btnadd">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
                <?php
            }
        }


    }
    ?>








    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
</body>

</html>