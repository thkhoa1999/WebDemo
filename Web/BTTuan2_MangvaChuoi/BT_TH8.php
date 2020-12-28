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
        function hoan_vi(&$a, &$b){
            $tam = $a;
            $a = $b;
            $b = $tam;
        }
        function sap_tang($mang){
            $n = count($mang);
            for($i=0;$i<$n-1;$i++)
                for($j=$i;$j<$n;$j++)
                    if($mang[$i]>$mang[$j])
                        hoan_vi($mang[$i],$mang[$j]);
            return $mang;            
        }
        function sap_giam($mang){
            $n = count($mang);
            for($i=0;$i<$n-1;$i++)
                for($j=$i;$j<$n;$j++)
                    if($mang[$i]<$mang[$j])
                        hoan_vi($mang[$i],$mang[$j]);
            return $mang;            
        }
        if(isset($_POST['day_so'])){
            $day_so = trim($_POST["day_so"]);
            $mang = explode(",",$day_so);
            $mang1 = sap_tang($mang);
            $chuoi_tang = implode(",",$mang1);
            $mang2 = sap_giam($mang);
            $chuoi_giam = implode(",",$mang2);

        }
        else{
            $day_so = "";
            $chuoi_giam = "";
            $chuoi_tang = "";
        }
    ?>
    <form action="" method ="post">
    <table  >
    <tr bgcolor="grey">
    
        <td colspan="4" align="center"><h3><font color="white">SẮP XẾP MẢNG</font></h3></td>
    
    </tr>
    
    <tr>
        <td colspan="2"  >Nhập Mảng</td>
        <td >
            <input type="text " id="day_so" size="40" name="day_so" value="<?php echo $day_so; ?>">
        </td>
        <td style="color: red;">(*)</td>
    </tr>
    <tr id="submit">
        
        <td colspan="3" ><input  type="submit"   value="Sắp Xếp" name="submit" /></td> 
        
    </tr>
    <tr>
        <td colspan="2"  >Tăng Dần</td>
        <td >
            <input type="text " disabled="disabled" size="40" value="<?php echo $chuoi_tang?>" >
        </td>
    </tr>
    <tr>
        <td colspan="2"  >Giảm Dần</td>
        <td >
            <input type="text " disabled="disabled" size="40" value="<?php echo $chuoi_giam?>">
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