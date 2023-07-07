<?php
include_once "./header.php";
//Map location company
$address = 'Any Street, Any City' ; /* Insert address Here */
$address = "132 Lê Thánh Tông, Quận 1 TP.HCM" ; /* Insert address Here */
?>

        <!-- Breadcrumb start-->
        <section class="breadcrumb container">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb-shop p-0">
                        <li>
                            <a href="index.php"><span>Trang chủ</span></a>
                        </li>
                        <li><span>Liên hệ</span></li>
                    </ol>
                </div>
            </div>
        </section>
        <!-- Breadcrumb end-->
        <div class="lists-main">
            <div class="box search-header text-center">
                <h3 class="title" style="font-family: none;text-transform: uppercase;">Liên hệ</h3>
            </div>
        </div>


        <!-- Contact Start -->
        <div class="container-xxl py-5 bg-white">
            <div class="container">

                <div class="row g-4">

                    <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                        <?php 
                            echo '<iframe class="position-relative rounded w-100 h-100" frameborder="0" src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . str_replace(",", "", str_replace(" ", "+", $address)) . '&z=14&output=embed" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                                tabindex="0"></iframe>';
                        ?>
                        <!-- <iframe class="position-relative rounded w-100 h-100"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                            frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                            tabindex="0"></iframe> -->
                    </div>
                    <div class="col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <p>
                                Cảm ơn quý khách đã lựa chọn dịch vụ của Yến Vina, hy vọng quý khách hài
                                lòng với trải nghiệm
                                mua sắm và các sản phẩm đã lựa chọn. Tại đây, chúng tôi sẽ giải đáp các thắc mắc mà quý
                                khách hàng đang gặp phải.
                            </p>
                            <h6 class="section-title text-start text-primary text-uppercase">Cửa hàng Hà Nội</h6>
                            <p><i class="fa fa-phone me-2 text-primary"></i>092123454</p>
                            <p><i class="fa fa-envelope-open me-2 text-primary"></i>yenvina@gmail.com</p>
                            <p><i class="fa fa-clock me-2 text-primary"></i>Thời gian làm việc từ thứ 2 đến chủ nhật: 8 giờ sáng - 8
                                giờ tối</p>
                            <p><i class="fa fa-map-marker me-2 text-primary"></i>132 Lê Thánh Tông, Quận 1 TP.HCM</p>
                        </div>
                    </div>
                    <div class="col-md-12 py-3">
                        <h6 class="text-center text-uppercase mb-5">Gửi thắc mắc cho chúng tôi</h6>
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <form>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name"
                                                placeholder="Họ tên của bạn">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email"
                                                placeholder="Email của bạn">

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="subject"
                                                placeholder="Số điện thoại">

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Nội dung" id="message"
                                                style="height: 150px"></textarea>

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-payment  py-3" type="submit" style="width: 30%;">Gửi
                                            tin</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->


<?php
include_once "./footer.php";
?>