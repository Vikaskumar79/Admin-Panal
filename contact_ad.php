<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!-- Style -->
    <link rel="stylesheet" href="feed_contact.css">

    <title>Contact</title>
</head>

<body>
    <!-- <h1>Hello, world!</h1> -->

    <h2>Contact Us Details</h2>
    <hr>
    <div class="box">
        <table id="myTable" class="table table-striped display " style="width:100% ">
            <thead>
                <!-- class="dark:bg-gray-800" -->
                <!-- style="background-color: blue;" -->
                <tr>
                    <th>Sno</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Course</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'component/connection.php';
                $sno = 0;
                $sql = "SELECT * FROM `contact`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $sno += 1;
                    echo "<tr>
        
        <th scope='row'>" . $sno . "</th>
         <td>" . $row["fullname"] . "</td>
         <td>" . $row["phone"] . "</td>
         <td>" . $row["course"] . "</td>
         <td>" . $row["message"] . "</td>
         </tr>
        ";

                }

                ?>

            </tbody>
        </table>
    </div>

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