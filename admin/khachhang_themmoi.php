<?php
session_start();
if(!isset($_SESSION['login']))
{
    echo "
                <script type='text/javascript'>
                    window.alert('Không có quyền truy cập');
                    window.location.href='dangnhap.php';
                </script>
            ";
}
;?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Boo shop | Admin | Thêm mới tài khoản khách hàng</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="./css/style.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript">
        function validateForm()
          {
            var ten_khachhang = document.forms["form"]["txttenkhachhang"].value;   
            if(ten_khachhang.trim()=="")
            {
                alert("Bạn phải nhập tên khách hàng");
                document.forms["form"]["txttenkhachhang"].focus();
                return false;
            }
          }</script>
    </head>
    <body class="sb-nav-fixed">
        <?php
        include("slide.php");
        ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Thêm mới tài khoản khách hàng</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="khachhang_xlthemmoi.php" enctype="multipart/form-data" id="form" onsubmit="return validateForm()">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="txttenkhachhang" type="text" placeholder="Tên khách hàng" name="txttenkhachhang" />
                                                <label for="txttenkhachhang">Tên khách hàng</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input readonly class="form-control" id="txtmatkhau" type="text" placeholder="Mật khẩu" name="txtmatkhau" value="1" />
                                                <label for="txtmatkhau">Mật khẩu</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="txtdiachi" type="text" placeholder="Địa chỉ" name="txtdiachi" />
                                                <label for="txtdiachi">Địa chỉ</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="txtemail" type="email" placeholder="Email" name="txtemail" />
                                                <label for="txtemail">Email</label>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <input type="submit" name="btnSubmit" value="Thêm mới">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
               
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
