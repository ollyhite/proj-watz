<!-- nav -->
<nav class="nav flex transition">
    <div class="nav-logo flex">
        <a class="img-logo-img" href=""><img src="images/logo-img.svg" alt=""></a>
        <a class="img-logo-text" href=""><img src="images/logo-text.svg" alt=""></a>
    </div>
    <ul class="nav-list flex transition">
        <li class="dropdown">
            <a>PROJECT</a>
            <div class="dropdown-menu flex transition">
                <div class="dropdown-bg flex transition">
                    <a class="" href="">芒果派對</a>
                    <a class="" href="">群魔亂舞</a>
                    <a class="" href="">灰姑娘的<br>水晶襪</a>
                </div>
            </div>
        </li>
        <li><a href="<?= WEB_ROOT ?>/product.php">SHOP</a></li>
        <li><a href="<?= WEB_ROOT ?>/diy.php">DIY</a></li>
        <li><a href="<?= WEB_ROOT ?>/aboutWATZ.php">WATZ</a></li>
        <li><a href="<?= WEB_ROOT ?>/contact.php">CONTACT</a></li>
    </ul>
    <div class="nav-icon flex transition">
        <?php if (isset($_SESSION['member'])) : ?>
            <a class="icon-wrapper none" href="<?= WEB_ROOT ?>/member-profile.php"><img class="svg icon" src="images/icon-member.svg" alt=""></a>
            <a class="icon-wrapper none" href="<?= WEB_ROOT ?>/logout.php"><img class="svg icon" src="images/icon-logout.svg" alt=""></a>
        <?php else : ?>
            <a class="icon-wrapper none" href="<?= WEB_ROOT ?>/member-login-signup.php"><img class="svg icon" src="images/icon-member.svg" alt=""></a>
        <?php endif ?>

        <?php if (empty($_SESSION['cart'])): ?>
        <a class="icon-wrapper none" href="<?= WEB_ROOT ?>/cart-empty.php"><img class="svg icon" src="images/icon-cart.svg" alt=""></a>
        <?php else : ?>
            <a class="icon-wrapper none" href="<?= WEB_ROOT ?>/cart-payment1.php"><img class="svg icon" src="images/icon-cart.svg" alt=""></a>
        <?php endif ?>


        <div class="menu flex">
            <div class="click-area flex transition" id="menuClickArea">
                <div class="box-bar transition">
                    <div class="bar bar1 transition"></div>
                    <div class="bar bar2 transition"></div>
                    <div class="bar bar3 transition"></div>
                </div>
            </div>
            <div class="menu-bg transition">
                <div class="menu-content transition flex">
                    <a class="img-logo-img" href=""><img src="images/logo-img.svg" alt=""></a>
                    <ul class="menu-list">
                        <li class="dropdown">
                            <a>PROJECT</a>
                            <div class="dropdown-menu flex transition">
                                <div class="dropdown-bg flex transition">
                                    <a class="" href="">芒果派對</a>
                                    <a class="" href="">群魔亂舞</a>
                                    <a class="" href="">灰姑娘的水晶襪</a>
                                </div>
                            </div>
                        </li>
                        <li><a href="<?= WEB_ROOT ?>/product.php">SHOP</a></li>
                        <li><a href="<?= WEB_ROOT ?>/diy.php">DIY</a></li>
                        <li><a href="<?= WEB_ROOT ?>/aboutWATZ.php">WATZ</a></li>
                        <li><a href="<?= WEB_ROOT ?>/contact.php">CONTACT</a></li>
                    </ul>
                    <div class="flex">
                        <a class="icon-wrapper" href=""><img src="images/icon-fb.svg" alt=""></a>
                        <a class="icon-wrapper" href=""><img src="images/icon-youtube.svg" alt=""></a>
                        <a class="icon-wrapper" href=""><img src="images/icon-twitter.svg" alt=""></a>
                        <a class="icon-wrapper" href=""><img src="images/icon-ig.svg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>