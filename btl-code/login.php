<?php 
include("header.php"); //lấy nội dung từ header.php
?>
<?php
ob_start();
if(isset($_SESSION['name'])){
header('location: admin.php');
}
?>
</head>
<body>
  <section class="colum">
    <div class="login">
      <h1>Login to Quản Lý Đoàn Viên</h1>
      <form method="post">
        <p><input type="text" name="name" value="" placeholder="Username"></p>
        <p><input type="password" name="pass" value="" placeholder="Password"></p>
        <p class="submit"><input type="submit" name="sub" value="Login"></p>
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
    $sql = "Select * from admin where ten='$name' and pass='$pass'";
    // Thực hiện câu truy vấn, hàm này truyền hai tham số vào là biến kết nối và câu truy vấn
    $result = mysqli_query($conn, $sql);
      // Nếu thực thi không được thì thông báo truy vấn bị sai
      if( mysqli_num_rows($result)>0){
        $_SESSION['name'] = $name;
        echo $_SESSION['name'];
        header('location: admin.php');
      }
      else {
        echo "<div class='login-help'>
        <p>Sai tên đăng nhập hoặc tài khoản <a href='reg.php'>Click để tạo tài khoản</a>.</p>
    </div><br>";
      }
  }
  else echo "Điền đủ thông tin";
 }
?>
<?php include("footer.php"); ?>