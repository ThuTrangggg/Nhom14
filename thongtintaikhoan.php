<?php 
include( "header.php");
//include("../thong_tin/slide_thongtin.php")
?>
<!DOCTYPE html>
<html lang="vi">
<!-- 
<head>
    <title>Pet shop</title>
    <meta name="description"
        content="rau sạch, rau sống, rau củ quả tươi, cá tươi, thịt sạch, thịt tươi">
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/thongtintaikhoan.css">
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="stylesheet" href="fontawesome_free_5.13.0/css/all.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script type="text/javascript"
        src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>

    <link rel="canonical" href="http://dealbook.xyz/">
    <meta name="google-site-verification" content="urDZLDaX8wQZ_-x8ztGIyHqwUQh2KRHvH9FhfoGtiEw" />
    <link rel="apple-touch-icon" sizes="180x180" href="anhdanhmuc/Logo.png.png">
    <link rel="icon" type="image/png" sizes="32x32" href="anhdanhmuc/Logo.png.png">
    <link rel="icon" type="image/png" sizes="16x16" href="anhdanhmuc/Logo.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
    <style>img[alt="www.000webhost.com"]{display: none;}</style>
    <script type="text/javascript">
      function validateForm1()
      {
        var phone = document.forms["form_thong_tin"]["txtSdt"].value;
        var address = document.forms["form_thong_tin"]["txtDiachi"].value;      
    
        if(address.trim()=="")
        {
            alert("Nhập địa chỉ của bạn");
            document.forms["form_thong_tin"]["txtDiachi"].focus();
            return false;
        }
      }
      function validateForm2()
      {
        var mk_cu = document.forms["formdoimk"]["mk_cu"].value;
        
           
        if(mk_cu.trim()=="")
        {
            alert("Nhập mật khẩu cũ của bạn");
            document.forms["formdoimk"]["mk_cu"].focus();
            return false;
        }
        var mk_moi = document.forms["formdoimk"]["mk_moi"].value;
        if(mk_moi.trim()=="")
        {
            alert("Nhập mật khẩu mới của bạn");
            document.forms["formdoimk"]["mk_moi"].focus();
            return false;
        }
        var mk_nhaplai = document.forms["formdoimk"]["mk_nhaplai"].value;     
        if(mk_nhaplai.trim()=="")
        {
            alert("Nhập lại mật khẩu mới");
            document.forms["formdoimk"]["mk_nhaplai"].focus();
            return false;
        }
        if(mk_nhaplai!=mk_moi)
        {
            alert("Bạn nhập lại sai mật khẩu!");
            document.forms["formdoimk"]["mk_moi"].value='';
            document.forms["formdoimk"]["mk_nhaplai"].value='';
            document.forms["formdoimk"]["mk_moi"].focus();
            return false;
        }
      }
    </script>
</head> -->

<body>
  <?php include("connect.php");
  //include("./thong_tin/slide_thongtin.php");
  ?>
    <section class="account-page my-3">
        <div class="container" style="margin-top: 150px;">
            <div class="page-content bg-white">
                <div class="account-page-tab-content m-4">
                    <div class="formnhap">
                        <form id="form_thong_tin" method="post" action="suathongtintaikhoan.php" onsubmit="return(validateForm1());">
               
                        <?php
                          
                            $khachhang_id= $_SESSION['userId'];  
                            $sql = "SELECT * FROM tbl_taikhoan join tbl_khachhang
                            on tbl_taikhoan.id = tbl_khachhang.id_taikhoan
                            WHERE id = '".$khachhang_id."' ";
                            $kh = mysqli_query($ket_noi,$sql);
                           $row=mysqli_fetch_array($kh);
                         ?>
                            <div class="tab-pane  show active pl-4 " id="nav-taikhoan" role="tabpanel" aria-labelledby="nav-taikhoan-tab">
                                <div class="offset-md-4 mt-3">
                                    <h3 class="account-header" style="margin-top: -50px;margin-left: 436px;font-size: 45px;">Thông tin tài khoản</h3>
                                </div><br>
                               
                                <div class="hoten my-3">
                                    <div class="row">
                                        <label style="min-height: 30px;padding-right: 15px;padding-left: 15px;margin-left: 379px;margin-top: 10px;" class="col-md-2 offset-md-2" for="account-hoten">Họ tên</label>
                                        <input class="col-md-4" type="text" id="txtTenKH" name="txtTenKH" value="<?php echo $row["ten_khachhang"];?>">
                                     </div>
                                </div>

                            
                                <div class="hoten my-3">
                                    <div class="row"> 
                                        <label style="min-height: 30px;padding-right: 15px;padding-left: 15px;margin-left: 379px;margin-top: 10px;"  class="col-md-2 offset-md-2" for="account-diachi">Địa chỉ nhận hàng* </label>
                                        <input class="col-md-4" type="text" id="txtDiachi" name="txtDiachi" value="<?php echo $row["dia_chi"];?>">
                                     </div>
                                </div>

                                <div class="hoten my-3">
                                    <div class="row"> 
                                        <label style="min-height: 30px;padding-right: 15px;padding-left: 15px;margin-left: 379px;margin-top: 10px;" class="col-md-2 offset-md-2" for="account-sdt">Email* </label>
                                        <input class="col-md-4" type="text" id="txtEmail" name="txtEmail"  value="<?php echo $row["email"];?>" /  >
                                    </div>
                                </div>
                                <div class="capnhat my-3">
                                    <input style="background-color: #151514;font-weight: 700;padding: 11px 19px;font-size: 14px;margin-left: 412px;border-radius: 5px;" class="button-capnhat text-uppercase offset-md-4 btn btn-warning mb-4" type="submit" name="btnSubmit" value="Sửa thông tin ">
                                </div>
                                <div class="checkbox-change-pass my-3">
                                    <div class="row" style="margin-top: -75px">
                                        <a style="margin-left: 600px;color: #0f1010;" href="" data-toggle="modal" data-target="#form-formdoimk">Đổi mật khẩu </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="modal  mt-5" id="form-formdoimk" data-backdrop="static" tabindex="-1" aria-labelledby="dangky_tieude" aria-hidden="true">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <ul class="tabs d-flex justify-content-around list-unstyled mb-0">
                                        <li class="tab tab-dangnhap text-center">
                                            <a style="color: #0d0e0e;font-size: 30px;" class=" text-decoration-none">Đổi mật khẩu</a>
                                            <hr>
                                        </li></ul>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formdoimk" action="suathongtintaikhoan.php" method="POST" onsubmit="return(validateForm2());" enctype="multipart/form-data">
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control" placeholder="Mật khẩu cũ" id="mk_cu" name="mk_cu" >
                                            </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input style="margin-left: 14px;width: 95%;margin-top: 5px;" type="password" class="form-control" placeholder="Nhập mật khẩu mới" id="mk_moi" name="mk_moi">
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input style="margin-left: 14px;width: 95%;margin-top: 21px;" type="password" class="form-control" placeholder="Nhập lại mật khẩu mới" id="mk_nhaplai" name="mk_nhaplai">
                                            </div>
                                            <input style="margin-top: 21px;margin-left: 15px;    border-color: #191817;background-color: #0c0b0b;" class="button-capnhat text-uppercase offset-md-4 btn btn-warning mb-4" type="submit" name="btnSubmit" value="Đổi mật khẩu">
                                            <hr class="my-4">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
                  
                   
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
    <!-- footer  -->
    <?php include("footer.php");?>

</body>

</html>