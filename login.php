<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Đăng nhập</title>
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

        input[type="text"], [type="password"] {
          width: 90%;
          padding: 8px;
          margin-bottom: 10px;
          border: 1px solid #ccc;
          font-size: 15px;
        }

        input[type="submit"] {
          width: 20%;
          margin: 1% 40%;
          padding: 8px;
          font-weight: bold;
        }
      </style>
    </head>
    <body>
      <form action="login.php" method="post" class="dangnhap" >
        <fieldset>
          <legend>ĐĂNG NHẬP</legend>
            <label for="tdn">Tên đăng nhập:</label><br>
            <input type="text" id="tdn" name="tdn"><br>
            <label for="mk">Mật khẩu:</label><br>
            <input type="password" id="mk" name="mk"><br>
            <input type="submit" name="dangnhap" value="Đăng Nhập">
        </fieldset>
        <a href="register.php">Đăng Ký</a>
        <?php 
          require 'xulyLogin.php';
        ?>
      </form>
    </body>
  </html>
