<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
	
		p{
			margin-top: 50px;
		}
		table{
			padding-top: 50px;
			transform: translateX(500px);
		}
		td{
			text-align: center;
			border: 1px solid black;
		}
		th{
			height: 50px;
			text-align: center;
			border: 1px solid black;
		}
        
	</style>
</head>
<body>
	
<?php
include('header.php');
if (!$_SESSION['login']) {
    $_SESSION['login-message'] = "Bạn cần đăng nhập để xem trang này";
    header('location: login.php');
}
?>


<?php
$conn = mysqli_connect('localhost', 'root', '', 'db');
mysqli_set_charset($conn, 'UTF8');
$rowsPerPage=2; 
if (!isset($_GET['page']))
{ $_GET['page'] = 1;
}

$offset =($_GET['page']-1)*$rowsPerPage;

$result = mysqli_query($conn, "SELECT id, username, password,fullname,email FROM user LIMIT $offset ,$rowsPerPage");

echo "<p align='center'><font size='5'> THÔNG TIN TÀI KHOẢN</font></P>";
echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='bordercollapse:collapse'>";
echo '<tr>
<th style="text-align: center;" width="50">ID</th>
<th style="text-align: center;" width="50">USERNAME</th>
<th style="text-align: center;" width="150">PASSWORD</th>
<th style="text-align: center;" width="150">FULLNAME</th>
<th style="text-align: center;" width="150">EMAIL</th>


</tr>';
if(mysqli_num_rows($result)<>0)
{   
    $stt=1;
    while($rows=mysqli_fetch_row($result))
    { echo "<tr>";
		echo "<td>$rows[0]</td>";
		echo "<td>$rows[1]</td>";
		echo "<td>$rows[2]</td>";
		echo "<td>$rows[3]</td>";
        echo "<td>$rows[4]</td>";
	
		echo "</tr>";
		
    $stt+=1;
    }//while
}
echo"</table>";
$re = mysqli_query($conn, "select * from user");
//tổng số mẩu tin cần hiển thị
$numRows = mysqli_num_rows($re);
//tổng số trang
$maxPage = floor($numRows/$rowsPerPage) + 1;
//gắn thêm nút Back
echo "<p style='text-align: center;'>";// cho phân trang nằm giữa 
    if ($_GET['page'] > 1)
    echo "<a href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1).">Back</a> "; 
//tạo link tương ứng tới các trang
    for ($i=1 ; $i<=$maxPage ; $i++)
    { if ($i == $_GET['page'])
    { echo '<b>Trang'.$i.'</b> '; //trang hiện tại sẽ được bôi đậm
    }
    else
    echo "<a href=" .$_SERVER['PHP_SELF']. "?page="
    .$i.">Trang".$i."</a> ";
    }
//gắn thêm nút Next
if ($_GET['page'] < $maxPage)
    echo "<a href=". $_SERVER['PHP_SELF']."?page=".($_GET['page']+1).">Next</a>"; 
//echo 'Tong so trang la: '.$maxPage;
?>

    <?php
    include ('footer.php'); 
    ?>
</body>
</html>