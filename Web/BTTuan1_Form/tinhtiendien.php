<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>tinh tien dien</title>

</head>

<body>
    <?php
    if (isset($_POST['tenchuho']))

        $tenchuho = trim($_POST['tenchuho']);
    else
        $tenchuho = "";




    if (isset($_POST['chisocu']))

        $chisocu = trim($_POST['chisocu']);

    else $chisocu = 0;

    if (isset($_POST['chisomoi']))

        $chisomoi = trim($_POST['chisomoi']);

    else $chisomoi = 0;

    if (isset($_POST['dongia']))

        $dongia = trim($_POST['dongia']);

    else $dongia = 20000;

    if (isset($_POST['tinh'])) {

        if (is_numeric($chisocu) && is_numeric($chisomoi) && is_numeric($dongia)) {

            $sotienthanhtoan = ($chisomoi - $chisocu) * $dongia;
        } else {

            echo "<font color='red'>Vui lòng nhập vào số! </font>";

            $sotienthanhtoan = "";
        }
    } else {
        $sotienthanhtoan = 0;
    }





    ?>

    <form align='center' action="" method="post">

        <table border="0">

            <tr bgcolor="yellow">

                <th colspan="2" align="center">
                    <h3>
                        <font color="red">THANH TOÁN TIỀN ĐIỆN</font>
                    </h3>
                </th>

            </tr>

            <tr>
                <td>Tên chủ hộ:</td>

                <td><input type="text" name="tenchuho" value="<?php echo $tenchuho; ?> " /></td>

            </tr>



            <tr>
                <td>Chỉ số cũ:</td>

                <td><input type="text" name="chisocu" value="<?php echo $chisocu; ?> " />(kW)</td>

            </tr>
            <tr>
                <td>Chỉ số mới:</td>

                <td><input type="text" name="chisomoi" value="<?php echo $chisomoi; ?> " />(kW)</td>

            </tr>
            <tr>
                <td>Đơn giá:</td>

                <td><input type="text" name="dongia" value="<?php echo $dongia; ?> " />(VNĐ)</td>
            </tr>
            <tr>
                <td>Số tiền thanh toán:</td>

                <td><input type="text" name="sotienthanhtoan" disabled="disabled" value="<?php echo $sotienthanhtoan; ?> " />(VNĐ)</td>

            </tr>

            <tr>

                <td colspan="2" align="center"><input type="submit" value="Tính" name="tinh" /></td>

            </tr>

        </table>

    </form>



</body>

</html>