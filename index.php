<!DOCTYPE html>
<html lang="vi">
<?php 
session_start();
function makeUrl($string)
{
    $string=trim($string);
    $string=str_replace(' ','-',$string);
    $string=str_replace(',','',$string);
    $string=strtolower($string);
    $string=preg_replace('/(à|á|ả|ã|ạ|ă|ắ|ằ|ẵ|ẳ|ặ|â|ấ|ầ|ẩ|ẫ|ậ)/', 'a', $string);
    $string=preg_replace('/(è|é|ẻ|ẽ|ẹ|ê|ề|ế|ể|ễ|ệ)/', 'e', $string);
    $string=preg_replace('/(ù|ú|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự)/', 'u', $string);
    $string=preg_replace('/(ò|ó|ỏ|õ|ọ|ô|ồ|ố|ổ|ỗ|ộ|ơ|ờ|ớ|ở|ỡ|ợ|Ớ)/', 'o', $string);
    $string=preg_replace('/(ì|í|ỉ|ĩ|ị|ỳ|ý|ỷ|ỹ|ỵ)/', 'o', $string);
    $string=preg_replace('/(Đ|đ)/', 'd', $string);
    return $string;
}
?>
<head>
    <title>Cửa hàng Việt</title>
    <meta name="description"
        content="rau sạch, rau sống, rau củ quả tươi, cá tươi, thịt sạch, thịt tươi">
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/home.css">
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
</head>

<body>
     <?php include("top.php");?>

     <!-- noi dung danh muc sach(categories) + banner slider -->
    <section class="header bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-3" style="margin-right: -15px;">
                    <!-- CATEGORIES -->
                    <div class="categorycontent">
                            
                            <?php
                            include("config.php");
                            $sql = "SELECT * FROM tbl_loaisanpham";
                            $danh_muc = mysqli_query($ket_noi,$sql);
                            while ($row=mysqli_fetch_array($danh_muc)) {
                            ;?> 
                            <ul>
                                <li> <a href="<?php echo 'loai-san-pham/'.$row["loaisanpham_id"].'/'.makeUrl($row['ten_loaisanpham']).'.html'?>"> <?php echo $row["ten_loaisanpham"];?></a><i
                                        class="fa fa-chevron-right float-right"></i>
                                </li>
                                </ul>
                            <?php } ;?>
                            
                        </div>
                </div>

                <!-- banner slider  -->
                <div class="col-md-9 px-0">
                    <div id="carouselId" class="carousel slide" data-ride="carousel">
                        <ol class="nutcarousel carousel-indicators rounded-circle">
                            <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselId" data-slide-to="1"></li>
                            <li data-target="#carouselId" data-slide-to="2"></li>
                        </ol>
                       <div class="carousel-inner">
                            <div class="carousel-item active">
                                <a href="#"><img src="anhdanhmuc/1.png" class="img-fluid"
                                        style="height: 386px;" width="900px" alt="First slide"></a>
                            </div>
                            <div class="carousel-item">
                                <a href="#"><img src="anhdanhmuc/2.png" class="img-fluid"
                                        style="height: 386px;" width="900px" alt="Second slide"></a>
                            </div>
                            <div class="carousel-item">
                                <a href="#"><img src="anhdanhmuc/3.png" class="img-fluid"
                                        style="height: 386px;" alt="Third slide"></a>
                            </div>
                              <div class="carousel-item">
                                <a href="#"><img src="anhdanhmuc/4.png" class="img-fluid"
                                        style="height: 386px;" alt="Third slide"></a>
                            </div>
                              <div class="carousel-item">
                                <a href="#"><img src="anhdanhmuc/5.png" class="img-fluid"
                                        style="height: 386px;" alt="Third slide"></a>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselId" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselId" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

 <!-- khoi sach moi  -->
     <?php
        include("config.php");
        $sql1 = "SELECT *  FROM tbl_loaisanpham WHERE loaisanpham_id = 1 or loaisanpham_id = 2 or loaisanpham_id = 4";
        $kq1 = mysqli_query($ket_noi,$sql1);
        while ($row1=mysqli_fetch_array($kq1)) {
    ;?> 
    <section class="_1khoi sachmoi bg-white">
        <div class="container">
            <div class="noidung" style=" width: 100%;">
                <div class="row">
                    <!--header-->
                    <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-transparent pt-4">
                        <h1 class="header text-uppercase" style="font-weight: 400;"><?php echo $row1["ten_loaisanpham"];?></h1>
                        <a href="<?php echo 'loai-san-pham/'.$row1["loaisanpham_id"].'/'.makeUrl($row1['ten_loaisanpham']).'.html'?>" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                    </div>
                </div>
                <div class="khoisanpham" style="padding-bottom: 2rem;">
                <?php
                $loaisanpham_id=$row1["loaisanpham_id"];
                $sql2="SELECT * FROM tbl_sanpham where loaisanpham_id='".$loaisanpham_id."'";
                $kq2=mysqli_query($ket_noi, $sql2);
                while ($row2 = mysqli_fetch_array($kq2)) {
                ;?>
                
                   
                    <div class="card" >
                        <a href="<?php echo 'san-pham/'.$row2["sanpham_id"].'/'.makeUrl($row2['ten_sanpham']).'.html';?>" class="motsanpham"
                            style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $row2["ten_sanpham"];?>">
                            <img class="card-img-top anh" style="width: 100%" src="thucpham/<?php echo $row2["anh"];?>" style="width: 230px;height: 300px"
                                alt="<?php echo $row2["anh"];?>" >
                            <div class="card-body noidungsp mt-3">
                                <h3 class="card-title ten"><?php echo $row2["ten_sanpham"];?></h3>
                                <div class="gia d-flex align-items-baseline">
                                    <div class="giamoi"><?php echo number_format($row2["gia"], 0, '', '.') ;?> đ</div>
                                </div>
                                <div class="danhgia">
                                    <ul class="d-flex" style="list-style: none;">
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php } ;?>
                </div>
                
            </div>
        </div>
    </section>
<?php } ;?>
<br>
<br>
<br>
<br>
<br>
<br>
 <?php include("footer.php");?>
    <!-- nut cuon len dau trang -->
    <div class="fixed-bottom">
        <div class="btn btn-warning float-right rounded-circle nutcuonlen" id="backtotop" href="#"
            style="background:#F68634;"><i class="fa fa-chevron-up text-white"></i></div>
    </div>

   
   

</body>

</html>