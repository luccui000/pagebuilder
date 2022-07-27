<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">
    <title>Page Builder Admin</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chart.css') }}">
    @stack('styles')
    @stack('scripts')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" >
        <a class="navbar-brand" href="#">{{ $header->name }}</a>
        <div class="collapse navbar-collapse text-white">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Trang chủ</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sản phẩm
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Sản phẩm 1</a>
                        <a class="dropdown-item" href="#">Sản phẩm 2</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Liên hệ</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="row">
        <div class="col-12">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="https://www.xtmobile.vn/vnt_upload/weblink/6-7redmi11.png" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="https://www.xtmobile.vn/vnt_upload/weblink/27ipad-gen9.png" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="https://www.xtmobile.vn/vnt_upload/weblink/29MACBOOK-M2.png" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://www.xtmobile.vn/vnt_upload/product/08_2019/thumbs/(600x600)_crop_iphone-12-128gb-cu.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title tool-editor">Card title</h5>
                        <p class="card-text text-box">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://www.xtmobile.vn/vnt_upload/product/08_2020/thumbs/600_ipad_2017_32gb_9_7inch_gen_5_4g_trang.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title tool-editor">Card title</h5>
                        <p class="card-text text-box">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://www.xtmobile.vn/vnt_upload/product/11_2021/thumbs/600_apple_watch_series_7_45mm_gps_vien_nhom_day_cao_su_xanh_la.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title tool-editor">Card title</h5>
                        <p class="card-text text-box">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <ul class="list-group w-100 tool-editor tool-editor-list">
                    <li class="list-group-item">Ốp lưng, tai nghe</li>
                    <li class="list-group-item">Pin sạc dự phòng</li>
                    <li class="list-group-item">Phụ kiện khác</li>
                    <li class="list-group-item">Phụ kiện điện thoại</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="template-1" style="background-color: #45526e; color: #fff">
        <section class=""
        >
            <div class="row">
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">
                        Company name
                    </h6>
                    <p>
                        Here you can use rows and columns to organize your footer
                        content. Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit.
                    </p>
                </div>
                <hr class="w-100 clearfix d-md-none" />
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
                    <p>
                        <a class="text-white">MDBootstrap</a>
                    </p>
                    <p>
                        <a class="text-white">MDWordPress</a>
                    </p>
                    <p>
                        <a class="text-white">BrandFlow</a>
                    </p>
                    <p>
                        <a class="text-white">Bootstrap Angular</a>
                    </p>
                </div>
                <hr class="w-100 clearfix d-md-none" />
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">
                        Useful links
                    </h6>
                    <p>
                        <a class="text-white">Your Account</a>
                    </p>
                    <p>
                        <a class="text-white">Become an Affiliate</a>
                    </p>
                    <p>
                        <a class="text-white">Shipping Rates</a>
                    </p>
                    <p>
                        <a class="text-white">Help</a>
                    </p>
                </div>

                <hr class="w-100 clearfix d-md-none" />
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                    <p><i class="fa fa-home mr-3"></i> New York, NY 10012, US</p>
                    <p><i class="fa fa-envelope mr-3"></i> info@gmail.com</p>
                    <p><i class="fa fa-phone mr-3"></i> + 01 234 567 88</p>
                    <p><i class="fa fa-print mr-3"></i> + 01 234 567 89</p>
                </div>
            </div>
        </section>
        <hr class="my-3">
        <div class="container">
            <section class="row">
                <div class="col-8">
                    <div class="p-3">
                        © 2020 Copyright:
                        <a class="text-white" href="https://mdbootstrap.com/"
                        >MDBootstrap.com</a
                        >
                    </div>
                </div>
                <div class="col-4 text-right">
                    <a
                        class="btn btn-outline-light btn-floating m-1 text-white"
                        role="button"
                    ><i class="fa fa-facebook"></i
                        ></a>

                    <a
                        class="btn btn-outline-light btn-floating m-1 text-white"
                        role="button"
                    ><i class="fa fa-twitter"></i
                        ></a>
                    <a
                        class="btn btn-outline-light btn-floating m-1 text-white"
                        role="button"
                    ><i class="fa fa-google"></i
                        ></a>

                    <a
                        class="btn btn-outline-light "
                        role="button"
                    ><i class="fa fa-instagram"></i
                        ></a>
                </div>
            </section>
        </div>
    </div>
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/Chart.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>
