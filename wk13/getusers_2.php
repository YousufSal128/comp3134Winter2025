<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



$servername = "localhost";
$username = "webuser";
$password = "mypassword123";
$dbname = "cybersec_lab";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$query = isset($_GET['firstname']) ? $_GET['firstname'] : '';

echo '<form method="GET">
  <label for="firstname">Search by First Name:</label>
  <input type="text" id="firstname" name="firstname">
  <button type="submit">Search</button>
</form>';

if (!empty($query)) {
  $stmt = $conn->prepare("SELECT * FROM users WHERE firstname = ? AND active = 1");
$stmt->bind_param("s", $query);
$stmt->execute();
$result = $stmt->get_result();


  if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr><th>ID</th><th>Username</th><th>Email</th><th>First Name</th><th>Last Name</th><th>Active</th></tr>";
    while($row = $result->fetch_assoc()) {
      echo "<tr>
              <td>{$row['id']}</td>
              <td>{$row['username']}</td>
              <td>{$row['email']}</td>
              <td>{$row['firstname']}</td>
              <td>{$row['lastname']}</td>
              <td>{$row['active']}</td>
            </tr>";
    }
    echo "</table>";
  } else {
    echo "No active users with the first name '$query' found.";
  }
}

$conn->close();
?>


