<?php
// $sql = "INSERT INTO `notes` (`Sno`, `Title`, `description`, `Date`) VALUES (NULL, 'Home town plan', 'This holi we are going our home town.', current_timestamp()) "; 
// $servername = "localhost:3308";
// $username = "root"; 
// $password = "Ankit@12345"; 
// $dbname = "clgadmin";
// $conn = new mysqli($servername, $username, $password, $dbname);
// if ($conn->connect_error) {
//     die("Connection Error -->". $conn->connect_error);
// }
// else{
//     // echo"connection SuccessFull";
// }

require 'connection.php';

$insert = false;
$update = false;
$delete = false;


//deleting the record/notes
if (isset($_GET['delete'])) {
  $sno = $_GET['delete'];
  $sql = "DELETE FROM `notices` WHERE `Sno` = $sno";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $delete = true;
  }
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //Updating the records 
  if (isset($_POST['snoEdit'])) {
    // echo "Yes";
    // exit();
    $sno = $_POST["snoEdit"];
    $title = $_POST["titleEdit"];
    $description = $_POST["descriptionEdit"];

    $sql = "UPDATE `notices` SET `title` = '$title', `description` = '$description' WHERE `notices`.`Sno` = '$sno'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $update = true;
      //echo "Notes added successfully!!";
    }
  } else {
    $title = $_POST["title"];
    $description = $_POST["description"];

    $sql = "INSERT INTO `notices` (`title`, `description`) VALUES ('$title', '$description')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $insert = true;
      //echo "Notes added successfully!!";
    }
    //else{
    //   echo "Notes not added ". mysqli_error($conn);
  } // }
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Site Icons -->
  <link rel="shortcut icon" href="images/logo1.png" type="image/x-icon" />

  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Data table css  -->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />

  <title>Notices</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      /* margin: 0; */
      margin-top: 50px;
      padding: 0;
      background: linear-gradient(135deg, #e0f7fa, #fce4ec);
      min-height: 100vh;
      position: relative;
      overflow-x: hidden;
    }

    form {
      max-width: 500px;
      margin: auto;
      padding: 20px;
      background: #f0f0f0;
      border-radius: 8px;
    }

    input,
    textarea {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
    }

    button {
      padding: 10px 20px;
      background: #007BFF;
      color: white;
      border: none;
    }


    .homeBtn {
      margin-top: 30px;
      display: inline-flex;
      align-items: center;
      gap: 10px;
      background: rgba(255, 255, 255, 0.25);
      border: 1px solid rgba(255, 255, 255, 0.3);
      backdrop-filter: blur(10px);
      border-radius: 50px;
      padding: 10px 22px;
      color: #333;
      font-weight: 600;
      font-size: 16px;
      cursor: pointer;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
      position: fixed;
      top: 20px;
      right: 20px;
      z-index: 999;
    }

    .homeBtn:hover {
      background: rgba(255, 255, 255, 0.4);
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .homeBtn i {
      font-size: 18px;
    }


    /* .success { color: green; text-align: center; } */
  </style>

</head>

<body>

  <button class="homeBtn top-0" onclick="document.location= '/admin/admin.php'">
    <span class="btnText top-0">Home</span>
    <!-- <i class="uil uil-navigator"></i> -->
    <i class="fa-solid fa-house"></i>
  </button>

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Notices</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/admin/component/add_notices.php" method="post">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
          </div>
          <div class="modal-body mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="descriptionEdit" name="descriptionEdit" rows="3"></textarea>
          </div>

          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button submit" class="btn btn-primary">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>



  <?php
  if ($insert) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Your notices has inserted successfully.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
  }
  if ($update) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Your notices has updated successfully.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
  }
  if ($delete) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Your notices has deleted successfully.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
  }

  ?>


  <!-- <div class="container">
    <div class="mb-3 my-4">
      <h2> Add a Notices </h2>
      <form action="/admin/notice_event/add_notices.php" method="post">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Add Notices</button>
    </form>
  </div> -->
  <h2 style="text-align:center;">Add New Notice</h2>
  <?php if (isset($_GET['success'])): ?>
    <div class="success">Notice added successfully!</div>
  <?php endif; ?>
  <form method="POST" action="/admin/component/add_notices.php">
    <input type="text" name="title" placeholder="Notice Title" required>
    <textarea name="description" placeholder="Notice Description" rows="5" required></textarea>
    <button type="submit">Add Notice</button>
  </form>


  <div class="container my-4">
    <table class="table" id="myTable">
      <div>
        <thead>
          <tr>
            <th scope="col">Sno</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Actions </th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sno = 0;
          $sql = "SELECT * FROM `notices`";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            // echo var_dump($row);
            // echo "<br>";
            $sno += 1;
            echo "<tr>
          <th scope='row'>" . $sno . "</th>
          <td>" . $row["title"] . "</td>
          <td>" . $row["description"] . "</td>
          <td><button class='edit btn btn-sm btn-primary' id=" . $row['sno'] . ">Edit</button> <button class='delete btn btn-sm btn-primary' id= d" . $row['sno'] . ">Delete
          </button></td>
          </tr>";
            // echo $row["Sno"] . " Title " . $row["Title"] . ", Dese " . $row["description"];
            // echo "<br>";
          }
          ?>

        </tbody>

      </div>
    </table>
  </div>
  <hr>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <!-- CDN for ddata table -->
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>

  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();
    });
  </script>

  <script>
    //Edit the record 
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        // console.log("edit");
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName("td")[0].innerText;
        description = tr.getElementsByTagName("td")[1].innerText;
        console.log(title, description);
        titleEdit.value = title;
        descriptionEdit.value = description;
        snoEdit.value = e.target.id;
        console.log(e.target.id);

        $('#editModal').modal('toggle');
      })
    })


    //delete the record
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        // console.log("delete");
        // tr = e.target.parentNode.parentNode;
        // title = tr.getElementsByTagName("td")[0].innerText;
        // description = tr.getElementsByTagName("td")[1].innerText;
        // console.log(title, description);
        // titleEdit.value = title;
        // descriptionEdit.value = description;
        // snoEdit.value = e.target.id;
        // console.log(e.target.id);
        // $('#editModal').modal('toggle');
        sno = e.target.id.substr(1,);

        if (confirm("Are you sure? You want to delete this notices!")) {
          console.log('YEs');
          window.location = `/admin/component/add_notices.php?delete= ${sno}`;
        } else {
          console.log('No');
        }
      })
    })
  </script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script> -->
</body>

</html>