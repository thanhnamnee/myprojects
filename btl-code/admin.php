<?php include("header.php"); ?>
<?php
ob_start();
if(isset($_SESSION['name'])){ //Nếu đã đăng nhập
  $conn = mysqli_connect('localhost', 'root', '', 'btl') or die ('Không thể kết nối tới database');
  mysqli_set_charset($conn, 'utf8');
    if(isset($_GET['sub'])){ //Nếu ấn nút submit
      $sub=$_GET['sub'];
      //add
      if($sub=='add'){
        if($_POST['ten']!=null && $_POST['lop']!=null && $_POST['que']!=null && $_POST['vao']!=null && $_POST['noivao']!=null && $_POST['loai']!=null){
          $ten=$_POST['ten'];$lop=$_POST['lop'];
          $que=$_POST['que'];$vao=$_POST['vao'];
          $noivao=$_POST['noivao'];$loai=$_POST['loai'];
          $sql = "insert into doanvien (hoten,malop,que,hoatdong,noivaodoan,ngayvaodoan)
          values ('$ten','$lop','$que','$loai','$noivao','$vao')";
          if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Thêm Thành Công');window.location='admin.php';</script>";
          } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
          }
        } else {
          echo "<script>alert('Vui lòng nhập đủ các trường');window.location='admin.php';</script>";
          }
      }
      //delete
      if($sub=='delete'){
        $madoanvien=$_GET['id'];
        $sql1 = "delete from doanphi where madoanvien='$madoanvien'";
        $sql2 ="delete from doanvien where madoanvien='$madoanvien'";
        if (mysqli_query($conn, $sql1)  && mysqli_query($conn, $sql2)) {
          echo "<script>alert('Xóa Thành Công');window.location='admin.php';</script>";
        } else {
          echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
      }
      //update
      if($sub=='update'){
        $madoanvien=$_GET['id'];
        $sql ="select doanvien.madoanvien, hoten, doanvien.malop, que, hoatdong, noiohientai, ngayvaodoan, noivaodoan, tenlop from doanvien JOIN lop on doanvien.malop = lop.malop where madoanvien='$madoanvien'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        //lấy dữ liệu ra; 
        $ten=$row['hoten'];
        $que=$row['que'];$vao=$row['ngayvaodoan'];
        $noivao=$row['noivaodoan'];$loai=$row['hoatdong'];
        include("menu.php");
        echo '<div class="block">
              <h1>Cập Nhật Đoàn Viên</h1>
              <div class="form">
              <form method="post" action="">
              <label style="margin-top: 0;" >Tên ĐV</label><input type="text" name="ten" value="'.$ten.'"><br>
              <label style="margin-top: 0;margin-left: -113px;" >Lớp ĐV</label>
                <select style="margin-left: 5px" name="lop">
                  <option value="1">CNTT1</option>
                  <option value="2">CNTT2</option>
                  <option value="3">CNTT3</option>
                  <option value="4">TA1</option>
                  <option value="5">TA2</option>
                  <option value="6">TA3</option>
                  <option value="7">TKDH1</option>
                  <option value="8">TKDH2</option>
                  <option value="9">TKDH3</option>
                </select><br>
              <label style="margin-top: 0;margin-left: 0px;" >Ngày Vào</label><input type="text" name="vao" value="'.$vao.'"><br>
              <label style="margin-top: 0;margin-left: -113px;" >Quê Quán</label><input type="text" name="que" value="Không thể sửa trường thông tin này" disabled><br>
              <label style="margin-top: 0;margin-left: 0px;" >Nơi Vào</label><input type="text" name="noivao" value="'.$noivao.'"><br>
              <label style="margin-top: 0;margin-left: -113px;" >Xếp Loại</label><input type="text" name="loai" value="'.$loai.'"><br>
                <button name="submit"class="button"><span>Cập Nhật</span></button>
              </form>
              </div></div>';
        if(isset($_POST['submit'])){
          $ten=$_POST['ten'];$lop=$_POST['lop'];
          $que=$_POST['que'];$vao=$_POST['vao'];
          $noivao=$_POST['noivao'];$loai=$_POST['loai'];
          $sql ="update doanvien set hoten='$ten',malop='$lop',ngayvaodoan='$vao',
          noivaodoan='$noivao',hoatdong='$loai' where madoanvien='$madoanvien'";
          if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Cập Nhật Thành Công');window.location='admin.php';</script>";
          } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
          }
        }
      }
      //end update
    }  
    else { //Nếu chưa ấn nút submit nào
  ?>
  <?php include("menu.php"); //thanh menu
  ?>
        <div class="block">
          <h1>Thêm Đoàn viên</h1>
            <div class="form">
              <form method="post" action="admin.php?sub=add">
                <input type="text" name="ten" placeholder="Tên ĐV">
                <p>Lớp ĐV</p>
                  <select name="lop">
                    <option value="1">CNTT1</option>
                  <option value="2">CNTT2</option>
                  <option value="3">CNTT3</option>
                  <option value="4">TA1</option>
                  <option value="5">TA2</option>
                  <option value="6">TA3</option>
                  <option value="7">TKDH1</option>
                  <option value="8">TKDH2</option>
                  <option value="9">TKDH3</option>
                  </select><br>
                <input type="text" name="que" placeholder="Quê Quán">
                <input type="text" name="vao" placeholder="YYYY-MM-DD"><br>
                <input type="text" name="noivao" placeholder="Nơi Vào">
                <input type="text" name="loai" placeholder="Xếp Loại"><br>
                <button name="submit" class="button"><span>Thêm Đoàn Viên</span></button>
              </form>
            </div>
        </div>
    <?php
    }
    //hiện bảng từ trong database 
    $conn = mysqli_connect('localhost', 'root', '', 'btl') or die ('Không thể kết nối tới database');
    mysqli_set_charset($conn, 'utf8');
    $sql ="select doanvien.madoanvien, hoten, doanvien.malop, que, hoatdong, noiohientai, ngayvaodoan,noivaodoan, tenlop from doanvien JOIN lop on doanvien.malop = lop.malop";
    $result = mysqli_query($conn,$sql);
    echo "<div class='block'>
    <table>
      <tr>
        <th>Mã Đv</th>
        <th>Họ Tên</th>
        <th>Lớp</th>
        <th>Quê Quán</th>
        <th>Ngày Vào Đoàn</th>
        <th>Nơi Vào Đoàn</th>
        <th>Xếp Loại</th>
        <th>Hành Động</th>
      </tr>";
      while($row = mysqli_fetch_assoc($result)) {
        echo "
            <tr>
              <td>" .$row['madoanvien']. "</td>
              <td>" .$row['hoten']. "</td>
              <td>" .$row['tenlop']. "</td>
              <td>" .$row['que']. "</td>
              <td>" .$row['ngayvaodoan']. "</td>
              <td>" .$row['noivaodoan']. "</td>
              <td>" .$row['hoatdong']. "</td>
              <td style='text-align: center'>
                <a class='red' href='admin.php?sub=delete&id=".$row['madoanvien']. " '>Delete</a>
                <a href='admin.php?sub=update&id=".$row['madoanvien']. "'>Update</a>
              </td>
            </tr>";
      }
      echo "</table></div></div>";
} else echo "Bạn phải đăng nhập để thực hiện các chức năng!<br>";
?>
</div>
<?php include("footer.php"); ?>