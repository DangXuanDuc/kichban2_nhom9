<?php
//Xử lý đăng nhập
if (isset($_POST['dangky'])) {
  //Lay du lieu vao
  $username = trim($_POST['tdn']);
  if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
    echo "<br><br>Tên đăng nhập chỉ gồm chữ cái và số!<a href='javascript: history.go(-1)'>Trở Lại</ah>";
    exit;
  }
  $password = trim($_POST['mk']);
  $passwordl = trim($_POST['mkl']);
  if ($passwordl != $password) {
    echo "<br><br>Hai mật khẩu không khớp. Vui lòng nhập lại.<a href='javascript: history.go(-1)'>Trở Lại</ah>";
    exit;
  }
  $email = trim($_POST['email']);
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<br><br>Email cần đúng định dạng email@cnwat.com'<a href='javascript: history.go(-1)'>Trở Lại</ah>";
    exit;
  }

  //Kết nối tới database
  include('./connectForForm.php');

  //Thực thi câu truy vấn
  $query = "SELECT * FROM users WHERE Username='$username' OR Email='$Email'";
  $result = mysqli_query($connect,$query);

  //Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
  if (mysqli_num_rows($result) > 0) {
    echo "<script language='javascript'>alert('Bị trùng tên hoặc chưa nhập tên!'); window.location='register.php';</script>";
    //Dừng chương trình
    die();
  }
  else {
    $sql = "INSERT INTO users (Username, Password, Email,level) VALUES ('$username','$password','$email','0')";
    echo "<script language='javascript'>alert('Đăng ký thành công!'); window.location='register.php';</script>";
    if (mysqli_query($connect,$sql)) {
      echo "Tên đăng nhập: ". $_POST['tdn']. "<br/>";
      echo "Mật khẩu: ". $_POST['mk']. "<br/>";
      echo "Email: ". $_POST['email']. "<br/>";
      //echo "Quyền hạn truy cập: ". $_POST['role']. "<br/>";
    }
    else {
      echo "<script language='javascript'>alert('Có lỗi trong quá trình xử lý!'); window.location='register.php';</script>";
  }
}
}
?>