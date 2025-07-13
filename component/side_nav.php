<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">

  <!-- Font Awesome Link Tag -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />


  <title>Sidebar</title>
</head>
<style>
  .sidebar {
    position: relative;
    top: 0;
    bottom: 0;
    left: 0;
    width: 260px;
    height: fit-content;
    display: block;
    z-index: 1;
    color: #ffffff;
    font-weight: 200;
    background: #ffffff;
    background-size: cover;
    background-position: center center;
    border-right: 1px solid #eee;
    box-shadow: 6px 1px 20px rgba(69, 65, 78, 0.1);
  }

  .sidebar .user {
    /* margin-top: 12.5px; */
    padding-left: 25px;
    padding-right: 25px;
    padding-bottom: 12.5px;
    border-bottom: 1px solid #eee;
    display: block;
  }

  .sidebar .user .photo {
    width: 40px;
    height: 40px;
    overflow: hidden;
    float: left;
    margin-right: 11px;
    z-index: 5;
    border-radius: 50%;
  }

  .sidebar .user .photo img {
    width: 100%;
    height: 100%;
  }

  .sidebar .user .info a {
    white-space: nowrap;
    display: block;
    position: relative;
  }

  .sidebar .nav .nav-item a,
  .sidebar .user .info a {
    text-decoration: none;
  }


  .sidebar .user .info a>span {
    font-size: 14px;
    font-weight: 600;
    color: #777;
    letter-spacing: 0.04em;
    display: flex;
    flex-direction: column;
  }

  .sidebar .user .info a>span .user-level {
    color: #555;
    font-weight: 700;
    font-size: 13px;
    letter-spacing: 0.05em;
    margin-top: 5px;
  }

  .sidebar .user .info a .link-collapse {
    padding: 7px 0;
  }

  .sidebar .user .info .caret {
    position: absolute;
    top: 17px;
    right: 0px;
    border-top-color: #777;
  }

  .sidebar .sidebar-wrapper {
    position: relative;
    max-height: calc(100vh - 75px);
    min-height: 100%;
    overflow: auto;
    width: 260px;
    z-index: 4;
    padding-top: 55px;
    padding-bottom: 100px;
  }

  .sidebar .nav {
    display: block;
    float: none;
    margin-top: 20px;
  }

  .sidebar .nav .nav-item {
    display: list-item;
  }

  .sidebar .nav .nav-item.active {
    color: #575962;
    font-weight: 700;
  }

  .sidebar .nav .nav-item.active a:before {
    position: absolute;
    z-index: 1;
    width: 3px;
    height: 100%;
    content: '';
    left: 0;
    top: 0;
  }


  .sidebar .nav .nav-item a {
    display: flex;
    align-items: center;
    color: #83848a;
    padding: 13px 25px;
    width: 100%;
    font-size: 14px;
    font-weight: 600;
    position: relative;
    margin-bottom: 5px;
  }

  .sidebar .nav .nav-item a:hover,
  .sidebar .nav .nav-item a:focus {
    text-decoration: none;
    background: #93a5f3;
  }

  .sidebar .nav .nav-item:hover a:before {
    background: #1d7af3;
    opacity: 0.7;
    position: absolute;
    z-index: 1;
    width: 3px;
    height: 100%;
    content: '';
    left: 0;
    top: 0;
  }


  .sidebar .nav .nav-item a {
    background-color: #f7f9fb;
  }


  .sidebar .nav .nav-item a i {
    font-size: 23px;
    color: #C3C5CA;
    margin-right: 15px;
    width: 25px;
    text-align: center;
    vertical-align: middle;
    float: left;
  }

  .sidebar .nav .nav-item a p {
    font-size: 14px;
    margin-bottom: 0px;
    letter-spacing: .04em;
    margin-right: 5px;
  }

  .navbar .navbar-nav .nav-item .nav-link {
    display: inline-block;
    vertical-align: middle;
    color: #666;
    line-height: 55px;
    letter-spacing: 0.04em;
    padding: 0 20px 0 0;
    position: relative;
    font-size: 14px;
    font-weight: 500;
    text-align: center;
  }

  .navbar .navbar-nav .nav-item .nav-link i {
    font-size: 22px;
    width: 30px;
    vertical-align: middle;
  }

  .s-logout {
    margin: 15px 25px;
  }

  .s-logout button {
    padding: 2px 2px;
    /* background: #4d7cfe; */
    /* color: #fff; */
    /* border-radius: 6px;*/
    justify-content: center; 
    width: 80%;
    border: 0;
    cursor: pointer;
  }

  .s-logout button a .logt{
    width: 80%;
    font-size: 16px;
    margin-left: 10%;
  }

  .s-logout button a,
  .s-logout button i {
    /* padding: 2px 2px; */
    justify-content: center;
    gap: 8px;
    color: #fff !important;
    border-radius: 6px;
    margin-bottom: 0px;
    display: inline;
  }
  .s-logout button:hover{
    border-radius: 6px;
    background: #1d50dc;
  }


  /*     Responsive     */

  @media screen and (min-width: 992px) {

    /*
    .main-header .logo-header {
      line-height: 52px;
    }
      */
    .sidebar .scroll-element {
      opacity: 0;
      transition: all .2s;
    }

    .sidebar:hover .scroll-element {
      opacity: 1;
    }
  }

  @media screen and (max-width: 991px) {
    .sidebar {
      position: fixed;
      left: 0 !important;
      right: 0;
      transform: translate3d(-270px, 0, 0) !important;
      transition: all .5s;
    }

    .sidebar .sidebar-wrapper {
      padding-top: 0px;
    }

    .nav_open {
      overflow: hidden !important;
    }

    .nav_open .main-panel,
    .nav_open .main-header {
      -webkit-transform: translate3d(260px, 0, 0);
      -moz-transform: translate3d(260px, 0, 0);
      -o-transform: translate3d(260px, 0, 0);
      -ms-transform: translate3d(260px, 0, 0);
      transform: translate3d(260px, 0, 0) !important;
    }
  }
</style>
 <!-- Site Icons -->
 <link rel="shortcut icon" href="images/logo1.png" type="image/x-icon" />



<body>
  <div class="sidebar">
    <div class="scrollbar-inner sidebar-wrapper">
      <div class="user">
        <div class="photo">
          <img src="images/director2.png">
        </div>
        <div class="info">
          <a class="" data-toggle="collapse" href="side_nav.html" aria-expanded="true">
            <span>
              Soheb Ahmad
              <span class="user-level">Administrator</span>
            </span>
          </a>
        </div>
      </div>

      <ul class="nav">
        <li class="nav-item active">
          <a href="/admin/admin.php">
            <i class="la la-dashboard"></i>
            <i class="fa-solid fa-house-user"></i>
            <p>Home</p>
          </a>
        </li>
        <li class="nav-item ">
          <a href="/admin/staffdata.php">
            <i class="la la-keyboard-o"></i>
            <i class="fa-solid fa-circle-user"></i>
            <p>Staff</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/admin/datatable.php">
            <i class="la la-th"></i>
            <i class="fa-solid fa-circle-user"></i>
            <p>Student</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/admin/notice_front.php">
            <i class="la la-th"></i>
            <i class="fa-regular fa-file"></i>
            <p>Notice</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#event">
            <i class="la la-th"></i>
            <i class="fa-solid fa-calendar-days"></i>
            <p>Event</p>
          </a>
        </li>

        <li class="nav-item s-logout">
          <!-- <button  data-toggle="modal" data-target="#modalUpdate"> -->
          <!-- <button>
             <i class="la la-hand-pointer-o"></i> 
            <p> Logout</p>
            <i class="fa-solid fa-right-from-bracket"></i>
          </button> -->
          <button>
            <a style="background: #1d50dc" href="logout.php">
              <span class="logt">  Logout </span>
              <i class="fa-solid fa-right-from-bracket"></i>
            </a>
          </button>
        </li>
      </ul>
    </div>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>

</html>