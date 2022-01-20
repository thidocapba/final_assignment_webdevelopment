    <!-- code cho nut like share facebook  -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0"></script>

    <!-- header -->
    <nav class="navbar navbar-expand-md bg-white navbar-light">
        <div class="container">
            <!-- logo  -->
           <!--  <a class="navbar-brand" href="index.php" style="color: #CF111A;"><b>Thực phẩm Việt</b></a> -->
            <a href="trangchu.html" ><img src="anhdanhmuc/Logo.png" width="400px"></a>
            <!-- navbar-toggler  -->
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <!-- form tìm kiếm  -->
                <form action="timkiem.php" class="form-inline ml-auto my-2 my-lg-0 mr-3" method="GET">
                    <div class="input-group" style="width: 520px;">
                        <input type="text" class="form-control" aria-label="Small" name="tukhoa"
                            placeholder="Nhập sản phẩm cần tìm kiếm...">
                            </input>
                        <div class="input-group-append">
                            <input type="submit" class="btn" style="background-color: #CF111A; color: white;" name="timkiem">
                            </input>
                        </div>
                    </div>
                </form>

                <!-- ô đăng nhập đăng ký giỏ hàng trên header  -->
                <ul class="navbar-nav mb-1 ml-auto">
                    <div class="dropdown">
                        <li class="nav-item account" type="button" class="btn dropdown" data-toggle="dropdown">
                           <!--  <a href="#" class="btn btn-secondary rounded-circle">
                                <i class="fa fa-user"></i>
                            </a> -->
                            <?php
                                if(isset($_SESSION['login'])){
                            ?>

                            <a href="#"> <img src="Icons/taikhoan.jpg"width=35px alt="tai_khoan" border="0"/> </a>
                            <a class="nav-link text-dark text-uppercase" href="#" style="display:inline-block">
                                <?php echo $_SESSION['login'];  ?>
                             </a>
                             </li>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item nutdangky text-center mb-2" href="thongtintaikhoan.php">Thông tin tài khoản</a>
                            <a class="dropdown-item nutdangky text-center mb-2" href="lichsumuahang.php">Lịch sử mua hàng</a>
                            <a class="dropdown-item nutdangnhap text-center" href="dangxuat.php">Đăng xuất</a>
                        </div>
                        <?php 
                           }else{
                                        
                        ?>       
                       <a href="#"> <img src="Icons/taikhoan.jpg"width=35px alt="tai_khoan" border="0"/> </a>
                            <a class="nav-link text-dark text-uppercase" href="#" style="display:inline-block">
                                Tài khoản
                             </a>
                             </li>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item nutdangky text-center mb-2" href="#" data-toggle="modal"
                                data-target="#formdangky">Đăng ký</a>
                            <a class="dropdown-item nutdangnhap text-center" href="#" data-toggle="modal"
                                data-target="#formdangnhap">Đăng nhập</a>
                        </div>

                        <?php }?>
                    </div>
                    <li class="nav-item giohang">
                     <!--    <a href="gio_hang.php" class="btn btn-secondary rounded-circle">
                            <i class="fa fa-shopping-cart"></i>
                        </a> -->
                         <a href="giohang.html"> <img src="Icons/giohang.jpg"width=35px alt="giohang" border="0"/> </a>
                        <a class="nav-link text-dark giohang text-uppercase" href="giohang.html"
                            style="display:inline-block">Giỏ
                            Hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- form dang ky khi click vao button tren header-->
    <div class="modal fade mt-5" id="formdangky" data-backdrop="static" tabindex="-1" aria-labelledby="dangky_tieude"
        aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <ul class="tabs d-flex justify-content-around list-unstyled mb-0">
                        
                        <li class="tab tab-dangky text-center">
                            <a class="text-decoration-none">Đăng ký</a>
                            <hr>
                        </li>
                    </ul>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="xulydangky.php" id="form-signup" class="form-signin mt-2">
                        <div class="form-label-group">
                            <input type="text" class="form-control" placeholder="Nhập họ và tên" name="ten_khachhang" required
                                autofocus>
                        </div>
                        <div class="form-label-group">
                            <input type="email" class="form-control" placeholder="Nhập địa chỉ email" name="email"
                                required>
                        </div>
                        <div class="form-label-group">
                            <input type="text" class="form-control" placeholder="Nhập địa chỉ " name="dia_chi"
                                required>
                        </div>
                        <div class="form-label-group">
                            <input type="password" id="inputPassword" class="form-control" placeholder="Nhập mật khẩu" name="mat_khau"
                                required>
                        </div>
                        <div class="form-label-group mb-4">
                            <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="confirm_password"
                                required>
                        </div>
                        <button class="btn btn-lg btn-block btn-signin text-uppercase text-white mt-3" type="submit" name="dangki"
                            style="background: #F5A623">Đăng ký</button>
                        <hr class="mt-3 mb-2">
                        <div class="custom-control custom-checkbox">
                            <p class="text-center">Bằng việc đăng ký, bạn đã đồng ý với Thực Phẩm Việt về</p>
                            <a href="#" class="text-decoration-none text-center" style="color: #F5A623">Điều khoản dịch
                                vụ & Chính sách bảo mật</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- form dang nhap khi click vao button tren header-->
    <div class="modal fade mt-5" id="formdangnhap" data-backdrop="static" tabindex="-1"
        aria-labelledby="dangnhap_tieude" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <ul class="tabs d-flex justify-content-around list-unstyled mb-0">
                        <li class="tab tab-dangnhap text-center">
                            <a class=" text-decoration-none">Đăng nhập</a>
                            <hr>
                        </li>
                        
                    </ul>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="xulydangnhap.php" id="form-signin" class="form-signin mt-2">
                        <div class="form-label-group">
                            <input type="email" class="form-control" placeholder="Nhập địa chỉ email" name="email"
                                required autofocus>
                        </div>
                        <div class="form-label-group">
                            <input type="password" class="form-control" placeholder="Mật khẩu" name="password" required>
                        </div>
                        
                        <button class="btn btn-lg btn-block btn-signin text-uppercase text-white" type="submit" name="dang_nhap" 
                            style="background: #F5A623">Đăng nhập</button>
                        <hr class="my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- thanh tieu de "danh muc san pham" + hotline + ho tro truc tuyen -->
    <section class="duoinavbar">
        <div class="container text-white">
            <div class="row justify">
                <div class="col-md-3">
                    <div class="categoryheader">
                        <div class="noidungheader text-white">
                            <i class="fa fa-bars"></i>
                            <span class="text-uppercase font-weight-bold ml-1">Danh mục sản phẩm</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="benphai float-right">
                        <div class="hotline">
                            <i class="fa fa-phone"></i>
                            <span>Hotline:<b>0338386847</b> </span>
                        </div>
                        <i class="fas fa-comments-dollar"></i>
                        <a href="#">Hỗ trợ trực tuyến </a>
                    </div>
                </div>
            </div>
        </div>
    </section>