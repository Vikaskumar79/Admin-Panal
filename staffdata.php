<?php
require 'component/connection.php';
$delete = false;
$update = false;

//deleting the record/notes
if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
    $sql = "DELETE FROM `staff` WHERE `sno` = $sno";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $delete = true;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Updating the records 
    if (isset($_POST['snoEdit'])) {
        $sno = $_POST["snoEdit"];
        $fullname = $_POST["editstfname"];
        $email = $_POST["editstfemail"];
        $phone = $_POST["editstfphone"];
        $gender = $_POST["editstfgender"];
        $joining = $_POST["editstfjoining"];
        $course = $_POST["editstfcourse"];
        $staffid = $_POST["editstfid"];
        $sub1 = $_POST["editstfsub1"];
        $sub2 = $_POST["editstfsub2"];
        $sub3 = $_POST["editstfsub3"];
        $sub4 = $_POST["editstfsub4"];
        $address = $_POST["editstfaddress"];
        $addressline2 = $_POST["editstfaddressline2"];
        $state = $_POST["editstfstate"];
        $district = $_POST["editstfdistrict"];
        $post = $_POST["editstfpost"];
        $zip = $_POST["editstfzip"];


        $sql = "UPDATE `staff` SET `fullname` = '$fullname', `email`= '$email', `phone`= '$phone', `gender`= '$gender', `joining`= '$joining',`course`= '$course', `staffid`= '$staffid', `sub1`= '$sub1', `sub2`= '$sub2', `sub3`= '$sub3', `sub4`= '$sub4', `address`= '$address',`addressline2`= '$addressline2',`state`= '$state',`district`= '$district', `post`= '$post', `zip`= '$zip' WHERE
       `staff`.`sno` = '$sno'";
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
    <title>Staff Details</title>
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
</head>
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Student Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="staffdata.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="snoEdit" id="snoEdit">

                    <div class="details personal">
                        <span class="title">Personal Details</span>

                        <div class="fields">
                            <div class="input-field">
                                <label>Full Name</label>
                                <input type="text" placeholder="Name" name="editstfname" id="editstfname" for="fullname"
                                    required>
                            </div>

                            <div class="input-field">
                                <label>Email</label>
                                <input type="email" placeholder="Enter your email" name="editstfemail" id="editstfemail"
                                    required>
                            </div>

                            <div class="input-field">
                                <label>Mobile Number</label>
                                <input type="tel" placeholder="Enter mobile number" name="editstfphone"
                                    id="editstfphone" required>
                            </div>

                            <div class="input-field">
                                <label>Gender</label>
                                <select required name="editstfgender" id="editstfgender">
                                    <option disabled selected>Select gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Others</option>
                                </select>
                            </div>

                            <div class="input-field">
                                <label>Joining Date</label>
                                <input type="date" placeholder="Enter your issued date" name="editstfjoining"
                                    id="editstfjoining" required>
                            </div>

                            <div class="input-field">
                                <label>Courses</label>
                                <select required name="editstfcourse" id="editstfcourse">
                                    <option disabled selected>Select Course</option>
                                    <option>BCA</option>
                                    <option>B.Com</option>
                                    <option>BBA</option>
                                </select>
                            </div>

                            <div class="input-field">
                                <label>Staff ID </label>
                                <input type="text" placeholder="Enter Staff ID" name="editstfid" id="editstfid"
                                    required>
                            </div>
                        </div>
                    </div>
                    <hr>


                    <span class="title">Subject's Details</span>
                    <br>
                    <div class="fields">
                        <div class="input-field">
                            <label>Subject 1</label>
                            <input type="text" placeholder="Subject 1" name="editstfsub1" id="editstfsub1" required>
                        </div>

                        <div class="fields">
                            <div class="input-field">
                                <label>Subject 2</label>
                                <input type="text" placeholder="Subject 2" name="editstfsub2" id="editstfsub2">
                            </div>
                        </div>

                        <div class="fields">
                            <div class="input-field">
                                <label>Subject 3</label>
                                <input type="text" placeholder="Subject 3" name="editstfsub3" id="editstfsub3">
                            </div>
                        </div>

                        <div class="fields">
                            <div class="input-field">
                                <label>Subject 4</label>
                                <input type="text" placeholder="Subject 4" name="editstfsub4" id="editstfsub4">
                            </div>
                        </div>

                    </div>
                    <hr>

                    <div class="details address">
                        <span class="title">Current Address </span>

                        <div class="fields">
                            <div class="input-field">
                                <label>Street Address</label>
                                <input type="text" placeholder="Street Address" name="editstfaddress"
                                    id="editstfaddress" required>
                            </div>

                            <div class="input-field">
                                <label>Address Line 2</label>
                                <input type="text" placeholder="Street Address Line 2" name="editstfaddressline2"
                                    id="editstfaddressline2" required>
                            </div>

                            <div class="input-field">
                                <label>State</label>
                                <select name="editstfstate" id="editstfstate" required>
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
                                <input type="text" placeholder="District" name="editstfdistrict" id="editstfdistrict"
                                    required>
                            </div>
                            <div class="input-field">
                                <label>Post Office</label>
                                <input type="text" placeholder="Post Office" name="editstfpost" id="editstfpost"
                                    required>
                            </div>

                            <div class="input-field">
                                <label>ZIP Code</label>
                                <input type="number" placeholder="Zip Code" name="editstfzip" id="editstfzip" required>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer d-block mr-auto">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container">

    <?php

    if ($update) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
   <strong>Success!</strong> Staff Details has updated successfully!!.
   <button role='button' type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' >
   <i class='fa-solid fa-circle-xmark position-absolute top-1 end-6 border border-dark btn-lg'></i>
   </button>
   </div>";
    }
    if ($delete) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
   <strong>Success!</strong> Staff has deleted successfully!!.
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
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Joining Date</th>
                <th>Course</th>
                <th>Staff ID</th>
                <th>Subject 1</th>
                <th>Subject 2</th>
                <th>Subject 3</th>
                <th>Subject 4</th>
                <th>Current Address</th>
                <th>Current Address line2</th>
                <th>Current State</th>
                <th>Current District</th>
                <th>Current PostOffice</th>
                <th>Current ZipCode</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sno = 0;
            $sql = "SELECT * FROM `staff`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $sno += 1;
                echo "<tr>
        
        <th scope='row'>" . $sno . "</th>
        <td><button class='edit btn btn-sm btn-primary' id=" . $row['sno'] . ">Edit</button> <button class='delete btn btn-sm btn-primary' id= d" . $row['sno'] . ">Delete
        </button></td>
         <td>" . $row["fullname"] . "</td>
         <td>" . $row["email"] . "</td>
         <td>" . $row["phone"] . "</td>
         <td>" . $row["gender"] . "</td>
         <td>" . $row["joining"] . "</td>
         <td>" . $row["course"] . "</td>
         <td>" . $row["staffid"] . "</td>
         <td>" . $row["sub1"] . "</td>
         <td>" . $row["sub2"] . "</td>
         <td>" . $row["sub3"] . "</td>
         <td>" . $row["sub4"] . "</td>
         <td>" . $row["address"] . "</td>
         <td>" . $row["addressline2"] . "</td>
         <td>" . $row["state"] . "</td>
         <td>" . $row["district"] . "</td>
         <td>" . $row["post"] . "</td>
         <td>" . $row["zip"] . "</td>
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
            console.log("edit");
            tr = e.target.parentNode.parentNode;
            fullname = tr.getElementsByTagName("td")[1].innerText;
            email = tr.getElementsByTagName("td")[2].innerText;
            phone = tr.getElementsByTagName("td")[3].innerText;
            gender = tr.getElementsByTagName("td")[4].innerText;
            joining = tr.getElementsByTagName("td")[5].innerText;
            course = tr.getElementsByTagName("td")[6].innerText;
            staffid = tr.getElementsByTagName("td")[7].innerText;
            sub1 = tr.getElementsByTagName("td")[8].innerText;
            sub2 = tr.getElementsByTagName("td")[9].innerText;
            sub3 = tr.getElementsByTagName("td")[10].innerText;
            sub4 = tr.getElementsByTagName("td")[11].innerText;
            address = tr.getElementsByTagName("td")[12].innerText;
            addressline2 = tr.getElementsByTagName("td")[13].innerText;
            state = tr.getElementsByTagName("td")[14].innerText;
            district = tr.getElementsByTagName("td")[15].innerText;
            post = tr.getElementsByTagName("td")[16].innerText;
            zip = tr.getElementsByTagName("td")[17].innerText;
            console.log(fullname);
            editstfname.value = fullname;
            editstfemail.value = email;
            editstfphone.value = phone;
            editstfgender.value = gender;
            editstfjoining.value = joining;
            editstfcourse.value = course;
            editstfid.value = staffid;
            editstfsub1.value = sub1;
            editstfsub2.value = sub2;
            editstfsub3.value = sub3;
            editstfsub4.value = sub4;
            editstfaddress.value = address;
            editstfaddressline2.value = addressline2;
            editstfstate.value = state;
            editstfdistrict.value = district;
            editstfpost.value = post;
            editstfzip.value = zip;

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
                window.location = `/admin/staffdata.php?delete= ${sno}`;
            } else {
                console.log('No');
            }
        })
    })





</script>


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