<?php
require_once "../model/config.php";
require_once "../model/database.php";
require_once "../model/social.php";

$social = new Social();
$getSocialHomePage = $social->getSocialHomePage();
?>
<!-- Footer Start -->
        <footer>
            <div class="container">
                <div class="footer-top">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-6 col-12">
                            <img src="./img/logo.png" alt="Logo Yenvina" />
                            <p class="f-item location">
                                <i class="bx bx-location-plus"></i>
                                <span>Tầng 3 tòa nhà CT2 Cửu Long, Số 536A Minh Khai, Phường Vĩnh
                                    Tuy, Quận Hai Bà Trưng, Thành phố Hà Nội, Việt Nam</span>
                            </p>
                            <p class="f-item phone">
                                <i class="bx bx-phone"></i>
                                <span>0123456789</span>
                            </p>
                            <p class="f-item email">
                                <i class="bx bx-envelope"></i>
                                <span>yenvina@gmail.com</span>
                            </p>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3 class="footer-title">Hướng dẫn</h3>
                                    <div class="footer-content">
                                        <ul>
                                            <li class="item"><a href="./product.php">Tìm kiếm</a></li>
                                            <li class="item"><a href="./term_service.php">Giới thiệu</a></li>
                                            <li class="item"><a href="./term_service.php">Điều khoản dịch vụ</a></li>
                                            <li class="item"><a href="./term_service.php">Liên hệ</a></li>
                                            <li class="item">
                                                <a href="./term_service.php">Chính sách thanh toán</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <h3 class="footer-title">Đăng ký xác nhận email</h3>
                            <div class="footer-content">
                                <div class="newsletter-form">
                                    <p>Hãy nhận email của bạn vào đây để nhận tin mới nhất</p>
                                    <form accept-charset="UTF-8" action="#" class="contact-form" method="post">
                                        <div class="group-input">
                                            <input type="text" required placeholder="Nhập email..." />
                                            <button type="submit">
                                                <i class="bx bxs-envelope"></i>
                                            </button>
                                        </div>
                                        <div class="line-under"></div>
                                    </form>
                                </div>
                                <div class="footer-social">
                                    <?php foreach($getSocialHomePage as $item){ ?>
                                        <a target="_blank" href="<?=$item['href']?>" class="social-network"><i class="bx <?=$item['icon']?>"></i></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-center">
                    <div class="row gx-5">
                        <div class="col-lg-6 col-md-6 col-12">
                            <h3 class="footer-title">Phương thức vận chuyển</h3>
                            <div class="footer-content transform">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <img src="https://theme.hstatic.net/200000404397/1000922692/14/img_transport_item_1.png?v=556"
                                                class="dt-auto" loading="lazy" alt="MasterCard" />
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="https://theme.hstatic.net/200000404397/1000922692/14/img_transport_item_2.png?v=556"
                                                class="dt-auto" loading="lazy" alt="Visa" />
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="footer-wp">
                        <p>
                            Copyright &copy 2023
                            <a href="">Yến rồng tiên</a> .
                            <a href="" target="_blank">Power by Keri</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer End -->
        <!-- Modal -->
        <div class="modal fade" id="popupAddCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog model-wh modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLongTitle">
                            Gio hang hien co ( <span>1</span> )san pham
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table" data-user="<?=$_SESSION['user']['temp']?>">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer"></div>
                </div>
            </div>
        </div>
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

        <a target="_blank" href="https://zalo.me" class="btn btn-lg-square zalo_me">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Icon_of_Zalo.svg/2048px-Icon_of_Zalo.svg.png" alt="Zalo" class="img-fluid">
        </a>
        <!-- <div class="zalo-chat-widget" data-oaid="1171762892749775936" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="1" data-width="300" data-height="500"></div>

        <script src="https://sp.zalo.me/plugins/sdk.js"></script> -->
</div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
        <script src="./js/script.js"></script>
        <script src="./js/mainJquery.js"></script>
        <script src="./js/ajax.js"></script>
    <script>
       new Splide( '#main-slider', {
        pagination: false,
        } );

        var thumbnails = document.getElementsByClassName( 'thumbnail' );
        var current;

        for ( var i = 0; i < thumbnails.length; i++ ) {
        initThumbnail( thumbnails[ i ], i );
        }

        function initThumbnail( thumbnail, index ) {
        thumbnail.addEventListener( 'click', function () {
            splide.go( index );
        } );
        }

        splide.on( 'mounted move', function () {
        var thumbnail = thumbnails[ splide.index ];

        if ( thumbnail ) {
            if ( current ) {
            current.classList.remove( 'is-active' );
            }

            thumbnail.classList.add( 'is-active' );
            current = thumbnail;
        }
        } ).mount();
    </script>
    <script>
        let navtabs = document.querySelectorAll('.information .sliderTab');
        navtabs.forEach(item => {
            item.addEventListener('click', function(event){
                if(event.target.classList.contains('nav-item')){
                    let lastActive = item.querySelector('li.active');
                    let newActive = event.target;
                    let bgActive = item.querySelector('.bg-active');
        
                    lastActive.classList.remove('active');
                    newActive.classList.add('active');
                    bgActive.style.left = newActive.offsetLeft + 'px';
        
                    let lastContentActive = item.querySelector('.tab.active');
                    let newContentActive = document.getElementById(newActive.dataset.target);
                    lastContentActive.classList.remove('active');
                    newContentActive.classList.add('active');
                }
            })
        })
    </script>
</body>

</html>