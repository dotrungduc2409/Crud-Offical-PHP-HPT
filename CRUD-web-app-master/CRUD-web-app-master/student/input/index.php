<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Thêm mới</h2>
  <div class="text-right">
    <a href="../">Trang chủ</a>
  </div>
  <!--Phương thức Post và gọi hàm input ở Controller thực thi -->
  <form method="POST" action="../../controller/input.php">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" placeholder="Enter Name" name="name">
    </div>
    <div class="form-group">
      <label for="tpnumber">TP Number:</label>
      <input type="number" class="form-control" placeholder="Enter TP Number" name="tpnumber">
    </div>
    <button type="submit" name="newbutton" value="submit" class="btn btn-default">Submit</button>
  </form>
  <?php
    if(isset($_GET['message'])){
      if($_GET['message']=="success"){
        echo "<h4> Success nha </h4>";
        //
      } else if ($_GET['message']=="specifydata"){
        echo "<h4> 123 </h4>";
      } else{
        echo "<h4>Filed rồiiiiiii</h4>";
      }
    }
  ?>
</div>

</body>
</html>

