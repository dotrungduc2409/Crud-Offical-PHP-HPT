<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">

  <h2>Dữ liệu sinh viên</h2>
  <table class="table table-striped" >
    <!-- HEADER -->
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>TP Number</th>
      <th>                </th>
    </tr>
  <!-- ISI -->
  <?php
    //Lùi lại 1 thư mục để gọi file config
    require "../config/config.php";

  //Câu lệnh khung mẫu - có thể gọi lại nhiều lần
    $retrieve = $mysqli->prepare("SELECT id,name,tpnumber FROM students");
    //Do đã cbj khung mẫu nên sẽ Gọi trực tiếp hàm thực thi lần lượt xếp các dữ liệu vào khung trên
    $retrieve->execute();
    //
    $retrieve->store_result();
    //Gắn các giá trị vào khung #26
    $retrieve->bind_result($id,$name,$tpnumber);
    if($retrieve->num_rows>0){
      while($row=$retrieve->fetch()){//trích 1 dòng từ đối tượng dữ liệu để hiển thị
    

  ?>
    <!-- Bảng thể hiện danh sách dữ liệu sinh viên -->
    <tr>
      <td><?php echo $id; ?></td>
      <td><?php echo $name; ?></td>
      <td><?php echo 'TP'.$tpnumber;?></td>
      <td>
          <a href="../controller/remove.php?id=<?php echo $id;?>"> <button  class="col-sm-6 btn btn-danger"  >  Xóa  </button></a>
          <a  href="edit/?id=<?php echo $id;?>"> <button  class="col-sm-6 btn btn-info"  >  Chỉnh sửa  </button></a>
      </td>
    </tr>
  <?php }} else{
      //Nếu ko có dữ liệu sẽ báo 
      echo "<h4>Không có nha</h4>";
    }
    ?>
  </table>
  
  <!-- Gọi tới mục index trong input để thực thi -->
  <div class="text-right col-sm-12">
    <a href="input/index.php"> <button class="btn btn-warning">  Thêm mới  </button></a>
  </div>

  <?php
    //Câu lệnh thông báo khi xóa
    if(isset($_GET['message'])){
      if($_GET['message']=="deleted"){
        echo "<h4> Success </h4>";
      } else{
        echo "<h4>Failed</h4>";
      }
    }
  ?>

</div>

</body>
</html>
