
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rooms</title>
</head>
<body>
  <h1>Rooms</h1>
  <ol>
    @foreach ($roomList as $room)
      <li>
        <ul style="margin: 0 0 1em;">
          <li>{{ $room['name'] }}</li>
          <li>{{ $room['number'] }}</li>
          <li>{{ $room['price_night'] }}</li>
          <li>{{ $room['discount'] }}</li>
        </ul>      
      </li>
    @endforeach
  </ol>
</body>
</html>