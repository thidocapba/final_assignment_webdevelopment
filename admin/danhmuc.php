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
        <title>Thực phẩm Việt | Admin | Danh mục sách</title>
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
                        <h1 class="mt-4">Quản trị danh mục sản phẩm</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Quản trị hệ thống</a></li>
                            <li class="breadcrumb-item active">Quản trị danh mục sản phẩm</li>
                            <li class="breadcrumb-item "><a style="text-decoration: none" href="toanbosanpham.php">Hiển thị toàn bộ sản phẩm</a></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Danh mục sản phẩm | <a href="danhmucthemmoi.php">Thêm mới</a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên loại sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                             <th>STT</th>
                                            <th>Tên loại sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                    include("../config.php");
                                        $sql = "
                                                  SELECT tbl_loaisanpham.loaisanpham_id, tbl_loaisanpham.ten_loaisanpham, COUNT(tbl_sanpham.sanpham_id) FROM tbl_loaisanpham LEFT JOIN tbl_sanpham ON  tbl_loaisanpham.loaisanpham_id=tbl_sanpham.loaisanpham_id GROUP BY tbl_loaisanpham.loaisanpham_id;
                                        ";
                                        $ket_qua = mysqli_query($ket_noi, $sql);
                                        $i=0;
                                        while ($row = mysqli_fetch_array($ket_qua)) {
                                            $i++;
                                    ;?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><a style="text-decoration: none" href="sanpham.php?id=<?php echo $row["loaisanpham_id"];?>"><?php echo $row["ten_loaisanpham"];?></a></td>
                                          
                                            <td><?php echo $row["COUNT(tbl_sanpham.sanpham_id)"];?></td>
                                            <td><a class="btn btn-success" href="danhmucsua.php?id=<?php echo $row["loaisanpham_id"]; ?>">Sửa</a></td>
                                            <td><a class="btn btn-danger" href="danhmucxoa.php?id=<?php echo $row["loaisanpham_id"]; ?>" onclick="return confirm('Bạn có muốn xoá?')">Xoá</a></td>
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
