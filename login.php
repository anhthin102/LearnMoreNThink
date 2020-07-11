<?php 
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng nhập</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<style>
    body {font-family:Arial, Sans-Serif;background-image: url("https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1453&q=80");}
    .clearfix:before, .clearfix:after { content: ""; display: table; }
    .clearfix:after { clear: both; }
    a {color:#0067ab; text-decoration:none;}
    a:hover {text-decoration:underline;}
    .form{width: 700px; margin: 0 auto; background-color: #79CEED; text-align: center; border-radius: 30px; border:5px; padding:20px;}
    input[type='text'], input[type='email'], input[type='password'] {width: 300px; border-radius: 5px;border: 1px solid #CCC; padding: 15px; color: #333; font-size: 14px; margin: 10px;}
    input[type='submit']{padding: 10px 25px 8px; color: #fff; background-color: #f07c29; text-shadow: rgba(0,0,0,0.24) 0 1px 0; font-size: 16px; box-shadow: rgba(255,255,255,0.24) 0 2px 0 0 inset,#fff 0 1px 0 0; border: 1px solid #0164a5; border-radius: 5px; margin-top: 10px; cursor:pointer;}
    input[type='submit']:hover {background-color: #024978;}
</style>
<body>
<?php
  require('config/connect.php');
  session_start();
    if (isset($_POST['username'])){
    
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($conn,$username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn,$password);
    $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
    $result = mysqli_query($conn,$query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
        if($rows==1){
      $_SESSION['username'] = $username;
      header("Location: index.php");
            }else{
        echo "<div class='form'><h3>Tên đăng nhập hoặc mật khẩu không đúng!</h3></br><a href='login.php'>Đăng nhập lại</a></div>";
        }
    }else{
?>

<div class="form">
<h1>Bạn vui lòng đăng nhập để vào website nhé!<img src="https://b.f3.photo.talk.zdn.vn/1855004960085028804/869cb142a4fa59a400eb.jpg" alt="logo" / style="height: 200px; width: 400px;align-items: center; margin-left: 90px; margin-bottom: -70px; margin-top: 0px;"></h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Tên đăng nhập" required />
<input type="password" name="password" placeholder="Mật khẩu" required />
<br>
<input name="submit" type="submit" value="Đăng nhập" />
</form>
<p>Bạn chưa có tài khoản? <a href='register.php'>Đăng ký ngay</a> để chúng tôi phục vụ bạn tốt hơn!</p><br/>
</div>
<?php } ?>
</body>
</html>
