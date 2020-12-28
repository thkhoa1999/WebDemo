<!DOCTYPE html>
<html>
<head>
	<title>Bai 6</title>
</head>
<body>
	<style>

    td{
            text-align:center;
            border: solid 1px;
            width: 250px;
            height: 30px;
          
        }
    #so{
        font-size: 20px;
        color :blue;
    }
    #pheptinh{
        font-size: 20px;
        color :red;
    }
    h3 {
        text-align:center;
        font-size: 25px;
        margin-top:10px;
    }
    table{
        margin-top: 50px;
    }
    p 
    {
        font-size: 20px;
        color :red;
    }
    #cong{
        color: red;
        font-size: 5px;
        
    }
    
    </style>
		<?php 
			 if(isset($_POST['sothunhat']))
            	$sothunhat = trim($_POST['sothunhat']);
        	else 
           	 	$sothunhat=0;
        	if(isset($_POST['sothuhai']))  
            	$sothuhai=trim($_POST['sothuhai']); 
        	else 
            	$sothuhai=0;
		 ?>
			 <form action="ketqua.php" method="POST">
			<table  align="center" border ="1">
				<tr>
					<th colspan="2" align="center"><h3><font color="blue">PHÉP TÍNH TRÊN HAI SỐ</font></h3></th>
				</tr>

			<tr>
			    <td width="50px" id ="pheptinh"  >Chọn Phép Tính</td>
			    <td id ="pheptinh">
			        <input type="radio" id="cong" name="pheptinh" value="Cộng">
			        <label for="cong" >Cộng</label>
			        <input type="radio" id="tru" name="pheptinh" value="Trừ">
			        <label for="tru">Trừ</label>
			        <input type="radio" id="nhan" name="pheptinh" value="Nhân">
			        <label for="nhan">Nhân</label>
			        <input type="radio" id="chia" name="pheptinh" value="Chia">
			        <label for="chia">Chia</label>
			    </td>
			</tr>
		<tr>
		    <td width="50px" id="so" >Số Thứ Nhất</td>
		    <td>
		        <label for="sothunhat"></label>
		        <input type="text " id="sothunhat" size="40" name="sothunhat" value="<?php echo $sothunhat; ?>">
		    </td>
		        
		</tr>

		<tr>
		    <td width="50px" id="so">Số Thứ Hai</td>
		    <td>
		        <label for="sothuhai"></label>
		        <input type="text " id="sothuhai" size="40" name="sothuhai" value="<?php echo $sothuhai; ?>">
		    </td>
		        
		</tr>

		<tr>
		    <td colspan="2" align="center"><input type="submit"  value="Tính" name="tinh" /></td>
		</tr>

			</table>
			 </form>
</body>
</html>