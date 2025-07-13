<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Director Profile </title>

  <!-- Site Icons -->
  <link rel="shortcut icon" href="images/logo1.png" type="image/x-icon" />


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to right, #e0f7fa, #fce4ec);
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 40px 20px;
      position: relative;
    }

    .profile-card {
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      padding: 40px;
      max-width: 900px;
      width: 100%;
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
      align-items: center;
    }

    .profile-img {
      flex: 1 1 250px;
      text-align: center;
    }

    .profile-img img {
      width: 220px;
      height: 220px;
      object-fit: cover;
      border-radius: 50%;
      border: 6px solid #4A90E2;
    }

    .profile-info {
      flex: 2 1 500px;
    }

    .profile-info h1 {
      font-size: 32px;
      color: #2c3e50;
    }

    .profile-info h3 {
      color: #7B1FA2;
      font-weight: 500;
      margin-bottom: 20px;
    }

    .profile-info p {
      font-size: 16px;
      line-height: 1.6;
      margin-bottom: 15px;
    }

    .contact-info {
      margin-top: 20px;
    }

    .contact-info div {
      margin: 8px 0;
      font-size: 15px;
    }

    .contact-info i {
      color: #4A90E2;
      margin-right: 10px;
    }

    .homeBtn {
      position: fixed;
      top: 20px;
      right: 20px;
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
      z-index: 999;
    }

    .homeBtn:hover {
      background: rgba(255, 255, 255, 0.4);
      transform: translateY(-2px);
    }

    .homeBtn i {
      margin-left: 10px;
      font-size: 18px;
    }

    @media (max-width: 768px) {
      .profile-card {
        flex-direction: column;
        align-items: center;
        text-align: center;
      }

      .profile-info {
        padding: 0;
      }
    }
  </style>
</head>
<body>

  <!-- Home Button -->
  <button class="homeBtn" onclick="window.location.href='/admin/admin.php'">
    Home <i class="fa-solid fa-house"></i>
  </button>

  <div class="profile-card">
    <div class="profile-img">
      <img src="images/director2.png" alt="Director Photo">
    </div>
    <div class="profile-info">
      <h1>Prof. Soheb Ahmed</h1>
      <h3>Director, Islamia College of Commerce, GIDA, Gorakhpur</h3>
      <p>
        Prof. Soheb Ahmed leads Islamia College with dedication and vision, contributing over two decades of service in higher education. 
        His leadership has helped shape a dynamic and inclusive academic environment focused on excellence and community development.
      </p>
      <div class="contact-info">
        <div><i class="fa-solid fa-envelope"></i> sohebahmed@islamia.edu</div>
        <div><i class="fa-solid fa-phone"></i> +91 0000000000</div>
        <div><i class="fa-solid fa-location-dot"></i> GIDA, Gorakhpur, Uttar Pradesh, India</div>
      </div>
    </div>
  </div>

</body>
</html>
