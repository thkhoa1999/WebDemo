<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
          if (isset($_POST["N"])){
            $N =$_POST["N"];
             }
     
         else $N = 0;
       
         
         $arr = [];
         for ( $i = 0 ; $i < $N; $i++ )
         {
           $arr[$i] = rand (0,20);
         }
     
         function xuatMang($N, $arr){
             for ( $i = 0 ; $i < $N; $i++ )
             {
               echo $arr[$i]. "\t";
             } 
         }


         function GTNN($arr){

            if(isset($arr[0])){
        
                $min = $arr[0];
        
                $N = count($arr);
        
                for($i = 1; $i < $N; $i++){
        
                    if($arr[$i] < $min)
        
                        $min = $arr[$i];
        
                }
        
                echo $min;
        
            }
        
        }

        function GTLN($arr){

            if(isset($arr[0])){
        
                $max = $arr[0];
        
                $N = count($arr);
        
                for($i = 1; $i < $N; $i++){
        
                    if($arr[$i] > $max){
        
                        $max = $arr[$i];
        
                    }
        
                }
        
                echo $max;
        
            }
        
        }

         function tongphantu($N, $arr){
            $tong =0;
            for ( $i = 0 ; $i < $N; $i++ )
            {
                if( $arr[$i] )
                {
                    $tong = $tong + $arr[$i];
                }
                
            } 
            echo $tong;
            return -1;
           
        }
    ?>

    <form action="" method ="post">
        <table >


      
            
        <tr bgcolor="purple">
        
            <td colspan="4" align="center"><h3><font color="white">PHÁT SINH MẢNG VÀ TÍNH TOÁN</font></h3></td>
        
        </tr>
        
        <tr>
            <td colspan="2"  >Nhập Số Phần Tử</td>
            <td >
                <input type="text " id="N" size="40" name="N" value="<?php echo $N; ?>">
            </td>
        </tr>
        <tr id="submit">
            <td colspan="3" ><input  type="submit"   value="Phát Sinh Và Tính Toán" name="submit" /></td> 
        </tr>
        <tr>
            <td colspan="2"  >Mảng</td>
            <td >
                <input type="text "   disabled="disabled" id="" size="40" name="" value="<?php xuatMang($N, $arr);?>">
            </td>
        </tr>


        <tr>
            <td colspan="2"  >GTLN(Max) Trong Mảng</td>
            <td >
                <input type="text " id=""  disabled="disabled" size="40" name="" value="<?php GTLN($arr) ?>">
            </td>
        </tr>

        <tr>
            <td colspan="2"  >GTNN(Min) Trong Mảng</td>
            <td >
                <input type="text " id=""  disabled="disabled" size="40" name="" value="<?php GTNN($arr) ?>">
            </td>
        </tr>

        <tr>
            <td colspan="2"  >Tổng Mảng</td>
            <td >
                <input type="text " disabled="disabled" id="" size="40" name="" value="<?php tongphantu($N, $arr); ?>">
            </td>
        </tr>

        
        <tr>

            <td colspan="4">
                <p style="background-color: bisque;">(GHI CHÚ:CÁC PHẦN TỬ TRONG MẢNG CÓ GIÁ TRỊ TỪ 0 ĐẾN 20)</p>
            </td> 
            </tr>
       
    
        </table> 
        </form>
</body>
</html>