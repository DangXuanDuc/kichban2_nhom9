<DOCTYPE html>
    <html>
        <title>adminPages</title>
        <body>
            <h2>HOME</h2>
            <form action="" method="GET">
                <button type='submit' name='getlog'>Hiển thị log</button>
                <button type='submit' name='logout'>Thoát</button>
            </form>
        </body>
    </html>
</DOCTYPE>
<?php
    if(isset($_GET['getlog'])){
        include('./connectForForm.php');
        $sql='SELECT * FROM login_logs';
        $result = mysqli_query($connect,$sql);
        if ($result->num_rows > 0) {
            echo "<table class='table_log'>";
            echo "<tr><th>username</th><th>password</th><th>status</th><th>time</th><th>ip</th></tr>"; 
            // Hiển thị dữ liệu từ kết quả
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Username"] . "</td>";
                echo "<td>" . $row["Password"] . "</td>";
                echo "<td>" . $row["Status"] . "</td>";
                echo "<td>" . $row["Time"] . "</td>";
                echo "<td>" . $row["ip"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "<style>";
            echo "table {
                border-collapse: collapse; 
                width: 100%; 
            }";
            echo "th { 
                text-align: left; 
                padding: 8px; 
                border: 1px solid #ddd;
            }";
            echo "td {
                text-align: left; 
                padding: 8px; 
                border: 1px solid #ddd; 
            }";
            echo "</style>";
        } else {
            echo "Không có dữ liệu.";
        }
    }
    if(isset($_GET['logout'])){
        session_start();
        session_unset();
        session_destroy();
        header("location: ./login.php");
        die();
    }
?>