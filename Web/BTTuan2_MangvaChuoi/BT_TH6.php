<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        
        function timKiem($arr,$gt)
        {
            $n = count ($arr);
            $kq = -1;

            for ($i = 0 ;$i < $n; $i++)
            {
                // gt gia tri can tim
                if ($arr[$i] == $gt)
                {
                    $kq = $i;
                   
                    break;
                }
            }
            return $kq;
        }


        if (isset($_POST["arr"]) && isset($_POST["so"]))
        {
            $arr_nhap = trim($_POST["arr"]);
            $gt = $_POST["so"];

            $arr = explode(",",$arr_nhap);

            $kq = timKiem($arr,$gt);

            $arr_kq = implode(",",$arr);

            if ($kq !=-1)
            {
                $kq = $kq ;
                $chuoi = "Tìm Thấy $gt tại vị trí $kq của mảng ";
            }
            else    
                $chuoi = "không tìm thấy  $gt trong mảng";
        }
        else
        {
            $gt = 0;
            $kq = "";
            $arr_kq = "";
            $chuoi = "";
            $arr_nhap = "";
           
        }
    ?>
<form action="" method ="post">
        <table >     
        <tr bgcolor="purple">
        
            <td colspan="4" align="center"><h3><font color="white">Tìm Kiếm</font></h3></td>
        
        </tr>
        
        <tr>
            <td colspan="2"  >Nhập Mảng</td>
            <td >
                <input type="text "  size="40" name="arr" value="<?php echo $arr_nhap; ?>">
            </td>
        </tr>
       
        <tr>
            <td colspan="2"  >Số Cần Tìm</td>
            <td >
                <input type="text "  size="15" name="so" value="<?php echo $gt; ?>">
            </td>
        </tr>

        <tr id="submit">
            <td colspan="3" ><input  type="submit"   value="Tìm Kiếm " name="submit" /></td> 
        </tr>
        <tr>
            <td colspan="2"  > Mảng</td>
            <td >
                <input type="text " id="arr_kq" disabled="disabled" size="40" name="arr_kq" value="<?php echo $arr_kq; ?>">
            </td>
        </tr>

        <tr>
            <td colspan="2"  >Kết Quả Tìm Kiếm</td>
            <td >
                <input type="text " id="chuoi" disabled="disabled" size="40" name="chuoi" value="<?php echo $chuoi; ?>">
            </td>
        </tr>
        <tr>

            <td colspan="4">
                <p style="background-color: bisque;">(CÁC PHẦN TỬ TRONG MẢNG CÁCH NHAU BẰNG DẤU ",")</p>
            </td> 
            </tr>
       
    
        </table> 
        </form>
</body>
</html>