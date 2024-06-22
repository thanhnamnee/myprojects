<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản lý đoàn viên</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="font/themify-icons/themify-icons.css">
    <script src="main.js"></script>
	<script src="css/js.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('ul li:has(ul)').eq(0).mouseenter(function(){
				$('ul li ul:has(li)').eq(0).slideDown(600);
			});
			$('ul li:has(ul)').eq(0).mouseleave(function(){
				$('ul li ul:has(li)').eq(0).slideUp(600);
			});

			$('ul li:has(ul)').eq(1).mouseenter(function(){
				$('ul li ul:has(li)').eq(1).slideDown(600);
			});
			$('ul li:has(ul)').eq(1).mouseleave(function(){
				$('ul li ul:has(li)').eq(1).slideUp(600);
			});
			
		});
	</script>
	<style>
		*{
    padding: 0;
    margin: 0;
}
html {
    font-family: Arial, Helvetica, sans-serif;
    scroll-behavior: smooth;
}
#nav {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #0058C0;
}
#nav li {
    float: left;
}
#nav li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}
#nav li a:hover:not(.active) {
    background-color: #41A2EB;
}
#nav .active {
    background-color: #41A2EB;
}
.left-content marquee a {
    text-decoration: none;
    color: #41A2EB;
}
.left-content marquee a:hover {
    color: red;
}
.card {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    width: 360px;
    height: 542px;
}



	</style>
</head>
<body>
	
	<div class="container1">
	<div id="header1">
            <div id="img-header"><img style="width: auto; height: 136.5px;" src="" alt="" srcset="images/header-sua.png 2x"></div>
            <ul id="nav">
                <li style="margin-left: 237px;"><a href="index.php">TRANG CHỦ</a></li>
                <li><a href="cocautochuc.html">CƠ CẤU TỔ CHỨC</a></li>
                <li><a href="dangnhap.php">QUẢN LÝ ĐOÀN VIÊN</a></li>
                <li style="float:right"><a class="active" href="#">VỀ ĐOÀN TRƯỜNG</a></li>
            </ul>
        </div>
	</div>