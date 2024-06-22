<?php include("header.php"); ?>
<?php
ob_start();
if(isset($_SESSION['name'])){
	  $conn = mysqli_connect('localhost', 'root', '', 'btl') or die ('Không thể kết nối tới database');
	  mysqli_set_charset($conn, 'utf8');
	if(isset($_GET['sub'])){ //Nếu ấn nút submit
      $sub=$_GET['sub'];
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
      //hết update chung
      if($sub=='update1'){
        $madoanvien=$_GET['id'];
        $sql ="select doanvien.madoanvien, hoten,ngaynop, doanvien.malop, que, hoatdong,noivaodoan, doanphi.hannop from doanvien JOIN doanphi on doanvien.madoanvien = doanphi.madoanvien where doanphi.madoanvien='$madoanvien'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        //lấy dữ liệu ra; 
        $ten=$row['hoten'];
        $hannop=$row['hannop'];
        $ngaynop=$row['ngaynop'];
        include("menu.php");
        echo '<div class="block">
              <h1>Cập Nhật Đoàn Phí</h1>
              <div class="form">
              <form method="post" action="">
              <label>Tên ĐV</label><input type="text" name="ten" value="'.$ten.'"><br>
              <label>Hạn Nộp</label><input type="text" name="hannop" value="'.$hannop.'"><br>
              <label>Ngày Nộp</label><input type="text" name="ngaynop" value="'.$ngaynop.'"><br>
                <button name="submit"class="button"><span>Cập Nhật</span></button>
              </form>
              </div></div><div></div></div>';
        if(isset($_POST['submit'])){
          $hannop=$_POST['hannop'];
          $ngaynop=$_POST['ngaynop'];
          $sql ="update doanphi set ngaynop='$ngaynop',hannop='$hannop' where madoanvien='$madoanvien'";
          if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Cập Nhật Thành Công');window.location='thongke.php';</script>";
          } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
          }
        }
      }
      //het update đoàn phí
  	}
  	else {
?>
<?php include("menu.php");?>
  <?php
  if(isset($_GET['tk'])){//nếu gửi ấn 1 nút

    if($_GET['tk']=='chuanop'){ //hiển thị ds chưa nộp
      ?> <div class="block">
            <h1>Danh Sách Đã Nộp</h1>
            <div class="form">
              <form method="post" action="">
                <label style="margin-top: 0px;">Ngày</label><input type="text" name="ngay" placeholder="1-31"><br>
                <label style="margin-left: -113px;">Quí</label><input type="text" name="qui" placeholder="1-4"><br>
                <label>Năm</label><input type="text" name="nam" placeholder="2023 trở về trước"><br><br>
                <p>Nếu muốn xem danh sách theo cả quí vui lòng để trống trường ngày</p><br><br>
                <button name="submit"class="button"><span>Xem Ngay</span></button>
              </form>
            </div>
          </div>
        <?php 
          if(isset($_POST['submit'])){ 
            $ngay=$_POST['ngay'];
            $qui=$_POST['qui'];
            if($qui==1) {
              $chon="between 1 and 3";
            }else if($qui==2){
              $chon="between 4 and 6";
            }else if($qui==3){
              $chon="between 7 and 9";
            }else if($qui==4){
              $chon="between 10 and 12";
            } else $chon=null;
            $nam=$_POST['nam'];
            if($ngay==null){ //không có ngày
              $sql ="select doanvien.madoanvien, hoten,ngaynop, doanvien.malop, que, hoatdong,noivaodoan, doanphi.hannop from doanvien JOIN doanphi on doanvien.madoanvien = doanphi.madoanvien WHERE DATEDIFF(doanphi.hannop,NOW()) < 0 and MONTH(doanphi.hannop) $chon and YEAR(doanphi.hannop)='$nam'";
            }
            else{
              $sql ="select doanvien.madoanvien, hoten,ngaynop, doanvien.malop, que, hoatdong,noivaodoan, doanphi.hannop from doanvien JOIN doanphi on doanvien.madoanvien = doanphi.madoanvien WHERE DATEDIFF(doanphi.hannop,NOW()) < 0 and MONTH(doanphi.hannop) $chon and YEAR(doanphi.hannop)='$nam' and DAY(doanphi.hannop)='$ngay'";
            }
              $result = mysqli_query($conn,$sql);
              if (mysqli_num_rows($result) > 0){
              echo "<div class='block'>
              <table>
                <tr>
                  <th>Mã Đv</th>
                  <th>Họ Tên</th>
                  <th>Hạn Nộp</th>
                  <th>Ngày Nộp</th>
                  <th>Nơi Vào</th>
                  <th>Quê Quán</th>
                  <th>Xếp Loại</th>
                  <th>Hành Động</th>
                </tr>";
                  while($row = mysqli_fetch_assoc($result)) {
                    echo "
                        <tr>
                          <td>" .$row['madoanvien']. "</td>
                          <td>" .$row['hoten']. "</td>
                          <td>" .$row['hannop']. "</td>
                          <td>" .$row['ngaynop']. "</td>
                          <td>" .$row['que']. "</td>
                          <td>" .$row['noivaodoan']. "</td>
                          <td>" .$row['hoatdong']. "</td>
                          <td style='text-align: center'>
                            <a class='red' href='thongke.php?sub=delete&id=".$row['madoanvien']. " '>Delete</a>
                            <a href='thongke.php?sub=update1&id=".$row['madoanvien']. "'>Update</a>
                          </td>
                        </tr>";
                  }
                echo "</table></div></div>";
          } else echo "Dữ liệu nhập sai hoặc không tìm thấy.</div>";
        } echo "</div>";

    } else if($_GET['tk']=='danop'){// danh sách đã nộp
       ?><div class="block">
            <h1>Danh Sách Chưa Nộp</h1>
            <div class="form">
              <form method="post" action="">
                <label style="margin-top: 0px;">Ngày</label><input type="text" name="ngay" placeholder="1-31"><br>
                <label style="margin-left: -113px; margin-top: 3px;">Quí</label><input type="text" name="qui" placeholder="1-4"><br>
                <label style="margin-top: 5px;">Năm</label><input type="text" name="nam" ><br><br>
                <p>Nếu muốn xem danh sách theo cả quí vui lòng để trống trường ngày</p><br><br>
                <button name="submit"class="button"><span>Xem Ngay</span></button>
              </form>
            </div>
          </div>
        <?php 
          if(isset($_POST['submit'])){ 
            $ngay=$_POST['ngay'];
            $qui=$_POST['qui'];
            if($qui==1) {
              $chon="between 1 and 3";
            }else if($qui==2){
              $chon="between 4 and 6";
            }else if($qui==3){
              $chon="between 7 and 9";
            }else if($qui==4){
              $chon="between 10 and 12";
            } else $chon=null;
            $nam=$_POST['nam'];
            if($ngay==null){ //không có ngày
              $sql ="select doanvien.madoanvien, hoten,ngaynop, doanvien.malop, que, hoatdong,noivaodoan, doanphi.hannop from doanvien JOIN doanphi on doanvien.madoanvien = doanphi.madoanvien WHERE DATEDIFF(doanphi.hannop,NOW()) > 0 and MONTH(doanphi.hannop) $chon and YEAR(doanphi.hannop)='$nam'";
            }
            else{
              $sql ="select doanvien.madoanvien, hoten,ngaynop, doanvien.malop, que, hoatdong,noivaodoan, doanphi.hannop from doanvien JOIN doanphi on doanvien.madoanvien = doanphi.madoanvien WHERE DATEDIFF(doanphi.hannop,NOW()) > 0 and MONTH(doanphi.hannop) $chon and YEAR(doanphi.hannop)='$nam' and DAY(doanphi.hannop)='$ngay'";
            }
              $result = mysqli_query($conn,$sql);
              if (mysqli_num_rows($result) > 0){
              echo "<div class='block'>
              <table>
                <tr>
                  <th>Mã Đv</th>
                  <th>Họ Tên</th>
                  <th>Hạn Nộp</th>
                  <th>Ngày Nộp</th>
                  <th>Nơi Vào</th>
                  <th>Quê Quán</th>
                  <th>Xếp Loại</th>
                  <th>Hành Động</th>
                </tr>";
                  while($row = mysqli_fetch_assoc($result)) {
                    echo "
                        <tr>
                          <td>" .$row['madoanvien']. "</td>
                          <td>" .$row['hoten']. "</td>
                          <td>" .$row['hannop']. "</td>
                          <td>" .$row['ngaynop']. "</td>
                          <td>" .$row['que']. "</td>
                          <td>" .$row['noivaodoan']. "</td>
                          <td>" .$row['hoatdong']. "</td>
                          <td style='text-align: center'>
                            <a class='red' href='thongke.php?sub=delete&id=".$row['madoanvien']. " '>Delete</a>
                            <a href='thongke.php?sub=update1&id=".$row['madoanvien']. "'>Update</a>
                          </td>
                        </tr>";
                  }
                echo "</table></div></div></div>";
          } else echo "Dữ liệu nhập sai hoặc không tìm thấy.</div>";
        } echo "</div>";
    } else if($_GET['tk']=='phat') {//kỷ luật
        echo '<div class="block">
              <h1>Danh Sách Đoàn Viên Kém</h1>';
          $sql ="select doanvien.madoanvien, hoten, doanvien.malop, que, hoatdong, noiohientai, ngayvaodoan,noivaodoan, tenlop from doanvien JOIN lop on doanvien.malop = lop.malop where hoatdong='Yếu'";
          $result = mysqli_query($conn,$sql);
          echo "
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
                        <a class='red' href='list.php?sub=delete&id=".$row['madoanvien']. " '>Delete</a>
                        <a href='list.php?sub=update&id=".$row['madoanvien']. "'>Update</a>
                      </td>
                    </tr>";
            }
          echo "</table></div></div></div>";
      }
      else if($_GET['tk']=='khen') {//khen thưởng
        echo '<div class="block">
              <h1>Danh Sách Đoàn Viên Tốt</h1>';
          $sql ="select doanvien.madoanvien, hoten, doanvien.malop, que, hoatdong, noiohientai, ngayvaodoan,noivaodoan, tenlop from doanvien JOIN lop on doanvien.malop = lop.malop where hoatdong='Tốt'";
          $result = mysqli_query($conn,$sql);
          echo "
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
                        <a class='red' href='list.php?sub=delete&id=".$row['madoanvien']. " '>Delete</a>
                        <a href='list.php?sub=update&id=".$row['madoanvien']. "'>Update</a>
                      </td>
                    </tr>";
            }
          echo "</table></div></div></div>";
      }

  } else {
    
              echo '<div class="block">
              <h1>Danh Sách Đoàn Đoàn Phí</h1>';
          $sql ="select doanvien.madoanvien, hoten,ngaynop, doanvien.malop, que, hoatdong,noivaodoan, doanphi.hannop from doanvien JOIN doanphi on doanvien.madoanvien = doanphi.madoanvien";
          $result = mysqli_query($conn,$sql);
          echo "
          <table>
                <tr>
                  <th>Mã Đv</th>
                  <th>Họ Tên</th>
                  <th>Hạn Nộp</th>
                  <th>Ngày Nộp</th>
                  <th>Nơi Vào</th>
                  <th>Quê Quán</th>
                  <th>Xếp Loại</th>
                  <th>Hành Động</th>
                </tr>";
                  while($row = mysqli_fetch_assoc($result)) {
                    echo "
                        <tr>
                          <td>" .$row['madoanvien']. "</td>
                          <td>" .$row['hoten']. "</td>
                          <td>" .$row['hannop']. "</td>
                          <td>" .$row['ngaynop']. "</td>
                          <td>" .$row['que']. "</td>
                          <td>" .$row['noivaodoan']. "</td>
                          <td>" .$row['hoatdong']. "</td>
                          <td style='text-align: center'>
                            <a class='red' href='thongke.php?sub=delete&id=".$row['madoanvien']. " '>Delete</a>
                            <a href='thongke.php?sub=update1&id=".$row['madoanvien']. "'>Update</a>
                          </td>
                        </tr>";
                  }
                echo "</table></div></div></div>";
  }
}
?> 
<?php
} else echo "Bạn phải đăng nhập để thực hiện các chức năng!<br>";
?>
</div>
<?php include("footer.php"); ?>