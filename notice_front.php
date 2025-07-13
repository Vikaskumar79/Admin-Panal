<?php

require 'component/connection.php';

$result = mysqli_query($conn, "SELECT * FROM notices ORDER BY created_at DESC");
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

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>ICC Admin</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #e0f7fa, #fce4ec);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        h1 {
            text-align: center;
            color: #333;
            padding: 40px 20px 20px;
            font-size: 36px;
        }

        .notices {
            display: flex;
            flex-direction: column;
            gap: 25px;
            width: 90%;
            max-width: 95%;
            margin: 0 auto;
            padding-bottom: 60px;
        }

        .notice-card {
            background: rgba(255, 255, 255, 0.85);
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
            border-left: 6px solid #4A90E2;
            backdrop-filter: blur(6px);
        }

        .notice-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
        }

        .notice-title {
            font-size: 22px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 8px;
        }

        .notice-date {
            font-size: 14px;
            color: #888;
            margin-bottom: 12px;
        }

        .notice-description {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
            /* white-space: pre-line; keeps line breaks */
        }

        /* Floating soft background shapes */
        .bg-shape {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.4;
            z-index: 0;
        }

        .shape1 {
            top: 10%;
            left: 5%;
            width: 200px;
            height: 200px;
            background: #ff4081;
        }

        .shape2 {
            bottom: 15%;
            right: 10%;
            width: 250px;
            height: 250px;
            background: #448aff;
        }

        .shape3 {
            top: 60%;
            left: 50%;
            width: 150px;
            height: 150px;
            background: #00e5ff;
        }

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
    </style>


</head>

<body>

    <!-- Floating color blobs -->
    <div class="bg-shape shape1"></div>
    <div class="bg-shape shape2"></div>
    <div class="bg-shape shape3"></div>

    <h1>📢 Latest College Notices</h1>
    <button class="homeBtn top-0" onclick="document.location= 'admin.php'">
        <span class="btnText top-0">Home</span>
        <!-- <i class="uil uil-navigator"></i> -->
        <i class="fa-solid fa-house"></i>
    </button>

    <div class="notices">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="notice-card">
                <div class="notice-title"><?= htmlspecialchars($row['title']) ?></div>
                <div class="notice-date"><?= date('d M Y, h:i A', strtotime($row['created_at'])) ?></div>
                <div class="notice-description"><?= nl2br(htmlspecialchars($row['description'])) ?></div>
            </div>
        <?php } ?>
    </div>

</body>

</html>