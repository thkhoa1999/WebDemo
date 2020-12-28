<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 1</title>
</head>
<body>
    <?php
        function displayArr($arr) {
            echo implode(" ", $arr);
        }   
        function findEven($arr) {
            foreach($arr as $item) {
                if($item%2==0)
                    echo $item. " ";
            }
        }
        function find100($arr){
            foreach($arr as $item){
                if($item < 100){
                    echo $item. " ";
                }
            }
        }
        function sumsoam($arr){
            $sum = 0;
            $n = count($arr);
            for($i = 0; $i < $n; $i++)
                if($arr[$i]<0){
                $sum += $arr[$i];
                }
            echo $sum;
        }
        function sapxep($arr){
            asort($arr);
            foreach($arr as $item){
                echo $item. " ";
            }
        }
    ?>

    <?php
        $num = "";
        $find = "";
        if(isset($_POST['num'])) {
            $num = $_POST['num'];
        }
        if(isset($_POST['find'])) {
            $find = $_POST['find'];
        }

        $arr = array();
        if(isset($_POST['submit'])) {
            for($i = 0; $i < $num; $i++) {
                $arr[] = rand(-100, 100);
            }
        }
    ?>

    <form action="" method="POST">
        <table>
            <tr>
                <td colspan="2">Tạo chuỗi</td>
            </tr>
            <tr>
                <th>nhập số</th>
                <th><input name="num" type="text" value="<?php echo $num?>" /></th>
            </tr>
            <tr>
                <th>tìm số</th>
                <th><input name="find" type="text" value="<?php echo $find?>" /></th>
            </tr>
            <tr>
                <td colspan="2"><input name="submit" type="submit" value="Tạo"></td>
            </tr>
            <tr>
                <th>Mảng</th>
                <th><input type="text" value="<?php displayArr($arr)?>" disabled="disabled" /></th>
            </tr>
            <tr>
                <th>Số chẵn trong mảng là</th>
                <th><input type="text" value="<?php findEven($arr)?>" disabled="disabled" /></th>
            </tr>
            <tr>
                <th>Các số nhỏ hơn 100 là</th>
                <th><input type="text" value="<?php find100($arr)?>" disabled="disabled" /></th>
            </tr>
            <tr>
                <th>Tổng các số âm là</th>
                <th><input type="text" value="<?php sumsoam($arr)?>" disabled="disabled" /></th>
            </tr>
            <tr>
                <th>Mảng sắp xếp tăng dần</th>
                <th><input type="text" value="<?php sapxep($arr)?>" disabled="disabled" /></th>
            </tr>
        </table>
    </form>
</body>
</html>