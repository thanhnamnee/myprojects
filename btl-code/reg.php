<?php include("header.php"); ?>
<?php
ob_start();
if(isset($_SESSION['name'])){
header('location: admin.php');
}
?><title>Đăng Kí</title>
	<section class="colum">
    <div class="login">
      <h1>Đăng ký tài khoản</h1>
      <form method="post">
        <p><input type="text" name="name" value="" placeholder="Username"></p>
        <p><input type="password" name="pass" value="" placeholder="Password"></p>
        <p class="submit"><input type="submit" name="sub" value="Đăng ký"></p>
      </form>
    </div>
  </section>
</body>
</html>
<?php
if(isset($_POST['sub'])){
 	if($_POST['name']!= null && $_POST['pass']!= null ){
 		$name=$_POST['name'];
 		$pass=$_POST['pass'];
 		//connect
 		$conn = mysqli_connect('localhost', 'root', '', 'btl') or die ('Không thể kết nối tới database');
 		mysqli_set_charset($conn, 'utf8');
 		$ten= "select ten from admin where ten='$name'";
 		$user = mysqli_query($conn,$ten);
 		if (mysqli_num_rows($user) > 0){
 			echo "<div class='login-help'><p>Tên này đã có người sử dụng</p></div>";
 		}
 		else{
			$sql = "insert into admin (ten,pass) values ('$name','$pass')";
			// Thực hiện câu truy vấn, hàm này truyền hai tham số vào là biến kết nối và câu truy vấn
			if (mysqli_query($conn, $sql)) {
			    echo "<div class='login-help'><p>Đăng kí thành công với tên đăng nhập: $name";
			    echo "<br>";
			    echo "<a href='admin.php'>Vào trang quản trị ngay</a></div>";
			    $_SESSION['name'] = $name;
			} else {
			    echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
			}
			 
			// Ngắt kết nối
			mysqli_close($conn);
		}
	}
	else echo "Điền đủ thông tin";
 }
?>
<?php include("footer.php"); ?>
