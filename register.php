<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Đăng ký thành viên</title>
<style>
body {
  font-family: Times New Roman, Helvetica, sans-serif;
  padding: 8px;
  font-size: 20px;
}

form {
  padding: 10px;
}
fieldset {
  margin: auto;
  width: 60%;
}
legend {
  text-align: center;
  font-weight: bold;
  color: red;
}

label {
  font-weight: bold;
}

input[type="text"], [type="password"], input[type="email"] {
  width: 90%;
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  font-size: 15px;
}

input[type="submit"] {
  margin: 1% 40%;
  padding: 8px;
  font-family: Times New Roman, Helvetica, sans-serif;
  font-size: 20px;
  font-weight: bold;
}

</style>
</head>
<body>
<form action="./xulyRegister.php" method="post" class="dangnhap" autocomplete="on">
  <fieldset>
    <legend>ĐĂNG KÝ THÀNH VIÊN</legend>
      <label for="tdn">Tên đăng nhập:</label><br>
      <input type="text" id="tdn" name="tdn" value="" maxlength="25" required/><br>
      <label for="mk">Mật khẩu:</label><br>
      <input type="password" id="mk" name="mk" value="" maxlength="50" required/><br>
      <label for="mk">Nhập lại mật khẩu:</label><br>
      <input type="password" id="mkl" name="mkl" value="" maxlength="50" required/><br>
      <label for="email">Email:</label><br>
      <input type="email" id="email" name="email" value="email@cnwat.com" placeholder="email@cnwat.com" required/><br><br>
      <input type="submit" name="dangky" value="Đăng Ký">
  </fieldset>
  <a href="./login.php">Đăng nhập</a>
</form>
</body>
</html>



