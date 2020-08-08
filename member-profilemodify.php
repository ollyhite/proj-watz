<?php require __DIR__ . '/__connect_db.php';
$pageName = 'aboutWATZ';  // 這裡放你的pagename

$id = isset($_SESSION['member']['id']) ? intval($_SESSION['member']['id']) : 0;
$sql = "SELECT * FROM `members` WHERE `id`= $id";
$row = $pdo->query($sql)->fetch();

// if(empty($row)){
//     header('Location: ab-list.php');
//     exit;
// }
?>
<?php include __DIR__ . '/__html_head.php' ?>

<!-- 自己另外的CSS插件 <link> 請放這邊 (nav.css及google fonts共用的不用放) -->

<style>
    body {
        width: 100vw;
        background-image: url(images/BG2.svg);
        background-repeat: no-repeat;
        background-size: cover;
        /* background-position: center; */
    }

    .wrapper {
        /* height: 100vh; */
        align-items: center;
        justify-content: center;
    }

    .bg-membercard {
        flex-direction: column;
        align-items: flex-end;
        /* width: 680px;
            height: 540px; */
    }

    .membercard {
        width: 680px;
        height: 540px;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;

    }

    .membercard-img {
        background-image: url(images/user_card_after.svg);
        background-repeat: no-repeat;
        background-size: contain;
        width: 680px;
        height: 540px;

    }

    .member-info {
        justify-content: center;
        margin-top: 10%;
    }

    .bg-photo {
        width: 250px;
        height: 250px;
        z-index: 2;
        align-items: center;
        justify-content: flex-end;
    }

    .member-photo {
        width: 180px;
        height: 180px;
        border-radius: 50%;
        background: darkcyan;
        position: absolute;
        overflow: hidden;
    }

    .member-photo img {
        width: 100%;
        height: 100%;
    }

    .bg-form {
        width: 400px;
        height: 420px;
        z-index: 1;
        flex-direction: column;
        justify-content: space-between;
        align-items: flex-end;
        /* margin-top: 13px; */
    }

    .membercard ul li h5 {
        font-weight: 400;
        letter-spacing: 3px;
        color: #707070;
        margin-right: 20px;
        justify-content: flex-end;
        white-space: nowrap;
        width: 100px;

    }

    .form-wrapper {
        width: 240px;
        height: 40px;
        border-radius: 2px;

    }

    .form-name {
        /* background: #ffffff; */
        width: 240px;
        height: 40px;
        margin: 5px 10px;
        outline: none;
        border: none;
    }

    .form-item img {
        cursor: pointer;
    }

    .bg-pw {
        width: 240px;
        height: 40px;
        background: #ffffff;
        align-items: center;
    }

    .bg-pw img {
        margin-right: 10px;
    }

    .form-password {
        /* background: #ffffff; */
        width: 220px;
        height: 40px;
        outline: none;
        border: none;
    }

    .form-item {
        width: 380px;
        height: 56px;
        align-items: center;
        justify-content: center;
        /* border-radius: 26px; */
        /* margin-left: 10px; */
    }

    .form-item img {
        width: 20px;
        height: 20px;
    }

    .selector {
        width: 120px;
        flex-direction: column;
        justify-content: flex-start;
        margin-right: 20%;
    }

    .box {
        width: 120px;
        height: 70px;
        justify-content: flex-start;
    }

    .selector a {
        padding: 10px;
        margin-bottom: 10px;
        border-bottom: 4px solid transparent;
        transition: .2s;
    }

    .selector a:hover {
        border-bottom: 4px solid #FF9685;
    }

    .btn-blue {
        width: 200px;
        margin-right: 30px;
    }

    .btn-blue:hover {
        background: #FF9685;
    }

    .adress {
        white-space: nowrap;
    }

    @media screen and (max-width: 992px) {
        body {
            background-image: url(images/BG-mobile2.svg);
            background-position: center;
        }

        .wrapper {
            margin-top: 110px;
            width: 100%;
            flex-direction: column;
            justify-content: flex-start;
            height: 100%;
        }

        .bg-membercard {
            position: relative;
            align-items: center;

        }

        .membercard {
            width: 80vw;
            height: 110vw;
            align-items: flex-start;
        }

        .membercard-img {
            background-image: none;
        }

        .bg-photo {
            width: 60vw;
            height: 45vw;
            justify-content: center;
            align-items: center;
        }

        .member-photo {
            width: 30vw;
            height: 30vw;
        }

        .member-info {
            flex-direction: column;
            margin-top: 0;
            align-items: center;
        }

        .bg-form {
            width: 100%;
            height: 60vw;
            margin-top: 0;
            align-items: flex-start;
        }

        .form-item {
            width: 60vw;
            justify-content: center;

        }

        .form-name {
            width: 36vw;
            height: 6vw;
        }

        .form-password {
            width: 36vw;
            height: 6vw;
            margin: 5px 10px;
        }

        .bg-pw {
            width: 36vw;
            height: 6vw;
            justify-content: center;
        }

        .selector {
            width: 94vw;
            flex-direction: row;
            justify-content: center;
            margin-top: 20px;
            margin-right: 0;
        }

        .box {
            width: 30vw;
            height: 10vw;
            line-height: 30px;
            text-align: center;
            margin-top: 15px;
        }

        .selector a {
            white-space: nowrap;
        }

        .btn-blue {
            width: 170px;
            margin: 0;
        }
    }
        /* jumpout notice */

        .notice {
        transition: .2s;
        position: fixed;
        width: 100vw;
        height: 100vh;
        visibility: hidden;
    }

    .notice-block {
        transition: .2s;
        padding: 30px;
        background: #FF9685;
        border-radius: 15px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        flex-direction: column;
        align-items: center;
        z-index: 21;
        opacity: 0;
    }

    .notice-bg {
        position: absolute;
        width: 100vw;
        height: 100vh;
        background: #404040;
        opacity: .8;
    }

    .notice-top {
        margin-bottom: 10px;
    }

    .notice-top img {
        height: 40px;
    }

    .notice-bottom h3 {
        color: white;
        white-space: nowrap;
    }

    .notice.active {
        visibility: visible;
        z-index: 20;
    }

    .notice.active .notice-block {
        opacity: 1;
    }
</style>
<!-- jumpout notice -->
<div class="notice">
    <div class="notice-bg"></div>
    <div class="notice-block flex">
        <div class="notice-top">
            <img src="images/icon-success.svg " alt=" ">
        </div>
        <div class="notice-bottom">
            <h3>修改完成</h3>
        </div>
    </div>
</div>
<div class="container flex">
    <!-- 如果container有其它class要自己加上 -->

    <?php include __DIR__ . '/__navbar.php' ?>
    <?php include __DIR__ . '/__html_btn-top.php' ?>

    <div class="wrapper flex">
        <div class="selector flex">
            <div class="box"><a href="<?= WEB_ROOT ?>/member-profile.php">會員資料</a></div>
            <div class="box"><a href="<?= WEB_ROOT ?>/member-historylist.php">訂單紀錄</a></div>
            <div class="box"><a href="<?= WEB_ROOT ?>/product.php">會員條款</a></div>
            <div class="box"><a href="<?= WEB_ROOT ?>/product.php">隱私權政策</a></div>
        </div>
        <form class="" name="form1" method="post" novalidate>
            <div class="bg-membercard flex">
                <div class="membercard flex">
                    <div class="membercard-img">
                        <div class="member-info flex">
                            <div class="bg-photo flex">
                                <div class="member-photo flex">
                                    <img src="images/red square-01.jpg" alt="">
                                </div>
                            </div>

                            <ul class="bg-form flex">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <li class="form-item flex">
                                    <h5 class="flex">姓名</h5>
                                    <input class="form-name flex" type="text" id="name" name="name" required value="<?= htmlentities($_SESSION['member']['name']) ?>">
                                </li>
                                <li class="form-item flex">
                                    <h5 class="flex">電話</h5>
                                    <input class="form-name" type="text" id="mobile" name="mobile" pattern="09\d{2}-?\d{3}-?\d{3}" value="<?= htmlentities($_SESSION['member']['mobile']) ?>">
                                </li>
                                <li class="form-item flex">
                                    <h5 class="adress flex">地址</h5>
                                    <textarea style="overflow:hidden; resize:none; " class="form-name" type="text" id="address" name="address" cols="30" rows="3"><?= htmlentities($_SESSION['member']['address']) ?></textarea>
                                </li>
                                <li class="form-item flex">
                                    <h5 class="flex">舊密碼</h5>
                                    <div class="bg-pw flex">
                                        <input class="password form-name" type="password" id="oldpassword">
                                        <img class="eyes" id="eyes" src="images/hidden.svg" alt="">
                                    </div>
                                </li>
                                <li class="form-item flex">
                                    <h5 class="flex">新密碼</h5>
                                    <div class="bg-pw flex">
                                        <input class="password form-name" type="password" id="newpassword" name="newpassword">
                                        <img class="eyes" id="" src="images/hidden.svg" alt="">
                                    </div>
                                </li>
                                <li class="form-item flex">
                                    <h5 class="flex">再次確認密碼</h5>
                                    <div class="bg-pw flex">
                                        <input class="password form-name" type="password" id="confirmpassword">
                                        <img class="eyes" src="images/hidden.svg" alt="">
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div>
                    <button class="btn-blue" type="submit" onclick="return formCheck()">修改會員資料</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include __DIR__ . '/__html_footer.php' ?>

<?php include __DIR__ . '/__scripts.php' ?>

<script>
    // $('#eyes').on( 'click' , function() {
    //     console.log('123')
    //     if( $('#newpassword').hasAttr('type','password')){
    //         $('#newpassword').attr('type','text');
    //     }else{
    //         $('#newpassword').attr('type','password');
    //     }
    //     // $('#newpassword').attr('type', 'password')
    //     // console.log('hi')
    // })
    $('.eyes').on('click',function(e) {
      let $pwd = $(this).prev('.password');

      $pwd.text(($pwd.text() === 'Hide' ? 'Show' : 'Hide'));

      if ($pwd.attr('type') === 'password') {
        $(this).attr('src','images/eye.svg')
       $pwd.attr('type', 'text');
      } else {
        $(this).attr('src','images/hidden.svg')
        $pwd.attr('type', 'password');
      }
      e.preventDefault();
     });
    // var demoImg = document.getElementById("eyes");
    // var demoInput = document.getElementById("newpassword");

    // function hideShowPsw() {
    //     if (demoInput.type = "password") {
    //         demoInput.type = "text";
    //         // demoImg.src = "../Images/showPasswd.png";
    //     } else {
    //         demoInput.type = "password";
    //         // demoImg.src = "../Images/hidePasswd.png";
    //     }
    // }
</script>
<script>
    const
        name = $('#name'),
        mobile = $('#mobile'),
        address = $('#address'),
        newpassword = $('#newpassword')

    //     const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    // const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;

    function formCheck() {
        // console.log("123")
        // name.text('');
        // mobile.text('');
        // newpassword.text('');
        // address.text('');

        // email.css('border-color', 'lightblue');
        // mobile.css('border-color', 'lightblue');
        //TODO : 檢查欄位
        let isPass = true;
        // if (!email_re.test(email.val())) {
        //     isPass = false;
        //     email.css('border-color', 'darkred');
        //     email.next().text('請填寫正確的 email 格式');
        // }
        // if (!mobile_re.test(mobile.val())) {
        //     isPass = false;
        //     mobile.css('border-color', 'darkred');
        //     mobile.next().text('請填寫正確的 手機 格式');
        // }
        if (isPass) {
            $.post('member-profilemodify-api.php', $(document.form1).serialize(), function(data) {
                console.log(data);

                if (data.success) {
                    $('.notice h3').text('修改完成');
                    notice();
                    setTimeout(function() {
                        location.href = 'member-profile.php';
                    }, 1000)
                    // info_bar.removeClass('alert-danger')
                    //     .addClass('alert-success')
                    //     .html('新增成功!');
                } else {
                    $('.notice h3').text('資料未修改');
                    notice();
                    setTimeout(function() {
                        location.href = 'member-profile.php';
                    }, 1000)
                    // info_bar.removeClass('alert-success')
                    //     .addClass('alert-danger')
                    //     .html(data.error || '新增失敗!');
                }
                // info_bar.slideDown();

                // setTimeout(function(){
                //     info_bar.slideUp();
                // }, 3000);

            }, 'json');
        }
        return false;
    }
    function notice() {
        $(".notice").addClass("active");
    }
</script>

<?php require __DIR__ . '/__html_foot.php' ?>