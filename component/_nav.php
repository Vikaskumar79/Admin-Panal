<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/logo1.png" type="image/x-icon" />

    <!-- Font Awesome Link Tag -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!-- Tailwind CSS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> -->

    <!-- <link rel="stylesheet" href="_nav.css"> -->

    <title>Admin Pannel</title>
    <style>
        .directorSirLogo {
            border-radius: 30%;
        }

        .navbar-nav .nav-link:hover {
            color: yellow !important;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #4c5a7d">
        <div class="container-fluid">
            <a class="navbar-brand " href="#"><img src="images/ICClogo2.png" alt="clgLogo" height="70px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item me-1">
                        <a class="nav-link active text-white" aria-current="page" href="/admin/admin.php">Home
                            <i class="fa-solid fa-house-user" style="font-size: 15px"></i>
                        </a>
                    </li>

                    <li class="nav-item me-1">
                        <a class="nav-link text-white" href="/admin/staff.php">Staffs
                            <i class="fa-solid fa-user-plus" style="font-size: 15px"></i>
                        </a>
                    </li>

                    <li class="nav-item me-1">
                        <a class="nav-link text-white" href="/admin/staffdata.php">Staffs
                            <i class="fa-solid fa-circle-user" style="font-size: 15px"></i>
                        </a>
                    </li>

                    <li class="nav-item me-1">
                        <a class="nav-link text-white" href="/admin/student.php">Students
                            <i class="fa-solid fa-user-plus" style="font-size: 15px"></i>
                        </a>
                    </li>

                    <li class="nav-item me-1">
                        <a class="nav-link text-white" href="/admin/datatable.php">Students
                            <i class="fa-solid fa-circle-user" style="font-size: 15px"></i>
                        </a>
                    </li>

                    <li class="nav-item me-1">
                        <a class="nav-link text-white" href="/admin/component/add_notices.php">Notices
                            <i class="fa-solid fa-file-circle-plus" style="font-size: 15px"></i>
                        </a>
                    </li>

                    <li class="nav-item me-1">
                        <a class="nav-link text-white" href="/admin/notice_front.php">Notices
                            <i class="fa-regular fa-file" style="font-size: 15px"></i>
                        </a>
                    </li>

                    <li class="nav-item me-1">
                        <a class="nav-link text-white" href="/admin/component/add_event.php">Event
                            <i class="fa-solid fa-calendar-plus" style="font-size: 15px"></i>
                        </a>
                    </li>

                    <li class="nav-item me-1">
                        <a class="nav-link text-white" href="/admin/event_front.php">Event
                            <i class="fa-solid fa-calendar-days" style="font-size: 15px"></i>
                        </a>
                    </li>

                    <li class="nav-item me-5">
                        <a class="nav-link text-white" href="/admin/feedback_admin.php">Feedback
                            <i class="fa-solid fa-comment" style="font-size: 15px"></i>
                        </a>
                    </li>
                </ul>


                <form class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown me-4">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ICC GIDA 
                                <i class="fa-solid fa-user-graduate"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                <li><a class="dropdown-item" href="/admin/student.php">Add Students</a></li>
                                <li><a class="dropdown-item" href="/admin/staff.php">Add Staff</a></li>
                                <li><a class="dropdown-item" href="/admin/component/add_notices.php">Add Notices</a>
                                </li>
                                <li><a class="dropdown-item" href="/admin/component/add_event.php">Add Event</a></li>
                                <hr>
                                <li>
                                    <a class="dropdown-item" href="/admin/logout.php">Logout
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button> -->
                </form>
            </div>
        </div>
    </nav>

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