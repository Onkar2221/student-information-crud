<?php
error_reporting(0);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

  <title>Hello, world!</title>
</head>

<body>
  <div class="container-fluid">
    <h1 class="text-center mt-4 alert alert-primary">
      <i><u><b>Online Registration Portal :</b></u></i>
    </h1>
  </div>

  <div class="container mt-4">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="alert alert-danger text-center"><i>Student Form :</i></h1>
        <form action="insert.php" method="post" enctype="multipart/form-data">
          <div>
            <label class="form-lable">Student ID:</label>
            <input type="text" id="studid" placeholder="Enter Student ID Here..." class="form-control" name="stid"
              required autocomplete="off" />
          </div>
          <div>
            <label class="form-lable">Name:</label>
            <input type="text" id="nameid" placeholder="Enter Name Here..." class="form-control" autocomplete="off"
              name="name" required />
          </div>
          <div>
            <label class="form-lable">Mobile:</label>
            <input type="number" id="mobileid" placeholder="Enter Mobile number Here..." class="form-control"
              name="mobile" required autocomplete="off" />
          </div>
          <div>
            <label class="form-lable">Address:</label>
            <input type="text" id="addressid" placeholder="Enter address Here..." class="form-control" name="address"
              required autocomplete="off" />
          </div>
          <div>
            <label class="form-lable">Addhar Card Number:</label>
            <input type="number" id="addharid" placeholder="Enter addhar card number Here..." class="form-control"
              name="addharno" required autocomplete="off" />
          </div>
          <div>
            <label class="form-lable">Addhar Card Photo:</label>
            <input type="file" id="addharid" class="form-control" name="addharphoto" required />
          </div>
          <div>
            <label class="form-lable">PAN Card Number:</label>
            <input type="text" id="panid" placeholder="Enter PAN card number Here..." class="form-control" name="panno"
              required autocomplete="off" />
          </div>
          <div>
            <label class="form-lable">PAN Card Photo:</label>
            <input type="file" id="panid" class="form-control" name="panphoto" required />
          </div>
          <div class="d-grid">
            <button class="btn btn-primary mt-3 mb-4" name="submit" type="submit" id="btnadd">
              Submit
            </button>
          </div>
        </form>
      </div>
      <!-- Display page -->

      <?php
      error_reporting(0);
      include('connection.php');

      $conn = mysqli_connect($servername, $username, $password, $dbname);
      $query = "SELECT * FROM  `exam-form`";
      $query_run = mysqli_query($conn, $query);
      ?>


      <div class="col-sm-12">
        <h1 class="alert alert-success text-center">
          <i>Submited Form List :</i>
        </h1>

        <div class="table-responsive">
          <table class="table table-secondary text-center">
            <thead class="table table-danger">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">S.ID</th>
                <th scope="col">Name</th>
                <th scope="col">Mobile</th>
                <th scope="col">Address</th>
                <th scope="col">Addhar Card Number</th>
                <th scope="col">Addhar Card Photo</th>
                <th scope="col">PAN Card Number</th>
                <th scope="col">Pan Card Photo</th>
                <th scope="col" colspan="2">Option</th>
              </tr>
            </thead>
            <tbody>
              <!-- PHP CODE FOR FETCH DATA IN A TABLE -->
              <?php
              if (mysqli_num_rows($query_run) > 0) { //The mysqli_num_rows() function returns the number of rows in a result set.
                while ($row = mysqli_fetch_assoc($query_run)) {

                  ?>
                  <!-- END -->
                  <tr class="">
                    <td>
                      <?php echo $row['id'] ?>
                    </td>
                    <td>
                      <?php echo $row['studid'] ?>
                    </td>
                    <td>
                      <?php echo $row['name'] ?>
                    </td>
                    <td>
                      <?php echo $row['mobile'] ?>
                    </td>
                    <td>
                      <?php echo $row['address'] ?>
                    </td>
                    <td>
                      <?php echo $row['acn'] ?>
                    </td>
                    <td>
                      <!-- Addhar Card Photo -->
                      <?php echo '<img src="./Student-images/' . $row['acp'] . '"width="100px"; height="100px";alt=".pdf file">' ?>
                    </td>
                    <td>
                      <?php echo $row['pan'] ?>
                    </td>
                    <td>
                      <!-- Pan Card Photo -->
                      <?php echo '<img src="./Student-images/' . $row['pcp'] . '"width="100px"; height="100px";alt=".pdf file">' ?>
                    </td>

                    <td>
                      <form action="edit.php" method="post">
                        <input type="hidden" name="edit-id" value="<?php echo $row['id'] ?>">
                        <button class="btn btn-outline-primary " type="submit" name="data-edit">Edit</button>
                      </form>
                    </td>
                    <td>
                      <form action="delete.php" method="post">
                        <input type="hidden" name="delete-id" value="<?php echo $row['id'] ?>">
                        <button class="btn btn-outline-danger" type="submit" name="data-delete">Delete</button>
                      </form>
                    </td>
                  </tr>
                  <?php
                }
              } else {
                echo "No Record Found";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- jquery cdn -->
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>

<?php
$folder = "/images";
echo $_FILES["uploadfile"];
?>