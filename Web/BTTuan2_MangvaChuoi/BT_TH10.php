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
            background-color:pink ;
        }
</style>
<body>
    <?php
        function tim_hoa($ten_hoa,$mang_hoa){
            $n = count($mang_hoa);
            $kq = 0;
            for($i=0;$i<$n;$i++){
                if(strcasecmp($ten_hoa,$mang_hoa[$i])==0)
                    $kq = 1;    
            }
            return $kq;
        }
        if(isset($_POST["ten_hoa"])){
            $kq = "";
            $ten_hoa = $_POST["ten_hoa"];
            $mang_hoa = array();
            $mang_hoa = explode("--",trim($_POST["gio_hoa"]));
            $n = count($mang_hoa);
            if(tim_hoa($ten_hoa,$mang_hoa)==1)
                $kq = "Đã có hoa <b>$ten_hoa</b> trong giỏ";
            else
                $mang_hoa[$n] = $ten_hoa;
            $gio_hoa = implode("--",$mang_hoa);     
        }
        else{
            $ten_hoa="";
            $gio_hoa="";
            $kq="";
        }
    ?>
    <form action="" method ="post">
    <table  >
    <tr bgcolor="purple">
        <td colspan="5" align="center"><h3><font color="white">MUA HOA</font></h3></td>
    </tr>
    <tr>
        <td >Loại hoa bạn chọn:</td>
        <td >
            <input type="text " id="ten_hoa" size="40" name="ten_hoa" value="<?php echo $ten_hoa; ?>">
        </td>
        <td><input  type="submit"   value="Thêm vào giỏ hoa" name="submit" /></td>
    </tr>
    <tr>
        <td >Giỏi hoa của bạn có</td>
        <td><div><?php echo $kq;?></div></td>
    </tr>
    <tr>
        <td colspan="5">
        <textarea id="gio_hoa" name="gio_hoa" name="gio_hoa" rows="4" cols="50">
            <?php 
                echo $gio_hoa;
            ?>
        </textarea>
        </td>
    </tr>
    </table> 
    </form>
</body>
</html>