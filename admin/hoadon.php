<?php
session_start();
if(!isset($_SESSION['login']))
{
    echo "
                <script type='text/javascript'>
                    window.alert('Không có quyền truy cập');
                    window.location.href='dang_nhap.php';
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
        <title>Thực phẩm Việt| Admin | Hoá đơn bán</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php
        include("slide.php");
        ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Quản trị hoá đơn bán</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Quản trị hệ thống</a></li>
                            <li class="breadcrumb-item active">Quản trị hoá đơn bán</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Hoá đơn bán
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã hoá đơn</th>
                                            <th>Khách hàng</th>
                                            <th>Email</th>
                                            <th>Địa chỉ</th>
                                            <th>Tổng số</th>
                                            <th>Tổng tiền</th>
                                            <th>Ngày xuất hoá đơn</th>
                                            <th>Nhân viên thanh toán</th>
                                            <th>Tình trạng</th>
                                            <th>Chi tiết</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã hoá đơn</th>
                                            <th>Khách hàng</th>
                                            <th>Email</th>
                                            <th>Địa chỉ</th>
                                            <th>Tổng số</th>
                                            <th>Tổng tiền</th>
                                            <th>Ngày xuất hoá đơn</th>
                                            <th>Nhân viên thanh toán</th>
                                            <th>Tình trạng</th>
                                            <th>Chi tiết</th>
                                            <th>Xóa</th>   
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                        include("../config.php");
                                        
                                        $sql = "
                                                  SELECT * FROM (tbl_hoadon Left JOIN tbl_khachhang on tbl_hoadon.khachhang_id=tbl_khachhang.khachhang_id) Left JOIN tbl_admin ON tbl_hoadon.admin_id=tbl_admin.admin_id
                                        ";
                                        $ket_qua = mysqli_query($ket_noi, $sql);
                                        $i=0;
                                        while ($row = mysqli_fetch_array($ket_qua)) {
                                            $i++;
                                    ;?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row["hoadon_id"];?></td>
                                            <td><?php echo $row["ten_khachhang"];?></td>
                                            <td><?php echo $row["email"];?></td>
                                            <td><?php echo $row["dia_chi"];?></td>
                                            <?php
                                                $sql1 = "
                                                  SELECT SUM(tbl_sanpham.gia*tbl_giohang.so_luong), SUM(tbl_giohang.so_luong) FROM tbl_sanpham  INNER JOIN tbl_giohang ON tbl_sanpham.sanpham_id=tbl_giohang.sanpham_id WHERE tbl_giohang.hoadon_id='".$row["hoadon_id"]."'";
                                                  
                                                $kq = mysqli_query($ket_noi, $sql1);
                                                $r = mysqli_fetch_array($kq);
                                            ;?>
                                             <td><?php echo $r["SUM(tbl_giohang.so_luong)"] ;?></td>
                                            <td><?php echo number_format($r["SUM(tbl_sanpham.gia*tbl_giohang.so_luong)"], 0, '', '.') ;?> đ</td>  
                                            <td><?php echo $row["ngay_xuat"];?></td>
                                            <td><?php echo $row["ten_admin"];?></td>
                                            <td>
                                            <?php
                                                if($row['tinh_trang']==1||$row['tinh_trang']==2){
                                                ?>
                                                <a class="btn btn-default" style="font-size: 14px;" href="#">Đã giao hàng</a>
                                                <?php
                                                }else if($row['tinh_trang']==0){
                                                ?>
                                                <a class="btn btn-success" style="font-size: 14px;" href="xacnhan.php?idhd=<?php echo $row['hoadon_id'];?>&idadmin=<?php echo $_SESSION['admin_id'];?>">Giao hàng</a>
                                                <?php
                                                    }
                                                ?></td>                                       
                                            <td><a class="btn btn-primary" href="chitiethoadon.php?id=<?php echo $row["hoadon_id"]; ?>"><i class="fas fa-search"></i></a></td> 
                                            <td>
                                            <a  class="btn btn-danger" href="hoadonxoa.php?id=<?php echo $row["hoadon_id"]; ?>" onclick="return confirm('Thao tác này sẽ xoá toàn bộ thông tin về hoá đơn cũng như lịch sử mua hàng của khách hàng, bạn có muốn xoá?')">Xoá</a>
                                            </td>
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
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Banking Academy</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
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
