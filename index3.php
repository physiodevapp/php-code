<?php 
  $filePath="roomList.json";
  $jsonData = file_get_contents($filePath);
  $roomList = json_decode($jsonData, true);

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