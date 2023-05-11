<?php
include_once "./header.php";

?>

<section class="login container">
        <div class="cards">
            <div class="title">Đăng ký</div>
            <form action="./action/register.php" method="post">
                <input type="text" name="first" placeholder="First name" required>
                <input type="text" name="last" placeholder="Last name" required>
                
                <?php if(isset($_SESSION['email'])){ ?>
                    <label class="text-danger" style="font-size: 1rem;"><?=$_SESSION['email']?></label>
                <?php } ?>
                <input type="email" name="email" placeholder="Email" required>
                
                <input type="password" name="password" placeholder="Password" required>
                <div class="group-btn">
                    <div class="btn-tablink"><button type="submit">Đăng ký</button></div>
                    <div class="func-orther">
                        <div class="forget"><a href="./index.php"><i class='bx bx-arrow-back'></i> Quay lại trang chủ</a></div>
                    </div>
                </div>
            </form>
        </div>
    </section>

<?php
include_once "./footer.php";
?>