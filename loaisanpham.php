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
;?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <base href="http://localhost/BTL/"/>
    <title>THỰC PHẨM VIỆT | LOẠI SẢN PHẨM</title>
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
<?php
    include("config.php");
    $loaisanpham_id=$_GET['id'];
    $sql1 = "SELECT * FROM tbl_loaisanpham WHERE loaisanpham_id='".$loaisanpham_id."' ";
    $kq = mysqli_query($ket_noi,$sql1);
    $row1=mysqli_fetch_array($kq);
?>

     <section class="breadcrumbbar">
        <div class="container">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item"><a href="trangchu.html">Trang chủ</a></li>
                 <li class="breadcrumb-item active"><a href=""><?php echo $row1["ten_loaisanpham"];?></a>
                 </li>
            </ol>
        </div>
    </section>

    <!-- ảnh banner -->
    <section class="banner">
        <div class="container">
            <a href="trangchu.html"><img src="anhdanhmuc/<?php echo $row1["loaisanpham_id"].".png";?>" style="height: 280px;" width="1110px" alt="banner"
                    class="img-fluid"></a>
                  
    </section>

    <!-- các sản phẩm  -->
    <section class="content my-4">
        <div class="container">
            <div class="noidung bg-white" style=" width: 100%;">
                <div class="items">
                    <div class="row">
                        
                            <?php
                                $sql2="SELECT * FROM tbl_sanpham where loaisanpham_id='".$loaisanpham_id."'";
                                $kq2=mysqli_query($ket_noi, $sql2);
                                while ($row2 = mysqli_fetch_array($kq2)) {
                            ;?>
                            <!-- 1 sản phẩm  -->
                            <div class="col-lg-3 col-md-4 col-xs-6">
                            <div class="card">
                        <a href="<?php echo 'san-pham/'.$row2["sanpham_id"].'/'.makeUrl($row2['ten_sanpham']).'.html';?>" class="motsanpham"
                            style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $row2["ten_sanpham"];?>">
                            <img class="card-img-top anh" src="thucpham/<?php echo $row2["anh"];?>" 
                                alt="<?php echo $row2["anh"];?>">
                            <div class="card-body noidungsp mt-3">
                                <h6 class="card-title ten"><?php echo $row2["ten_sanpham"];?></h6>
                                <div class="gia d-flex align-items-baseline">
                                    <div class="giamoi" style="color: #f68634"><?php echo number_format($row2["gia"], 0, '', '.') ;?> đ</div>
                                </div>
                                
                            </div>
                        </a>
                    </div></div>
                    <?php } ;?>

                        
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