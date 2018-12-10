<?php
  include "./missionDB.php";
  $num = $_GET['id'];
  $result = mysqli_query($conn, "DELETE FROM task WHERE idx = $num");
 ?>
 <script type="text/javascript">
   location.href = "./index.php";
 </script>
