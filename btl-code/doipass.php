<?php include("header.php"); ?><?php
ob_start();
if(isset($_SESSION['name'])){
?>
</head>
<body>
  <section class="colum">
    <div class="login">
      <h1>Đổi Mật Khẩu Cho <?php echo $_SESSION['name'];?></h1>
      <form method="post" >
        <p><input type="password" name="passold" value="" placeholder="Password Cũ"></p>
        <p><input type="password" name="passnew" value="" placeholder="Password Mới"></p>
        <p class="submit"><input type="submit" name="sub" value="Đổi Mật Khẩu"></p>
      </form>
    </div>
  </section>
</body>
</html>
<?php
if(isset($_POST['sub'])){
  if($_POST['passold']!= null && $_POST['passnew']!= null ){
    $name=$_SESSION['name'];
    $passold=$_POST['passold'];
    $passnew=$_POST['passnew'];
    //connect
    $conn = mysqli_connect('localhost', 'root', '', 'btl') or die ('Không thể kết nối tới database');
    mysqli_set_charset($conn, 'utf8');
    $sql = "Select * from admin where ten='$name' and pass='$passold'";
    // Thực hiện câu truy vấn, hàm này truyền hai tham số vào là biến kết nối và câu truy vấn
    $result = mysqli_query($conn, $sql);
      // Nếu thực thi không được thì thông báo truy vấn bị sai
      if( mysqli_num_rows($result)>0){
        $sql = "update admin set pass='$passnew' where ten='$name'";
        $result2 = mysqli_query($conn, $sql);
        echo "<div class='login-help'><p>Đổi pass thành công.";
        echo '<br>';
        echo "<a href='admin.php'>Về Trang Chủ</a></div>";
      }
      else {
        echo "<div class='login-help'>
        <p>Nhập sai mật khẩu cũ.</p>
    </div><br>";
      }
  }
  else echo "Điền đủ thông tin";
 }
}else echo "Vui Lòng Đăng Nhập";
?>
<?php include("footer.php"); ?>