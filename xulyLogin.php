<?php

  //Khai báo sử dụng session
  session_start();
  //Khai báo utf-8 để hiển thị được Tiếng Việt
  header('Content-Type: text/html; charset=UTF-8');
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  //Xử lý đăng nhập
  if (isset($_POST['dangnhap'])) {
    //Kết nối tới database
    include('./connectForForm.php');
    //Lấy dữ liệu nhập vào
    $username = $_POST['tdn'];
    $password = $_POST['mk'];
    $username_real = addslashes($_POST['tdn']);
    $password_real = addslashes($_POST['mk']);
    $time_login = date('Y-m-d H:i:s');
    $user_ip = $_SERVER['REMOTE_ADDR'];
    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$username || !$password) {
      echo "<br><br>Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở Lại</ah>";
      exit;
    }
    else {
      //Kiểm tra tên đăng nhập có tồn tại không
      $query = "SELECT Username, Password FROM users WHERE Username='$username_real'";
      $result = mysqli_query($connect,$query);
      //Nếu kết quả trả về = 0 thì nghĩa là username không tồn tại trong CSDL
      if (mysqli_num_rows($result) == 0) {
        $sql = "INSERT INTO login_logs (username, password, status,Time,ip) VALUES ('$username_real', '$password_real', 'FAILED','$time_login','$user_ip')";
        mysqli_query($connect, $sql);
        echo "<br><br>Tên đăng nhập hoặc mật khẩu không đúng!";
      }
      else {
        //Băm password
        $password_hash = sha1($password);
        //Lấy mật khẩu trong database ra
        $row = mysqli_fetch_array($result);
        //So sánh 2 mật khẩu băm có trùng khớp hay không
        if ($password_hash != sha1($row['Password'])) {
          $sql = "INSERT INTO login_logs (username, password, status,Time,ip) VALUES ('$username_real', '$password_real', 'FAILED','$time_login','$user_ip')";
          mysqli_query($connect, $sql);
          echo "<br><br>Tên đăng nhập hoặc Mật khẩu không đúng. Vui lòng nhập lại.<a href='javascript: history.go(-1)'>Trở Lại</a>";
          exit;
        }

        //Lưu tên đăng nhập
        $sql = "INSERT INTO login_logs (username, password, status,Time,ip) VALUES ('$username_real', '$password_real', 'SUCCESS','$time_login','$user_ip')";
        mysqli_query($connect, $sql);
        $_SESSION['username'] = $username;
        $sql_level="SELECT level FROM users Where Username='$username_real' AND Password='$password_real'";
        if($username_real == 'administrator' && $password_real=='qaz@123' && mysqli_fetch_assoc(mysqli_query($connect,$sql_level))['level']=='1'){
          header("location: ./adminpage.php");
        }
        echo "<br>Xin chào!!! <b>". $username_real. "</b>. Bạn đã đăng nhập thành công. <a href='./login.php'>Thoát</a>";
        die();
      }
    }
  }
?>