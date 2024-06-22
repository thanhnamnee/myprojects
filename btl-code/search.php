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
            echo "<script>alert('Cập Nhật Thành Công');window.location='search.php';</script>";
          } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
          }
        }
      }
  	}
  	else {
?>
<?php include("menu.php"); ?>
		<div class="block">
          <h1>Tìm Đoàn Viên</h1>
            <div class="form">
              <form method="post" action="#">
                <p>Tìm Kiếm Theo</p>
                  <select name="type">
                    <option value="hoten">Tên Đoàn Viên</option>
                    <option value="doanvien.madoanvien">Mã Đoàn Viên</option>
                  </select><br>
                  <br>
                <input type="text" name="tk" placeholder="Bạn muốn tìm ..."><br><br>
                <button name="submit" class="button"><span>Tìm Kiếm</span></button>
              </form>
            </div>
        </div>
<?php
	}
	if(isset($_POST['submit'])){
		$type=$_POST['type'];
		$tk=$_POST['tk'];
		if($type == "hoten"){
			$sql="select doanvien.madoanvien,hoten, doanvien.malop, que, hoatdong, noiohientai, ngayvaodoan,noivaodoan, tenlop from doanvien JOIN lop on doanvien.malop = lop.malop 
				where hoten like '%$tk%'";
		}else {
			$sql="select doanvien.madoanvien,hoten, doanvien.malop, que, hoatdong, noiohientai, ngayvaodoan,noivaodoan,tenlop from doanvien JOIN lop on doanvien.malop = lop.malop 
				where $type='$tk'";
			}
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
	                <a class='red' href='search.php?sub=delete&id=".$row['madoanvien']. " '>Delete</a>
	                <a href='search.php?sub=update&id=".$row['madoanvien']. "'>Update</a>
	              </td>
	            </tr>";
	      }
	      echo "</table></div>";
	}echo "</div></div>";
}
else echo "Bạn Phải Đăng nhập";
?>
<?php include("footer.php"); ?>