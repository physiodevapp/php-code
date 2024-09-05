
<?php

$method = $_SERVER['REQUEST_METHOD'];

$fields = ["name", "number", "price_night", "discount", "description", "cancellation_policy"];
$postData = [];

foreach ($fields as $field) {
  $postData[$field] = isset($_POST[$field]) ? htmlspecialchars($_POST[$field]) : '';
}

?>

<?php if ($method === 'POST'): ?>
  <h1>Room: <?= $postData['name'] ?></h1>
  <ul>
    <li>Name: <?= $postData['name'] ?></li>
    <li>Number: <?= $postData['number'] ?></li>
    <li>Price: <?= $postData['price_night'] ?> $/Night</li>
    <li>Discount: <?= $postData['discount'] ?>%</li>
    <li>Description: <?= $postData['description'] ?></li>
    <li>Cancellation policy: <?= $postData['cancellation_policy'] ?></li>
  </ul>
<?php else: ?>
  <form method="POST">
    <h2>Enter new room: </h2> 
    <div style="margin: 0 0 1em 0.6em;">
      Name: <input style="display: block;" type="text" name="name" id="">
    </div>
    <div style="margin: 0 0 1em 0.6em;">
      Number: <input style="display: block;" type="text" name="number" id="">
    </div>
    <div style="margin: 0 0 1em 0.6em;">
      Description:
      <textarea style="display: block;" name="description" id=""></textarea>
    </div>
    <div style="margin: 0 0 1em 0.6em;">
      Cancellation policy: <textarea style="display: block;" name="cancellation_policy" id=""></textarea>
    </div>
    <div style="margin: 0 0 1em 0.6em;">
      Price / night: <input style="display: block;" type="text" name="price_night" id="">
    </div>
    <div style="margin: 0 0 1em 0.6em;">
      Discount: <input style="display: block;" type="text" name="discount" id="">
    </div>
    <div style="margin: 0 0 1em 0.6em;">
      <button type="submit">Add room</button>
    </div>
  </form>
<?php endif; ?>