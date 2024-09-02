<?php 

  $fileName = "roomList.json";

  $roomList = file_get_contents("$fileName");

?>

<pre>

  <?= $roomList ?>
  
</pre>