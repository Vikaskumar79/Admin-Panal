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
    $stfname = $_POST['stfname'];
    $stfemail = $_POST['stfemail'];
    $stfphone = $_POST['stfphone'];
    $stfgender = $_POST['stfgender'];
    $stfjoining = $_POST['stfjoining'];
    $stfcourse = $_POST['stfcourse'];
    $stfid = $_POST['stfid'];
    $stfsub1 = $_POST['stfsub1'];
    $stfsub2 = $_POST['stfsub2'];
    $stfsub3 = $_POST['stfsub3'];
    $stfsub4 = $_POST['stfsub4'];
    $stfaddress = $_POST['stfaddress'];
    $stfaddressline2 = $_POST['stfaddressline2'];
    $stfstate = $_POST['stfstate'];
    $stfdistrict = $_POST['stfdistrict'];
    $stfpost = $_POST['stfpost'];
    $stfzip = $_POST['stfzip'];

    $sql = "INSERT INTO `staff`(`fullname`, `email`, `phone`, `gender`, `joining`, `course`, `staffid`, `sub1`, `sub2`, `sub3`, `sub4`, `address`, `addressline2`, `state`, `district`, `post`, `zip`) VALUES 
    ('$stfname', '$stfemail', '$stfphone', '$stfgender', '$stfjoining', '$stfcourse', '$stfid', '$stfsub1', '$stfsub2', '$stfsub3', '$stfsub4',
    '$stfaddress', '$stfaddressline2', '$stfstate', '$stfdistrict', '$stfpost', '$stfzip')";
    $result = mysqli_query($conn,$sql);
    if($result){
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
    <link rel="stylesheet" href="style/staffstyle.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Staff Details</title>
</head>

<body>

    <div class="container">
    <?php
    if($insert){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Staff has inserted successfully!!.
        <button role='button' type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
        </button>
        </div>";
    }
    ?>
        <header> Add Staff Details</header>

        <button class="homeBtn top-0" onclick="document.location= 'admin.php'">
            <span class="btnText top-0">Home</span>
            <!-- <i class="uil uil-navigator"></i> -->
            <i class="fa-solid fa-house"></i>
        </button>

        <form action="/admin/staff.php" method="post">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" placeholder="Enter your name" name="stfname" required>
                        </div>

                        <div class="input-field">
                            <label>Email</label>
                            <input type="email" placeholder="Enter your email" name="stfemail" required>
                        </div>

                        <div class="input-field">
                            <label>Mobile Number</label>
                            <input type="tel" placeholder="Enter mobile number" name="stfphone" required>
                        </div>

                        <div class="input-field">
                            <label>Gender</label>
                            <select required name="stfgender">
                                <option disabled selected>Select gender</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Others</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Joining Date</label>
                            <input type="date" placeholder="Enter your issued date" name="stfjoining" required>
                        </div>

                        <div class="input-field">
                            <label>Courses</label>
                            <select required name="stfcourse">
                                <option disabled selected>Select Course</option>
                                <option>BCA</option>
                                <option>B.Com</option>
                                <option>BBA</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Staff ID </label>
                            <input type="text" placeholder="Enter Staff ID" name="stfid" required>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="details ID">
                    <span class="title">Subject's Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Subject 1 <span style="color: red;">*</span></label>
                            <input type="text" placeholder="Subject 1" name="stfsub1" required>
                        </div>
                        <div class="input-field">
                            <label>Subject 2</label>
                            <input type="text" placeholder="Subject 2" name="stfsub2">
                        </div>
                        <div class="input-field">
                            <label>Subject 3</label>
                            <input type="text" placeholder="Subject 3" name="stfsub3">
                        </div>
                        <div class="input-field">
                            <label>Subject 4</label>
                            <input type="text" placeholder="Subject 4" name="stfsub4">
                        </div>

                    </div>
                </div>

                <div class="details ID">

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
                            <input type="text" placeholder="Street Address" name="stfaddress" required>
                        </div>

                        <div class="input-field">
                            <label>Address Line 2</label>
                            <input type="text" placeholder="Street Address Line 2" name="stfaddressline2" required>
                        </div>

                        <div class="input-field">
                            <label>State</label>
                            <select id="state " name='stfstate' required>
                                <option >Select State</option>
                                <option >Andhra Pradesh</option>
                                <option >Arunachal Pradesh</option>
                                <option >Assam</option>
                                <option >Bihar</option>
                                <option >Chhattisgarh</option>
                                <option >Goa</option>
                                <option >Gujarat</option>
                                <option >Haryana</option>
                                <option >Himachal Pradesh</option>
                                <option >Jharkhand</option>
                                <option >Karnataka</option>
                                <option >Kerala</option>
                                <option >Madhya Pradesh</option>
                                <option >Maharashtra</option>
                                <option >Manipur</option>
                                <option >Meghalaya</option>
                                <option >Mizoram</option>
                                <option >Nagaland</option>
                                <option >Odisha</option>
                                <option >Punjab</option>
                                <option >Rajasthan</option>
                                <option >Sikkim</option>
                                <option >Tamil Nadu</option>
                                <option >Telangana</option>
                                <option >Tripura</option>
                                <option >Uttar Pradesh</option>
                                <option >Uttarakhand</option>
                                <option >West Bengal</option>
                                <option >Andaman and Nicobar Islands</option>
                                <option >Chandigarh</option>
                                <option >Dadra and Nagar Haveli</option>
                                <option >Daman and Diu</option>
                                <option >Delhi</option>
                                <option >Lakshadweep</option>
                                <option >Puducherry</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>District</label>
                            <input type="text" placeholder="District" name="stfdistrict" required>
                        </div>
                        <div class="input-field">
                            <label>Post Office</label>
                            <input type="text" placeholder="Post Office" name="stfpost" required>
                        </div>

                        <div class="input-field">
                            <label>ZIP Code</label>
                            <input type="number" placeholder="Zip Code" name="stfzip" required>
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
        </form>
    </div>

    <script src="script/staffscript.js"></script>

    <!-- =========== Bootstrap Js =========== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>