<?php 

include "../config/config.php";
if(isset($_POST['editbutton'])){
    // Chuyển dữ liệu sang 1 biến
    $id = $_POST['id'];
    $name=$_POST['name'];
    $tpnumber=$_POST['tpnumber'];

    //Kiểm tra trùng
    $check = $mysqli->prepare("SELECT * FROM students where name=? or tpnumber=?");
    $check->bind_param("ss",$name,$tpnumber);
    $check->execute();
    $check->store_result();
    if($check->num_rows >1){
        // Nếu trùng dữ liệu
        header("location: ../student/edit/?id=$id&message=duplicate");
    } else{
        $update=$mysqli->prepare("UPDATE students SET name=?,tpnumber=? where id =?");
        $update->bind_param("sss", $name,$tpnumber,$id);
        $result=$update->execute();
        if($result){
            // Cập nhập thành công
            header("location: ../student/edit/?id=$id&message=success");
        }else{
            // Cập nhập failed
            header("location: ../student/edit/?id=$id&message=sqlfail");
        }
    }
}else{
    header("location: ../student/");
}

?>