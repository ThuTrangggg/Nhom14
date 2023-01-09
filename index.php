<?php
require("./header.php");
include("connect.php");
?>
<html>

<body>

  <div id="content wrapper">

    <div id="slider" style="height: 900px; width: 100%">
      <div class="slick-slider" style="height: 100%;">
        <img src="https://cdn2.boo.vn/media/wysiwyg/z3833152554507_570e6b6fbd2f912e2074461560443cf3.jpg" alt="">
        <img style="object-fit: cover;" src="https://cdn2.boo.vn/media/wysiwyg/banner_speed_up_web.JPG" alt="">
        <img src="https://cdn2.boo.vn/media/wysiwyg/z3833152087189_ad3ff60603748103cfba20de3aa6d872.jpg" alt="">
      </div>
    </div>
    <script>
      $(document).ready(function() {
        $('.slick-slider').slick({
          infinite: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 1000,
          prevArrow: "<button type='button' style='position: absolute; left: 10px; color: #fff' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
          nextArrow: "<button type='button' style='position: absolute; right: 10px; color: #fff' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
        });
      });
    </script>
    <div class="first-row" style="margin: auto; width: 1520px; text-align: center; padding: 80px 0;">
      <div class="row">

        <div class="col-lg-4">
          <img width="100%" src="https://cdn2.boo.vn/media/wysiwyg/z4012872199480_1b3af46301dd7ee04d274135fc616c8f.jpg" alt="">
        </div>
        <div class="col-lg-4">
          <img width="100%" src="https://cdn2.boo.vn/media/wysiwyg/z4012872279702_57bb6eec3075728ead8c92d085c750a9.jpg" alt="">
        </div>
        <div class="col-lg-4">
          <img width="100%" src="https://cdn2.boo.vn/media/wysiwyg/z4012872279821_1dde07e18684f8b249eec4f99c6211b9.jpg" alt="">
        </div>
      </div>
    </div>
    <div class="second row" style="margin-right: 30px; padding-left:80px">
      <div class="col-sm-2">
        <p class="heading-slick">Hàng mới</p>
      </div>
      <div class="col-sm-10">
        <div class="row slick ">
          <!-- <div class="row"> -->

          <!-- <div class="slick"> -->
          <?php $sql = "SELECT *from tbl_sanpham order by created_date desc";
          // -- ORDER by created_date DESC ";
          $ketquatruyvan = $conn->query($sql);
          if ($ketquatruyvan->num_rows > 0) {
            $i = 0;
            while ($matHang = $ketquatruyvan->fetch_assoc()) {
              // if ($i % 3 == 0) {
          ?>
              <?php
              // }
              ?>
              <div class="col-sm-3">
                <div class="">
                  <div class="panel-body" style="padding: 0">
                    <a href="./danh_sach_mat_hang/chi_tiet_mat_hang.php?id=<?= $matHang['sanpham_id'] ?>">
                      <img src="<?php echo $matHang['anh'] ?>" class="img-responsive" style=" width:100%; object-fit: contain" alt="Image">
                    </a>
                  </div>
                  <div class="panel-heading text-center">
                    <a style="color: black;" href="./danh_sach_mat_hang/chi_tiet_mat_hang.php?id=<?= $matHang['sanpham_id'] ?>">
                      <?php echo $matHang['ten_sanpham']; ?>
                    </a>
                  </div>
                  <div class="text-center row">
                    <?php
                    if (isset($matHang['gia_ban_khuyen_mai'])) {
                    ?>
                      <div style="text-decoration:line-through; text-align: right" class="col-lg-6"><?php echo number_format($matHang['gia'], 0, '', '.') . 'đ'; ?></div>
                      <div class="col-lg-6" style="color: red;  text-align: left"><?php echo number_format($matHang['gia_ban_khuyen_mai'], 0, '', '.') . 'đ'; ?></div>
                    <?php
                    } else { ?> <p> <?php echo number_format($matHang['gia'], 0, '', '.') . 'đ';
                                  } ?></p>

                  </div>
                </div>
              </div>
              <?php
              // if ($i % 3 == 2) {
              ?>
              <!-- <br> -->
          <?php
            }
            // $i++;
          }
          // }
          ?>
        </div>
      </div>
    </div>
    <div class="third row" style="margin: 50px 0 0 0; padding-left:80px">
      <div class="col-sm-10">
        <div class="row slick ">
          <!-- <div class="row"> -->

          <!-- <div class="slick"> -->
          <?php $sql = "SELECT tbl_sanpham.ten_sanpham, tbl_sanpham.sanpham_id,tbl_sanpham.gia, tbl_sanpham.gia_ban_khuyen_mai,tbl_sanpham.anh, sum(tbl_giohang.so_luong) from tbl_sanpham LEFT join tbl_giohang on tbl_sanpham.sanpham_id = tbl_giohang.sanpham_id GROUP by tbl_giohang.sanpham_id ORDER by sum(tbl_giohang.so_luong) DESC";
          $ketquatruyvan = $conn->query($sql);
          if ($ketquatruyvan->num_rows > 0) {
            $i = 0;
            while ($matHang = $ketquatruyvan->fetch_assoc()) {
              // if ($i % 3 == 0) {
          ?>
              <?php
              // }
              ?>
              <div class="col-sm-3">
                <div class="">
                  <div class="panel-body" style="padding: 0">
                    <a href="./danh_sach_mat_hang/chi_tiet_mat_hang.php?id=<?= $matHang['sanpham_id'] ?>">
                      <img src="<?php echo $matHang['anh'] ?>" class="img-responsive" style=" width:100%; object-fit: contain" alt="Image">
                    </a>
                  </div>
                  <div class="panel-heading text-center">
                    <a style="color: black;" href="./danh_sach_mat_hang/chi_tiet_mat_hang.php?id=<?= $matHang['sanpham_id'] ?>">
                      <?php echo $matHang['ten_sanpham']; ?>
                    </a>
                  </div>
                  <div class="text-center row">
                    <?php
                    if (isset($matHang['gia_ban_khuyen_mai'])) {
                    ?>
                      <div style="text-decoration:line-through; text-align: right" class="col-lg-6"><?php echo number_format($matHang['gia_ban_khuyen_mai'], 0, '', '.') . 'đ'; ?></div>
                      <div class="col-lg-6" style="color: red;  text-align: left"><?php echo number_format($matHang['gia'], 0, '', '.') . 'đ'; ?></div>
                    <?php
                    } else { ?> <p> <?php echo number_format($matHang['gia'], 0, '', '.') . 'đ';
                                  } ?></p>

                  </div>
                </div>
              </div>
              <?php
              // if ($i % 3 == 2) {
              ?>
              <!-- <br> -->
          <?php
            }
            // $i++;
          }
          // }
          ?>
        </div>
      </div>
      <div class="col-sm-2">
        <p class="heading-slick" style="border-bottom: 3px solid rgb(167, 0, 0);">Hàng hot</p>
      </div>
    </div>
    <div class="forth-row "style="margin: 50px 100px">
      <div class="row">
        <div class="col-lg-3" style="position: relative; background-color: yellow; height: 700px">
          <div class="list-items" style="position: absolute; width: 80%">

            <img style="width:100%; height: 351px" src="https://cdn2.boo.vn/media/wysiwyg/BOO_LAAB.png" alt="">
            <p>STREETWEAR FOCUS</p>
            
          </div>
          <a class="button-list-items">Xem ngay</a>
        </div>
        <div class="col-lg-3" style="position: relative; background-color: #c0e3d5; height: 700px">
          <div class="list-items" style="position: absolute; ">

            <img style="width:100%; height: 351px" src="https://cdn2.boo.vn/media/wysiwyg/BOO.png" alt="">
            <p>STR. INSPIRED DAILY WEAR</p>
          </div>
          <a class="button-list-items">Xem ngay</a>

        </div>
        <div class="col-lg-3" style="position: relative; background-color: #f06522; height: 700px">
          <div class="list-items" style="position: absolute; ">

            <img style="width:100%; height: 351px" src="https://cdn2.boo.vn/media/wysiwyg/OOB.png" alt="">
            <p>ORIGINAL OUTSTANDING BOLD</p>
          </div>
          <a class="button-list-items">Xem ngay</a>

        </div>
        <div class="col-lg-3" style="position: relative; background-color: #e82721; height: 700px">
          <div class="list-items" style="position: absolute; ">

            <img style="width:100%; height: 351px" src="https://cdn2.boo.vn/media/wysiwyg/BOOZILLA.png" alt="">
            <p>FANDOM BẢN QUYỀN CHÍNH THỨC TẠI VN</p>
          </div>
          <a class="button-list-items">Xem ngay</a>

        </div>
      </div>
    </div>
    <!-- <div id="map" class="text-center" style="width:500px;height:500px;">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.602070402842!2d105.82623881447564!3d21.008582486009235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac8041a9648d%3A0xe487dd495fdfd676!2zMTIgUC4gQ2jDuWEgQuG7mWMsIFRydW5nIExp4buHdCwgxJDhu5FuZyDEkGEsIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1672800684612!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div> -->
  </div>

  <script>
    $(document).ready(function() {
      $('.slick').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
      });
    });
  </script>
  </div>

</body>

</html>

<?php
require("./footer.php")
//  include $_SERVER["DOCUMENT_ROOT"] . "/Nhom14/footer.php"; 

?>

<html>

</html>