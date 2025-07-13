<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Event Manager</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f0f2f5;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 1000px;
      margin: 40px auto;
      background: white;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      color: #2c3e50;
      margin-bottom: 30px;
    }
    form {
      margin-bottom: 40px;
    }
    input, textarea, button {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border-radius: 6px;
      border: 1px solid #ccc;
    }
    button {
      background: #007BFF;
      color: white;
      border: none;
      cursor: pointer;
      transition: background 0.3s;
    }
    button:hover {
      background: #0056b3;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    .action-btns a {
      margin-right: 10px;
      text-decoration: none;
      padding: 6px 12px;
      border-radius: 4px;
      color: white;
    }
    .edit-btn {
      background-color: #28a745;
    }
    .delete-btn {
      background-color: #dc3545;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Event Manager - Admin Panel</h2>

    <!-- Add New Event -->
    <form action="adminevent.php" method="POST">
      <input type="text" name="title" placeholder="Event Title" required>
      <input type="datetime-local" name="datetime" required>
      <input type="text" name="location" placeholder="Location" required>
      <textarea name="description" rows="4" placeholder="Event Description" required></textarea>
      <input type="file" name="image" accept="image/*" >
      <button type="submit">Add Event</button>
    </form>

    <!-- Event Table -->
    <table>
      <thead>
        <tr>
          <th>Title</th>
          <th>Date & Time</th>
          <th>Location</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require 'component/connection.php';

        // $conn = new mysqli("localhost", "root", "", "college_db");
        // if ($conn->connect_error) {
        //   die("Connection failed: " . $conn->connect_error);
        // }

        $result = $conn->query("SELECT * FROM events ORDER BY datetime DESC");
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . htmlspecialchars($row['title']) . "</td>";
          echo "<td>" . date("M d, Y H:i", strtotime($row['datetime'])) . "</td>";
          echo "<td>" . htmlspecialchars($row['location']) . "</td>";
          echo "<td class='action-btns'>";
          echo "<a href='adminevent.php?id={$row['id']}' class='edit-btn'>Edit</a>";
          echo "<a href='adminevent.php?id={$row['id']}' class='delete-btn' onclick=\"return confirm('Delete this event?');\">Delete</a>";
          echo "</td>";
          echo "</tr>";
        }
        $conn->close();
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
