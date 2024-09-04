<?php 

require '../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv -> load();

$servername = "localhost";
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASSWORD'];
$dbname = "miranda";
$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL database: " . $mysqli -> connect_errno;

  exit();
}

$sql = "SELECT id, name, number, price_night, discount FROM rooms ORDER BY id";
$roomData = $mysqli -> query($sql);
$roomList = $roomData->fetch_all(MYSQLI_ASSOC);
$roomData->free();

$roomId = isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT) !== false ? (int)$_GET['id'] : null;

if ($roomId) {
  $filteredRooms = array_filter($roomList, function($room) use ($roomId) {
    return (int)$room['id'] === $roomId;
  });

  $room = !empty($filteredRooms) ? reset($filteredRooms) : null;
} else {
  $room = null;
}

?>

<?php if ($room): ?>
    <h1>Room: <?= htmlspecialchars($room['name']) ?></h1>
    <ul>
      <li>Name: <?= $room['name'] ?></li>
      <li>Number: <?= $room['number'] ?></li>
      <li>Price: <?= $room['price_night'] ?></li>
    </ul>
<?php else: ?>
    <h1>Room not found.</h1>
<?php endif; ?>