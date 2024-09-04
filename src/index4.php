<?php 
  $filePath = "roomList.json";
  $roomListData = file_get_contents($filePath);
  $roomList = json_decode($roomListData, true);

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
