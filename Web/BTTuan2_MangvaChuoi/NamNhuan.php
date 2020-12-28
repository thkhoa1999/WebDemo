<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Âm Lịch</title>
</head>
<body>
    <?php
        $nam = ""; 
        function namnhuan($nam){
            if(($nam % 400 == 0) || ($nam % 4 == 0 && $nam % 100 != 0)){
                return 1;
            }
            else{
                return 0;
            }
        }

        if(isset($_POST['submit'])){
            $nam = $_POST['nam'];
            $kq = " ";
            foreach(range(2000, $nam) as $year){
                if ( namnhuan($year) == 1){
                    $kq = $kq. $year. " ";
                }   
            }
            if($kg!="")
                $kq = $kq. " là năm nhuận";
            else
                $kq = "Không có năm nhuận";    
        }
    ?>
    <form method="post" action="">
        <table width = "300" border="0" align="center" cellpadding="2" cellspacing="2" bgcolor="#AEE4FF">
            <tr align="center" bgcolor = "#005CB9">
                <td colspan="3"><span>TÌM NĂM NHUẬN</span></td>
            </tr>
            <tr>
                <td width="101"><p align="center"><span> Năm: </span></p></td>
                <td width="185" colspan="2"><span>
                    <label></label>
                    <input name="nam" type="text" id="nam" value="<?php echo $nam;?>" size="15"/>
                </span></td>
            </tr>
            <tr>
                <td colspan="2"><input name="submit" type="submit" value="Kiểm Tra" align="center"></td>
            </tr>
        </table>
    </form>
</body>
</html>