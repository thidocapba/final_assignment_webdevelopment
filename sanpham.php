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
<html lang="li">

<head>
    <base href="http://localhost/BTL/"/>
    <title>THỰC PHẨM VIỆT STORE | DANH MỤC SẢN PHẨM</title>
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
     <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

</head>

<body>
    <?php include("top.php");?>
<?php
    include("config.php");
    $sanpham_id=$_GET['id'];
    $sql1 = "SELECT tbl_sanpham.sanpham_id,tbl_sanpham.loaisanpham_id, tbl_sanpham.ten_sanpham,tbl_sanpham.anh,tbl_sanpham.gia, tbl_sanpham.so_luong-COALESCE(tbl_giohang.so_luong,0) FROM tbl_sanpham LEFT JOIN tbl_giohang ON tbl_sanpham.sanpham_id=tbl_giohang.sanpham_id WHERE tbl_sanpham.sanpham_id='".$sanpham_id."' ";
    $kq = mysqli_query($ket_noi,$sql1);


    $row1=mysqli_fetch_array($kq);
    $loaisanpham_id=$row1["loaisanpham_id"];
    $sql2=  "SELECT * FROM tbl_loaisanpham WHERE loaisanpham_id = '".$loaisanpham_id."' ";     
    $loai_sanpham = mysqli_query($ket_noi,$sql2);
    $row2=mysqli_fetch_array($loai_sanpham);

?>
    <!-- breadcrumb  -->
    <section class="breadcrumbbar">
        <div class="container">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item"><a href="trangchu.html">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#"><?php echo $row2["ten_loaisanpham"] ;?></a></li>
                <li class="breadcrumb-item"><a href=""><?php echo $row1["ten_sanpham"] ;?></a></li>
            </ol>
        </div>
    </section>

    <!-- nội dung của trang  -->
    <section class="product-page mb-4">
        <div class="container">
            <!-- chi tiết 1 sản phẩm -->
            <div class="product-detail bg-white p-4">
                <div class="row">
                    <!-- ảnh  -->
                    <div class="col-md-5 khoianh">
                        <div class="anhto mb-4">
                            <a class="active" href="thucpham/<?php echo $row1["anh"] ;?>" data-fancybox="thumb-img">
                                <img class="product-image" src="thucpham/<?php echo $row1["anh"] ;?>" alt="<?php echo $row1["anh"] ;?>" style="width: 100%;">
                            </a>
                            <a href="thucpham/<?php echo $row1["anh"] ;?>" data-fancybox="thumb-img"></a>
                        </div>
                    </div>
                    <!-- thông tin sản phẩm: tên, giá bìa giá bán tiết kiệm, các khuyến mãi, nút chọn mua.... -->
                    <div class="col-md-7 khoithongtin">
                        <div class="row">
                            <div class="col-md-12 header">
                                <h2 style="margin-left: 100px"><?php echo $row1["ten_sanpham"] ;?></h2>
                                <br>
                                <hr>
                            </div>
                            <div class="form-floating mb-3">
                                <h5 style="margin-left: 100px">GIÁ BÁN: </h5>
                                <ul>
                                <h3 style="margin-left: 220px; color: #F5A623;">
                                <?php echo number_format($row1["gia"], 0, '', '.') ;?>₫
                                </h3></ul><hr>
                               
                                <h5 style="margin-left: 100px">TÌNH TRẠNG: <?php if ($row1["tbl_sanpham.so_luong-COALESCE(tbl_giohang.so_luong,0)"]>0)echo "CÒN HÀNG" ; else echo"HẾT HÀNG";?></h5>
                                <hr>
        
                                <form class="form-inline" method="post" action="giohang.php" id="form_them_gio_hang">
                                    <div class="form-floating mb-3">
                                    <input style="margin-left: 100px" class="form-control" id="so_luong" name="so_luong" placeholder="Số lượng" type="number" value="1" min="0" max="<?= $row1["tbl_sanpham.so_luong-COALESCE(tbl_giohang.so_luong,0)"]?>">
                                    <hr><br><br><br><br><br><br><br><br>
                                    </div>
                                    <input type="hidden" value="<?= $row1["sanpham_id"]?>" name="sanpham_id" />
                                    <input type="hidden" value="<?= $row1["ten_sanpham"]?>" name="ten_sanpham" />
                                    <input type="hidden" value="<?= $row1["gia"]?>" name="gia" />
                                    <input type="hidden" value="<?= $row1["tbl_sanpham.so_luong-COALESCE(tbl_giohang.so_luong,0)"]?>" name="ton_kho" />
                                    <input type="hidden" value="<?php if ($row1["tbl_sanpham.so_luong-COALESCE(tbl_giohang.so_luong,0)"]>0)echo "Còn hàng" ; else echo"Hết hàng";?>" name="tinh_trang" />
                                    <input id="<?= $row1["sanpham_id"]?>" onclick="addtocard(<?= $row1["sanpham_id"]?>)" class="button-capnhat text-uppercase offset-md-4 btn btn-warning mb-4" name="btnSubmit" value="Thêm vào giỏ hàng ">
                                </form>



                            </div>
                        </div>
                    </div>
                     <hr>
                </div>
            </div>
        </div>
    </section>
    <!-- het product-page -->
    
    <!-- khối sản phẩm tương tự -->
    <section class="_1khoi spmoi">
        <div class="container">
            <div class="noidung bg-white" style=" width: 100%;">
                <div class="row">
                    <!--header-->
                    <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-light pt-4">
                        <h5 class="header text-uppercase" style="font-weight: 400;">Sản phẩm tương tự</h5>
                        
                    </div>
                </div>
                <div class="khoisanpham" style="padding-bottom: 2rem;">
                    <!-- 1 sản phẩm -->
                    <?php
                        $sql="SELECT * FROM tbl_sanpham where loaisanpham_id='".$loaisanpham_id."'";
                        $kq=mysqli_query($ket_noi, $sql);
                        while ($row = mysqli_fetch_array($kq)) {
                    ;?>
                    <div class="card">
                        <a href="<?php echo 'san-pham/'.$row["sanpham_id"].'/'.makeUrl($row['ten_sanpham']).'.html';?>" class="motsanpham"
                            style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $row["ten_sanpham"];?>">
                            <img class="card-img-top anh" style="width: 35%" src="thucpham/<?php echo $row["anh"];?>" style="width: 23px;height: 30px"
                                alt="<?php echo $row["anh"];?>" >
                        
                            <div class="card-body noidungsp mt-3">
                                <h6 class="card-title ten"><?php echo $row["ten_sanpham"];?></h6>
                                <div class="gia d-flex align-items-baseline">
                                    <div class="giamoi" style="color: #f68634"><?php echo number_format($row["gia"], 0, '', ',') ;?>₫</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php };?>
                </div>
            </div>
        </div>
    </section>

    <br>
    <br>
    <br>
    
  

    <!-- footer  -->
    <?php include("footer.php");?>

    <!-- nut cuon len dau trang -->
    <div class="fixed-bottom">
        <div class="btn btn-warning float-right rounded-circle nutcuonlen" id="backtotop" href="#" style="background:#f68634;"><i
                class="fa fa-chevron-up text-white"></i></div>
    </div>

<script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
<script type="text/javascript">
    function addtocard(data1) {
        //alert(id);
        var so_luong1=$("#so_luong").val();
        //alert("Thêm");
        $.ajax({
            url : "themgiohang.php", // gửi ajax đến file result.php
            type : "get", // chọn phương thức gửi là get
            dateType:"text", // dữ liệu trả về dạng text
            data : { // Danh sách các thuộc tính sẽ gửi đi
                 id : data1,
                 so_luong: so_luong1
            },
            success : function (result){
                // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
                // đó vào thẻ div có id = result
                alert(result);
            }
        });
    } 
       
</script>
</body>

</html>