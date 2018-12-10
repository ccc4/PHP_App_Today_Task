<?php
  include "./missionDB.php";
  $date = date('Y-m-d');
  $sql = "INSERT INTO task (content, date) VALUES ('".$_POST['newContent']."', '".$date."')";
  $result = mysqli_query($conn, $sql);
 ?>

 <script>
   location.href = "./index.php";
 </script>
