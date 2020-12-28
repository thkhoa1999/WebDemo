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
        if(isset($_POST["a"]) && isset($_POST["b"])){
            $a = trim($_POST["a"]);
            $manga = explode(",",$a);
            $na = count($manga);
            $b = trim($_POST["b"]);
            $mangb = explode(",",$b);
            $nb = count($mangb);
            $c = array_merge($manga,$mangb);
            $chuoi_c = implode(",",$c);
            sort($c);
            $tang = implode(",",$c);
            rsort($c);
            $giam = implode(",",$c);
        }
        else{
            $a="";
            $b="";
            $na="";
            $nb="";
            $chuoi_c="";
            $tang="";
            $giam="";
            $manga="";
            $mangb="";
            $c="";
        }
    ?>
    <form action="" method ="post">
    <table  >
    <tr bgcolor="grey">
    
        <td colspan="4" align="center"><h3><font color="white">ĐỂM PHẦN TỬ GHÉP MẢNG VÀ SẮP XẾP</font></h3></td>
    
    </tr>
    
    <tr>
        <td colspan="2">Mảng A</td>
        <td >
            <input type="text " id="a" size="40" name="a" value="<?php echo $a; ?>">
        </td>
        <td style="color: red;">(*)</td>
    </tr>
    <tr>
        <td colspan="2">Mảng B</td>
        <td >
            <input type="text" id="b" size="40" name="b" value="<?php echo $b; ?>">
        </td>
        <td style="color: red;">(*)</td>
    </tr>
    <tr id="submit">
        
        <td colspan="3"><input  type="submit"   value="Thực Hiện" name="submit" /></td> 
        
    </tr>
    <tr>
        <td colspan="2">Số phần tử mảng A:</td>
        <td >
            <input type="text " disabled="disabled" size="40" value="<?php echo $na?>" >
        </td>
    </tr>
    <tr>
        <td colspan="2">Số phần tử mảng B:</td>
        <td >
            <input type="text " disabled="disabled" size="40" value="<?php echo $nb?>">
        </td>
    </tr>
    <tr>
        <td colspan="2">Mảng C:</td>
        <td >
            <input type="text " disabled="disabled" size="40" value="<?php echo $chuoi_c?>">
        </td>
    </tr>
    <tr>
        <td colspan="2">Mảng C tăng dần:</td>
        <td >
            <input type="text " disabled="disabled" size="40" value="<?php echo $tang?>">
        </td>
    </tr>
    <tr>
        <td colspan="2">Mảng C giảm dần:</td>
        <td >
            <input type="text " disabled="disabled" size="40" value="<?php echo $giam?>">
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