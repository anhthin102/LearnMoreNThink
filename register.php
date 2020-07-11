
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng ký</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<style>
    body {font-family:Arial, Sans-Serif; background-image: url("https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1453&q=80");}
    .clearfix:before, .clearfix:after { content: ""; display: table; }
    .clearfix:after { clear: both; }
    a {color:#0067ab; text-decoration:none;}
    a:hover {text-decoration:underline;}
    .form{width: 400px; margin: 0 auto; background-color: #79CEED; text-align: center; border-radius: 30px; border:5px; padding:20px;}
    input[type='text'], input[type='email'], input[type='password'] {width: 300px; border-radius: 5px;border: 1px solid #CCC; padding: 15px; color: #333; font-size: 14px; margin: 10px;}
    input[type='submit']{padding: 10px 25px 8px; color: #fff; background-color: #f07c29; text-shadow: rgba(0,0,0,0.24) 0 1px 0; font-size: 16px; box-shadow: rgba(255,255,255,0.24) 0 2px 0 0 inset,#fff 0 1px 0 0; border: 1px solid #0164a5; border-radius: 5px; margin-top: 10px; cursor:pointer;}
    input[type='submit']:hover {background-color: #024978;}
    h3{background-color: #f07c29; padding:5px; }

</style>
<body>
<?php
  require('config/connect.php');
    if (isset($_REQUEST['username'])){
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($conn,$username);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($conn,$email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn,$password);
    $trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date) VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($conn,$query);
        if($result){
            echo "<div class='form'><h3>Bạn đã đăng ký thành công!</h3><br/>Click để <a href='login.php'>Đăng nhập ngay</a><p>Chúc bạn một buổi mua sách vui vẻ!</p></div>";
        }
    }else{
?>
<div class="form">
<h1>Đăng ký</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Tên đăng nhập" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Mật khẩu" required />
<br>
<input type="submit" name="submit" value="Đăng ký" />
<p>Nếu bạn đã có tài khoản, hãy đăng nhập!</p><a href ="login.php" > Đăng nhập</a>
</form>
</div>
<?php } ?>
</body>
</html>
