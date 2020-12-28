<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>ket qua thi dai hoc</title>

</head>

<body>
    <?php
    if (isset($_POST['toan']) < 10 && isset($_POST['toan']) > 0)

        $toan = trim($_POST['toan']);

    else $toan = 0;


    if (isset($_POST['ly']) < 10 && isset($_POST['ly']) > 0)

        $ly = trim($_POST['ly']);

    else $ly = 0;


    if (isset($_POST['hoa']) < 10 && isset($_POST['hoa']) > 0)

        $hoa = trim($_POST['hoa']);

    else $hoa = 0;



    $diemchuan = 20;



    if (isset($_POST['ketquathi']))

        $ketquathi = trim($_POST['ketquathi']);

    else $ketquathi = "Đậu";



    if (isset($_POST['tinh'])) {

        if (is_numeric($toan) && is_numeric($ly) && is_numeric($hoa)) {

            $tongdiem = $toan + $ly + $hoa;
        } else {

            echo "<font color='red'>Vui lòng nhập vào số! </font>";

            $tongdiem = "";
        }
    } else {
        $tongdiem = 0;
    }

    if (isset($_POST['tinh'])) {

        if ($tongdiem >= $diemchuan) {
            if ($toan > 0 && $ly > 0 && $hoa > 0)
                $ketquathi = "Đậu";
        } else

            $ketquathi = "Rớt";
    } else
        $ketquathi = "Rớt";





    ?>

    <form align='center' action="" method="post">

        <table border="0">

            <tr bgcolor="yellow">

                <th colspan="2" align="center">
                    <h3>
                        <font color="red">KẾT QUẢ THI ĐẠI HỌC</font>
                    </h3>
                </th>

            </tr>




            <tr>
                <td>Toán:</td>

                <td><input type="text" name="toan" value="<?php echo $toan; ?> " /></td>

            </tr>
            <tr>
                <td>lý:</td>

                <td><input type="text" name="ly" value="<?php echo $ly; ?> " /></td>

            </tr>
            <tr>
                <td>Hoá:</td>

                <td><input type="text" name="hoa" value="<?php echo $hoa; ?> " /></td>

            </tr>

            <tr>
                <td>Điểm chuẩn:</td>

                <td><input type="text" name="diemchuan" disabled="disabled" value="<?php echo $diemchuan; ?> " /></td>

            </tr>

            <tr>
                <td>Tổng điểm: </td>

                <td><input type="text" name="tongdiem" disabled="disabled" value="<?php echo $tongdiem; ?> " /></td>

            </tr>
            <tr>
                <td>Kết quả thi: </td>

                <td><input type="text" name="ketquathi" disabled="disabled" value="<?php echo $ketquathi; ?> " /></td>

            </tr>

            <tr>

                <td colspan="2" align="center"><input type="submit" value="Tính" name="tinh" /></td>

            </tr>

        </table>

    </form>

</body>

</html>