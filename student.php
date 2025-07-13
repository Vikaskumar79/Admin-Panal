<?php
$servername = "localhost:3303"; // Make sure the port is correct
$username = "root"; // Your database username
$password = "Vikas@961656"; // Your database password 
$dbname = "clgadmin"; // Your database name
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno()) {
    die("" . mysqli_connect_error());
}

$insert = false;
// ====== Inserting Record in database ======
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stdname = $_POST['stdname'];
    $stddob = $_POST['stddob'];
    $stdemail = $_POST['stdemail'];
    $stdphone = $_POST['stdphone'];
    $stdgender = $_POST['stdgender'];
    $stdcategory = $_POST['stdcategory'];
    $stdaadhar = $_POST['stdaadhar'];
    $stdadmission = $_POST['stdadmission'];
    $stdcourse = $_POST['stdcourse'];
    $stdcurrentyear = $_POST['stdcurrentyear'];
    $stdsemester = $_POST['stdsemester'];
    $stdid = $_POST['stdid'];
    $stdfathername = $_POST['stdfathername'];
    $stdfatherphone = $_POST['stdfatherphone'];
    $stdfatherqua = $_POST['stdfatherqua'];
    $stdfatheroccu = $_POST['stdfatheroccu'];
    $stdmothername = $_POST['stdmothername'];
    $stdmotherphone = $_POST['stdmotherphone'];
    $stdmotherqua = $_POST['stdmotherqua'];
    $stdmotheroccu = $_POST['stdmotheroccu'];
    $stdcurraddress = $_POST['stdcurraddress'];
    $stdcurraddressline2 = $_POST['stdcurraddressline2'];
    $stdcurrstate = $_POST['stdcurrstate'];
    $stdcurrdistrict = $_POST['stdcurrdistrict'];
    $stdcurrpost = $_POST['stdcurrpost'];
    $stdcurrzip = $_POST['stdcurrzip'];
    $stdpermaddress = $_POST['stdpermaddress'];
    $stdpermaddressline2 = $_POST['stdpermaddressline2'];
    $stdpermstate = $_POST['stdpermstate'];
    $stdpermdistrict = $_POST['stdpermdistrict'];
    $stdpermpost = $_POST['stdpermpost'];
    $stdpermzip = $_POST['stdpermzip'];

    $sql = "INSERT INTO `studentform`(`fullname`, `dob`, `email`, `phone`, `gender`, `category`, `aadhar`, `admission`, `course`, `currentyear`, `semester`, `studentid`, `fathername`, `fatherphone`, `fatherqua`, `fatheroccu`, `mothername`, `motherphone`, `motherqua`, `motheroccu`, `curraddress`,`curraddressline2`, `currstate`, `currdistrict`, `currpost`, `currzip`, `peraddress`, `peraddressline2`, `perstate`, `perdistrict`, `perpost`, `perzip`) 
    VALUES('$stdname', '$stddob', '$stdemail', '$stdphone', '$stdgender', '$stdcategory', '$stdaadhar' , '$stdadmission', '$stdcourse', '$stdcurrentyear', '$stdsemester', '$stdid', '$stdfathername', '$stdfatherphone', '$stdfatherqua', '$stdfatheroccu', '$stdmothername', '$stdmotherphone', '$stdmotherqua', '$stdmotheroccu', '$stdcurraddress', '$stdcurraddressline2', '$stdcurrstate', '$stdcurrdistrict', '$stdcurrpost','$stdcurrzip', '$stdpermaddress', '$stdpermaddressline2', '$stdpermstate', '$stdpermdistrict', '$stdpermpost', '$stdpermzip')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // echo "insertion Success";
        $insert = true;
        
    }
}

?>



<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Site Icons -->
     <link rel="shortcut icon" href="images/logo1.png" type="image/x-icon" />


    <!----======== Bootstrap CSS ======== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style/studentstyle.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Student Regisration Form </title>
</head>

<body>

    <div class="container">
    <?php
    if($insert){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Student has inserted successfully!!.
        <button role='button' type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
        </button>
        </div>";
    }
    ?>
        <header>Student Details</header>

        <button class="homeBtn" onclick="document.location= 'admin.php'">
            <span class="btnText top-0">Home</span>
            <!-- <i class="uil uil-navigator"></i> -->
            <i class="fa-solid fa-house"></i>
        </button>

        <form action="/admin/student.php" method="post">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" placeholder="Enter your name" name="stdname" required>
                        </div>

                        <div class="input-field">
                            <label>Date of Birth</label>
                            <input type="date" placeholder="Enter birth date" name="stddob" required>
                        </div>

                        <div class="input-field">
                            <label>Email</label>
                            <input type="email" placeholder="Enter your email" name="stdemail" required>
                        </div>

                        <div class="input-field">
                            <label>Mobile Number</label>
                            <input type="tel" placeholder="Enter mobile number" name="stdphone" required>
                        </div>

                        <div class="input-field">
                            <label>Gender</label>
                            <select required name="stdgender">
                                <option disabled selected>Select gender</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Others</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Category</label>
                            <select required name="stdcategory">
                                <option disabled selected>Select Category</option>
                                <option>GEN</option>
                                <option>OBC</option>
                                <option>ST/SC</option>
                                <option>Others</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Aadhar Number</label>
                            <input type="text" placeholder="Enter Aadhar number" name="stdaadhar" required>
                        </div>

                        <div class="input-field">
                            <label>Admission Date</label>
                            <input type="date" placeholder="Enter your issued date" name="stdadmission" required>
                        </div>

                        <div class="input-field">
                            <label>Courses</label>
                            <select required name="stdcourse">
                                <option disabled selected>Select Course</option>
                                <option>BCA</option>
                                <option>B.Com</option>
                                <option>BBA</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Current Year</label>
                            <select required name="stdcurrentyear">
                                <option disabled selected>Select Year</option>
                                <option>1st Year</option>
                                <option>2nd Year</option>
                                <option>3rd Year</option>
                                <option>4th Year</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Semester</label>
                            <select required name="stdsemester">
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
                            <input type="text" placeholder="Enter Student ID" name="stdid" required>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="details ID">
                    <span class="title">Father's Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Father's Name</label>
                            <input type="text" placeholder="Enter father name" name="stdfathername" required>
                        </div>

                        <div class="input-field">
                            <label>Phone Number</label>
                            <input type="tel" placeholder="Enter Phone number" name="stdfatherphone" required>
                        </div>

                        <div class="input-field">
                            <label>Father Qualification</label>
                            <select required name="stdfatherqua">
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
                            <input type="text" id="guardian_occupation" name="stdfatheroccu"
                                placeholder="Father Occupation">
                        </div>

                    </div>
                </div>
                <hr>

                <div class="details ID">
                    <span class="title">Mother's Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Mother's Name</label>
                            <input type="text" placeholder="Enter mother name" name="stdmothername" required>
                        </div>

                        <div class="input-field">
                            <label>Phone Number</label>
                            <input type="tel" placeholder="Enter Phone number" name="stdmotherphone" required>
                        </div>

                        <div class="input-field">
                            <label>Mother Qualification</label>
                            <select required name="stdmotherqua">
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
                            <input type="text" id="guardian_occupation" name="stdmotheroccu"
                                placeholder="Mother Occupation">
                        </div>

                    </div>

                    <button class="nextBtn">
                        <span class="btnText">Next</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                </div>
            </div>

            <div class="form second">
                <div class="details address">
                    <span class="title">Address Details</span>
                    <span class="title">Current Address </span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Street Address</label>
                            <input type="text" placeholder="Street Address" name="stdcurraddress" required>
                        </div>

                        <div class="input-field">
                            <label>Address Line 2</label>
                            <input type="text" placeholder="Street Address Line 2" name="stdcurraddressline2" required>
                        </div>

                        <div class="input-field">
                            <label>State</label>
                            <select id='state' name="stdcurrstate" required>
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
                            <input type="text" placeholder="District" name="stdcurrdistrict" required>
                        </div>
                        <div class="input-field">
                            <label>Post Office</label>
                            <input type="text" placeholder="Post Office" name="stdcurrpost" required>
                        </div>

                        <div class="input-field">
                            <label>ZIP Code</label>
                            <input type="number" placeholder="Zip Code" name="stdcurrzip" required>
                        </div>

                    </div>
                </div>

                <div class="form second">
                    <div class="details address">
                        <span class="title">Permanent Address </span>
                        <label>
                            <input type="checkbox" id="sameAddress"> Same as Current Address
                        </label>

                        <div class="fields">
                            <div class="input-field">
                                <label>Street Address</label>
                                <input type="text" placeholder="Street Address" id="streetAddress" name="stdpermaddress"
                                    required>
                            </div>

                            <div class="input-field">
                                <label>Address Line 2</label>
                                <input type="text" placeholder="Landmark" id="addressLine2" name="stdpermaddressline2"
                                    required>
                            </div>

                            <div class="input-field">
                                <label>State</label>
                                <select id="permanentState" name="stdpermstate" required>
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
                                <input type="text" placeholder="District" id="district" name="stdpermdistrict" required>
                            </div>
                            <div class="input-field">
                                <label>Post Office</label>
                                <input type="text" placeholder="Post Office" id="postOffice" name="stdpermpost"
                                    required>
                            </div>

                            <div class="input-field">
                                <label>ZIP Code</label>
                                <input type="number" placeholder="Zip Code" id="perrZIP" name="stdpermzip" required>
                            </div>

                        </div>
                    </div>

                    <div class="buttons">
                        <div class="backBtn">
                            <i class="uil uil-navigator"></i>
                            <span class="btnText">Back</span>
                        </div>

                        <button class="sumbit submitBtn">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="script/studentscript.js"></script>

    <!-- =========== Bootstrap Js =========== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>