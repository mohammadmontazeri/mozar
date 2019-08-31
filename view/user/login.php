<section class="login_part">
    <div class="top">
          <span>
              ورود به حساب کاربری
          </span>
    </div>
    <div class="middle">
          <span>
              با استفاده در <span class="logo">چی گپ</span> میتونید وبلاگ نویسی حرفه ای و در عین حال ساده رو تجربه کنید
          </span>
    </div>
    <div class="bottom">
              <span class="top_title">
                  مشخصات کاربر
              </span>
        <?
            if (isset($_GET['q'])){
                $q = $_GET['q'];
                switch ($q){
                    case 'loginError':
                        echo "<label style='color: #f0004c'>همه فیلد ها را پر کنید**</label>";
                        break;
                    case 'errorNoReg':
                        echo "<label style='color: #f0004c'>شما قبلا ثبت نام نکرده اید**</label>";
                        break;
                    case 'errorinf':
                        echo "<label style='color: #f0004c'>اطلاعات خود را به درستی وارد کنید**</label>";
                        break;
                }
            }
        ?>
        <form action="index.php?c=user&a=checklogin" method="post" enctype="multipart/form-data">
            <div class="member_char_box">
                <div class="user_char">
                          <span>
                              آدرس ایمیل
                          </span>
                    <input type="email" name="email">
                </div>
                <div class="user_char">
                          <span>
                              رمز عبور
                          </span>
                    <input type="password" name="password">
                </div>
                <button class="btn_login" name="btn">
                    ورود
                </button>

            </div>
        </form>
    </div>
</section>