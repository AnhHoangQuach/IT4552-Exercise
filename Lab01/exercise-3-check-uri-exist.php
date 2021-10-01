<html>

<head>
  <title>PHP Test</title>
</head>

<body>
  <?php
  if (file_exists("test.txt")) {
    echo file_get_contents("test.txt");
  } else {
    echo "File not exist";
  }
  ?>
  <a href="https://ctt.hust.edu.vn/">HUST UNIVERSITY</a>
</body>

</html>