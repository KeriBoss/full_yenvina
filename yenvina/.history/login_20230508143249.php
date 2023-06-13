<?php
include_once "./header.php";
?>

    <!-- Login start-->
    <section class="login container">
        <div class="cards">
            <div class="title">Đăng nhập</div>
            <form action="./action/login.php" method="post">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <div class="group-btn">
                    <div class="btn-tablink"><button type="submit">Đăng nhập</button></div>
                    <div class="func-orther">
                        <div class="forget"><a href="./forget.html">Quên mật khẩu</a></div>
                        <div class="signin"><span> hoặc </span><a href="./register.html"> Đăng ký</a></div>
                    </div>
                </div>
            </form>
            <p class="mt-4"><span style="font-size: .9rem;"><strong>Lưu ý:</strong> Không cần tài khoản, bạn vẫn có thể đặt hàng với chúng tôi, chỉ cần bạn điền đúng thông tin yêu cầu trước khi thanh toán. </span></p>
        </div>
    </section>
    <!-- Login end-->


<?php
include_once "./footer.php";
?>