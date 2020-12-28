
<?php
  $bd = $kt = $tien = "";

  if(isset($_POST['bd'])) {
    $bd = $_POST['bd'];
  }
  if(isset($_POST['kt'])) {
    $kt = $_POST['kt'];
  }

  $errs = array();
  if($bd == "") {
    $errs[] = "Bạn chưa nhập giờ bắt đầu";
  }
  if($kt == "") {
    $errs[] = "Bạn chưa nhập giờ kết thúc";
  }

  if(isset($_POST['submit'])) {
    if(count($errs) > 0) {
      echo "<ul>";
      foreach ($errs as $e) {
        echo "<li>$e</li>";
      }
      echo "</ul>";
    } else {
      if($kt < $bd) {
        $tien = "Giờ kết thúc phải lớn hơn giờ bắt đầu";
      } else {
        $tien = 0;
        for($i = $bd; $i < $kt; $i++) {
          if($i >= 10) {
            $tien += 20000;
          }
          if($i >= 17) {
            $tien += 25000;
          }
        }
      }
    }
  }
?>

<form action="" method="post">
  <h3 class="text-center">TÍNH TIỀN KARAOKE</h3>
  <div class="form-group row">
    <label class="col-4 col-form-label font-weight-bold">Giờ bắt đầu</label>
    <input class="col-6 form-control" type="number" name="bd" min="0" max="24" value="<?php echo $bd ?>">
    <label class="col-2 col-form-label font-weight-bold">(h)</label>
  </div>
  <div class="form-group row">
    <label class="col-4 col-form-label font-weight-bold">Giờ kết thúc</label>
    <input class="col-6 form-control" type="number" name="kt" min="0" max="24" value="<?php echo $kt ?>">
    <label class="col-2 col-form-label font-weight-bold">(h)</label>
  </div>
  <div class="form-group text-center">
    <input class="btn btn-primary" type="submit" name="submit" value="Tính">
  </div>
  <div class="form-group row">
    <label class="col-4 col-form-label font-weight-bold">Tiền thanh toán</label>
    <input class="col-6 form-control" type="text" value="<?php echo $tien ?>" readonly>
    <label class="col-2 col-form-label font-weight-bold">(VNĐ)</label>
  </div>
</form>