<?php
  include "./missionDB.php";
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>일정관리</title>
    <link rel="stylesheet" href="./style.css">
  </head>
  <body>
    <div>
      <h1>Task List</h1>
      <!-- <?php
        $test_sql = "SELECT * FROM task";
        $test_result = mysqli_query($conn, $test_sql);
        $test_row = mysqli_fetch_assoc($test_result);
        echo "test 시작";
        echo $test_row['idx'];
        echo $test_row['content'];
        echo $test_row['date'];

      ?> -->

      <div id="TodayTask">
        <h2><strong>Today Task</strong></h2>
        <form action="./AddTask.php" method="post">
          <input type="text" name="newContent" maxlength="20">
          <button>Add Task</button>
        </form>
        <ul>
          <?php
            $today = date('Y-m-d ');
            $result = mysqli_query($conn, "SELECT * FROM task WHERE date = '$today' ORDER BY idx DESC");
            $result = mysqli_query($conn, "SELECT * FROM task ORDER BY idx DESC");
            while($row = mysqli_fetch_assoc($result)){
           ?>
            <li><?=$row['content']?><button onclick="location.href='./DeleteTask.php?id=<?=$row['idx']?>'">완료</button></li>
          <?php } ?>
        </ul>
      </div>

      <div id="PastTask">
        <h2><strong>Past Task</strong></h2>
        <ul>
          <?php
            $result2 = mysqli_query($conn, "SELECT * FROM task WHERE date < '$today' ORDER BY idx DESC");
            while($row = mysqli_fetch_assoc($result2)){
           ?>
            <li><?=$row['content']?><button onclick="location.href='./DeleteTask.php?id=<?=$row['idx']?>'">완료</button></li>
          <?php } ?>
        </ul>
      </div>

    </div>
  </body>
</html>
