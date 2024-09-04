<?php
  $roomList = array();

  for ($i=0; $i < 3; $i++) { 
    $roomList[] = array(
      "ID" => $i,
      "Name" => "Room $i", 
      "Number" => "10$i",
      "Price" => rand(50, 150), 
      "Discount" => rand(5, 20)
    );
  }
?>

<pre>
  <?= print_r($roomList) ?>
</pre>
