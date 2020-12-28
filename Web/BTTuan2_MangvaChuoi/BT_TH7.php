<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

        td{
                text-align:center;
                width: 100px;
                height: 30px;
            }
        h3 {
            color :red;
            text-align:center;
            font-size: 25px;
            margin-top:10px;
        }
        table{
            margin-top: 50px;
            background-color: aqua;
        }
</style>
<body>
    <?php
        function thay_the($mang,$cu,$moi){
            $n = count($mang);
            for($i=0;$i<$n;$i++){
                if($mang[$i]==$cu)
                    $mang[$i] = $moi;
            }
            return $mang;
        }

        if(isset($_POST["day"]) && isset($_POST["cu"]) && isset($_POST["moi"])){
            $day = $_POST["day"];
            $cu = $_POST["cu"];
            $moi = $_POST["moi"];
            $mang = explode(",",$day);
            $mang_cu = implode(",",$mang);
            $mang = thay_the($mang,$cu,$moi);
            $mang_moi = implode(",",$mang);
        }
        else{
            $day = "";
            $cu = "";
            $moi = "";
            $mang = "";
            $mang_cu = "";
            $mang_moi = "";
        }
    ?>
    <form action="" method ="post">
    <table  >
    <tr bgcolor="grey">
    
        <td colspan="4" align="center"><h3><font color="white">THAY THẾ</font></h3></td>
    
    </tr>
    
    <tr>
        <td colspan="2"  >Nhập Các Phần Tử</td>
        <td >
            <input type="text " id="day" size="40" name="day" value="<?php echo $day; ?>">
        </td>
        <td style="color: red;">(*)</td>
    </tr>
    <tr>
        <td colspan="2"  >Giá trị cần thay thế</td>
        <td>
            <input type="text" id="cu" size="40" name="cu" value="<?php echo $cu; ?>">
        </td>
    </tr>
    <tr>
        <td colspan="2"  >Giá trị thay thế</td>
        <td>
            <input type="text" id="moi" size="40" name="moi" value="<?php echo $moi; ?>">
        </td>
    </tr>
    <tr id="submit">
        
        <td colspan="3" ><input  type="submit"   value="Thay Thế" name="submit" /></td> 
        
    </tr>
    <tr>
        <td colspan="2">Mảng cũ</td>
        <td >
            <input type="text " disabled="disabled" size="40" value="<?php echo $mang_cu?>" >
        </td>
    </tr>
    <tr>
        <td colspan="2">Mảng sau khi thay thế</td>
        <td >
            <input type="text " disabled="disabled" size="40" value="<?php echo $mang_moi?>">
        </td>
    </tr>
    <tr>
    <td colspan="4">
        <p style="background-color: bisque;">(*) CÁC SỐ NGĂN CÁCH NHAU BỞI DẤU ","</p>
    </td> 
    </tr>
    </table> 
    </form>
</body>
</html>