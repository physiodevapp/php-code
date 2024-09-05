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

$searchValue = isset($_GET['name']) ? $_GET['name'] : '';

$searchValue = mysqli_real_escape_string($mysqli, $searchValue); 
$sql = "SELECT id, name, number, price_night, discount FROM rooms WHERE name LIKE '%$searchValue%' ORDER BY id";
$roomData = $mysqli -> query($sql);
$roomList = $roomData->fetch_all(MYSQLI_ASSOC);
$roomData->free();

?>

<form>
  <h2 style="display: inline-block;">Search by room name: </h2> <input type="text" name="name" id="">
  <button type="submit">Search</button>
</form>

<?php if ($roomList): ?>
  <ol>
    <?php foreach ($roomList as $room): ?>
      <li>
        <ul style="position: relative;top: -1.06em;">
          <li>Name: <b><?= htmlspecialchars($room["name"]); ?></b></li>
          <li>Number: <b><?= htmlspecialchars($room["number"]); ?></b></li>
          <li>Price: <b><?= htmlspecialchars($room["price_night"]); ?> $/Night</b></li>
          <li>Discount: <b><?= htmlspecialchars($room["discount"]); ?>%</b></li>
        </ul>
      </li>
    <?php endforeach; ?>
  </ol>
<?php else: ?>
    <h1>No rooms found.</h1>
<?php endif; ?>