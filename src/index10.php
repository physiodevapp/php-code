<?php 

require '../vendor/autoload.php';

use Dotenv\Dotenv;
use eftec\bladeone\BladeOne;

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
$roomData = $mysqli -> query($sql);
$roomList = $roomData-> fetch_all(MYSQLI_ASSOC);
$roomData->free();

$views = __DIR__ . '/../views';
$cache = __DIR__ . '/../views';

$blade = new BladeOne($views, $cache, BladeOne::MODE_AUTO);

echo $blade->run("roomList", ['roomList' => $roomList]);

?>