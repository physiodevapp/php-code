<?php 

require '../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$servername = "localhost";
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASSWORD'];
$dbname = "miranda";
$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL database: " . $mysqli -> connect_errno;

  exit();
}

$sql = "SELECT name, number, price_night, discount FROM rooms ORDER BY number";
$roomList = $mysqli -> query($sql);

?>

<h1>Rooms</h1>
<ol>
  <?php foreach ($roomList as $room): ?>
    <li>
      <ul style="position: relative;top: -1.06em;">
        <li><?= htmlspecialchars($room["name"]); ?></li>
        <li><?= htmlspecialchars($room["number"]); ?></li>
        <li><?= htmlspecialchars($room["price_night"]); ?></li>
        <li><?= htmlspecialchars($room["discount"]); ?></li>
      </ul>
    </li>
  <?php endforeach; ?>
</ol>