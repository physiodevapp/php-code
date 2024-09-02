<?php 

  $fileName = "roomList.json";
  $roomData = file_get_contents($fileName);
  $roomList = json_decode($roomData, true);

?>

<pre>

  <?php print_r($roomList); ?>

</pre>