<?php

$update = false;
$delete = false;
// require 'component/_nav.php';
require 'component/connection.php';

//deleting the record/notes
if (isset($_GET['delete'])) {
  $sno = $_GET['delete'];
  $sql = "DELETE FROM `studentform` WHERE `sno` = $sno";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $delete = true;
  }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //Updating the records 
  if (isset($_POST['snoEdit'])) {
    $sno = $_POST["snoEdit"];
    $fullname = $_POST["editstdname"];
    $dob = $_POST["editstddob"];
    $email = $_POST["editstdemail"];
    $phone = $_POST["editstdphone"];
    $gender = $_POST["editstdgender"];
    $category = $_POST["editstdcategory"];
    $aadhar = $_POST["editstdaadhar"];
    $admission = $_POST["editstdadmission"];
    $course = $_POST["editstdcourse"];
    $currentyear = $_POST["editstdcurrentyear"];
    $semester = $_POST["editstdsemester"];
    $studentid = $_POST["editstdid"];
    $fathername = $_POST["editstdfathername"];
    $fatherphone = $_POST["editstdfatherphone"];
    $fatherqua = $_POST["editstdfatherqua"];
    $fatheroccu = $_POST["editstdfatheroccu"];
    $mothername = $_POST["editstdmothername"];
    $motherphone = $_POST["editstdmotherphone"];
    $motherqua = $_POST["editstdmotherqua"];
    $motheroccu = $_POST["editstdmotheroccu"];
    $curraddress = $_POST["editstdcurraddress"];
    $curraddressline2 = $_POST["editstdcurraddressline2"];
    $currstate = $_POST["editstdcurrstate"];
    $currdistrict = $_POST["editstdcurrdistrict"];
    $currpost = $_POST["editstdcurrpost"];
    $currzip = $_POST["editstdcurrzip"];
    $peraddress = $_POST["editstdperaddress"];
    $peraddressline2 = $_POST["editstdperaddressline2"];
    $perstate = $_POST["editstdperstate"];
    $perdistrict = $_POST["editstdperdistrict"];
    $perpost = $_POST["editstdperpost"];
    $perzip = $_POST["editstdperzip"];


    $sql = "UPDATE `studentform` SET `fullname` = '$fullname', `dob`= '$dob', `email`= '$email', `phone`= '$phone', `gender`= '$gender', `category`= '$category',`aadhar`= '$aadhar',`admission`= '$admission',`course`= '$course',`currentyear`= '$currentyear',`semester`= '$semester',`studentid`= '$studentid',`fathername`= '$fathername',`fatherphone`= '$fatherphone',`fatherqua`= '$fatherqua',`fatheroccu`= '$fatheroccu',`mothername`= '$mothername',`motherphone`= '$motherphone',`motherqua`= '$motherqua',`motheroccu`= '$motheroccu',`curraddress`= '$curraddress',`curraddressline2`= '$curraddressline2',`currstate`= '$currstate',`currdistrict`= '$currdistrict',`currpost`= '$currpost',`currzip`= '$currzip',`peraddress`= '$peraddress',`peraddressline2`= '$peraddressline2',`perstate`= '$perstate',`perdistrict`= '$perdistrict',`perpost`= '$perpost',`perzip`= '$perzip' WHERE `studentform`.`sno` = '$sno'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $update = true;
    }
  }
}


?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Site Icons -->
  <link rel="shortcut icon" href="images/logo1.png" type="image/x-icon" />


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--====== Modal CSS ======-->
  <!-- <link rel="stylesheet" href="style.css"> -->
  <link rel="stylesheet" href="style/datatable.css">

  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Datatable CSS CDN  -->
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css"> -->

  <!-- Datatable Tailwind CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.tailwindcss.css">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <title>Student Details</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');
    @import "tailwindcss";

  body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient(135deg, #e0f7fa, #fce4ec);
    min-height: 100vh;
  }

  .container {
    max-width: 1100px;
    margin: 20px 0 0px; /* Top margin to avoid overlap */
    padding: 30px;
  }

  h1 {
    text-align: center;
    margin-bottom: 30px;
    color: #2c3e50;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
  }

  th, td {
    padding: 16px 20px;
    text-align: left;
  }

  thead {
    background-color: #4A90E2;
    color: white;
  }

  tbody tr:nth-child(even) {
    background-color: #f3f9ff;
  }

  tbody tr:hover {
    background-color: #e0f0ff;
  }

  th {
    font-size: 16px;
  }

  td {
    font-size: 15px;
    color: #333;
  }

  /* Home Button (if needed) */
  .homeBtn {
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
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 999;
  }

  .homeBtn:hover {
    background: rgba(255, 255, 255, 0.4);
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
  }

  .homeBtn i {
    font-size: 18px;
  }
</style>

  </style>

</head>

<body>
  <!-- *************** Edit Modal *************** -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Student Detail</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="datatable.php" method="post">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">

            <div class="details personal">
              <span class="title">Personal Details</span>

              <div class="fields">
                <div class="input-field">
                  <label>Full Name</label>
                  <input type="text" placeholder="Name" name="editstdname" id="editstdname" for="fullname" required>
                </div>

                <div class="input-field">
                  <label>Date of Birth</label>
                  <input type="date" placeholder="Enter birth date" name="editstddob" id="editstddob" required>
                </div>

                <div class="input-field">
                  <label>Email</label>
                  <input type="email" placeholder="Enter your email" name="editstdemail" id="editstdemail" required>
                </div>

                <div class="input-field">
                  <label>Mobile Number</label>
                  <input type="tel" placeholder="Enter mobile number" name="editstdphone" id="editstdphone" required>
                </div>

                <div class="input-field">
                  <label>Gender</label>
                  <select required name="editstdgender" id="editstdgender">
                    <option disabled selected>Select gender</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Others</option>
                  </select>
                </div>

                <div class="input-field">
                  <label>Category</label>
                  <select required name="editstdcategory" id="editstdcategory">
                    <option disabled selected>Select Category</option>
                    <option>GEN</option>
                    <option>OBC</option>
                    <option>ST/SC</option>
                    <option>Others</option>
                  </select>
                </div>

                <div class="input-field">
                  <label>Aadhar Number</label>
                  <input type="text" placeholder="Enter Aadhar number" name="editstdaadhar" id="editstdaadhar" required>
                </div>

                <div class="input-field">
                  <label>Admission Date</label>
                  <input type="date" placeholder="Enter your issued date" name="editstdadmission" id="editstdadmission"
                    required>
                </div>

                <div class="input-field">
                  <label>Courses</label>
                  <select required name="editstdcourse" id="editstdcourse">
                    <option disabled selected>Select Course</option>
                    <option>BCA</option>
                    <option>B.Com</option>
                    <option>BBA</option>
                  </select>
                </div>

                <div class="input-field">
                  <label>Current Year</label>
                  <select required name="editstdcurrentyear" id="editstdcurrentyear">
                    <option disabled selected>Select Year</option>
                    <option>1st Year</option>
                    <option>2nd Year</option>
                    <option>3rd Year</option>
                    <option>4th Year</option>
                  </select>
                </div>
                <div class="input-field">
                  <label>Semester</label>
                  <select required name="editstdsemester" id="editstdsemester">
                    <option disabled selected>Select Semester</option>
                    <option>I Semester</option>
                    <option>II Semester</option>
                    <option>III Semester</option>
                    <option>IV Semester</option>
                    <option>V Semester</option>
                    <option>VI Semester</option>
                    <option>VII Semester</option>
                    <option>VIII Semester</option>
                  </select>
                </div>
                <div class="input-field">
                  <label>Student ID </label>
                  <input type="text" placeholder="Enter Student ID" name="editstdid" id="editstdid" required>
                </div>
              </div>
            </div>
            <hr>

            <div class="details ID">
              <span class="title">Father's Details</span>

              <div class="fields">
                <div class="input-field">
                  <label>Father's Name</label>
                  <input type="text" placeholder="Enter father name" name="editstdfathername" id="editstdfathername"
                    required>
                </div>

                <div class="input-field">
                  <label>Phone Number</label>
                  <input type="tel" placeholder="Enter Phone number" name="editstdfatherphone" id="editstdfatherphone"
                    required>
                </div>

                <div class="input-field">
                  <label>Father Qualification</label>
                  <select required name="editstdfatherqua" id="editstdfatherqua">
                    <option selected disabled>Select Qualification</option>
                    <option>No Formal Education</option>
                    <option>Primary Education</option>
                    <option>Secondary Education</option>
                    <option>High School Diploma</option>
                    <option>Associate Degree</option>
                    <option>Bachelor Degree</option>
                    <option>Master Degree</option>
                    <option>Doctorate (PhD)</option>
                    <option>Other</option>
                  </select>
                </div>

                <div class="input-field">
                  <label for="guardian_occupation">Father Occupation:</label>
                  <input type="text" name="editstdfatheroccu" id="editstdfatheroccu" placeholder="Father Occupation">
                </div>

              </div>
              <hr>

              <div class="details ID">
                <span class="title">Mother's Details</span>

                <div class="fields">
                  <div class="input-field">
                    <label>Mother's Name</label>
                    <input type="text" placeholder="Enter mother name" name="editstdmothername" id="editstdmothername"
                      required>
                  </div>

                  <div class="input-field">
                    <label>Phone Number</label>
                    <input type="tel" placeholder="Enter Phone number" name="editstdmotherphone" id="editstdmotherphone"
                      required>
                  </div>

                  <div class="input-field">
                    <label>Mother Qualification</label>
                    <select required name="editstdmotherqua" id="editstdmotherqua">
                      <option selected disabled>Select Qualification</option>
                      <option>No Formal Education</option>
                      <option>Primary Education</option>
                      <option>Secondary Education</option>
                      <option>High School Diploma</option>
                      <option>Associate Degree</option>
                      <option>Bachelor Degree</option>
                      <option>Master Degree</option>
                      <option>Doctorate (PhD)</option>
                      <option>Other</option>
                    </select>
                  </div>

                  <div class="input-field">
                    <label for="guardian_occupation">Mother Occupation:</label>
                    <input type="text" name="editstdmotheroccu" id="editstdmotheroccu" placeholder="Mother Occupation">
                  </div>

                </div>
              </div>

              <hr>

              <div class="details address">
                <span class="title">Current Address </span>

                <div class="fields">
                  <div class="input-field">
                    <label>Street Address</label>
                    <input type="text" placeholder="Street Address" name="editstdcurraddress" id="editstdcurraddress"
                      required>
                  </div>

                  <div class="input-field">
                    <label>Address Line 2</label>
                    <input type="text" placeholder="Street Address Line 2" name="editstdcurraddressline2"
                      id="editstdcurraddressline2" required>
                  </div>

                  <div class="input-field">
                    <label>State</label>
                    <select name="editstdcurrstate" id="editstdcurrstate" required>
                      <option>Select State</option>
                      <option>Andhra Pradesh</option>
                      <option>Arunachal Pradesh</option>
                      <option>Assam</option>
                      <option>Bihar</option>
                      <option>Chhattisgarh</option>
                      <option>Goa</option>
                      <option>Gujarat</option>
                      <option>Haryana</option>
                      <option>Himachal Pradesh</option>
                      <option>Jharkhand</option>
                      <option>Karnataka</option>
                      <option>Kerala</option>
                      <option>Madhya Pradesh</option>
                      <option>Maharashtra</option>
                      <option>Manipur</option>
                      <option>Meghalaya</option>
                      <option>Mizoram</option>
                      <option>Nagaland</option>
                      <option>Odisha</option>
                      <option>Punjab</option>
                      <option>Rajasthan</option>
                      <option>Sikkim</option>
                      <option>Tamil Nadu</option>
                      <option>Telangana</option>
                      <option>Tripura</option>
                      <option>Uttar Pradesh</option>
                      <option>Uttarakhand</option>
                      <option>West Bengal</option>
                      <option>Andaman and Nicobar Islands</option>
                      <option>Chandigarh</option>
                      <option>Dadra and Nagar Haveli</option>
                      <option>Daman and Diu</option>
                      <option>Delhi</option>
                      <option>Lakshadweep</option>
                      <option>Puducherry</option>
                    </select>
                  </div>

                  <div class="input-field">
                    <label>District</label>
                    <input type="text" placeholder="District" name="editstdcurrdistrict" id="editstdcurrdistrict"
                      required>
                  </div>
                  <div class="input-field">
                    <label>Post Office</label>
                    <input type="text" placeholder="Post Office" name="editstdcurrpost" id="editstdcurrpost" required>
                  </div>

                  <div class="input-field">
                    <label>ZIP Code</label>
                    <input type="number" placeholder="Zip Code" name="editstdcurrzip" id="editstdcurrzip" required>
                  </div>

                </div>
              </div>
              <hr>

              <div class="details address">
                <span class="title">Permanent Address <br></span>

                <div class="fields">
                  <div class="input-field">
                    <label>Street Address</label>
                    <input type="text" placeholder="Street Address" id="editstdperaddress" name="editstdperaddress"
                      required>
                  </div>

                  <div class="input-field">
                    <label>Address Line 2</label>
                    <input type="text" placeholder="Landmark" id="editstdperaddressline2" name="editstdperaddressline2"
                      required>
                  </div>

                  <div class="input-field">
                    <label>State</label>
                    <select id="editstdperstate" name="editstdperstate" required>
                      <option>Select State</option>
                      <option>Andhra Pradesh</option>
                      <option>Arunachal Pradesh</option>
                      <option>Assam</option>
                      <option>Bihar</option>
                      <option>Chhattisgarh</option>
                      <option>Goa</option>
                      <option>Gujarat</option>
                      <option>Haryana</option>
                      <option>Himachal Pradesh</option>
                      <option>Jharkhand</option>
                      <option>Karnataka</option>
                      <option>Kerala</option>
                      <option>Madhya Pradesh</option>
                      <option>Maharashtra</option>
                      <option>Manipur</option>
                      <option>Meghalaya</option>
                      <option>Mizoram</option>
                      <option>Nagaland</option>
                      <option>Odisha</option>
                      <option>Punjab</option>
                      <option>Rajasthan</option>
                      <option>Sikkim</option>
                      <option>Tamil Nadu</option>
                      <option>Telangana</option>
                      <option>Tripura</option>
                      <option>Uttar Pradesh</option>
                      <option>Uttarakhand</option>
                      <option>West Bengal</option>
                      <option>Andaman and Nicobar Islands</option>
                      <option>Chandigarh</option>
                      <option>Dadra and Nagar Haveli</option>
                      <option>Daman and Diu</option>
                      <option>Delhi</option>
                      <option>Lakshadweep</option>
                      <option>Puducherry</option>
                    </select>
                  </div>

                  <div class="input-field">
                    <label>District</label>
                    <input type="text" placeholder="District" id="editstdperdistrict" name="editstdperdistrict"
                      required>
                  </div>
                  <div class="input-field">
                    <label>Post Office</label>
                    <input type="text" placeholder="Post Office" id="editstdperpost" name="editstdperpost" required>
                  </div>

                  <div class="input-field">
                    <label>ZIP Code</label>
                    <input type="number" placeholder="Zip Code" id="editstdperzip" name="editstdperzip" required>
                  </div>

                </div>
              </div>
            </div>
            <div class="modal-footer d-block mr-auto">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button submit" class="btn btn-primary">Save Changes</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>



  <div class="container">

    <?php

    if ($update) {
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
   <strong>Success!</strong> Student Details has updated successfully!!.
   <button role='button' type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' >
   <i class='fa-solid fa-circle-xmark position-absolute top-1 end-6 border border-dark btn-lg'></i>
   </button>
   </div>";
    }
    if ($delete) {
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
   <strong>Success!</strong> Student has deleted successfully!!.
   <button role='button' type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' >
   <i class='fa-solid fa-circle-xmark position-absolute top-1 end-6 border border-dark btn-lg'></i>
   </button>
   </div>";
    }

    ?>

    <button class="homeBtn" onclick="document.location= 'admin.php'">
      <span class="btnText">Home</span>
      <!-- <i class="uil uil-navigator"></i> -->
      <i class="fa-solid fa-house"></i>
    </button>
    <table id="myTable" class="table table-striped display " style="width:100% ">
      <thead>
        <!-- class="dark:bg-gray-800" -->
        <!-- style="background-color: blue;" -->
        <tr>
          <th>Sno</th>
          <th>Action</th>
          <th>Name</th>
          <th>DOB</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Gender</th>
          <th>Category</th>
          <th>Aadhar Number</th>
          <th>Admission Date</th>
          <th>Course</th>
          <th>Current Year</th>
          <th>Semester</th>
          <th>Student ID</th>
          <th>Father Name</th>
          <th>Father Phone</th>
          <th>Father Qualification</th>
          <th>Father Occupation</th>
          <th>Mother Name</th>
          <th>Mother phone</th>
          <th>Mother Qualification</th>
          <th>Mother Occupation</th>
          <th>Current Address</th>
          <th>Current Address line2</th>
          <th>Current State</th>
          <th>Current District</th>
          <th>Current PostOffice</th>
          <th>Current ZipCode</th>
          <th>Permanent Address</th>
          <th>Permanent Address line2</th>
          <th>Permanent State</th>
          <th>Permanent District</th>
          <th>Permanent PostOffice</th>
          <th>Permanent ZipCode</th>

        </tr>
      </thead>
      <tbody>
        <?php
        $sno = 0;
        $sql = "SELECT * FROM `studentform`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          $sno += 1;
          echo "<tr>
          
          <th scope='row'>" . $sno . "</th>
          <td><button class='edit btn btn-sm btn-primary' id=" . $row['sno'] . ">Edit</button> <button class='delete btn btn-sm btn-primary' id= d" . $row['sno'] . ">Delete
          </button></td>
           <td>" . $row["fullname"] . "</td>
           <td>" . $row["dob"] . "</td>
           <td>" . $row["email"] . "</td>
           <td>" . $row["phone"] . "</td>
           <td>" . $row["gender"] . "</td>
           <td>" . $row["category"] . "</td>
           <td>" . $row["aadhar"] . "</td>
           <td>" . $row["admission"] . "</td>
           <td>" . $row["course"] . "</td>
           <td>" . $row["currentyear"] . "</td>
           <td>" . $row["semester"] . "</td>
           <td>" . $row["studentid"] . "</td>
           <td>" . $row["fathername"] . "</td>
           <td>" . $row["fatherphone"] . "</td>
           <td>" . $row["fatherqua"] . "</td>
           <td>" . $row["fatheroccu"] . "</td>
           <td>" . $row["mothername"] . "</td>
           <td>" . $row["motherphone"] . "</td>
           <td>" . $row["motherqua"] . "</td>
           <td>" . $row["motheroccu"] . "</td>
           <td>" . $row["curraddress"] . "</td>
           <td>" . $row["curraddressline2"] . "</td>
           <td>" . $row["currstate"] . "</td>
           <td>" . $row["currdistrict"] . "</td>
           <td>" . $row["currpost"] . "</td>
           <td>" . $row["currzip"] . "</td>
           <td>" . $row["peraddress"] . "</td>
           <td>" . $row["peraddressline2"] . "</td>
           <td>" . $row["perstate"] . "</td>
           <td>" . $row["perdistrict"] . "</td>
           <td>" . $row["perpost"] . "</td>
           <td>" . $row["perzip"] . "</td>
            
           </tr>
          ";




        }

        ?>

      </tbody>
    </table>
  </div>



  <script>
    //Edit the record 
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        // console.log("edit");
        tr = e.target.parentNode.parentNode;
        fullname = tr.getElementsByTagName("td")[1].innerText;
        dob = tr.getElementsByTagName("td")[2].innerText;
        email = tr.getElementsByTagName("td")[3].innerText;
        phone = tr.getElementsByTagName("td")[4].innerText;
        gender = tr.getElementsByTagName("td")[5].innerText;
        category = tr.getElementsByTagName("td")[6].innerText;
        aadhar = tr.getElementsByTagName("td")[7].innerText;
        admission = tr.getElementsByTagName("td")[8].innerText;
        course = tr.getElementsByTagName("td")[9].innerText;
        currentyear = tr.getElementsByTagName("td")[10].innerText;
        semester = tr.getElementsByTagName("td")[11].innerText;
        studentid = tr.getElementsByTagName("td")[12].innerText;
        fathername = tr.getElementsByTagName("td")[13].innerText;
        fatherphone = tr.getElementsByTagName("td")[14].innerText;
        fatherqua = tr.getElementsByTagName("td")[15].innerText;
        fatheroccu = tr.getElementsByTagName("td")[16].innerText;
        mothername = tr.getElementsByTagName("td")[17].innerText;
        motherphone = tr.getElementsByTagName("td")[18].innerText;
        motherqua = tr.getElementsByTagName("td")[19].innerText;
        motheroccu = tr.getElementsByTagName("td")[20].innerText;
        curraddress = tr.getElementsByTagName("td")[21].innerText;
        curraddressline2 = tr.getElementsByTagName("td")[22].innerText;
        currstate = tr.getElementsByTagName("td")[23].innerText;
        currdistrict = tr.getElementsByTagName("td")[24].innerText;
        currpost = tr.getElementsByTagName("td")[25].innerText;
        currzip = tr.getElementsByTagName("td")[26].innerText;
        peraddress = tr.getElementsByTagName("td")[27].innerText;
        peraddressline2 = tr.getElementsByTagName("td")[28].innerText;
        perstate = tr.getElementsByTagName("td")[29].innerText;
        perdistrict = tr.getElementsByTagName("td")[30].innerText;
        perpost = tr.getElementsByTagName("td")[31].innerText;
        perzip = tr.getElementsByTagName("td")[32].innerText;
        console.log(fullname, dob);
        editstdname.value = fullname;
        editstddob.value = dob;
        editstdemail.value = email;
        editstdphone.value = phone;
        editstdgender.value = gender;
        editstdcategory.value = category;
        editstdaadhar.value = aadhar;
        editstdadmission.value = admission;
        editstdcourse.value = course;
        editstdcurrentyear.value = currentyear;
        editstdsemester.value = semester;
        editstdid.value = studentid;
        editstdfathername.value = fathername;
        editstdfatherphone.value = fatherphone;
        editstdfatherqua.value = fatherqua;
        editstdfatheroccu.value = fatheroccu;
        editstdmothername.value = mothername;
        editstdmotherphone.value = motherphone;
        editstdmotherqua.value = motherqua;
        editstdmotheroccu.value = motheroccu;
        editstdcurraddress.value = curraddress;
        editstdcurraddressline2.value = curraddressline2;
        editstdcurrstate.value = currstate;
        editstdcurrdistrict.value = currdistrict;
        editstdcurrpost.value = currpost;
        editstdcurrzip.value = currzip;
        editstdperaddress.value = peraddress;
        editstdperaddressline2.value = peraddressline2;
        editstdperstate.value = perstate;
        editstdperdistrict.value = perdistrict;
        editstdperpost.value = perpost;
        editstdperzip.value = perzip;

        snoEdit.value = e.target.id;
        console.log(e.target.id);

        $('#editModal').modal('toggle');
      })
    })
    //  Deleting the student
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {

        sno = e.target.id.substr(1,);

        if (confirm("Are you sure? you want to delete this student!")) {
          console.log('YEs');
          window.location = `/admin/datatable.php?delete= ${sno}`;
        } else {
          console.log('No');
        }
      })
    })





  </script>





  <!-- Datatable JavaScript CDN -->
  <!-- <script src="cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src=" https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
  <script src=" https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script> -->


  <!-- *** Datatable JavaScript CDN Tailwind CSS*** -->
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
  <!-- <script src="https://cdn.datatables.net/2.2.2/js/dataTables.tailwindcss.js"></script> -->
  <script src="script/data.js"></script>
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->


  <script>
    let table = new DataTable('#myTable');
  </script>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>

</body>

</html>