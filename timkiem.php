<?php
session_start();
;?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <base href="http://localhost/BTL/"/>
    <title>SẢN PHẨM| TÌM KIẾM</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/product-item.css">
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="stylesheet" href="fontawesome_free_5.13.0/css/all.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
    <script type="text/javascript" src="slick/slick.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script type="text/javascript"
        src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
       <link rel="apple-touch-icon" sizes="180x180" href="anhdanhmuc/Logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="anhdanhmuc/Logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="anhdanhmuc/Logo.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">   
</head>

<body>
    <?php include("top.php");?>

<?php 
    include("config.php");
    $tim_kiem=$_GET['tukhoa'];
    $sql ="SELECT * FROM tbl_sanpham WHERE tbl_sanpham.ten_sanpham LIKE '%".$tim_kiem."%'
        ";
    $kq = mysqli_query($ket_noi, $sql);
;?>
    <!-- breadcrumb  -->
    <section class="breadcrumbbar">
        <div class="container">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                <li class="breadcrumb-item active"><a href="">Tìm kiếm theo từ khoá : <?php echo $tim_kiem;?></a></li>
            </ol>
        </div>
    </section>



    <!-- các sản phẩm  -->
    <section class="content my-4">
        <div class="container">
            <div class="noidung bg-white" style=" width: 100%;">
                <div class="items">
                    <div class="row">
                            <?php
                                $so_luong = mysqli_num_rows($kq);
                                if($so_luong>0){
                                while ($row = mysqli_fetch_array($kq)) {
                            ;?>
                            <!-- 1 sản phẩm  -->
                            <div class="col-lg-3 col-md-4 col-xs-6">
                            <div class="card">
                        <a href="sanpham.php?id=<?php echo $row["sanpham_id"];?>" class="motsanpham"
                            style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $row["ten_sanpham"];?>">
                            <img class="card-img-top anh" src="thucpham/<?php echo $row["anh"];?>" 
                                alt="<?php echo $row["anh"];?>">
                            <div class="card-body noidungsp mt-3">
                                <h6 class="card-title ten"><?php echo $row["ten_sanpham"];?></h6>
                                <div class="gia d-flex align-items-baseline">
                                    <div class="giamoi" style="color: #f68634"><?php echo number_format($row["gia"], 0, '', '.') ;?> đ</div>
                                </div>
                                
                            </div>
                        </a>
                    </div></div>
                    <?php }
                    }else echo "Không tìm thấy kết quả!";
                     ;?>

                        
                    </div>
                </div>

            
                <!--het khoi san pham-->
            </div>
            <!--het div noidung-->
        </div>
        <!--het container-->
    </section>

<br>
<br>
<br>
<br>
<br>

    
    <!-- footer  -->
    <?php include("footer.php");?>

    <!-- nut cuon len dau trang -->
    <div class="fixed-bottom">
        <div class="btn btn-warning float-right rounded-circle nutcuonlen" id="backtotop" href="#"
            style="background:#f68634;"><i class="fa fa-chevron-up text-white"></i></div>
    </div>


</body>

</html>