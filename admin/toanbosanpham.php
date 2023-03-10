<?php
session_start();

;?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Boo shop | Admin | Danh sách sản phẩm</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="./css/style.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php
        include("slide.php");
        ?>
            <div id="layoutSidenav_content">
                <main>   
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Danh sách toàn bộ sản phẩm</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Quản lý website</a></li>
                            <li class="breadcrumb-item"><a href="danhmuc.php">Danh mục sản phẩm</a></li>
                            <li class="breadcrumb-item active">Toàn bộ sản phẩm</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Toàn bộ sản phẩm | <a href="themmoisanpham.php">Thêm mới</a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Tên loại sản phẩm</th>
                                            <th>Hình ảnh</th>
                                            
                                            <th>Giá bán</th>
                                            <th>Giá bán khuyến mãi</th>
                                            <th>Số lượng còn</th>
                                            <th>Đã bán</th>
                                            <th>Mô tả</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                    <?php
                                        include("../connect.php");
                                       
                            $sql = "select tbl_sanpham.sanpham_id, tbl_sanpham.ten_sanpham,tbl_loaisanpham.ten_loaisanpham ,tbl_sanpham.gia_ban_khuyen_mai,
                            tbl_sanpham.anh,tbl_sanpham.gia,tbl_sanpham.mo_ta, tbl_sanpham.so_luong,COALESCE(sum(tbl_giohang.so_luong),0)
                             from tbl_sanpham LEFT JOIN tbl_giohang on tbl_sanpham.sanpham_id=tbl_giohang.sanpham_id JOIN tbl_loaisanpham 
                             ON tbl_loaisanpham.loaisanpham_id=tbl_sanpham.loaisanpham_id GROUP by tbl_sanpham.sanpham_id 
                             ORDER BY tbl_sanpham.sanpham_id DESC;";   
                                 
                                        $sanpham = mysqli_query($ket_noi,$sql);
                                        $i=0;
                                        while ($row = mysqli_fetch_array($sanpham)) {
                                            $i++;
                                    ;?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row["ten_sanpham"];?></td>
                                            <td><?php echo $row["ten_loaisanpham"];?></td>
                                            <td>
                                            <img src="<?php echo $row['anh']  ;?> "  width="100" height="130 ">
                                            </td>
                                           
                                            <td><?php echo number_format($row["gia"], 0, '', '.') ;?> đ</td>
                                            <td><?php if (isset($row['gia_ban_khuyen_mai'])) {
                                                          echo number_format($row["gia_ban_khuyen_mai"],0, '', '.');    
                                                        } else  echo "null" ?></td>
                                            <td><?php echo $row["so_luong"];?></td>
                                            <td><?php echo $row["COALESCE(sum(tbl_giohang.so_luong),0)"];?></td>
                                            <td><?php echo $row["mo_ta"];?></td>
                                            <td><a class="btn btn-success" href="sanpham_sua.php?sanphamid=<?php echo $row["sanpham_id"]; ?>">Sửa</a></td>
                                            <td><a class="btn btn-danger" href="sanpham_xoa.php?sanphamid=<?php echo $row["sanpham_id"]; ?>" onclick="return confirm('Bạn có muốn xoá?')">Xoá</a></td>
                                        </tr>
                                    <?php
                                        }
                                    ;?>
                                    </tbody>
                                </table>
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
