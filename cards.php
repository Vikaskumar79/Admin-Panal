<?php
require 'component/connection.php';


// Count students
$student_count = 0;
$student_query = "SELECT COUNT(*) AS total FROM studentform";
$student_result = mysqli_query($conn, $student_query);
if ($student_result) {
    $student_data = mysqli_fetch_assoc($student_result);
    $student_count = $student_data['total'];
}

// Count staff
$staff_count = 0;
$staff_query = "SELECT COUNT(*) AS total FROM staff";
$staff_result = mysqli_query($conn, $staff_query);
if ($staff_result) {
    $staff_data = mysqli_fetch_assoc($staff_result);
    $staff_count = $staff_data['total'];
}

// Count active notices (adjust query based on your 'notices' table)
$notice_count = 0;
$notice_query = "SELECT COUNT(*) AS total FROM notices";
$notice_result = mysqli_query($conn, $notice_query);
if ($notice_result) {
    $notice_data = mysqli_fetch_assoc($notice_result);
    $notice_count = $notice_data['total'];
}

// Count upcoming events (adjust query based on your 'events' table and date field)

$event_count = 0;
$event_query = "SELECT COUNT(*) AS total FROM events WHERE event_date >= CURDATE()";
$event_result = mysqli_query($conn, $event_query);
if ($event_result) {
    $event_data = mysqli_fetch_assoc($event_result);
    $event_count = $event_data['total'];
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Tailwind CSS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> -->

    <title>Cards</title>
    <style>
        .marquee-wrapper {
            margin-top: 1px;
            width: 100%;
            overflow: hidden;
            background-color: #4c5a7d;
            padding: 10px;
            border-radius: 10px;
        }

        .marquee-text {
            display: inline-block;
            white-space: nowrap;
            animation: scroll-left 10s linear infinite;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        @keyframes scroll-left {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        /* General styles for the container */
        .container {
            margin-top: 20px;
            /* Adjust as needed */
            border: none;
            /* margin-left: 260px; */
        }

        /* Style for the welcome heading */
        /* .container h2 {
            color: #333;
            margin-bottom: 20px;
        } */

        .card .card-body.text-center {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 105px;
            border-radius: 7px;
        }

        /* Styles for the number inside the card */
        .card .card-body h3.text-slate-600 {
            color: #4a5568;
            font-weight: 700;
            margin-bottom: 0;
        }

        /* Specific background colors based on Tailwind classes */
        .card .card-body.bg-lime-300 {
            background-color: #a7f3d0;
            /* Tailwind's lime-300 */
            color: #4a5568;
            /* Ensure text is readable on this background */
        }
    </style>
</head>

<body>
    <div class="marquee-wrapper">
        <div class="marquee-text">
            👋 Welcome to the Admin Panel! Have a great day managing your college website! 🎓
        </div>
    </div>
    <!-- <h1>Hello, world!</h1> -->
    <div class="container">
        <!-- <h2>Welcome, Admin</h2> -->
        <div class="row text-white">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center bg-lime-300">
                        <h5 class="text-slate-600 dark:text-slate-600">Total Students</h5>
                        <h3 class="text-slate-600 dark:text-slate-600">
                            <?php echo $student_count; ?>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card cardbg">
                    <div class="card-body text-center bg-lime-300">
                        <h5 class="text-slate-600 dark:text-slate-600">Total Staff</h5>
                        <h3 class="text-slate-600 dark:text-slate-600">
                            <?php echo $staff_count; ?>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card cardbg">
                    <div class="card-body text-center bg-lime-300">
                        <h5 class="text-slate-600 dark:text-slate-600">Active Notices</h5>
                        <h3 class="text-slate-600 dark:text-slate-600">
                            <?php echo $notice_count; ?>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card cardbg">
                    <div class="card-body text-center bg-lime-300">
                        <h5 class="text-slate-600 dark:text-slate-600">Upcoming Events</h5>
                        <h3 class="text-slate-600 dark:text-slate-600">
                            <?php echo $event_count; ?>
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="card mt-4">
            <div class="card-header bg-primary text-white">
                Quick Links
            </div>
            <div class="card-body">
                <a href="add_staff.php" class="btn btn-outline-primary m-2">Add Staff</a>
                <a href="staff.php" class="btn btn-outline-secondary m-2">View Staff</a>
                <a href="add_student.php" class="btn btn-outline-primary m-2">Add Student</a>
                <a href="students.php" class="btn btn-outline-secondary m-2">View Students</a>
                <a href="notices.php" class="btn btn-outline-info m-2">Manage Notices</a>
                <a href="event.php" class="btn btn-outline-danger m-2">Manage Events</a>
            </div> -->
    </div>
    <!-- </div> -->

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